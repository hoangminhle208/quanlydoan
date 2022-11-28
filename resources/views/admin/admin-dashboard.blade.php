@extends('layouts\nienkhoa-layout')
@section('content')
    <!-- User/Admin and logout -->
    <div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-user"></i> {{Auth::user()->name}}
    </button>
    <ul class="dropdown-menu btn btn-danger" aria-labelledby="dropdownMenuButton1">
    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                            </x-dropdown-link>
                        </form>
    </ul>
    </div>


    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Quản lí đồ án - Admin - HCMUTE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Bảng điều khiển</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><i class="fa-solid fa-house"></i> Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-user"></i> Thông tin cá nhân</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-toolbox"></i> Các chức năng
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin/nienkhoa">Quản lí niên khóa</a></li>
                <li><a class="dropdown-item" href="/admin/khoa">Quản lí khoa</a></li>
                <li><a class="dropdown-item" href="/admin/chuyennganh">Quản lí chuyên ngành</a></li>
                <li><a class="dropdown-item" href="/admin/hedaotao">Quản lí hệ đào tạo</a></li>
                <li><a class="dropdown-item" href="/admin/giaovien">Quản lí giáo viên</a></li>
                <li><a class="dropdown-item" href="/admin/sinhvien">Quản lí sinh viên</a></li>
                <li><a class="dropdown-item" href="/admin/hoidong">Quản lí hội đồng</a></li>
                <li><a class="dropdown-item" href="/admin/doan">Quản lí đồ án</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/admin/user">Quản lí user</a></li>
                </ul>

                
            </li>
            </ul>
        </div>
        </div>
    </div>
    </nav>

        <div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        <div class="card h-100">
        <img src="" 
        class="card-img-top" alt="..." >
        <div class="card-body">
            <h5 class="card-title">Số niên khóa</h5>
            <strong class="card-text text-primary">Số lượng: {{$nienkhoa_count}}</strong>
            <a  class="link-secondary" href="/admin/nienkhoa">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Tổng số khoa</h5>
            <strong class="card-text text-primary">Số lượng: {{$khoa_count}}</strong>
            <a  class="link-secondary" href="/admin/khoa">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Tổng chuyên ngành</h5>
            <strong class="card-text text-primary">Số lượng: {{$chuyennganh_count}}</strong>
            <a  class="link-secondary" href="/admin/chuyennganh">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Giáo viên</h5>
            <strong class="card-text text-primary">Số lượng: {{$giaovien_count}}</strong>
            <a  class="link-secondary" href="/admin/giaovien">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Hệ đào tạo</h5>
            <strong class="card-text text-primary">Số lượng: {{$hedaotao_count}}</strong>
            <a  class="link-secondary" href="/admin/hedaotao">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Sinh viên</h5>
            <strong class="card-text text-primary">Số lượng: {{$sinhvien_count}}</strong>
            <a  class="link-secondary" href="/admin/sinhvien">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Hội đồng</h5>
            <strong class="card-text text-primary">Số lượng: {{$hoidong_count}}</strong>
            <a  class="link-secondary" href="/admin/hoidong">Xem</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Đồ án</h5>
            <strong class="card-text text-primary">Số lượng: {{$doan_count}}</strong>
            <a  class="link-secondary" href="/admin/doan">Xem</a>
        </div>
        </div>
    </div>
    </div>

@endsection
