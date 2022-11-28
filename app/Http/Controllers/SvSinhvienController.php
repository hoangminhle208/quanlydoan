<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;

class SvSinhvienController extends Controller
{
    public function index(){
        $sinhvien=Sinhvien::all();
        return view('sinhvien.sinhvien.index',compact('sinhvien'));
    }
}
