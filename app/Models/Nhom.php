<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    use HasFactory;
    protected $fillable=[
            'TenNhom',
            'NhomTruong',
            'ThanhVien1',
            'ThanhVien2',
    ];
}
