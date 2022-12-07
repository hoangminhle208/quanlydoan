@extends('\layouts\sinhvien-layout')
@section('content')
<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm nhóm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary float-end">Danh sách nhóm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('nhoms.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên nhóm</strong>
                                <input type="text" name="TenNhom" class="form-control" placeholder="Nhập tên nhóm">
                            </div>
                            <div class="form-group">
                                <strong>Nhóm trưởng</strong>
                                <select class="form-select form-select-sm" name="NhomTruong" aria-label=".form-select-lg example">
                                    @foreach(DB::table('sinhviens')->pluck('MaSinhVien') as $masv)
                                    <option value={{$masv}}>{{DB::table('sinhviens')->where('MaSinhVien', $masv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Thành viên 1</strong>
                                <select class="form-select form-select-sm" name="ThanhVien1" aria-label=".form-select-lg example">
                                    @foreach(DB::table('sinhviens')->pluck('MaSinhVien') as $masv)
                                    <option value={{$masv}}>{{DB::table('sinhviens')->where('MaSinhVien', $masv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Thành viên 2</strong>
                                <select class="form-select form-select-sm" name="ThanhVien2" aria-label=".form-select-lg example">
                                    @foreach(DB::table('sinhviens')->pluck('MaSinhVien') as $masv)
                                    <option value={{$masv}}>{{DB::table('sinhviens')->where('MaSinhVien', $masv)->value('Ten');}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
@endsection