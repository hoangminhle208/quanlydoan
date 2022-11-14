<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hedaotao extends Model
{
    use HasFactory;
    protected $fillable=[
        'MaHeDaoTao',
        'TenHeDaoTao',
        'MoTa',
    ];
}
