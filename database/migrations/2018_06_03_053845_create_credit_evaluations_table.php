<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('loan_id');
            $table->unsignedInteger('member_id');

            $table->date('last_loan_date')->nullable();
            $table->date('last_payment_date')->nullable();

            $table->decimal('last_loan_balance', 20, 2)->nullable();

            $table->unsignedInteger('verified_by')->nullable();
            $table->unsignedInteger('recommended_for_loan_extension_by')->nullable();
            $table->unsignedInteger('approved_for_payment_by')->nullable();

            $table->decimal('approved_amount', 20, 2)->nullable();

            // Interest in PESO value not PERCENTAGE.
            $table->decimal('interest', 20, 2)->nullable();

            $table->date('estimated_release_date')->nullable();

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
        Schema::dropIfExists('credit_evaluations');
    }
}
