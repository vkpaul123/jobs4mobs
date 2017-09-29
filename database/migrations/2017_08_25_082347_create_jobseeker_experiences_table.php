<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyName');
            $table->string('companyLocation');
            $table->string('jobTitle');
            $table->string('fromMonth');
            $table->string('toMonth');
            $table->text('jobDescription');

            $table->integer('jobseeker_profiles_id');
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
        Schema::dropIfExists('jobseeker_experiences');
    }
}
