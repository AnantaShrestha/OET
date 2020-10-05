<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Feepayment;

class Applicant extends Model
{
    protected $guarded = [];
    protected $with=['feePayment'];



    public function Category_Applicant()
    {
        return $this->belongsTO('App\Admin\Category', 'Category_id');
    }

    public function CheckList()
    {
        return $this->HasMany('App\Admin\CheckList');
    }

    public function Education()
    {
        return $this->HasMany('App\Admin\Education');
    }

    public function Education2()
    {
        return $this->HasMany('App\Admin\Education2');
    }

   
    public function ProgressFlow()
    {
        return $this->HasMany('App\Admin\ProgressFlow');
    }

    public function ApplicantAppointment()
    {
        return $this->HasMany('App\Admin\ApplicantAppointment');
    }

    public function IncommingCallLog()
    {
        return $this->HasMany('App\Admin\IncommingCallLog');
    }

    public function OutgoingCallLog()
    {
        return $this->HasMany('App\Admin\OutgoingCallLog');
    }

    public function VisitorLog()
    {
        return $this->HasMany('App\Admin\VisitorLog');
    }

    public function feePayment()
    {
        return $this->hasMany(Feepayment::class,'applicant_id');
    }

    public function storePayment($data)
    {
        return $this->feePayment()->create($data);
    }
}

