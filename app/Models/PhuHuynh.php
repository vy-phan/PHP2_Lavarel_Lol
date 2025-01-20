<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuHuynh extends Model
{
    use HasFactory;

    protected $table = 'phuhuynh';

    protected $fillable = [
        'user_id',
        'occupation'
    ];

    // Relationship với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship với TreEm
    public function treEm()
    {
        return $this->hasMany(TreEm::class, 'phuhuynh_id');
    }

    // Relationship với DangKyTuyenSinh
    public function dangKyTuyenSinh()
    {
        return $this->hasMany(DangKyTuyenSinh::class, 'phuhuynh_id');
    }
}
