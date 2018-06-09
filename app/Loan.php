<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\CreditEvaluation;
use App\PaymentSchedule;

class Loan extends Model
{
    protected $table = 'loans';
    protected $guarded = [];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function coMaker()
    {
        return $this->belongsTo(Member::class, 'co_maker_id');
    }

    public function creditEvaluation()
    {
        return $this->hasOne(CreditEvaluation::class, 'loan_id');
    }

    public function paymentSchedule()
    {
        return $this->hasOne(PaymentSchedule::class, 'loan_id');
    }
}
