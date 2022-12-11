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
use App\Http\Controllers\GvDoanController;
use App\Http\Controllers\HoidongController;
use App\Http\Controllers\NhomController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\SvDoanController;
use App\Http\Controllers\SvGiangvienController;
use App\Http\Controllers\SvHoidongController;
use App\Http\Controllers\SvNhomController;
use App\Http\Controllers\SvSinhvienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SvprofileController;
use App\Http\Controllers\GvprofileController;
use App\Http\Controllers\SvThongbaoController;
use App\Http\Controllers\GvThongbaoController;
use App\Http\Controllers\TkChuyennganhController;
use App\Http\Controllers\TkGiaovienController;
use App\Http\Controllers\TkHoidongController;
use App\Http\Controllers\TkSinhvienController;
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
Route::resource('/tkhoidong',TkHoidongController::class);

Route::resource('/tksinhvien',TkSinhvienController::class);

Route::resource('/tkgiaovien',TkGiaovienController::class);

Route::resource('/tkchuyennganh',TkChuyennganhController::class);

Route::resource('/gvprofile',GvprofileController::class)->middleware('GiaovienRole');

Route::get('gv-duyet',[GvDoanController::class,'duyetindex'])->name('gv.duyet')->middleware('GiaovienRole');

Route::get('/gv-giao-vien',[SvGiangvienController::class,'index'])->name('gv.gv')->middleware('GiaovienRole');

Route::resource('/gvdoan',GvDoanController::class)->middleware('GiaovienRole');

Route::get('/gv-sinh-vien',[SvSinhvienController::class,'index'])->name('gv.sinhvien')->middleware('GiaovienRole');

Route::get('/gv-hoi-dong',[SvHoidongController::class,'index'])->name('gv.hoidong')->middleware('GiaovienRole');

Route::resource('/sv/nhoms',SvNhomController::class)->middleware('SinhvienRole');

Route::resource('/admin/nhom',NhomController::class)->middleware('AdminRole');

Route::resource('/sv/hoidong',SvHoidongController::class)->middleware('SinhvienRole');

Route::resource('/sv/profile',SvprofileController::class)->middleware('SinhvienRole');

Route::resource('/sv/giaovien',SvGiangvienController::class)->middleware('SinhvienRole');

Route::resource('/sv/sinhvien',SvSinhvienController::class)->middleware('SinhvienRole');

Route::resource('/sv/doans',SvDoanController::class)->middleware('SinhvienRole');

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
})->name('admin.dashboard')->middleware('AdminRole');

Route::get('/sv/index',[SvThongbaoController::class,'index'])->name('sv.index')->middleware('SinhvienRole');

Route::get('/gv-index',[GvThongbaoController::class,'index'])->name('gv-index')->middleware('GiaovienRole');

Route::get('/truongkhoa/index',function(){
    $nienkhoa_count=Nienkhoa::count();
    $khoa_count=Khoa::count();
    $chuyennganh_count=Chuyennganh::count();
    $hedaotao_count=Hedaotao::count();
    $lop_count=Lop::count();
    $giaovien_count=Giaovien::count();
    $hoidong_count=Hoidong::count();
    $sinhvien_count=Sinhvien::count();
    $doan_count=Doan::count();
    return view('truongkhoa.index',compact('nienkhoa_count','khoa_count','chuyennganh_count','hedaotao_count','lop_count','giaovien_count','hoidong_count','sinhvien_count','doan_count'));
})->name('truongkhoa.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
