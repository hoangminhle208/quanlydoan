<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nienkhoa;

class NienkhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $nienkhoa=Nienkhoa::paginate(9);
        $search =  $request->input('key');
        if($search!=""){
            $nienkhoa = Nienkhoa::where(function ($query) use ($search){
                $query->where('MaNienKhoa', 'like', '%'.$search.'%')
                    ->orWhere('Nam', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $nienkhoa->appends(['key' => $search]);
        }
        else{
            $nienkhoa= Nienkhoa::paginate(9);
        }
        return view('admin.nienkhoa.nienkhoa-index',compact('nienkhoa'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nienkhoa.nienkhoa-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nienkhoa::create($request->all());
        return redirect()->route('nienkhoa.index')->with('thongbao','Thêm thành công');
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
    public function edit(Nienkhoa $nienkhoa)
    {
        return view('admin.nienkhoa.nienkhoa-edit',compact('nienkhoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nienkhoa $nienkhoa)
    {
        $nienkhoa->update($request->all());
        return redirect()->route('nienkhoa.index')->with('thongbao','Cập nhật niên khóa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nienkhoa $nienkhoa)
    {
        $nienkhoa->delete();
        return redirect()->route('nienkhoa.index')->with('thongbao','Xóa thành công');
    }
}
