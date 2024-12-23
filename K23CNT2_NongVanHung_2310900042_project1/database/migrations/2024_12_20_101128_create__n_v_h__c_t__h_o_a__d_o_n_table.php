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
        Schema::create('NVH_CT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nvhHoaDonID')->references('id')->on('NVH_HOA_DON');
            $table->bigInteger('nvhSanPhamID')->references('id')->on('NVH_SAN_PHAM');
            $table->integer('nvhSoLuonMua');
            $table->float('nvhDonGiaMua');
            $table->float('nvhThanhTien');
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();

            
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NVH_CT_HOA_DON');
    }
};
