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
        Schema::create('nvhtonkho', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('nvhNamThang')->primary();
            $table->string('nvhMaVTu');
            $table->interger('nvhSLDau');
            $table->interger('nvhTongSLN');
            $table->interger('nvhTongSLX');
            $table->interger('nvhSLCuoi');
            $table->string('nvhSoPn');
            $table->string('nvhMaVTu');
            $table->interger('nvhSLNhap');
            $table->float('nvhDGNhap');
           $table->foreign('nvhMaVTu')->references('nvhMaVTu')->on('nvhavattuavattu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhtonkho');
    }
};
