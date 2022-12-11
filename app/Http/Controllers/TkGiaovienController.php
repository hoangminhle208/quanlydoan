<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giaovien;
class TkGiaovienController extends Controller
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
            $tkgiaovien = Giaovien::where(function ($query) use ($search){
                $query->where('Ten', 'like', '%'.$search.'%')
                    ->orWhere('MaGiaoVien', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $tkgiaovien->appends(['key' => $search]);
        }
        else{
            $tkgiaovien = Giaovien::paginate(9);
        }
        return view('truongkhoa.giaovien.index',compact('tkgiaovien'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.giaovien.create');
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
        return redirect()->route('tkgiaovien.index')->with('thongbao','Thêm giáo viên thành công');
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
    public function edit(Giaovien $tkgiaovien)
    {
        return view('truongkhoa.giaovien.edit',compact('tkgiaovien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giaovien $tkgiaovien)
    {
        $tkgiaovien->update($request->all());
        return redirect()->route('tkgiaovien.index')->with('thongbao','Cập nhật giáo viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giaovien $tkgiaovien)
    {
        $tkgiaovien->delete();
        return redirect()->route('tkgiaovien.index')->with('thongbao','Xóa giáo viên thành công');
    }
}
