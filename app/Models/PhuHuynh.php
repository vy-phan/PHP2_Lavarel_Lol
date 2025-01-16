<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuHuynh extends Model
{
    use HasFactory;

    protected $table = 'dangkytuvensinh';

    protected $fillable = [
        'phuhuynh_name',
        'phone',
        'email',
        'address',
        'child_name',
        'child_birth_date',
        'child_gender',
        'class_registered',
        'notes',
        'status',
        'phuhuynh_id'
    ];

    // Relationship với User
    public function user()
    {
        return $this->belongsTo(User::class, 'phuhuynh_id');
    }
}
