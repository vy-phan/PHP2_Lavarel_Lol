<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuKien extends Model
{
    protected $table = 'thongbaosukien';
    
    protected $fillable = [
        'tieu_de',
        'mo_ta',
        'ngay_dien_ra',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'trang_thai'
    ];

    protected $dates = [
        'ngay_dien_ra',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'created_at',
        'updated_at'
    ];
}