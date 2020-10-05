<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Http\Requests\ApplicantValidator;
use File;
use App\Admin\CheckList;
use App\Admin\ProgressFlow;
use DB;
use App\Admin\Admin;
use Thread;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App\Admin\Feepayment;
class ApplicantController extends Controller
{
    protected $category = null;
    protected $applicant = null;
    protected $enquiry = null;
    protected $checklist = null;
    protected $progressflow = null;
    protected $feepayment=null;

    public function __construct(Applicant $applicant, Category $category, Enquiry $enquiry, CheckList $checkList,ProgressFlow $progressflow,Feepayment $feepayment)
    {
        $this->category = $category;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
        $this->checkList = $checkList;      
        $this->progressflow = $progressflow;
        $this->feepayment=$feepayment;
    }

    public function index(Request $request)
    {
        $query=$this->applicant->get();
        if(isset($request->category)){
            $query = $query->where('Category_id',$request->category);
        }
        if(isset($request->color_code)){
            $query = $query->where('color_code',$request->color_code);
        }
        if(isset($request->status)){
            $query = $query->where('status',$request->status);
        }
        $applicant=$query;
        $category=$this->category->get();
        return view('Admin.Applicant.Index')->with('applicant', $applicant)->with('category',$category);
    }


    public function create()
    {
        $category = $this->category->get();
        $enquiry = $this->enquiry->get();
        return view('Admin.Applicant.Add')->with('category', $category)->with('enquiry', $enquiry);
    }

    public function AppApplicant($id)
    {
        $category = $this->category->get();
        $applicantenquiry= $this->enquiry->where('id',$id)->first();
        return view('Admin.Applicant.Add')->with('category', $category)->with('applicantenquiry', $applicantenquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantValidator $request, Admin $thread)
    {

        $data = $request->except(['feespaidamount','dateofpayment','modeofpayment','paymentreceivedby']);
        $name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        if ($request->passport_docs) {
            $path = 'upload/Applicant';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name .'-passport_docs-' . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();

            $success = $request->passport_docs->move($path, $file_name);

            if ($success) {
                $data['passport_docs'] = $file_name;
            } else {
                $data['passport_docs'] = null;
            }

        }
        $this->applicant->fill($data);
       
        $success= $this->applicant->save();

         $this->applicant->storePayment([
            'feespaidamount'=>$request['feespaidamount'],
            'dateofpayment'=>$request['dateofpayment'],
            'modeofpayment'=>$request['modeofpayment'],
            'paymentreceivedby'=>$request['paymentreceivedby']]);
        if ($success) {
            $admin = Admin::all();
            $thread = $this->applicant;

//        dd($admin);
            foreach ($admin as $admin)
                $admin->notify(new \App\Notifications\ApplicantNotification($thread));
            return redirect()->route('Applicant.index')->with('success', 'Applicant Created Succesfully');
        } else
            return redirect()->route('Applicant.index')->with('Error', 'Sorry! Applicant Creation Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }

        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
            return view('Admin.Applicant.Update')->with('applicant', $applicant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        $data = $request->except(['feespaidamount','dateofpayment','modeofpayment','paymentreceivedby']);
        if ($request->passport_docs) {
            $image_path = 'upload/Applicant/'.$applicant->passport_docs;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            $path = 'upload/Applicant/';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . '-passport_docs-' . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();
            $success = $request->passport_docs->move($path, $file_name);

            if ($success) {
                $data['passport_docs'] = $file_name;
            } else {
                $data['passport_docs'] = null;
            }
        }
        $applicant->fill($data);
        $success = $applicant->save();
        $admin = Admin::all();
        foreach ($admin as $admin)
            $admin->notify(new \App\Notifications\ApplicantUpdateNotification());
        return redirect()->route('Applicant.index')->with('success', 'Applicant Updated Successfully');
    }

    public function ColorUpdate(Request $request,$id){

        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $data=$request->all();
        $applicant->fill($data);
        $success = $applicant->save();
        if($success){
            $admin = Admin::all();
            foreach ($admin as $admin){
                $admin->notify(new \App\Notifications\ApplicantUpdateNotification());
            }
            session()->flash('success','Applicant Updated Successfully');
        }
            return redirect()->route('Applicant.index');
    }



    public function destroy($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $image_path = 'upload/Applicant/' . $applicant->passport_docs;
        if (File::exists($image_path)) {
            $delete = File::delete($image_path);
        }
        $success = $applicant->delete();
        $checkList = $this->checkList->where('applicant_id', $id)->get();
        
        $progressflow = $this->progressflow->where('applicant_id', $id)->get();
        foreach ($checkList as $data) {
            DB::table('check_lists')->where('applicant_id', $id)->delete();
        };
       
        
       
        foreach ($progressflow as $data) {
            $signed_docs = 'upload/Progress flow/' . $data->signed_docs;
            if (File::exists($signed_docs)) {
                $delete = File::delete($signed_docs);
            }
            DB::table('progress_flows')->where('applicant_id', $id)->delete();
        };
        if ($success) {
            return redirect()->route('Applicant.index')->with('success', 'Applicant Deleted Successfully');
        } else {
            return redirect()->route('Applicant.index')->with('Error', 'Sorry! ApSorry! there is an error deleting applicant');
        }

    }

    public function Detail($id)
    {
        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found Or Already Deleted');
        }
        $checklist = $this->checkList->where('applicant_id', $id)->first();
      
        $progressflow = $this->progressflow->where('applicant_id', $id)->first();
        return view('Admin.Applicant.Detail')->with('applicant', $applicant)->with('checklist', $checklist)
            ->with('education2', $education2)->with('education', $education)->with('education3', $education3)
            ->with('progressflow', $progressflow);
    }

     public function pdf($id)
    {
        $applicant = $this->applicant->find($id);
        $checklist = $this->checkList->where('applicant_id', $id)->first();
           
        $progressflow = $this->progressflow->where('applicant_id', $id)->first();
        $pdf = \PDF::loadView('Admin.Applicant.pdf.pdf',compact('applicant','checklist','education','education2','education3','progressflow'));
        return $pdf->download($applicant->first_name.'.pdf');
    }


    public function paymentDetails($id)
    {
        $applicantPaymentDetails=$this->applicant->find($id);
        //dd($applicantPaymentDetails);

        return view('Admin.Applicant.payment.paymentDetails',compact('applicantPaymentDetails'));
    }
    public function paymentStore($id,Request $request)
    {
        $request->validate([
            'paymentreceivedby'=>'required',
            'feespaidamount'=>'required',
            'dateofpayment'=>'required|date',
            'modeofpayment'=>'required'
        ]);
        $this->feepayment->create($request->all());
        return back();
    }

}
