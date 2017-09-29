<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_skills', function (Blueprint $table) {
            $table->increments('id');

            $table->string('skillName');
            $table->integer('jobCategoryId');
            $table->string('proficiencyLevel');

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
        Schema::dropIfExists('jobseeker_skills');
    }
}
