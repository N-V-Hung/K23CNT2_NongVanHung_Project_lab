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
        Schema::create('nvhctPxuat', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('nvhSoPxx');
            $table->string('nvhMaVTu');
            $table->interger('nvhSLNhap');
            $table->float('nvhDGNhap');
            $table->primary(arry('nvhSoPxx','nvhMaVTu'));
           //$table->primary(['nvhSoDH','nvhMaVTu']);
           $table->foreign('nvhSoPxxx')->references('nvhSoPn')->on('nvhpxuat');
           $table->foreign('nvhMaVTu')->references('nvhMaVTu')->on('nvhavattuavattu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhctPxuat');
    }
};
