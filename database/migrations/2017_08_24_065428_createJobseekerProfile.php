<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('educationlevel');
            $table->integer('experience');
            $table->integer('recentJobCategoryId')->nullable();
            $table->integer('preferedJobCategoryId1');
            $table->integer('preferedJobCategoryId2');
            $table->string('preferedworktype');
            $table->bigInteger('preferedsalary');
            $table->string('preferedcityofwork');
            $table->string('preferedcountryofwork');
            $table->text('tagline');
            $table->string('resume')->nullable();
            $table->text('projectsWorkedOn')->nullable();
            $table->text('languagesSpoken')->nullable();
            
            $table->integer('address_id')->nullable();
            
            $table->integer('user_id');
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
        Schema::dropIfExists('jobseeker_profiles');
    }
}
