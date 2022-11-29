<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
class SvprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sinhvien.profile.index');
    }
    public function profile(){
        return view('sinhvien.profile.profile');
    }
    
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('sv.index');
    }
    public function update(Request $request,Sinhvien $sinhvien)
    {
        $sinhvien->update($request->all());
        return redirect()->route('sinhvien.profile.index')->with('thongbao','Cập nhật sinh viên thành công');
    }
}
