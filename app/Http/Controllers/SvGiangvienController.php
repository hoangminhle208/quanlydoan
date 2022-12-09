<?php

namespace App\Http\Controllers;

use App\Models\Giaovien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->userType=='GV')
            return view('giaovien.giaovien.index',compact('giaovien'));
        return view('sinhvien.giaovien.index', compact('giaovien'));
        }
}
