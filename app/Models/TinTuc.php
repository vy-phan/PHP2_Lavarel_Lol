<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TinTuc extends Model
{
    protected $table = 'tintuc';
    
    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'ngay_dang',
        'user_id'
    ];

    protected $dates = [
        'ngay_dang',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
