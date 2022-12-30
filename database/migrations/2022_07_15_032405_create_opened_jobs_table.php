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
        Schema::create('opened_jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_image');
            $table->string('job_title');
            $table->string('item_number');
            $table->string('status');
            $table->string('salary');
            $table->string('place_of_assignment');
            $table->string('education');
            $table->string('training');
            $table->string('experience');    
            $table->mediumText('eligibility');
            $table->mediumText('competency');
            $table->mediumText('duties');
            $table->date('opening_date');
            $table->date('closing_date');
            $table->timestamps();
            $table->integer('to_close')->default(0);
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opened_jobs');
    }
};
