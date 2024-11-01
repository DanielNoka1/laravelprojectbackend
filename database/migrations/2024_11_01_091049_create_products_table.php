<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique(); // Ensure this column exists
            $table->string('sku')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('size');
            $table->string('stock_status');
            $table->decimal('price_min', 10, 2);
            $table->decimal('price_max', 10, 2);
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->integer('stock_qty');
            $table->string('image_src')->nullable();
            $table->string('image_alt')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
