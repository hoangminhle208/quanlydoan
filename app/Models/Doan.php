<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doan extends Model
{
    use HasFactory;
    protected $fillable=[
        'HinhAnh',
        'MaDoAn',
        'TenDetai',
        'SVTH',
        'GVHD',
        'HoiDong',
        'ChuyenNganh',
        'Khoa',
        'Link',
        'TrangThai',
    ];
}
