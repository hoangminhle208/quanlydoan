@extends('layouts\tk-layout')
@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a role="button" class="btn btn-success" href="{{route('truongkhoa.index')}}"><i class="fa-solid fa-house"></i>Home</a>
    <a role="button" class="btn btn-info" href="/admin/profile"><i class="fa-solid fa-user"></i>My Profile</a>
    <a role="button" class="btn btn-danger" href="/logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    <div class="btn-group" role="group">
        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-toolbox"></i>Chức năng khác
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('tkchuyennganh.index')}}">Quản lí chuyên ngành</a></li>
        <li><a class="dropdown-item" href="/admin/giaovien">Quản lí giáo viên</a></li>
        <li><a class="dropdown-item" href="/admin/sinhvien">Quản lí sinh viên</a></li>
        <li><a class="dropdown-item" href="/admin/hoidong">Quản lí hội đồng</a></li>
        <li><a class="dropdown-item" href="/admin/doan">Quản lí đồ án</a></li>
        <li><a class="dropdown-item" href="/admin/nhom">Quản lí nhóm</a></li>
        </ul>
    </div>
    
    </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lí chuyên ngành</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tkchuyennganh.create')}}" class="btn btn-primary float-end" >Thêm mới</a>
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
                        <input class="form-control" type="text" name="key" placeholder="Tìm theo tên hoặc mã chuyên ngành" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã chuyên ngành</th>
                            <th>Tên chuyên ngành</th>
                            <th>Khoa</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tkchuyennganh as $cn)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$cn->MaChuyenNganh}}</td>
                            <td>{{$cn->TenChuyenNganh}}</td>
                            <td>{{DB::table('khoas')->where('MaKhoa', $cn->MaKhoa)->value('TenKhoa')}}
                                <br>Mã khoa: {{$cn->MaKhoa}}
                            </td>
                            <td>{{$cn->MoTa}}</td>
                            <td>
                                <form action="{{route('tkchuyennganh.destroy',$cn->id)}}" method="POST">
                                    <a href="{{route('tkchuyennganh.edit',$cn->id)}}" class="btn btn-info">Sửa</a>
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
            {{$tkchuyennganh->links()}}
        </div>
    </div>
@endsection