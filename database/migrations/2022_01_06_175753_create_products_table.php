<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Product_name')->unique();
            $table->string('category_id');
            $table->string('brand_id');
            $table->float('Product_Price');
            $table->string('Product_code')->nullable();
            $table->integer('discount_Price')->nullable();           
            $table->string('coupon')->nullable();
            $table->integer('Product_Amount');
            $table->text('sDescription')->nullable();
            $table->text('lDescription')->nullable();
            $table->text('image')->nullable();
            $table->text('status');
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('products');
    }
}
