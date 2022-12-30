<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('extension')->nullable();
            $table->string('sex');
            $table->string('marital_status');
            $table->string('disability');
            $table->string('country');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('mobile_number');
            $table->date('birthday');

            
            $table->string('applying_for');
            $table->string('educational_attainment');
            $table->string('college_course');
            $table->string('school_graduated');
            $table->string('year_last_attended');
            $table->string('previously_applied');  
            $table->string('job_discovery');

            $table->string('application_letter');
            $table->string('pds');
            $table->string('work_experience')->nullable();
            $table->string('otr')->nullable();
            $table->string('employment_certificates')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('training_certificates')->nullable();
            $table->string('performance_evaluation')->nullable();
            $table->string('commendation')->nullable();

            $table->string('status');
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
        Schema::dropIfExists('applicants');
    }
};
