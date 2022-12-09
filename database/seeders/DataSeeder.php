<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('chuyennganhs')->insert([
            'MaNienKhoa' => Str::random(10),
            'Nam' => Str::random(10),
        ]);
        DB::table('khoas')->insert([
            'MaKhoa' => Str::random(10),
            'TenKhoa' => Str::random(10),
            'NgayThanhLap' => Date::random(),
            'MoTa' => Str::random(10),
        ]);
        DB::table('hedaotaos')->insert([
            'MaHeDaoTao' => Str::random(10),
            'TenHeDaoTao' => Str::random(10),
            'MoTa' => Str::random(10),
        ]);
    }
}
