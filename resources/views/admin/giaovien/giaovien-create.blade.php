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
        </ul>
    </div>
    </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm giáo viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('giaovien.index')}}" class="btn btn-primary float-end">Danh sách giáo viên</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('giaovien.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình ảnh</strong>
                                <input type="text" name="HinhAnh" class="form-control" placeholder="Nhập link ảnh giáo viên">
                            </div>
                            <div class="form-group">
                                <strong>Mã giáo viên</strong>
                                <input type="text" name="MaGiaoVien" class="form-control" placeholder="Nhập mã giáo viên">
                            </div>
                            <div class="form-group">
                                <strong>Tên</strong>
                                <input type="text" name="Ten" class="form-control" placeholder="Nhập tên giáo viên">
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="text" name="Email" class="form-control" placeholder="Nhập email ">
                            </div>
                            <div class="form-group">
                                <strong>Quê quán</strong>
                                <input type="text" name="QueQuan" class="form-control" placeholder="Nhập quê quán ">
                            </div>
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input type="date" name="NgaySinh" class="form-control" placeholder="Nhập ngày sinh ">
                            </div>
                            <div class="form-group">
                                <strong>Bộ môn</strong>
                                <input type="text" name="BoMon" class="form-control" placeholder="Nhập bộ môn ">
                            </div>
                            <!-- <div class="form-group">
                                <strong>Khoa</strong>
                                <input type="text" name="MaKhoa" class="form-control" placeholder="Nhập mã khoa">
                            </div> -->
                            <div class="form-group">
                                <strong>Chọn khoa</strong>
                                <select class="form-select form-select-sm" name="MaKhoa" aria-label=".form-select-lg example">
                                    @foreach(DB::table('khoas')->pluck('MaKhoa') as $makhoa)
                                    <option value={{$makhoa}}>{{DB::table('khoas')->where('MaKhoa', $makhoa)->value('TenKhoa');}}</option>
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