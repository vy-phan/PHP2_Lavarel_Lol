<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Tài khoản Admin
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Tài khoản User 1
        User::factory()->create([
            'name' => 'Văn Khoa',
            'email' => 'vankhoa@gmail.com',
            'role' => 'user',
            'password' => Hash::make('12042005'),
        ]);

        // Tạo dữ liệu cho tin tức
        $tintucs = [
            [
                'tieu_de' => 'Thông báo tuyển sinh năm học 2024-2025',
                'noi_dung' => 'Trường mầm non XYZ thông báo tuyển sinh năm học 2024-2025 cho các độ tuổi từ 18 tháng đến 5 tuổi. Phụ huynh có nhu cầu vui lòng liên hệ văn phòng trường để được tư vấn và đăng ký.',
                'ngay_dang' => Carbon::now()->subDays(1),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieu_de' => 'Lịch nghỉ Tết Nguyên Đán 2024',
                'noi_dung' => 'Nhà trường thông báo lịch nghỉ Tết Nguyên Đán 2024 từ ngày 08/02/2024 đến hết ngày 22/02/2024. Các bé sẽ quay trở lại trường vào ngày 23/02/2024.',
                'ngay_dang' => Carbon::now()->subDays(2),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieu_de' => 'Kết quả cuộc thi Bé khỏe Bé ngoan',
                'noi_dung' => 'Cuộc thi "Bé khỏe Bé ngoan" đã kết thúc thành công với sự tham gia của hơn 100 bé. Ban tổ chức xin chúc mừng các bé đã đạt giải và cảm ơn quý phụ huynh đã đồng hành.',
                'ngay_dang' => Carbon::now()->subDays(3),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieu_de' => 'Thông báo tiêm vắc xin phòng bệnh',
                'noi_dung' => 'Nhà trường phối hợp với Trung tâm Y tế quận tổ chức tiêm vắc xin phòng bệnh cho trẻ. Đề nghị phụ huynh đăng ký cho con em mình trước ngày 25/01/2024.',
                'ngay_dang' => Carbon::now()->subDays(4),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('tintuc')->insert($tintucs);

        // Tạo dữ liệu cho sự kiện
        $sukiens = [
            [
                'tieu_de' => 'Lễ hội Xuân 2024',
                'mo_ta' => 'Chào đón xuân mới 2024, nhà trường tổ chức Lễ hội Xuân với nhiều hoạt động thú vị: múa lân, các trò chơi dân gian, gian hàng ẩm thực...',
                'ngay_dien_ra' => '2024-01-20',
                'thoi_gian_bat_dau' => '08:00:00',
                'thoi_gian_ket_thuc' => '11:30:00',
                'trang_thai' => 'Sắp diễn ra',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieu_de' => 'Hội thi Bé tài năng',
                'mo_ta' => 'Hội thi Bé tài năng là sân chơi bổ ích giúp các bé thể hiện năng khiếu của mình trong các lĩnh vực: hát, múa, đọc thơ, kể chuyện...',
                'ngay_dien_ra' => '2024-02-25',
                'thoi_gian_bat_dau' => '14:00:00',
                'thoi_gian_ket_thuc' => '16:30:00',
                'trang_thai' => 'Sắp diễn ra',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieu_de' => 'Ngày hội thể thao',
                'mo_ta' => 'Ngày hội thể thao với các hoạt động vận động, rèn luyện thể chất cho bé: chạy thi, nhảy bao bố, kéo co...',
                'ngay_dien_ra' => '2024-01-15',
                'thoi_gian_bat_dau' => '08:30:00',
                'thoi_gian_ket_thuc' => '10:30:00',
                'trang_thai' => 'Đã kết thúc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieu_de' => 'Tham quan công viên nước',
                'mo_ta' => 'Nhà trường tổ chức cho các bé tham quan và vui chơi tại công viên nước. Các bé sẽ được tham gia các trò chơi dưới nước an toàn và bổ ích.',
                'ngay_dien_ra' => '2024-01-17',
                'thoi_gian_bat_dau' => '08:00:00',
                'thoi_gian_ket_thuc' => '16:00:00',
                'trang_thai' => 'Đang diễn ra',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('thongbaosukien')->insert($sukiens);
    }
}
