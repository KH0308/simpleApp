<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_product_variant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->unsignedBigInteger('size');
            $table->unsignedBigInteger('color');
            $table->integer('Quantity');
            $table->foreign('productID')->references('id')->on('table_product');
            $table->foreign('size')->references('id')->on('table_size');
            $table->foreign('color')->references('id')->on('table_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_product_variant');
    }
};
