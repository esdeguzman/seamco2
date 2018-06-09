<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\Loan;
use App\PaymentDueDate;

class PaymentSchedule extends Model
{
    protected $table = 'payment_schedules';
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

    public function paymentDueDates()
    {
        return $this->hasMany(PaymentDueDate::class, 'payment_schedule_id');
    }
}
