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
        </ul>
    </div>
    </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lý hội đồng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tkhoidong.create')}}" class="btn btn-primary float-end" >Thêm mới</a>
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
                        <input class="form-control" type="text" name="key" placeholder="Tên hoặc mã hội đồng" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã hội đồng</th>
                            <th>Chủ tịch</th>
                            <th>Thư ký</th>
                            <th>GV phản biện</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tkhoidong as $hd)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$hd->MaHoiDong}}</td>
                            <td><img style="width:75px; height:75px;" src={{DB::table('giaoviens')->where('MaGiaoVien', $hd->MaChuTich)->value('HinhAnh')}} alt=""><br> {{DB::table('giaoviens')->where('MaGiaoVien', $hd->MaChuTich)->value('Ten')}}</td>
                            <td><img style="width:75px; height:75px;" src={{DB::table('giaoviens')->where('MaGiaoVien', $hd->MaThuKy)->value('HinhAnh')}} alt=""><br>{{DB::table('giaoviens')->where('MaGiaoVien', $hd->MaThuKy)->value('Ten')}}</td>
                            <td><img style="width:75px; height:75px;" src={{DB::table('giaoviens')->where('MaGiaoVien', $hd->MaGiaoVienPhanBien)->value('HinhAnh')}} alt=""><br>{{DB::table('giaoviens')->where('MaGiaoVien', $hd->MaGiaoVienPhanBien)->value('Ten')}}</td>
                            <td>{{$hd->MoTa}}</td>
                            <td>
                                <form action="{{route('tkhoidong.destroy',$hd->id)}}" method="POST">
                                    <a href="{{route('tkhoidong.edit',$hd->id)}}" class="btn btn-info">Sửa</a>
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
            {{$tkhoidong->links()}}
        </div>
    </div>
@endsection