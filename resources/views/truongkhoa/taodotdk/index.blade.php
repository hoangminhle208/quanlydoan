@extends('layouts\nienkhoa-layout')
@section('content')
<div class="container">
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a role="button" class="btn btn-success" href="{{route('truongkhoa.index')}}"><i class="fa-solid fa-house"></i>Home</a>
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
                        <h3>Đợt đăng ký đề tài</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tktaodotdk.create')}}" class="btn btn-primary float-end" >Thêm mới</a>
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
                        <input class="form-control" type="text" name="key" placeholder="Tên nhóm" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Người tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tktaodotdk as $dk)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$dk->start}}</td>
                            <td>{{$dk->end}}</td>
                            <td>{{DB::table('users')->where('ma', $dk->nguoitao)->value('name');}}</td>
                            <td>
                                <form action="{{route('tktaodotdk.destroy',$dk->id)}}" method="POST">
                                    <a href="{{route('tktaodotdk.edit',$dk->id)}}" class="btn btn-info">Sửa</a>
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
            {{$tktaodotdk->links()}}
        </div>
    </div>
@endsection