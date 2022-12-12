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
                        <h3>Sửa sinh viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tksinhvien.index')}}" class="btn btn-primary float-end">Danh sách giáo viên</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('tksinhvien.update',$tksinhvien->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình ảnh</strong>
                                <img src={{$tksinhvien->HinhAnh}} alt="">
                                <input type="text" name="HinhAnh" value="{{$tksinhvien->HinhAnh}}" class="form-control" placeholder="Nhập giáo viên">
                            </div>
                            <div class="form-group">
                                <strong>Mã sinh viên</strong>
                                <input type="text" name="MaSinhVien" value="{{$tksinhvien->MaSinhVien}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Tên sinh viên</strong>
                                <input type="text" name="Ten" value="{{$tksinhvien->Ten}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="text" name="Email" value="{{$tksinhvien->Email}}" class="form-control" placeholder="Nhập email gv">
                            </div>
                            <div class="form-group">
                                <strong>Quê quán</strong>
                                <input type="text" name="QueQuan" value="{{$tksinhvien->QueQuan}}" class="form-control" placeholder="Nhập quê quán">
                            </div>
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input type="date" name="NgaySinh" value="{{$tksinhvien->NgaySinh}}" class="form-control" placeholder="Nhập ngày sinh">
                            </div>
                            <div class="form-group">
                                <strong>Số điện thoại</strong>
                                <input type="text" name="SoDienThoai" value="{{$tksinhvien->SoDienThoai}}" class="form-control" placeholder="Nhập ngày sinh">
                            </div>
                            <div class="form-group">
                                <strong>Chọn khoa</strong>
                                <select class="form-select form-select-sm" name="Khoa" aria-label=".form-select-lg example">
                                    @foreach(DB::table('khoas')->pluck('MaKhoa') as $makhoa)
                                    <option value={{$makhoa}}>{{DB::table('khoas')->where('MaKhoa', $makhoa)->value('TenKhoa');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn chuyên ngành</strong>
                                <select class="form-select form-select-sm" name="ChuyenNganh" aria-label=".form-select-lg example">
                                    @foreach(DB::table('chuyennganhs')->pluck('MaChuyenNganh') as $macn)
                                    <option value={{$macn}}>{{DB::table('chuyennganhs')->where('MaChuyenNganh', $macn)->value('TenChuyenNganh');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn lớp</strong>
                                <select class="form-select form-select-sm" name="Lop" aria-label=".form-select-lg example">
                                    @foreach(DB::table('lops')->pluck('MaLop') as $malop)
                                    <option value={{$malop}}>{{DB::table('lops')->where('MaLop', $malop)->value('MaLop');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn Niên khóa</strong>
                                <select class="form-select form-select-sm" name="NienKhoa" aria-label=".form-select-lg example">
                                    @foreach(DB::table('nienkhoas')->pluck('MaNienKhoa') as $mank)
                                    <option value={{$mank}}>{{DB::table('nienkhoas')->where('MaNienKhoa', $mank)->value('Nam');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn hệ đào tạo</strong>
                                <select class="form-select form-select-sm" name="HeDaoTao" aria-label=".form-select-lg example">
                                    @foreach(DB::table('hedaotaos')->pluck('MaHeDaoTao') as $mahdt)
                                    <option value={{$mahdt}}>{{DB::table('hedaotaos')->where('MaHeDaoTao', $mahdt)->value('TenHeDaoTao');}}</option>
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
