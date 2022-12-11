<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sinhvien;
class TkSinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search =  $request->input('key');
        if($search!=""){
            $tksinhvien = Sinhvien::where(function ($query) use ($search){
                $query->where('Ten', 'like', '%'.$search.'%')
                    ->orWhere('MaSinhVien', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $tksinhvien->appends(['key' => $search]);
        }
        else{
            $tksinhvien = Sinhvien::paginate(9);
        }
        return view('truongkhoa.sinhvien.index',compact('tksinhvien'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.sinhvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sinhvien::create($request->all());
        return redirect()->route('tksinhvien.index')->with('thongbao','Thêm sinh viên thành công');
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
    public function edit(Sinhvien $tksinhvien)
    {
        return view('truongkhoa.sinhvien.edit',compact('tksinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinhvien $tksinhvien)
    {
        $tksinhvien->update($request->all());
        return redirect()->route('tksinhvien.index')->with('thongbao','Cập nhật sinh viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinhvien $tksinhvien)
    {
        $tksinhvien->delete();
        return redirect()->route('tksinhvien.index')->with('thongbao','Xóa sinh viên thành công');
    }
}
