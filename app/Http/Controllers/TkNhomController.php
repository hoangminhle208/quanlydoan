<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nhom;
class TkNhomController extends Controller
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
            $tknhom = Nhom::where(function ($query) use ($search){
                $query->where('MaLop', 'like', '%'.$search.'%');
                    
            })
            ->paginate(9);
            $tknhom->appends(['key' => $search]);
        }
        else{
            $tknhom = Nhom::paginate(9);
        }
        return view('truongkhoa.nhom.index',compact('tknhom'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.nhom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nhom::create($request->all());
        return redirect()->route('tknhom.index')->with('thongbao','Thêm nhóm thành công');
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
    public function edit(Nhom $tknhom)
    {
        return view('truongkhoa.nhom.edit',compact('tknhom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nhom $tknhom)
    {
        $tknhom->update($request->all());
        return redirect()->route('tknhom.index')->with('thongbao','Cập nhật nhóm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nhom $tknhom)
    {
        $tknhom->delete();
        return redirect()->route('tknhom.index')->with('thongbao','Xóa nhóm thành công');
    }
}
