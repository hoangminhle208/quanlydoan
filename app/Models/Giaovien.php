<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giaovien extends Model
{
    use HasFactory;
    protected $fillable=[
        'HinhAnh',
        'MaGiaoVien',
        'Ten',
        'Email',
        'QueQuan',
        'NgaySinh',
        'BoMon',
        'MaKhoa',
    ];
}
