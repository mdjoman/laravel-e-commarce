<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('status')->nullable();
            $table->string('currency')->nullable();
            $table->integer('customar_id')->nullable();
            $table->integer('shiping_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->float('amount', 10,2)->nullable();
            $table->string('order_date')->nullable();
            $table->string('orderDetails')->nullable();
            
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
        Schema::dropIfExists('orders');
    }
}
