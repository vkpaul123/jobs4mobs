<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('jobcategoryId');
            $table->string('preferedworktype');
            $table->date('openingDate');
            $table->date('closingDate');
            $table->string('preferedednlevel');
            $table->integer('preferedworkexp');
            $table->bigInteger('salary');
            $table->integer('noOfVacancies')->nullable();
            $table->string('jobdesignation');
            $table->string('jobSpecification');
            $table->text('jobDescription');
            $table->boolean('testrequired')->nullable();
            $table->text('vacancydescription')->nullable();
            $table->text('vacancyStatus')->nullable();

            $table->integer('addresses_id')->nullable();
            $table->integer('questionnaire_id')->nullable();
            $table->integer('employers_id');

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
        Schema::dropIfExists('vacancies');
    }
}
