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
                        <h3>Quản lý lớp</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('lop.create')}}" class="btn btn-primary float-end" >Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã lớp</th>
                            <th>Chuyên ngành</th>
                            <th>Khoa</th>
                            <th>Sĩ số</th>
                            <th>Niên khóa</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lop as $l)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$l->MaLop}}</td>
                            <td>{{DB::table('chuyennganhs')->where('MaChuyenNganh', $l->MaChuyenNganh)->value('TenChuyenNganh')}}
                                <br>Mã chuyên ngành:{{$l->MaChuyenNganh}}</td>
                            <td>{{DB::table('khoas')->where('MaKhoa', $l->MaKhoa)->value('TenKhoa')}}
                                <br>Mã khoa:{{$l->MaKhoa}}</td>
                            <td>{{$l->SiSo}}</td>
                            <td>{{DB::table('nienkhoas')->where('MaNienKhoa', $l->MaNienKhoa)->value('Nam')}}
                                <br>Mã niên khóa:{{$l->MaNienKhoa}}</td>
                            <td>
                                <form action="{{route('lop.destroy',$l->id)}}" method="POST">
                                    <a href="{{route('lop.edit',$l->id)}}" class="btn btn-info">Sửa</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$lop->links()}}
        </div>
    </div>
@endsection