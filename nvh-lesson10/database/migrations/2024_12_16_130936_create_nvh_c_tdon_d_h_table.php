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
        Schema::create('nvhCTdonDH', function (Blueprint $table) {
           // $table->id();
           // $table->timestamps();
           $table->string('nvhSoDH');
           $table->string('nvhMaVTu');
           $table->interger('nvhSlDat');
           $table->primary(arry('nvhSoDH','nvhMaVTu'));
           //$table->primary(['nvhSoDH','nvhMaVTu']);
           $table->foreign('nvhSoHD')->references('nvhSoDH')->on('nvhDonDH');
           $table->foreign('nvhMaVTu')->references('nvhMaVTu')->on('nvhavattuavattu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhCTdonDH');
    }
};
