@extends('\layouts\sinhvien-layout')
@section('content')
<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm đề tài</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('doans.index')}}" class="btn btn-primary float-end">Danh sách đề tài</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('doans.store')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình Ảnh</strong>
                                <input type="text" name="HinhAnh" class="form-control" placeholder="Nhập link hình ảnh">
                            </div>
                            <div class="form-group">
                                <strong>Mã đồ án</strong>
                                <input type="text" name="MaDoAn" class="form-control" placeholder="Nhập mã đồ án">
                            </div>
                            <div class="form-group">
                                <strong>Nhập tên đồ án</strong>
                                <input type="text" name="TenDetai" class="form-control" placeholder="Nhập mã đồ án">
                            </div>
                            <div class="form-group">
                                <strong>Chọn nhóm sinh viên thực hiện</strong>
                                <br>
                                <select class="form-select form-select-sm" name="Nhom" aria-label=".form-select-lg example">
                                    @foreach(DB::table('nhoms')->pluck('id') as $id)
                                    
                                    <option value={{$id}}>{{DB::table('nhoms')->where('id', $id)->value('TenNhom');}}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn giáo viên hướng dẫn</strong>
                                <br>
                                <select class="form-select form-select-sm" name="GVHD" aria-label=".form-select-lg example">
                                    @foreach(DB::table('giaoviens')->pluck('MaGiaoVien') as $magv)
                                    <option value={{$magv}}>{{DB::table('giaoviens')->where('MaGiaoVien', $magv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn hội đồng</strong>
                                <br>
                                <select class="form-select form-select-sm" name="HoiDong" aria-label=".form-select-lg example">
                                    @foreach(DB::table('hoidongs')->pluck('MaHoiDong') as $mahd)
                                    <option value={{$mahd}}>{{DB::table('hoidongs')->where('MaHoiDong', $mahd)->value('TenHoiDong');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn chuyên ngành</strong>
                                <br>
                                <select class="form-select form-select-sm" name="ChuyenNganh" aria-label=".form-select-lg example">
                                @foreach($sinhvien as $sv)
                                @if(Auth::user()->id==$sv->MaSinhVien)
                                <option value={{$sv->ChuyenNganh}}>{{DB::table('chuyennganhs')->where('MaChuyenNganh', $sv->ChuyenNganh)->value('TenChuyenNganh')}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chọn khoa</strong>
                                <br>
                                <select class="form-select form-select-sm" name="Khoa" aria-label=".form-select-lg example">
                                @foreach($sinhvien as $sv)
                                @if(Auth::user()->id==$sv->MaSinhVien)
                                <option value={{$sv->Khoa}}>{{DB::table('khoas')->where('MaKhoa', $sv->Khoa)->value('TenKhoa')}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Link đồ án</strong>
                                <input type="text" name="Link" class="form-control" placeholder="Nhập Link">
                            </div>
                            <div class="form-group">
                                <strong>Chọn trạng thái</strong>
                                <select class="form-select form-select-sm" name="TrangThai" aria-label=".form-select-lg example" disabled>
                                    <option value="WAIT">WAIT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
@endsection