@extends('\layouts\gv-layout')
@section('content')
<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thông tin cá nhân</h3>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Mã số</th>
                            <th>Email</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gvprofile as $u)
                        @if(Auth::user()->id==$u->id)
                        <tr>
                            <td><img src="" alt=""></td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->userType}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <form action="{{route('user.destroy',$u->id)}}" method="POST">
                                    <a href="{{route('gvprofile.edit',$u->id)}}" class="btn btn-info">Sửa</a>
                                    @csrf
                                    
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection