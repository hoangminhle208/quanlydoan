<?php

namespace App\Http\Controllers;

use App\Models\Doan;
use Illuminate\Http\Request;

class SvDoanController extends Controller
{
    public function index(){
        $doan=Doan::all();
        return view('sinhvien.detai.index',compact('doan'));
    }
}
