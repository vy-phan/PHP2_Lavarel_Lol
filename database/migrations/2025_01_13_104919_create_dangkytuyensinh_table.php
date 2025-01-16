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
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('phuhuynh_id')->nullable();
            $table->foreign('phuhuynh_id')->references('id')->on('phuhuynh')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dangkytuyensinh');
    }
};
