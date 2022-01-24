<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('fname');
            $table->string('lname');
            $table->string('mobile');
            $table->string('division')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address');
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
        Schema::dropIfExists('shipings');
    }
}
