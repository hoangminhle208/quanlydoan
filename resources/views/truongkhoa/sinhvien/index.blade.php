@extends('layouts\tk-layout')
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
        
        </ul>
    </div>
    </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lý sinh viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tksinhvien.create')}}" class="btn btn-primary float-end" >Thêm mới</a>
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
                        <input class="form-control" type="text" name="key" placeholder="Tên hoặc mã sinh viên" required/>
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
                            <th>Mã sinh viên</th>
                            <th>Họ và tên</th>
                            <th>Thông tin cá nhân</th>
                            <th>Khoa/Chuyên ngành/Lớp/Hệ đào tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tksinhvien as $sv)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img style="width:75px; height:75px;" src={{$sv->HinhAnh}} alt=""></td>
                            <td>{{$sv->MaSinhVien}}</td>
                            <td>{{$sv->Ten}}</td>
                            <td> Email: {{$sv->Email}}
                                <br>Quê quán:{{$sv->QueQuan}}
                                <br>Ngày sinh:{{$sv->NgaySinh}}
                                <br>SDT:{{$sv->SoDienThoai}}
                            </td>
                            <td> Khoa: {{DB::table('khoas')->where('MaKhoa', $sv->Khoa)->value('TenKhoa')}}
                                <br>Chuyên ngành: {{DB::table('chuyennganhs')->where('MaChuyenNganh', $sv->ChuyenNganh)->value('TenChuyenNganh')}}
                                <br>Lớp: {{DB::table('lops')->where('MaLop', $sv->Lop)->value('MaLop')}}
                                <br>Hệ đào tạo: {{DB::table('hedaotaos')->where('MaHeDaoTao', $sv->HeDaoTao)->value('TenHeDaoTao')}}
                                <br>Niên khóa: {{DB::table('nienkhoas')->where('MaNienKhoa', $sv->NienKhoa)->value('Nam')}}
                            </td>
                            <td>

                                <form action="{{route('tksinhvien.destroy',$sv->id)}}" method="POST">
                                    <a href="{{route('tksinhvien.edit',$sv->id)}}" class="btn btn-info">Sửa</a>
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
            {{$tksinhvien->links()}}
        </div>
    </div>
@endsection