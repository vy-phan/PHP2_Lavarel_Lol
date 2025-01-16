<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangKyTuyenSinh extends Model
{
    use HasFactory;

    protected $table = 'dangkytuyensinh';

    protected $fillable = [
        'phuhuynh_id',
        'phuhuynh_name',
        'child_name',
        'phone',
        'email',
        'address',
        'child_birth_date',
        'child_gender',
        'class_registered',
        'notes',
        'status'
    ];

    protected $casts = [
        'child_birth_date' => 'date',
        'phuhuynh_id' => 'integer'
    ];

    // Các trạng thái có thể có
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public function phuhuynh()
    {
        return $this->belongsTo(PhuHuynh::class, 'phuhuynh_id');
    }

    // Kiểm tra xem đăng ký có đang chờ duyệt không
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    // Kiểm tra xem đăng ký đã được chấp nhận chưa
    public function isApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }

    // Kiểm tra xem đăng ký đã bị từ chối chưa
    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }

    // Phê duyệt đăng ký và tạo thông tin phụ huynh + học sinh
    public function approve()
    {
        // Tạo phụ huynh mới
        $phuhuynh = PhuHuynh::create([
            'name' => $this->phuhuynh_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address
        ]);

        // Cập nhật phuhuynh_id và trạng thái
        $this->update([
            'phuhuynh_id' => $phuhuynh->id,
            'status' => self::STATUS_APPROVED
        ]);

        // Tạo học sinh mới
        $hocsinh = TreEm::create([
            'name' => $this->child_name,
            'birth_date' => $this->child_birth_date,
            'gender' => $this->child_gender,
            'class_registered' => $this->class_registered,
            'phuhuynh_id' => $phuhuynh->id
        ]);

        return [
            'phuhuynh' => $phuhuynh,
            'hocsinh' => $hocsinh
        ];
    }

    // Từ chối đăng ký
    public function reject()
    {
        return $this->update(['status' => self::STATUS_REJECTED]);
    }
}
