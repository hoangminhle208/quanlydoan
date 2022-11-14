<?php

namespace App\Http\Controllers;

use App\Models\Doan;
use Illuminate\Http\Request;

class DoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doan=Doan::paginate(9);
        return view('admin.doan.doan-index',compact('doan'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doan.doan-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Doan::create($request->all());
        return redirect()->route('doan.index')->with('thongbao','Thêm đồ án thành công');
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
    public function edit(Doan $doan)
    {
        return view('admin.doan.doan-edit',compact('doan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Doan $doan)
    {
        $doan->update($request->all());
        return redirect()->route('doan.index')->with('thongbao','Cập nhật đồ án thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doan $doan)
    {
        $doan->delete();
        return redirect()->route('doan.index')->with('thongbao','Xóa đồ án thành công');
    }
}
