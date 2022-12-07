<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
class KhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $khoa=Khoa::paginate(9);
        $search =  $request->input('key');
        if($search!=""){
            $khoa = Khoa::where(function ($query) use ($search){
                $query->where('TenKhoa', 'like', '%'.$search.'%')
                    ->orWhere('MaKhoa', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $khoa->appends(['key' => $search]);
        }
        else{
            $khoa = Khoa::paginate(9);
        }
        return view('admin.khoa.khoa-index',compact('khoa'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khoa.khoa-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Khoa::create($request->all());
        return redirect()->route('khoa.index')->with('thongbao','Thêm khoa thành công');
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
    public function edit(Khoa $khoa)
    {
        return view('admin.khoa.khoa-edit',compact('khoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Khoa $khoa)
    {
        $khoa->update($request->all());
        return redirect()->route('khoa.index')->with('thongbao','Cập nhật khoa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khoa $khoa)
    {
        $khoa->delete();
        return redirect()->route('khoa.index')->with('thongbao','Xóa khoa thành công');
    }
}
