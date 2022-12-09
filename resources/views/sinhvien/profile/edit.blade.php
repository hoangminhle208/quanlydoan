@extends('\layouts\sinhvien-layout')
@section('content')
<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sửa user</h3>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('profile.update',$profile->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên</strong>
                                <input type="text" name="name" value="{{$profile->name}}" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="text" name="email" value="{{$profile->email}}" class="form-control" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <strong>Loại user</strong>
                                <input type="text" name="userType" value="{{$profile->userType}}" class="form-control" placeholder=" " disabled>
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="password" name="password" value="{{$profile->password}}" class="form-control" placeholder="">
                            </div>
                            
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
@endsection