<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giaovien;

class GiaovienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giaovien=Giaovien::paginate(9);
        return view('admin.giaovien.giaovien-index',compact('giaovien'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.giaovien.giaovien-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Giaovien::create($request->all());
        return redirect()->route('giaovien.index')->with('thongbao','Thêm giáo viên thành công');
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
    public function edit(Giaovien $giaovien)
    {
        return view('admin.giaovien.giaovien-edit',compact('giaovien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Giaovien $giaovien)
    {
        $giaovien->update($request->all());
        return redirect()->route('giaovien.index')->with('thongbao','Cập nhật giáo viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giaovien $giaovien)
    {
        $giaovien->delete();
        return redirect()->route('giaovien.index')->with('thongbao','Xóa giáo viên thành công');
    }
}
