<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SvprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=User::all();
        return view('sinhvien.profile.index',compact('profile'))->with('i',(request()->input('page',1)-1)*9);
    }
    public function profile(){
        return view('sinhvien.profile.profile');
    }
    public function edit(User $profile)
    {
        return view('sinhvien.profile.edit',compact('profile'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('profile.index');
    }
    public function update(Request $request,User $profile)
    {
        $profile->update($request->all());
        return redirect()->route('profile.index');
    }
}
