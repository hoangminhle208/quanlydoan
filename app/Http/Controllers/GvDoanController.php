<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doan;
use App\Models\Hoidong;
use App\Models\Sinhvien;
class GvDoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key= $request->input('key');
    // Search in the title and body columns from the posts table
        $doan = Doan::query()
        ->where('TenDetai', 'LIKE', "%{$key}%")
        ->orWhere('MaDoAn', 'LIKE', "%{$key}%")
        ->get();
        $hoidong=Hoidong::all();
        return view('giaovien.doan.index',compact('doan','hoidong'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Doan $gvdoan)
    {
        return view('giaovien.doan.edit',compact('gvdoan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doan $gvdoan)
    {
        $gvdoan->update($request->all());
        return redirect()->route('gvdoan.index')->with('thongbao','Cập nhật đồ án thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
