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
    public function up()  //CHECK TABLE AND RELATIONSHIP
    {
        Schema::create('initial_assessment_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->string('education');
            $table->string('experience');
            $table->string('performance_evaluation');
            $table->string('training');
            $table->string('eligibility');
            $table->string('outstanding_accomplishment');
            $table->string('total_score');
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
        Schema::dropIfExists('initial_assessment_scores');
    }
};
