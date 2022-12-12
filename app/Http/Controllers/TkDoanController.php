<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doan;
class TkDoanController extends Controller
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
            $tkdoan = Doan::where(function ($query) use ($search){
                $query->where('TenDetai', 'like', '%'.$search.'%')
                    ->orWhere('MaDoAn', 'like', '%'.$search.'%');
            })
            ->paginate(9);
            $tkdoan->appends(['key' => $search]);
        }
        else{
            $tkdoan = Doan::paginate(9);
        }
        return view('truongkhoa.doan.index',compact('tkdoan'))->with('i',(request()->input('page',1)-1)*9);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truongkhoa.doan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Doan::create($request->all());
        return redirect()->route('tkdoan.index')->with('thongbao','Thêm đồ án thành công');
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
    public function edit(Doan $tkdoan)
    {
        return view('truongkhoa.doan.edit',compact('tkdoan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Doan $tkdoan)
    {
        $tkdoan->update($request->all());
        return redirect()->route('tkdoan.index')->with('thongbao','Cập nhật đồ án thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doan $tkdoan)
    {
        $tkdoan->delete();
        return redirect()->route('tkdoan.index')->with('thongbao','Xóa đồ án thành công');
    }
}
