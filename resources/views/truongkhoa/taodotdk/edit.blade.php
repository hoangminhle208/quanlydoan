@extends('layouts\tk-layout')
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
                <li><a class="dropdown-item" href="{{route('tkchuyennganh.index')}}">Quản lí chuyên ngành</a></li>
                <li><a class="dropdown-item" href="{{route('tkgiaovien.index')}}">Quản lí giáo viên</a></li>
                <li><a class="dropdown-item" href="{{route('tksinhvien.index')}}">Quản lí sinh viên</a></li>
                <li><a class="dropdown-item" href="{{route('tkhoidong.index')}}">Quản lí hội đồng</a></li>
                <li><a class="dropdown-item" href="{{route('tkdoan.index')}}">Quản lí đồ án</a></li>
                <li><a class="dropdown-item" href="{{route('tknhom.index')}}">Quản lí nhóm</a></li>
                <li><a class="dropdown-item" href="{{route('tktaodotdk.index')}}">Tạo đợt đăng ký đề tài</a></li>
        </ul>
    </div>
    </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sửa đợt đăng ký</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tktaodotdk.index')}}" class="btn btn-primary float-end">Danh sách đợt đăng ký</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('tktaodotdk.update',$tktaodotdk->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Chọn ngày bắt đầu</strong>
                                <input type="date" name="start" value="{{$tktaodotdk->start}}" class="form-control" placeholder="Nhập mã khoa">
                            </div>
                            <div class="form-group">
                                <strong>Chọn ngày kết thúc</strong>
                                <input type="date" name="end" value="{{$tktaodotdk->end}}" class="form-control" placeholder="Nhập tên khoa">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Người tạo</strong>
                            <select class="form-select form-select-sm" name="nguoitao" aria-label=".form-select-lg example">
                                <option value={{Auth::user()->ma}} >{{Auth::user()->name}}</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection