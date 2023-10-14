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
        Schema::create('table_size', function (Blueprint $table) {
            $table->id();
            $table->string('sizeName');
            $table->timestamps();
        });

        Schema::create('table_color', function (Blueprint $table) {
            $table->id();
            $table->string('colorName');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_color');
        Schema::dropIfExists('table_size');
    }
};
