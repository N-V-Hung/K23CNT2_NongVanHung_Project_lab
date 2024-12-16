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
        Schema::create('nvhPxuat', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('nvhSoPx')->primary();
            $table->datetime('nvhNgayXuat');
            $table->string('nvhTenKH');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhPxuat');
    }
};
