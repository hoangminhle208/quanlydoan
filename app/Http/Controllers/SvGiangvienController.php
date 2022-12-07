<?php

namespace App\Http\Controllers;

use App\Models\Giaovien;
use Illuminate\Http\Request;

class SvGiangvienController extends Controller
{
    public function index(Request $request){
        // $giaovien=Giaovien::all();
        // if($key=request()->key){
        //     $giaovien=Giaovien::all()->where('Ten','like','%'.$key.'%');
        // }
        // return view('sinhvien.giaovien.index',compact('giaovien'));
        $key= $request->input('key');

    // Search in the title and body columns from the posts table
        $giaovien = Giaovien::query()
        ->where('Ten', 'LIKE', "%{$key}%")
        ->orWhere('MaGiaoVien', 'LIKE', "%{$key}%")
        ->get();
    // Return the search view with the resluts compacted
        return view('sinhvien.giaovien.index', compact('giaovien'));
        }
}
