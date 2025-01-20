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
        Schema::create('dangkytuyensinh', function (Blueprint $table) {
            $table->id();
            $table->string('phuhuynh_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('child_name');
            $table->date('child_birth_date');
            $table->string('child_gender');
            $table->string('class_registered');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('processed')->default(false);
            $table->unsignedBigInteger('phuhuynh_id')->nullable();
            $table->foreign('phuhuynh_id')->references('id')->on('phuhuynh')->onDelete('set null');
            $table->timestamps();
        });

        // Đặt collation cho bảng
        DB::statement('ALTER TABLE dangkytuyensinh CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dangkytuyensinh');
    }
};
