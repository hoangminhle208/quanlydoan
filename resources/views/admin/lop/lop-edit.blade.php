@extends('layouts\nienkhoa-layout')
@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a role="button" class="btn btn-success" href="/admin/dashboard"><i class="fa-solid fa-house"></i>Home</a>
    <a role="button" class="btn btn-info" href="/admin/profile"><i class="fa-solid fa-user"></i>My Profile</a>
    <a role="button" class="btn btn-danger" href="/admin/logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    <div class="btn-group" role="group">
        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-toolbox"></i>Chức năng khác
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/admin/nienkhoa">Quản lí niên khóa</a></li>
        <li><a class="dropdown-item" href="/admin/khoa">Quản lí khoa</a></li>
        <li><a class="dropdown-item" href="/admin/chuyennganh">Quản lí chuyên ngành</a></li>
        <li><a class="dropdown-item" href="/admin/hedaotao">Quản lí hệ đào tạo</a></li>
        <li><a class="dropdown-item" href="/admin/lop">Quản lí lớp</a></li>
        <li><a class="dropdown-item" href="/admin/giaovien">Quản lí giáo viên</a></li>
        <li><a class="dropdown-item" href="/admin/sinhvien">Quản lí sinh viên</a></li>
        <li><a class="dropdown-item" href="/admin/hoidong">Quản lí hội đồng</a></li>
        <li><a class="dropdown-item" href="/admin/doan">Quản lí đồ án</a></li>
        <li><a class="dropdown-item" href="/admin/user">Quản lí user</a></li>
        <li><a class="dropdown-item" href="/admin/nhom">Quản lí nhóm</a></li>
        </ul>
    </div>
    </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sửa lớp</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('lop.index')}}" class="btn btn-primary float-end">Danh sách lớp</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('lop.update',$lop->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Mã lớp</strong>
                                <input type="text" name="MaLop" value="{{$lop->MaLop}}" class="form-control" placeholder="Nhập mã lớp">
                            </div>
                            <!-- <div class="form-group">
                                <strong>Chuyên ngành</strong>
                                <input type="text" name="MaChuyenNganh" value="{{$lop->MaChuyenNganh}}" class="form-control" placeholder="Nhập mã chuyên ngành">
                            </div> -->
                            <div class="form-group">
                                <strong>Chọn chuyên ngành</strong>
                                <select class="form-select form-select-sm" name="MaChuyenNganh" aria-label=".form-select-lg example">
                                    @foreach(DB::table('chuyennganhs')->pluck('MaChuyenNganh') as $macn)
                                    <option value={{$macn}}>{{DB::table('chuyennganhs')->where('MaChuyenNganh', $macn)->value('TenChuyenNganh');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <strong>Khoa</strong>
                                <input type="text" name="MaKhoa" value="{{$lop->MaKhoa}}" class="form-control" placeholder="Nhập mã khoa">
                            </div> -->
                            <div class="form-group">
                                <strong>Chọn khoa</strong>
                                <select class="form-select form-select-sm" name="MaKhoa" aria-label=".form-select-lg example">
                                    @foreach(DB::table('khoas')->pluck('MaKhoa') as $makhoa)
                                    <option value={{$makhoa}}>{{DB::table('khoas')->where('MaKhoa', $makhoa)->value('TenKhoa');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Sĩ số</strong>
                                <input type="int" name="SiSo" value="{{$lop->SiSo}}" class="form-control" placeholder="Nhập sĩ số">
                            </div>
                            <!-- <div class="form-group">
                                <strong>Mã niên khóa</strong>
                                <input type="text" name="MaNienKhoa" value="{{$lop->MaNienKhoa}}" class="form-control" placeholder="Nhập mã niên khóa ">
                            </div> -->
                            <div class="form-group">
                                <strong>Chọn niên khóa</strong>
                                <select class="form-select form-select-sm" name="MaNienKhoa" aria-label=".form-select-lg example">
                                    @foreach(DB::table('nienkhoas')->pluck('MaNienKhoa') as $mnk)
                                    <option value={{$mnk}}>{{DB::table('nienkhoas')->where('MaNienKhoa', $mnk)->value('Nam');}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection