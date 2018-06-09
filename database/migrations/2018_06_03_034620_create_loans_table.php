<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('co_maker_id');

            // Code format is: L[4-digit member id]-[4-digit loan id]
            $table->string('code')->unique();

            // Possible Values: New, Processing, Aprpoved, Denied
            $table->string('status')->default('new');

            $table->decimal('regular', 20, 2)->default('0.0');
            $table->decimal('short_term', 20, 2)->default('0.0');
            $table->decimal('pre_joining', 20, 2)->default('0.0');
            $table->decimal('productive', 20, 2)->default('0.0');
            $table->decimal('special', 20, 2)->default('0.0');
            $table->decimal('appliance', 20, 2)->default('0.0');
            $table->decimal('petty_cash', 20, 2)->default('0.0');

            // The loan amount requested by the Member
            $table->decimal('total_requested_amount', 20, 2)->default('0.0');

            // The amount the member has to pay the loan. This is the sum of
            // approved loan amount plus interest after credit evaluation.
            $table->decimal('total_amount_due', 20, 2)->nullable();

            $table->string('company_contact_number');
            $table->string('monthly_income');
            $table->string('take_home_pay');
            $table->string('sss_gsis');
            $table->string('residence_telephone_number');

            // No of months to pay
            $table->tinyInteger('payment_terms');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
