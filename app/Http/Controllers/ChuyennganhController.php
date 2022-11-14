<?php

namespace App\Http\Controllers;

use App\Models\Chuyennganh;
use Illuminate\Http\Request;

class ChuyennganhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chuyennganh=Chuyennganh::paginate(9);
        return view('admin.chuyennganh.chuyennganh-index',compact('chuyennganh'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chuyennganh.chuyennganh-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chuyennganh::create($request->all());
        return redirect()->route('chuyennganh.index')->with('thongbao','Thêm chuyên ngành thành công');
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
    public function edit(Chuyennganh $chuyennganh)
    {
        return view('admin.chuyennganh.chuyennganh-edit',compact('chuyennganh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chuyennganh $chuyennganh)
    {
        $chuyennganh->update($request->all());
        return redirect()->route('chuyennganh.index')->with('thongbao','Cập nhật chuyên ngành thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chuyennganh $chuyennganh)
    {
        $chuyennganh->delete();
        return redirect()->route('chuyennganh.index')->with('thongbao','Xóa chuyên ngành thành công');
    }
}
