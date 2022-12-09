@extends('layouts\gv-layout')
@section('content')
<div class="card-body">
                <form action="{{route('gvdoan.update',$gvdoan->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình ảnh</strong>
                                <img src={{$gvdoan->HinhAnh}} alt="">
                                <input type="text" name="HinhAnh" value="{{$gvdoan->HinhAnh}}" class="form-control" placeholder="Nhập da" disabled>
                            </div>
                            <div class="form-group">
                                <strong>Mã đồ án</strong>
                                <input type="text" name="MaDoAn" value="{{$gvdoan->MaDoAn}}" class="form-control" placeholder="Nhập tên gv" disabled>
                            </div>
                            <div class="form-group">
                                <strong>Tên đề tài</strong>
                                <input type="text" name="TenDetai" value="{{$gvdoan->TenDetai}}" class="form-control" placeholder="Nhập tên gv" disabled>
                            </div>
                            <div class="form-group">
                                <strong>Nhóm sinh viên thực hiện</strong>
                                <br>
                                <select class="form-select form-select-sm" name="Nhom" aria-label=".form-select-lg example" disabled>
                                    @foreach(DB::table('nhoms')->pluck('id') as $id)
                                    @if($gvdoan->Nhom==$id)
                                    <option value={{$id}} >{{DB::table('nhoms')->where('id', $id)->value('TenNhom');}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Giáo viên hướng dẫn</strong>
                                <br>
                                <select class="form-select form-select-sm" name="GVHD" aria-label=".form-select-lg example" disabled>
                                    @foreach(DB::table('giaoviens')->pluck('MaGiaoVien') as $magv)
                                    @if($gvdoan->GVHD==$magv)
                                    <option value={{$magv}}>{{DB::table('giaoviens')->where('MaGiaoVien', $magv)->value('Ten');}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Hội đồng</strong>
                                <br>
                                <select class="form-select form-select-sm" name="HoiDong" aria-label=".form-select-lg example" disabled>
                                    @foreach(DB::table('hoidongs')->pluck('MaHoiDong') as $mahd)
                                    @if($gvdoan->HoiDong==$mahd)
                                    <option value={{$mahd}}>{{DB::table('hoidongs')->where('MaHoiDong', $mahd)->value('TenHoiDong');}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Khoa</strong>
                                <br>
                                <select class="form-select form-select-sm" name="Khoa" aria-label=".form-select-lg example" disabled>
                                    @foreach(DB::table('khoas')->pluck('MaKhoa') as $makhoa)
                                    @if($gvdoan->Khoa==$makhoa)
                                    <option value={{$makhoa}}>{{DB::table('khoas')->where('MaKhoa', $makhoa)->value('TenKhoa');}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Chuyên ngành</strong>
                                <br>
                                <select class="form-select form-select-sm" name="ChuyenNganh" aria-label=".form-select-lg example" disabled>
                                    @foreach(DB::table('chuyennganhs')->pluck('MaChuyenNganh') as $macn)
                                    @if($gvdoan->ChuyenNganh==$macn)
                                    <option value={{$macn}}>{{DB::table('chuyennganhs')->where('MaChuyenNganh', $macn)->value('TenChuyenNganh');}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Link đồ án</strong>
                                <input type="text" disabled name="Link" value="{{$gvdoan->Link}}" class="form-control" placeholder="Nhập tên gv">
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
@endsection