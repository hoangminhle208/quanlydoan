<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->id();
            $table->string('HinhAnh');
            $table->string('MaSinhVien')->unique();
            $table->string('Ten');
            $table->string('SoDienThoai');
            $table->string('Email');
            $table->date('NgaySinh');
            $table->string('QueQuan');
            $table->string('NienKhoa')->references('MaNienKhoa')->on('nienkhoas');
            $table->string('Lop')->references('MaLop')->on('lops');
            $table->string('Khoa')->references('MaKhoa')->on('khoas');
            $table->string('ChuyenNganh')->references('MaChuyenNganh')->on('chuyennganhs');
            $table->string('HeDaoTao')->references('MaHeDaoTao')->on('hedaotaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinhviens');
    }
};
