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
        Schema::create('table_product', function (Blueprint $table) {
            $table->id();
            $table->string('prdName');
            $table->unsignedBigInteger('prdCtgy');
            $table->foreign('prdCtgy')->references('id')->on('table_category');
            $table->decimal('prdPrc', 10,2);
            $table->decimal('prdRtg', 5,1)->default(5.0);
            $table->longtext('prdImg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_product');
    }
};
