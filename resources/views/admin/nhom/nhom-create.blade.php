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
                        <h3>Thêm nhóm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('nhom.index')}}" class="btn btn-primary float-end">Danh sách nhóm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('nhom.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên nhóm</strong>
                                <input type="text" name="TenNhom" class="form-control" placeholder="Nhập tên nhóm">
                            </div>
                            <div class="form-group">
                                <strong>Nhóm trưởng</strong>
                                <select class="form-select form-select-sm" name="NhomTruong" aria-label=".form-select-lg example">
                                    @foreach(DB::table('sinhviens')->pluck('MaSinhVien') as $masv)
                                    <option value={{$masv}}>{{DB::table('sinhviens')->where('MaSinhVien', $masv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Thành viên 1</strong>
                                <select class="form-select form-select-sm" name="ThanhVien1" aria-label=".form-select-lg example">
                                    @foreach(DB::table('sinhviens')->pluck('MaSinhVien') as $masv)
                                    <option value={{$masv}}>{{DB::table('sinhviens')->where('MaSinhVien', $masv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Thành viên 2</strong>
                                <select class="form-select form-select-sm" name="ThanhVien2" aria-label=".form-select-lg example">
                                    @foreach(DB::table('sinhviens')->pluck('MaSinhVien') as $masv)
                                    <option value={{$masv}}>{{DB::table('sinhviens')->where('MaSinhVien', $masv)->value('Ten');}}</option>
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