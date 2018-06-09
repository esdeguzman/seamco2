<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDueDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_due_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('payment_schedule_id');
            $table->unsignedInteger('loan_id');
            $table->unsignedInteger('member_id');
            $table->date('due_date');
            $table->decimal('20, 2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_due_dates');
    }
}
