<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\Loan;
use App\PaymentSchedule;

class PaymentDueDate extends Model
{
    protected $table = 'paymend_due_dates';
    protected $guarded = [];
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['due_date' => 'date'];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function paymentSchedule()
    {
        return $this->belongsTo(PaymentSchedule::class, 'payment_schedule_id');
    }
}
