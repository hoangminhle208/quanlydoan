@extends('\layouts\sinhvien-layout')
@section('content')
<form action="" class="form-inline">
    <div class="form-group">
        <input class="form-control" type="text" name="key" placeholder="Tìm theo tên hoặc mã sinh viên" required/>
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href=""
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-black">Danh sách sinh viên</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full table-bordered table">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Mã sinh viên
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Hình ảnh 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Họ và tên
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Chuyên ngành/khoa/lớp
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Hệ đào tạo/niên khóa
                                        </th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sinhvien as $sv)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $sv->MaSinhVien }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{$sv->HinhAnh}}" style="width:75px; height:75px;"
                                                    class="w-16 h-16 rounded">
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $sv->Ten }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Khoa: {{DB::table('khoas')->where('MaKhoa', $sv->Khoa)->value('TenKhoa')}}
                                                <br>Chuyên ngành: {{DB::table('chuyennganhs')->where('MaChuyenNganh', $sv->ChuyenNganh)->value('TenChuyenNganh')}}
                                                <br>Lớp: {{DB::table('lops')->where('MaLop', $sv->Lop)->value('MaLop')}}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Hệ đào tạo: {{DB::table('hedaotaos')->where('MaHeDaoTao', $sv->HeDaoTao)->value('TenHeDaoTao')}}
                                                <br>Niên khóa: {{DB::table('nienkhoas')->where('MaNienKhoa', $sv->NienKhoa)->value('Nam')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection