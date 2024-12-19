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
        Schema::create('NVH_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('nvhMaKhachHang',255)->unique();
            $table->string('nvhHoTenKhachHang',255);
            $table->string('nvhEmail',255);
            $table->string('nvhDiaChi',255);
            $table->date('nvhNgayDangKy');
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NVH_KHACH_HANG');
    }
};
