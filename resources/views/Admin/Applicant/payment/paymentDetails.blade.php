@extends('Admin.Layout.master')
@section('main_content')
<style type="text/css">
    .feePayment
    {
        width:100%;
    }
    .feePayment thead tr th
    {
        color:#007bff!important;
        font-weight:400;
    }
    .feePayment tbody  tr td
    {
        
    }
    #red
    {
        color:red;
    }
    #green
    {
        color:green;
    }
</style>
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Payment Details</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('CheckList.index')}}">Applicant</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Payment Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
                   <div class="card">
                    <div id="printableArea">
                        <h3 class="text-center text-danger">{{$applicantPaymentDetails->first_name}} {{$applicantPaymentDetails->last_name}} Payment Detail</h3>
                        <hr>
                        <div class="container">
                            <table class="feePayment">
                                <thead>
                                    <th>S.NO</th>
                                    <th>Fee Paid Amount</th>
                                    <th>Date of Payment</th>
                                    <th>Mode Of Payment</th>
                                    <th>Payment Received By</th>
                                </thead>
                                <tbody>
                                     @php
                                            $totalPaid=0;

                                    @endphp
                                    @foreach($applicantPaymentDetails->feePayment as $key=>$fee)
                                        
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>Rs {{$fee->feespaidamount}}</td>
                                        <td>{{$fee->dateofpayment}}</td>
                                        <td>{{$fee->modeofpayment}}</td>
                                        <td>{{$fee->paymentreceivedby}}</td>

                                    </tr>
                                    @php
                                            $totalPaid=$totalPaid+$fee->feespaidamount;

                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row" style="margin-top:30px">
                                <div class="col-lg-12">
                                    <p><strong>Course Fee :</strong> Rs {{$applicantPaymentDetails->coursefee}}</p>
                                    <p><strong>Total Paid : </strong>Rs {{$totalPaid}}</p>
                                    <p><strong>Due Amount :</strong>  @if($applicantPaymentDetails->coursefee>=$totalPaid)
                                        <span>Rs {{$applicantPaymentDetails->coursefee - $totalPaid}}</span>
                                    @else
                                        <span>Rs 0</span>
                                    @endif</p>
                                    <p><strong>Payment Status :</strong> @if($totalPaid<$applicantPaymentDetails->coursefee)
                                        <span id="red">Remaining</span>
                                    @else
                                        <span id="green">Completed</span>
                                    @endif</p>
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px">
                                <div class="col-lg-9"></div>
                                <div clas="col-lg-3">
                                    @if($totalPaid<$applicantPaymentDetails->coursefee)
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myPayment">Add Payment</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

<div class="modal fade" id="myPayment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Payment of {{$applicantPaymentDetails->first_name}} {{$applicantPaymentDetails->last_name}}</h4>
        </div>
        <form method="post" action="{{route('applicantPaymentStore',$applicantPaymentDetails->id)}}">
            @csrf
        <div class="modal-body">
            
                <div class="form-group">
                    <label class="control-label">Fee Paid Amount</label>
                    <input type="number" name="feespaidamount" class="form-control" required placeholder="Fee Paid Amount">
                </div>
                <div class="form-group">
                    <label class="control-label">Date of Payment</label>
                     <input type="date" name="dateofpayment" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label class="control-label">Mode of Payment</label>
                    <select class='form-control select2' name="modeofpayment" required>
                                      <option value="">Please Select one...</option>
                                      <option value="Bank Tranfer">Bank Transfer</option>
                                      <option value="Cash">Cash</option>
                                      <option value="QR Pay">Or Pay</option>
                                      <option value="Card Swipe">Card Swipe</option>
                                      <option value="Esewa">Esewa</option>
                                      <option value="Mobile Banking">Mobile Banking</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label class="control-label">Payment Received By</label>
                    <input type="text" name="paymentreceivedby" class="form-control" placeholder="Payment Received By" required>
                    <input type="hidden" name="applicant_id" value="{{$applicantPaymentDetails->id}}" required>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
      
    </div>
</div>
           
@endsection