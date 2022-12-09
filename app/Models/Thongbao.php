<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongbao extends Model
{
    use HasFactory;
    protected $fillable=[
        'TieuDe',
        'NguoiGui',
        'NoiDung',
    ];
}
