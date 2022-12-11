<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'ma' => '01',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('hoang2002'),
            'userType' => 'ADM'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Trưởng Khoa',
            'ma' => '001',
            'email' => 'tk@gmail.com',
            'password' => bcrypt('hoang2002'),
            'userType' => 'TK'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Lê Minh Hoàng',
            'ma' => '20161317',
            'email' => 'hoang@gmail.com',
            'password' => bcrypt('hoang2002'),
            'userType' => 'SV'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Lê Thị C',
            'ma' => '002',
            'email' => 'gv@gmail.com',
            'password' => bcrypt('hoang2002'),
            'userType' => 'GV'
        ]);
        //tạo data nien khoa
        DB::table('nienkhoas')->insert([
            'MaNienKhoa' => '01',
            'Nam' => '2017-2021'
        ]);
        DB::table('nienkhoas')->insert([
            'MaNienKhoa' => '02',
            'Nam' => '2018-2022'
        ]);
        DB::table('nienkhoas')->insert([
            'MaNienKhoa' => '03',
            'Nam' => '2019-2023'
        ]);
        DB::table('nienkhoas')->insert([
            'MaNienKhoa' => '04',
            'Nam' => '2020-2024'
        ]);
        DB::table('nienkhoas')->insert([
            'MaNienKhoa' => '05',
            'Nam' => '2021-2025'
        ]);
        //tạo data khoa
        DB::table('khoas')->insert([
            'MaKhoa' => '01',
            'TenKhoa' => 'Công nghệ thông tin',
            'NgayThanhLap' => Carbon::create('2000', '01', '01'),
            'MoTa' => 'Khoa công nghệ thông tin gồm các ngành cntt,ktdl,attt',
        ]);
        DB::table('khoas')->insert([
            'MaKhoa' => '02',
            'TenKhoa' => 'Điện',
            'NgayThanhLap' => Carbon::create('2002', '05', '01'),
            'MoTa' => 'Khoa điện gồm các ngành điện-điện tử, dtvt, tự động hóa,...',
        ]);
        DB::table('khoas')->insert([
            'MaKhoa' => '03',
            'TenKhoa' => 'Kinh tế',
            'NgayThanhLap' => Carbon::create('2000', '01', '01'),
            'MoTa' => 'Khoa kinh tế gồm các ngành kinh doanh quốc tế, kế toán, kiểm toán,...',
        ]);
        DB::table('khoas')->insert([
            'MaKhoa' => '04',
            'TenKhoa' => 'Chế tạo máy',
            'NgayThanhLap' => Carbon::create('2000', '01', '01'),
            'MoTa' => 'Khoa chế tạo máy gồm các ngành cnctm,cnktck,...',
        ]);
        //tạo data chuyên ngành
        DB::table('chuyennganhs')->insert([
            'MaChuyenNganh' => '01',
            'TenChuyenNganh' => 'Công nghệ thông tin',
            'MaKhoa' => '01',
            'MoTa' => 'Ngành công nghệ thông tin đhspkt'
        ]);
        DB::table('chuyennganhs')->insert([
            'MaChuyenNganh' => '02',
            'TenChuyenNganh' => 'Kỹ thuật dữ liệu',
            'MaKhoa' => '01',
            'MoTa' => 'Ngành ktdl đhspkt'
        ]);
        DB::table('chuyennganhs')->insert([
            'MaChuyenNganh' => '03',
            'TenChuyenNganh' => 'Điện -Điện tử',
            'MaKhoa' => '02',
            'MoTa' => 'Ngành điện-điện tử đhspkt'
        ]);
        DB::table('chuyennganhs')->insert([
            'MaChuyenNganh' => '04',
            'TenChuyenNganh' => 'Kế toán',
            'MaKhoa' => '03',
            'MoTa' => 'Ngành kế toán đhspkt'
        ]);
        //hệ đào tạo
        DB::table('hedaotaos')->insert([
            'MaHeDaoTao' => '01',
            'TenHeDaoTao' => 'Chính Quy',
            'MoTa' => 'CN'
        ]);
        DB::table('hedaotaos')->insert([
            'MaHeDaoTao' => '03',
            'TenHeDaoTao' => 'Liên thông',
            'MoTa' => 'LT'
        ]);
        DB::table('hedaotaos')->insert([
            'MaHeDaoTao' => '02',
            'TenHeDaoTao' => 'Vừa học vừa làm',
            'MoTa' => 'VHVL'
        ]);
        //lớp
        DB::table('lops')->insert([
            'MaLop' => '20110',
            'MaChuyenNganh' => '01',
            'MaKhoa' => '01',
            'SiSo' => 50,
            'MaNienKhoa' =>'03'
        ]);
        DB::table('lops')->insert([
            'MaLop' => '20133',
            'MaChuyenNganh' => '01',
            'MaKhoa' => '01',
            'SiSo' => 50,
            'MaNienKhoa' =>'03'
        ]);
        //giáo viên
        DB::table('giaoviens')->insert([
            'HinhAnh' => 'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaGiaoVien' => '001',
            'Ten' => 'Lê Văn Vinh',
            'Email' => 'vinhlv@hcmute.edu.vn',
            'QueQuan' => 'HoChiMinh city',
            'NgaySinh' => Carbon::create('1995', '01', '01'),
            'BoMon' => 'Máy tính',
            'MaKhoa' => '01'
        ]);
        DB::table('giaoviens')->insert([
            'HinhAnh' => 'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaGiaoVien' => '002',
            'Ten' => 'Lê Thị Minh Châu',
            'Email' => 'chaultm@hcmute.edu.vn',
            'QueQuan' => 'HoChiMinh city',
            'NgaySinh' => Carbon::create('1995', '01', '01'),
            'BoMon' => 'Máy tính',
            'MaKhoa' => '01'
        ]);
        DB::table('giaoviens')->insert([
            'HinhAnh' => 'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaGiaoVien' => '003',
            'Ten' => 'Nguyễn Hữu Trung',
            'Email' => 'trungnh@hcmute.edu.vn',
            'QueQuan' => 'HoChiMinh city',
            'NgaySinh' => Carbon::create('1995', '01', '01'),
            'BoMon' => 'Máy tính',
            'MaKhoa' => '01'
        ]);
        DB::table('giaoviens')->insert([
            'HinhAnh' => 'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaGiaoVien' => '004',
            'Ten' => 'Hoàng Công Trình',
            'Email' => 'hoangct@hcmute.edu.vn',
            'QueQuan' => 'HoChiMinh city',
            'NgaySinh' => Carbon::create('1995', '01', '01'),
            'BoMon' => 'Máy tính',
            'MaKhoa' => '01'
        ]);
        DB::table('giaoviens')->insert([
            'HinhAnh' => 'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaGiaoVien' => '005',
            'Ten' => 'Quách Đình Hoàng',
            'Email' => 'hoangqd@hcmute.edu.vn',
            'QueQuan' => 'HoChiMinh city',
            'NgaySinh' => Carbon::create('1995', '01', '01'),
            'BoMon' => 'Máy tính',
            'MaKhoa' => '01'
        ]);
        //sinh viên
        DB::table('sinhviens')->insert([
            'HinhAnh' =>'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaSinhVien' => '20161317',
            'Ten' => 'Lê Minh Hoàng',
            'SoDienThoai' => '090123456',
            'Email' => 'hoang@gmail.com',
            'NgaySinh' => Carbon::create('2002', '08', '20'),
            'QueQuan' => 'Phú Yên',
            'NienKhoa' => '04',
            'Lop' => '20110',
            'Khoa' => '01',
            'ChuyenNganh' => '01',
            'HeDaoTao' => '01'
        ]);
        DB::table('sinhviens')->insert([
            'HinhAnh' =>'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaSinhVien' => '2011001',
            'Ten' => 'Phan Hoàng Thanh Sơn',
            'SoDienThoai' => '123456789 ',
            'Email' => 'son@gmail.com',
            'NgaySinh' => Carbon::create('2002', '01', '01'),
            'QueQuan' => 'HCM',
            'NienKhoa' => '04',
            'Lop' => '20110',
            'Khoa' => '01',
            'ChuyenNganh' => '01',
            'HeDaoTao' => '01'
        ]);
        DB::table('sinhviens')->insert([
            'HinhAnh' =>'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaSinhVien' => '20110223',
            'Ten' => 'Lợi Cẩm Huy',
            'SoDienThoai' => '123456789 ',
            'Email' => 'huy@gmail.com',
            'NgaySinh' => Carbon::create('2002', '01', '01'),
            'QueQuan' => 'HCM',
            'NienKhoa' => '04',
            'Lop' => '20110',
            'Khoa' => '01',
            'ChuyenNganh' => '01',
            'HeDaoTao' => '01'
        ]);
        DB::table('sinhviens')->insert([
            'HinhAnh' =>'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaSinhVien' => '20101212',
            'Ten' => 'Lê Văn Phú',
            'SoDienThoai' => '123456789',
            'Email' => 'phu@gmail.com',
            'NgaySinh' => Carbon::create('2002', '01', '01'),
            'QueQuan' => 'HCM',
            'NienKhoa' => '04',
            'Lop' => '20110',
            'Khoa' => '01',
            'ChuyenNganh' => '01',
            'HeDaoTao' => '01'
        ]);
        DB::table('sinhviens')->insert([
            'HinhAnh' =>'https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png',
            'MaSinhVien' => '20133121',
            'Ten' => 'Trần Văn Thắng',
            'SoDienThoai' => '123456789 ',
            'Email' => 'thang@gmail.com',
            'NgaySinh' => Carbon::create('2002', '01', '01'),
            'QueQuan' => 'HCM',
            'NienKhoa' => '04',
            'Lop' => '01',
            'Khoa' => '01',
            'ChuyenNganh' => '01',
            'HeDaoTao' => '01'
        ]);
    }
}
