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
                        <h3>Sửa giáo viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tkgiaovien.index')}}" class="btn btn-primary float-end">Danh sách giáo viên</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('tkgiaovien.update',$tkgiaovien->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình ảnh</strong>
                                <img src={{$tkgiaovien->HinhAnh}} alt="">
                                <input type="text" name="HinhAnh" value="{{$tkgiaovien->HinhAnh}}" class="form-control" placeholder="Nhập giáo viên">
                            </div>
                            <div class="form-group">
                                <strong>Mã giáo viên</strong>
                                <input type="text" name="MaGiaoVien" value="{{$tkgiaovien->MaGiaoVien}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Tên giáo viên</strong>
                                <input type="text" name="Ten" value="{{$tkgiaovien->Ten}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="text" name="Email" value="{{$tkgiaovien->Email}}" class="form-control" placeholder="Nhập email gv">
                            </div>
                            <div class="form-group">
                                <strong>Quê quán</strong>
                                <input type="text" name="QueQuan" value="{{$tkgiaovien->QueQuan}}" class="form-control" placeholder="Nhập quê quán">
                            </div>
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input type="date" name="NgaySinh" value="{{$tkgiaovien->NgaySinh}}" class="form-control" placeholder="Nhập ngày sinh">
                            </div>
                            <div class="form-group">
                                <strong>Bộ Môn</strong>
                                <input type="text" name="BoMon" value="{{$tkgiaovien->BoMon}}" class="form-control" placeholder="Nhập ngày sinh">
                            </div>
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
