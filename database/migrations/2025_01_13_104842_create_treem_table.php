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
        Schema::create('treem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phuhuynh_id')->constrained('phuhuynh')->onDelete('cascade');
            $table->string('name');
            $table->date('birth_date');
            $table->foreignId('class_id')->constrained('lophoc')->onDelete('cascade');
            $table->enum('gioi_tinh', ['Nam', 'Nữ', 'Khác'])->nullable();
            $table->enum('assessment_status', ['Achieved', 'Not Achieved'])->default('Not Achieved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('treem', function (Blueprint $table) {
            $table->dropForeign(['phuhuynh_id']);
        });
        Schema::dropIfExists('treem');
    }
};
