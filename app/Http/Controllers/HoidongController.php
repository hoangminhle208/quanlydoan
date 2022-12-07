<?php

namespace App\Http\Controllers;

use App\Models\Hedaotao;
use Illuminate\Http\Request;
use App\Models\Hoidong;
use PHPUnit\TextUI\Help;

class HoidongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $hoidong=Hoidong::paginate(9);
        $search =  $request->input('key');
        if($search!=""){
            $hoidong = Hoidong::where(function ($query) use ($search){
                $query->where('TenHoiDong', 'like', '%'.$search.'%')
                    ->orWhere('MaHoiDong', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $hoidong->appends(['key' => $search]);
        }
        else{
            $hoidong = Hoidong::paginate(9);
        }
        return view('admin.hoidong.hoidong-index',compact('hoidong'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hoidong.hoidong-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hoidong::create($request->all());
        return redirect()->route('hoidong.index')->with('thongbao','Thêm hội đồng thành công');
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
    public function edit(Hoidong $hoidong)
    {
        return view('admin.hoidong.hoidong-edit',compact('hoidong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hoidong $hoidong)
    {
        $hoidong->update($request->all());
        return redirect()->route('hoidong.index')->with('thongbao','Cập nhật hội đồng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hoidong $hoidong)
    {
        $hoidong->delete();
        return redirect()->route('hoidong.index')->with('thongbao','Xóa hội đồng thành công');
    }
}
