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
        Schema::create('NVH_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('nvhMaDonHang',255)->unique();
            $table->bigInteger('nvhMaKhachHang')->references('id')->on('NVH_KHACH_HANG');
            $table->date('nvhNgayHoaDon');
            $table->string('nvhHoTenKhachHang',255);
            $table->string('nvhEmail',255);
            $table->string('nvhDienThoai',255);
            $table->string('nvhDiaChi',255);
            $table->float('nvhTongTriGia');
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NVH_HOA_DON');
    }
};
