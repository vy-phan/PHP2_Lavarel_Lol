<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    use HasFactory;

    protected $table = 'lophoc';

    protected $fillable = [
        'giaovien_id',
        'ten_lop',
        'khoi_lop',
        'so_luong_toi_da',
        'nam_hoc',
        'hoc_phi',
        'loai_lop',
        'trang_thai',
        'mo_ta'
    ];

    // Relationship với GiaoVien
    public function giaovien()
    {
        return $this->belongsTo(GiaoVien::class, 'giaovien_id');
    }

    // Relationship với TreEm
    public function treem()
    {
        return $this->hasMany(TreEm::class, 'class_id');
    }
}
