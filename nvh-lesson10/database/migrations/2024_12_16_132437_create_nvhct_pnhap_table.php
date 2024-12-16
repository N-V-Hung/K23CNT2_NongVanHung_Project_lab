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
        Schema::create('nvhctPnhap', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('nvhSoPn');
            $table->string('nvhMaVTu');
            $table->interger('nvhSLNhap');
            $table->float('nvhDGNhap');
            $table->primary(arry('nvhSoPn','nvhMaVTu'));
           //$table->primary(['nvhSoDH','nvhMaVTu']);
           $table->foreign('nvhSoPn')->references('nvhSoPn')->on('nvhpnhap');
           $table->foreign('nvhMaVTu')->references('nvhMaVTu')->on('nvhavattuavattu');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhctPnhap');
    }
};
