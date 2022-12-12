<?php

namespace App\Http\Controllers;

use App\Models\Taodotdk;
use Illuminate\Http\Request;


class AdmTaodotdk extends Controller
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
            $taodotdk = Taodotdk::where(function ($query) use ($search){
                $query->where('MaLop', 'like', '%'.$search.'%');
                    
            })
            ->paginate(9);
            $taodotdk->appends(['key' => $search]);
        }
        else{
            $taodotdk = Taodotdk::paginate(9);
        }
        return view('admin.taodotdk.index',compact('taodotdk'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.taodotdk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Taodotdk::create($request->all());
        return redirect()->route('taodotdk.index')->with('thongbao','Tạo thành công');
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
    public function edit(Taodotdk $taodotdk)
    {
        return view('admin.taodotdk.edit',compact('taodotdk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taodotdk $taodotdk)
    {
        $taodotdk->update($request->all());
        return redirect()->route('taodotdk.index')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taodotdk $taodotdk)
    {
        $taodotdk->delete();
        return redirect()->route('taodotdk.index')->with('thongbao','Xóa thành công');
    }
}
