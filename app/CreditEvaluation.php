<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Loan;
use App\Member;

class CreditEvaluation extends Model
{
    protected $table = 'credit_evaluations';
    protected $guarded = [];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function verifiedBy()
    {
        return $this->belongsTo(Admin::class, 'verified_by');
    }

    public function recommendedForLoanExtensionBy()
    {
        return $this->belongsTo(Admin::class, 'recommended_for_loan_extension_by');
    }

    public function approvedForPaymentBy()
    {
        return $this->belongsTo(Admin::class, 'approved_for_payment_by');
    }
}
