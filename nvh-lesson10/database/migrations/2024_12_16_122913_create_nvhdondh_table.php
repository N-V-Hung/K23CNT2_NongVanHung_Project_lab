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
        Schema::create('nvhdondh', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('nvhSoHD')->primary();
            $table->date('nvhNgayHD');
            $table->string('nvhNhacc');
            $table->foreign('nvhNhacc')->references('nvhNhcc')->on('nvhnhacc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhdondh');
    }
};
