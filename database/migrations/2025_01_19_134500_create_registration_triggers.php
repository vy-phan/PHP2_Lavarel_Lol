<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop existing functions and triggers
        DB::unprepared('DROP TRIGGER IF EXISTS after_dangkytuyensinh_update');
        DB::unprepared('DROP FUNCTION IF EXISTS find_suitable_class');
        DB::unprepared('DROP FUNCTION IF EXISTS map_class_type');

        // Tạo function để tìm lớp phù hợp
        DB::unprepared('
            CREATE FUNCTION find_suitable_class(p_loai_lop VARCHAR(50))
            RETURNS INT
            DETERMINISTIC
            BEGIN
                DECLARE v_class_id INT;
                
                SELECT l.id INTO v_class_id
                FROM lophoc l
                LEFT JOIN (
                    SELECT class_id, COUNT(*) as student_count 
                    FROM treem 
                    GROUP BY class_id
                ) t ON l.id = t.class_id
                WHERE l.loai_lop = p_loai_lop COLLATE utf8mb4_unicode_ci
                AND l.trang_thai = "Đang hoạt động" COLLATE utf8mb4_unicode_ci
                AND (t.student_count IS NULL OR t.student_count < l.so_luong_toi_da)
                ORDER BY l.id
                LIMIT 1;
                
                RETURN COALESCE(v_class_id, 0);
            END;
        ');

        // Tạo function để map loại lớp
        DB::unprepared('
            CREATE FUNCTION map_class_type(p_class_registered VARCHAR(50))
            RETURNS VARCHAR(50)
            DETERMINISTIC
            BEGIN
                CASE p_class_registered COLLATE utf8mb4_unicode_ci
                    WHEN "nha_tre" THEN RETURN "Nhà trẻ";
                    WHEN "mau_giao_nho" THEN RETURN "Mẫu giáo nhỡ";
                    WHEN "mau_giao_lon" THEN RETURN "Mẫu giáo lớn";
                    WHEN "mau_giao_choi" THEN RETURN "Mẫu giáo chồi";
                    ELSE RETURN "Nhà trẻ";
                END CASE;
            END;
        ');

        // Tạo trigger xử lý khi đơn đăng ký được duyệt
        DB::unprepared('
            CREATE TRIGGER after_dangkytuyensinh_update
            AFTER UPDATE ON dangkytuyensinh
            FOR EACH ROW
            BEGIN
                DECLARE v_user_id INT;
                DECLARE v_phuhuynh_id INT;
                DECLARE v_class_id INT;
                DECLARE v_loai_lop VARCHAR(50);
                DECLARE v_processed BOOLEAN;
                
                -- Kiểm tra xem đơn đăng ký đã được xử lý chưa
                SELECT processed INTO v_processed
                FROM dangkytuyensinh_processing
                WHERE dangkytuyensinh_id = NEW.id
                LIMIT 1;
                
                IF NEW.status COLLATE utf8mb4_unicode_ci = "approved" 
                   AND OLD.status COLLATE utf8mb4_unicode_ci != "approved"
                   AND (v_processed IS NULL OR v_processed = FALSE) THEN
                    
                    -- Tìm lớp phù hợp
                    SET v_loai_lop = map_class_type(NEW.class_registered);
                    SET v_class_id = find_suitable_class(v_loai_lop);
                    
                    IF v_class_id = 0 THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "Không tìm thấy lớp phù hợp hoặc đã đầy";
                    END IF;
                    
                    -- Tạo hoặc lấy user_id
                    SELECT id INTO v_user_id FROM users WHERE email = NEW.email COLLATE utf8mb4_unicode_ci LIMIT 1;
                    IF v_user_id IS NULL THEN
                        INSERT INTO users (name, email, phone, password, role, created_at, updated_at)
                        VALUES (NEW.phuhuynh_name, NEW.email, NEW.phone, 
                               CONCAT("$2y$10$", SUBSTRING(MD5(RAND()) FROM 1 FOR 22)), 
                               "user", NOW(), NOW());
                        SET v_user_id = LAST_INSERT_ID();
                    END IF;
                    
                    -- Tạo hoặc lấy phuhuynh_id
                    SELECT id INTO v_phuhuynh_id FROM phuhuynh WHERE user_id = v_user_id LIMIT 1;
                    IF v_phuhuynh_id IS NULL THEN
                        INSERT INTO phuhuynh (user_id, created_at, updated_at)
                        VALUES (v_user_id, NOW(), NOW());
                        SET v_phuhuynh_id = LAST_INSERT_ID();
                    END IF;
                    
                    -- Tạo record trẻ em
                    INSERT INTO treem (
                        phuhuynh_id, name, birth_date, gioi_tinh, 
                        class_id, assessment_status, created_at, updated_at
                    )
                    VALUES (
                        v_phuhuynh_id, NEW.child_name, NEW.child_birth_date,
                        IF(NEW.child_gender COLLATE utf8mb4_unicode_ci = "male", "Nam", "Nữ"),
                        v_class_id, "Not Achieved", NOW(), NOW()
                    );
                    
                    -- Cập nhật hoặc tạo mới record trong bảng processing
                    INSERT INTO dangkytuyensinh_processing (
                        dangkytuyensinh_id, processed, phuhuynh_id, created_at, updated_at
                    )
                    VALUES (
                        NEW.id, TRUE, v_phuhuynh_id, NOW(), NOW()
                    )
                    ON DUPLICATE KEY UPDATE
                        processed = TRUE,
                        phuhuynh_id = VALUES(phuhuynh_id),
                        updated_at = NOW();
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_dangkytuyensinh_update');
        DB::unprepared('DROP FUNCTION IF EXISTS find_suitable_class');
        DB::unprepared('DROP FUNCTION IF EXISTS map_class_type');
    }
};
