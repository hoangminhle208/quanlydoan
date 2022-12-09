<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SvSinhvienController extends Controller
{
    public function index(Request $request){
        // $sinhvien=Sinhvien::all();
        $key= $request->input('key');
    // Search in the title and body columns from the posts table
        $sinhvien = Sinhvien::query()
        ->where('Ten', 'LIKE', "%{$key}%")
        ->orWhere('MaSinhVien', 'LIKE', "%{$key}%")
        ->get();
        return view('sinhvien.sinhvien.index',compact('sinhvien'));
    }
}
