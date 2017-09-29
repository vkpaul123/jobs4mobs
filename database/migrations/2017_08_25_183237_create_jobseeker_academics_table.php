<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_academics', function (Blueprint $table) {
            $table->increments('id');

            $table->string('qualificationText');
            $table->string('boardName');
            $table->string('academyName');
            $table->decimal('marks', 5, 2);
            $table->integer('yearOfPassing');

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
        Schema::dropIfExists('jobseeker_academics');
    }
}
