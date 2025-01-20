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
        Schema::create('lophoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('giaovien_id')->constrained('giaovien')->onDelete('cascade');
            $table->string('ten_lop');
            $table->string('khoi_lop');
            $table->integer('so_luong_toi_da')->default(30);
            $table->string('nam_hoc');
            $table->decimal('hoc_phi', 10, 2)->default(0.00);
            $table->enum('loai_lop', ['Nhà trẻ', 'Mẫu giáo nhỡ', 'Mẫu giáo lớn', 'Mẫu giáo chồi'])->default('Nhà trẻ');
            $table->enum('trang_thai', ['Đang hoạt động', 'Tạm ngưng'])->default('Đang hoạt động');
            $table->text('mo_ta')->nullable();
            $table->timestamps();

            // Thêm index cho các cột thường được tìm kiếm
            $table->index(['loai_lop', 'trang_thai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lophoc');
    }
};
