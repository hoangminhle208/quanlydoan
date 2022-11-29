<?php

namespace App\Http\Controllers;

use App\Models\Nhom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NhomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhom=Nhom::paginate(9);
        return view('admin.nhom.nhom-index',compact('nhom'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->userType==='SV')
            return view('sinhvien.nhom.create');
        return view('admin.nhom.nhom-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nhom::create($request->all());
        return redirect()->route('nhom.index')->with('thongbao','Thêm nhóm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhom $nhom)
    {
        return view('admin.nhom.nhom-edit',compact('nhom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nhom $nhom)
    {
        $nhom->update($request->all());
        return redirect()->route('nhom.index')->with('thongbao','Cập nhật nhóm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nhom $nhom)
    {
        $nhom->delete();
        return redirect()->route('nhom.index')->with('thongbao','Xóa nhóm thành công');
    }
}
