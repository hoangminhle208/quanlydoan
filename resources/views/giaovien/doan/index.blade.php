@extends('\layouts\gv-layout')
@section('content')
<form action="" class="form-inline">
    <div class="form-group">
        <input class="form-control" type="text" name="key" placeholder="Tìm theo tên hoặc mã đồ án" required/>
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href=""
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-black">Danh sách đề tài</a>
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
                                            Mã đồ án 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Hình ảnh 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Tên đồ án 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Chuyên Ngành 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Nhóm SV 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            GVHD
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Hội đồng
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Link 
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Trạng thái
                                        </th>
                                        <th>
                                            Thao tác
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doan as $da)
                                        @foreach($hoidong as $hd)
                                        @if(($hd->MaChuTich==Auth::user()->id)||($hd->MaThuKy==Auth::user()->id)||($hd->MaGiaoVienPhanBien==Auth::user()->id))
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $da->MaDoAn }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{$da->HinhAnh}}" style="width:75px; height:75px;"
                                                    class="w-16 h-16 rounded">
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $da->TenDetai }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('chuyennganhs')->where('MaChuyenNganh', $da->ChuyenNganh)->value('TenChuyenNganh') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('nhoms')->where('id', $da->Nhom)->value('TenNhom') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('giaoviens')->where('MaGiaoVien', $da->GVHD)->value('Ten') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('hoidongs')->where('MaHoiDong', $da->HoiDong)->value('TenHoiDong') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <button><a href="{{$da->Link}}" role="button" target="_blank">Link</a></button>
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if($da->TrangThai=='DONE')
                                                <strong style="color:green;background-color:aquamarine;">{{$da->TrangThai}}</strong>
                                                @elseif($da->TrangThai=='WAIT')
                                                <strong style="color:yellow;background-color:red;">{{$da->TrangThai}}</strong>
                                                @else
                                                <strong style="color:red;background-color:aquamarine;">{{$da->TrangThai}}</strong>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('gvdoan.destroy',$da->id)}}" method="POST">
                                                <a href="{{route('gvdoan.edit',$da->id)}}" class="btn btn-info">Duyệt</a>
                                                @csrf
                                                </form>
                                            </td>
                                        </tr>
                                        @else
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $da->MaDoAn }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{$da->HinhAnh}}" style="width:75px; height:75px;"
                                                    class="w-16 h-16 rounded">
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $da->TenDetai }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('chuyennganhs')->where('MaChuyenNganh', $da->ChuyenNganh)->value('TenChuyenNganh') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('nhoms')->where('id', $da->Nhom)->value('TenNhom') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('giaoviens')->where('MaGiaoVien', $da->GVHD)->value('Ten') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ DB::table('hoidongs')->where('MaHoiDong', $da->HoiDong)->value('TenHoiDong') }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <button><a href="{{$da->Link}}" role="button" target="_blank">Link</a></button>
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <strong>{{$da->TrangThai}}</strong>
                                            </td>
                                            <td>

                                            </td>
                                        @endif
                                        @endforeach
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