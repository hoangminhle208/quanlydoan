<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chuyennganh;
class TkChuyennganhController extends Controller
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
            $tkchuyennganh = Chuyennganh::where(function ($query) use ($search){
                $query->where('TenChuyenNganh', 'like', '%'.$search.'%')
                    ->orWhere('MaChuyenNganh', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $tkchuyennganh->appends(['key' => $search]);
        }
        else{
            $tkchuyennganh = Chuyennganh::paginate(9);
        }

        return view('truongkhoa.chuyennganh.index',compact('tkchuyennganh'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.chuyennganh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chuyennganh::create($request->all());
        return redirect()->route('tkchuyennganh.index')->with('thongbao','Thêm chuyên ngành thành công');
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
    public function edit(Chuyennganh $tkchuyennganh)
    {
        return view('truongkhoa.chuyennganh.edit',compact('tkchuyennganh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chuyennganh $tkchuyennganh)
    {
        $tkchuyennganh->update($request->all());
        return redirect()->route('tkchuyennganh.index')->with('thongbao','Cập nhật chuyên ngành thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chuyennganh $tkchuyennganh)
    {
        $tkchuyennganh->delete();
        return redirect()->route('tkchuyennganh.index')->with('thongbao','Xóa chuyên ngành thành công');
    }
}
