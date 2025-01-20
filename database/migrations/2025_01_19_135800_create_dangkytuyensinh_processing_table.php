<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dangkytuyensinh_processing', function (Blueprint $table) {
            $table->unsignedBigInteger('dangkytuyensinh_id')->primary();
            $table->boolean('processed')->default(false);
            $table->unsignedBigInteger('phuhuynh_id')->nullable();
            $table->timestamps();
            
            $table->foreign('dangkytuyensinh_id')->references('id')->on('dangkytuyensinh')->onDelete('cascade');
            $table->foreign('phuhuynh_id')->references('id')->on('phuhuynh')->onDelete('set null');
        });

        // Đặt collation cho bảng
        DB::statement('ALTER TABLE dangkytuyensinh_processing CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dangkytuyensinh_processing');
    }
};
