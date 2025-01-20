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
        Schema::create('thongbaosukien', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->text('mo_ta');
            $table->date('ngay_dien_ra');
            $table->time('thoi_gian_bat_dau');
            $table->time('thoi_gian_ket_thuc');
            $table->string('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thongbaosukien');
    }
};
