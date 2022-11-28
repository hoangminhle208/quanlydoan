<?php

namespace App\Http\Controllers;

use App\Models\Hoidong;
use Illuminate\Http\Request;

class SvHoidongController extends Controller
{
    public function index(){
        $hoidong=Hoidong::all();
        return view('sinhvien.hoidong.index',compact('hoidong'));
    }
}
