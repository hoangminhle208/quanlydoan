<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nienkhoa;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{

    public function checkUserType(){
        if(!Auth::user()){
            return redirect()->route('login');
        }
        if(Auth::user()->userType==='ADM'){
            return redirect()->route('admin.dashboard');
        }
        if(Auth::user()->userType==='SV'){
            return redirect()->route('sv.index');
        }
        if(Auth::user()->userType==='GV')
            return redirect()->route('gv-index');
    }
    
}
