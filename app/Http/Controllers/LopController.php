<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lop=Lop::paginate(9);
        return view('admin.lop.lop-index',compact('lop'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lop.lop-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lop::create($request->all());
        return redirect()->route('lop.index')->with('thongbao','Thêm lớp thành công');
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
    public function edit(Lop $lop)
    {
        return view('admin.lop.lop-edit',compact('lop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lop $lop)
    {
        $lop->update($request->all());
        return redirect()->route('lop.index')->with('thongbao','Cập nhật lớp thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lop $lop)
    {
        $lop->delete();
        return redirect()->route('lop.index')->with('thongbao','Xóa lớp công');
    }
}
