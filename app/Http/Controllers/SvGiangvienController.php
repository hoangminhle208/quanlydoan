<?php

namespace App\Http\Controllers;

use App\Models\Giaovien;
use Illuminate\Http\Request;

class SvGiangvienController extends Controller
{
    public function index(){
        $giaovien=Giaovien::all();
        return view('sinhvien.giaovien.index',compact('giaovien'));
    }
}
