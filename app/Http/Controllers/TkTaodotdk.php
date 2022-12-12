<?php

namespace App\Http\Controllers;

use App\Models\Taodotdk;
use Illuminate\Http\Request;

class TkTaodotdk extends Controller
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
            $tktaodotdk = Taodotdk::where(function ($query) use ($search){
                $query->where('MaLop', 'like', '%'.$search.'%');
                    
            })
            ->paginate(9);
            $tktaodotdk->appends(['key' => $search]);
        }
        else{
            $tktaodotdk = Taodotdk::paginate(9);
        }
        return view('truongkhoa.taodotdk.index',compact('tktaodotdk'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.taodotdk.create');
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
        return redirect()->route('tktaodotdk.index')->with('thongbao','Tạo thành công');
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
    public function edit(Taodotdk $tktaodotdk)
    {
        return view('truongkhoa.taodotdk.edit',compact('tktaodotdk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Taodotdk $tktaodotdk)
    {
        $tktaodotdk->update($request->all());
        return redirect()->route('tktaodotdk.index')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taodotdk $tktaodotdk)
    {
        $tktaodotdk->delete();
        return redirect()->route('tktaodotdk.index')->with('thongbao','Xóa thành công');
    }
}
