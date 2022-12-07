<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $sinhvien=Sinhvien::paginate(9);
        $search =  $request->input('key');
        if($search!=""){
            $sinhvien = Sinhvien::where(function ($query) use ($search){
                $query->where('Ten', 'like', '%'.$search.'%')
                    ->orWhere('MaSinhVien', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $sinhvien->appends(['key' => $search]);
        }
        else{
            $sinhvien = Sinhvien::paginate(9);
        }
        return view('admin.sinhvien.sinhvien-index',compact('sinhvien'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sinhvien.sinhvien-create');
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
        return redirect()->route('sinhvien.index')->with('thongbao','Thêm sinh viên thành công');
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
    public function edit(Sinhvien $sinhvien)
    {
        return view('admin.sinhvien.sinhvien-edit',compact('sinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Sinhvien $sinhvien)
    {
        $sinhvien->update($request->all());
        return redirect()->route('sinhvien.index')->with('thongbao','Cập nhật sinh viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinhvien $sinhvien)
    {
        $sinhvien->delete();
        return redirect()->route('sinhvien.index')->with('thongbao','Xóa sinh viên thành công');
    }
}
