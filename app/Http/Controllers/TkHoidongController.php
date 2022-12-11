<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hoidong;
class TkHoidongController extends Controller
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
            $tkhoidong = Hoidong::where(function ($query) use ($search){
                $query->where('TenHoiDong', 'like', '%'.$search.'%')
                    ->orWhere('MaHoiDong', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $tkhoidong->appends(['key' => $search]);
        }
        else{
            $tkhoidong = Hoidong::paginate(9);
        }
        return view('truongkhoa.hoidong.index',compact('tkhoidong'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.hoidong.create');
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
        return redirect()->route('tkhoidong.index')->with('thongbao','Thêm hội đồng thành công');
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
    public function edit(Hoidong $tkhoidong)
    {
        return view('truongkhoa.hoidong.edit',compact('tkhoidong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hoidong $tkhoidong)
    {
        $tkhoidong->update($request->all());
        return redirect()->route('tkhoidong.index')->with('thongbao','Cập nhật hội đồng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hoidong $tkhoidong)
    {
        $tkhoidong->delete();
        return redirect()->route('tkhoidong.index')->with('thongbao','Xóa hội đồng thành công');
    }
}
