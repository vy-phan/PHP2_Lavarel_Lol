<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    use HasFactory;

    protected $table = 'giaovien';

    protected $fillable = [
        'user_id',
        'chuyen_mon',
        'kinh_nghiem',
        'trinh_do'
    ];

    // Relationship với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship với LopHoc
    public function lophoc()
    {
        return $this->hasMany(LopHoc::class, 'giaovien_id');
    }
}
