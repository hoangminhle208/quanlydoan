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
                        <h3>Sửa đồ án</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('tkdoan.index')}}" class="btn btn-primary float-end">Danh sách giáo viên</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('tkdoan.update',$tkdoan->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình ảnh</strong>
                                <img src={{$tkdoan->HinhAnh}} alt="">
                                <input type="text" name="HinhAnh" value="{{$tkdoan->HinhAnh}}" class="form-control" placeholder="Nhập da">
                            </div>
                            <div class="form-group">
                                <strong>Mã đồ án</strong>
                                <input type="text" name="MaDoAn" value="{{$tkdoan->MaDoAn}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Tên đề tài</strong>
                                <input type="text" name="TenDetai" value="{{$tkdoan->TenDetai}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Chọn nhóm sinh viên thực hiện</strong>
                                <select class="form-select form-select-sm" name="Nhom" aria-label=".form-select-lg example">
                                    @foreach(DB::table('nhoms')->pluck('id') as $id)
                                    <option value={{$id}}>{{DB::table('nhoms')->where('id', $id)->value('TenNhom');}}</option>
                                    @endforeach
                                    <option value="">NULL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn sinh giáo viên hướng dẫn</strong>
                                <select class="form-select form-select-sm" name="GVHD" aria-label=".form-select-lg example">
                                    @foreach(DB::table('giaoviens')->pluck('MaGiaoVien') as $magv)
                                    <option value={{$magv}}>{{DB::table('giaoviens')->where('MaGiaoVien', $magv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn hội đồng</strong>
                                <select class="form-select form-select-sm" name="HoiDong" aria-label=".form-select-lg example">
                                    @foreach(DB::table('hoidongs')->pluck('MaHoiDong') as $mahd)
                                    <option value={{$mahd}}>{{DB::table('hoidongs')->where('MaHoiDong', $mahd)->value('TenHoiDong');}}</option>
                                    @endforeach
                                    <option value="">NULL</option>
                                </select>
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
                                <strong>Link đồ án</strong>
                                <input type="text" name="Link" value="{{$tkdoan->Link}}" class="form-control" placeholder="Nhập tên gv">
                            </div>
                            <div class="form-group">
                                <strong>Chọn trạng thái</strong>
                                <select class="form-select form-select-sm" name="TrangThai" aria-label=".form-select-lg example">
                                    <option value="WAIT">WAIT</option>  
                                    <option value="DONE">DONE</option>
                                    <option value="FAIL">FAIL</option>
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
