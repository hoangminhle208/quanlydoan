<?php

use App\Http\Controllers\ChuyennganhController;
use App\Http\Controllers\DoanController;
use App\Http\Controllers\HedaotaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NienkhoaController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\GiaovienController;
use App\Http\Controllers\HoidongController;
use App\Http\Controllers\NhomController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\SvDoanController;
use App\Http\Controllers\SvGiangvienController;
use App\Http\Controllers\SvHoidongController;
use App\Http\Controllers\SvSinhvienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SvprofileController;
use App\Models\Chuyennganh;
use App\Models\Doan;
use App\Models\Giaovien;
use App\Models\Hedaotao;
use App\Models\Khoa;
use App\Models\Lop;
use App\Models\Nienkhoa;
use App\Models\Hoidong;
use App\Models\Sinhvien;

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/sv/dkdt',SvDoanController::class);

Route::get('/sv/dsnhom',[NhomController::class,'index']);

Route::get('/sv/nhom',[NhomController::class,'create']);

Route::resource('/admin/nhom',NhomController::class)->middleware('AdminRole');

Route::resource('/sv/hoidong',SvHoidongController::class);

Route::resource('/sv/profile',SvprofileController::class);

Route::resource('/sv/giaovien',SvGiangvienController::class);

Route::resource('/sv/sinhvien',SvSinhvienController::class);

Route::resource('/sv/doan',SvDoanController::class);

Route::resource('/admin/user',UserController::class)->middleware('AdminRole');

Route::resource('/admin/doan',DoanController::class)->middleware('AdminRole');

Route::resource('/admin/sinhvien',SinhvienController::class)->middleware('AdminRole');

Route::resource('/admin/hoidong',HoidongController::class)->middleware('AdminRole');

Route::resource('/admin/giaovien',GiaovienController::class)->middleware('AdminRole');

Route::resource('/admin/lop',LopController::class)->middleware('AdminRole');

Route::resource('/admin/hedaotao',HedaotaoController::class)->middleware('AdminRole');

Route::resource('/admin/chuyennganh',ChuyennganhController::class)->middleware('AdminRole');

Route::resource('/admin/khoa',KhoaController::class)->middleware('AdminRole');

Route::resource('/admin/nienkhoa',NienkhoaController::class)->middleware('AdminRole');

Route::get('/',[HomeController::class,'checkUserType']);

Route::get('/admin/dashboard',function(){
    $nienkhoa_count=Nienkhoa::count();
    $khoa_count=Khoa::count();
    $chuyennganh_count=Chuyennganh::count();
    $hedaotao_count=Hedaotao::count();
    $lop_count=Lop::count();
    $giaovien_count=Giaovien::count();
    $hoidong_count=Hoidong::count();
    $sinhvien_count=Sinhvien::count();
    $doan_count=Doan::count();
    return view('admin.admin-dashboard',compact('nienkhoa_count','khoa_count','chuyennganh_count','hedaotao_count','lop_count','giaovien_count','hoidong_count','sinhvien_count','doan_count'));
})->name('admin.dashboard');

Route::get('/sv/index',function(){
    return view('sinhvien.index');
})->name('sv.index');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
