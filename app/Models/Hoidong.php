<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoidong extends Model
{
    use HasFactory;
    protected $fillable=[
        'MaHoiDong',
        'TenHoiDong',
        'MaChuTich',
        'MaThuKy',
        'MaGiaoVienPhanBien',
        'MoTa',
    ];
}
