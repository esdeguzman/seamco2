<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('civil_status');
            $table->date('birthday');
            $table->string('mobile_number')->nullable();
            $table->string('gender');
            $table->text('present_address');
            $table->text('permanent_address')->nullable();
            $table->string('tax_identification_number')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->date('employment_date')->nullable();
            $table->decimal('salary', 12, 2)->nullable();
            $table->string('other_source_of_income')->nullable();
            $table->integer('number_of_dependents')->nullable();
            $table->date('joined_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
