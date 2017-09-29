<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('companyname')->nullable();
            $table->string('tagline')->nullable();
            $table->string('companyType')->nullable();
            $table->string('companyCategory')->nullable();
            
            $table->integer('jobCategoryId')->nullable();

            $table->string('designation')->nullable();

            $table->text('description')->nullable();
            $table->text('photo')->nullable();
            $table->integer('address_id')->nullable();

            $table->boolean('status')->default(0);
            $table->string('verifyToken')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('employers');
    }
}
