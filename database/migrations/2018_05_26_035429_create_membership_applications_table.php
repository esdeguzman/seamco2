<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');

            // If approved_at, disapproved_at, attended_pmes_at, id_released_at,
            // fees_informed_at and share_certificate_given_at is NULL, means the
            // action has not been done yet. Otherwise, the date and time value
            // of the property indicates when the action has been done.
            $table->datetime('approved_at')->nullable();
            $table->unsignedInteger('approved_by')->nullable();

            $table->datetime('disapproved_at')->nullable();
            $table->unsignedInteger('disapproved_by')->nullable();
            $table->text('disapproval_reason')->nullable();

            $table->datetime('attended_pmes_at')->nullable();
            $table->unsignedInteger('attendance_verified_by')->nullable();

            $table->datetime('id_released_at')->nullable();
            $table->unsignedInteger('id_released_by')->nullable();

            $table->datetime('fees_informed_at')->nullable();
            $table->unsignedInteger('fees_informed_by')->nullable();

            $table->datetime('share_certificate_given_at')->nullable();
            $table->unsignedInteger('share_certificate_given_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_applications');
    }
}
