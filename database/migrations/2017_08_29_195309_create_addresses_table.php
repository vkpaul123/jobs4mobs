<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('primaryPhoneNo');
            $table->string('secondaryPhnoeNo')->nullable();
            $table->string('faxNo')->nullable();
            $table->text('address');
            $table->string('postalCode');
            $table->string('cityName');
            $table->string('stateName');
            $table->string('countryName');
            $table->string('website')->nullable();
            $table->double('lat', 18, 15)->nullable();
            $table->double('lang', 18, 15)->nullable();

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
        Schema::dropIfExists('addresses');
    }
}
