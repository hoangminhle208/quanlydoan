<?php

namespace App\Http\Controllers;

use App\Models\Hoidong;
use Illuminate\Http\Request;

class SvHoidongController extends Controller
{
    public function index(Request $request){
        // $hoidong=Hoidong::all();
        $key= $request->input('key');
    // Search in the title and body columns from the posts table
        $hoidong = Hoidong::query()
        ->where('TenHoiDong', 'LIKE', "%{$key}%")
        ->orWhere('MaHoiDong', 'LIKE', "%{$key}%")
        ->get();
    // Return the search view with the resluts compacted
        return view('sinhvien.hoidong.index',compact('hoidong'));
    }
}
