<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    use HasFactory;
    protected $fillable=[
        'HinhAnh',
        'MaSinhVien',
        'Ten',
        'SoDienThoai',
        'Email',
        'NgaySinh',
        'QueQuan',
        'NienKhoa',
        'Lop',
        'Khoa',
        'ChuyenNganh',
        'HeDaoTao',
    ];
}
