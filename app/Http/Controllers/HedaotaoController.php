<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hedaotao;

class HedaotaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hedaotao=Hedaotao::paginate(9);
        return view('admin.hedaotao.hedaotao-index',compact('hedaotao'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hedaotao.hedaotao-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hedaotao::create($request->all());
        return redirect()->route('hedaotao.index')->with('thongbao','Thêm hệ đào tạo thành công');
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
    public function edit(Hedaotao $hedaotao)
    {
        return view('admin.hedaotao.hedaotao-edit',compact('hedaotao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Hedaotao $hedaotao)
    {
        $hedaotao->update($request->all());
        return redirect()->route('hedaotao.index')->with('thongbao','Cập nhật hệ đào tạo thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hedaotao $hedaotao)
    {
        $hedaotao->delete();
        return redirect()->route('hedaotao.index')->with('thongbao','Xóa hệ đào tạo thành công');
    }
}
