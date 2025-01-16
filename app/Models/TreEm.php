<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreEm extends Model
{
    use HasFactory;

    protected $table = 'treem';

    protected $fillable = [
        'phuhuynh_id',
        'name',
        'birth_date',
        'class_id',
        'gioi_tinh',
        'assessment_status'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    // Relationship với PhuHuynh
    public function phuhuynh()
    {
        return $this->belongsTo(PhuHuynh::class, 'phuhuynh_id');
    }

    // Relationship với LopHoc
    public function lophoc()
    {
        return $this->belongsTo(LopHoc::class, 'class_id');
    }
}
