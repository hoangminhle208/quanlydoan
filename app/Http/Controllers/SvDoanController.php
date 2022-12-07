<?php

namespace App\Http\Controllers;

use App\Models\Doan;
use Illuminate\Http\Request;

class SvDoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $doan=Doan::paginate(9);
        $key= $request->input('key');
    // Search in the title and body columns from the posts table
        $doan = Doan::query()
        ->where('TenDetai', 'LIKE', "%{$key}%")
        ->orWhere('MaDoAn', 'LIKE', "%{$key}%")
        ->get();
        return view('sinhvien.doan.index',compact('doan'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinhvien.doan.create');
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
        return redirect()->route('doans.index')->with('thongbao','Thêm đồ án thành công');
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
        return view('sinhvien.doan.edit',compact('doan'));
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
