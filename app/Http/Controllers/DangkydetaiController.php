<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class DangkydetaiController extends Controller
{
    
    public function indexAdmin(){
        $current = false;
        return view('dkdt.admin',compact('current'));
    }
}
