<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContuctmassegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contuctmassegs', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->string('customerEmail');
            $table->string('contactSubject')->nullable();
            $table->string('contactMessage');
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
        Schema::dropIfExists('contuctmassegs');
    }
}
