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
        Schema::create('nvhnhacc', function (Blueprint $table) {
           // $table->id();
            $table->string('nvhNhacc')->primary();
            $table->string('nvhTenNCC')->;
            $table->string('nvhDiaChi');
            $table->string('nvhSDT');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhnhacc');
    }
};
