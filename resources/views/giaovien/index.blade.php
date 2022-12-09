@extends('\layouts\gv-layout')
@section('content')
<h1>Website quản lý đề tài - Giáo viên</h1>
<h2>Thông báo</h2>
<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Người gửi</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($thongbao as $tb)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$tb->TieuDe}}</td>
                            <td>{{DB::table('users')->where('id', $tb->NguoiGui)->value('name')}}</td>
                            <td>{{$tb->NoiDung}}</td>
                            <td>{{$tb->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection