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
                        <h3>Quản lý giáo viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('giaovien.create')}}" class="btn btn-primary float-end" >Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <form action="" class="d-flex flex-row align-items-center flex-wrap">
                    <div class="form-group">
                        <input class="form-control" type="text" name="key" placeholder="Tìm theo tên hoặc mã giáo viên" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Mã giáo viên</th>
                            <th>Họ và tên</th>
                            <th>Thông tin cá nhân</th>
                            <th>Khoa</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($giaovien as $gv)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img src={{$gv->HinhAnh}} alt="" style="width:75px; height:75px;"></td>
                            <td>{{$gv->MaGiaoVien}}</td>
                            <td>{{$gv->Ten}}</td>
                            <td> Email: {{$gv->Email}}
                                <br>Quê quán:{{$gv->QueQuan}}
                                <br>Ngày sinh:{{$gv->NgaySinh}}
                                <br>Bộ môn:{{$gv->BoMon}}
                            </td>
                            <td>{{DB::table('khoas')->where('MaKhoa', $gv->MaKhoa)->value('TenKhoa')}}</td>
                            <td>

                                <form action="{{route('giaovien.destroy',$gv->id)}}" method="POST">
                                    <a href="{{route('giaovien.edit',$gv->id)}}" class="btn btn-info">Sửa</a>
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
            {{$giaovien->links()}}
        </div>
    </div>
@endsection