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
        Schema::create('doans', function (Blueprint $table) {
            $table->id();
            $table->string('HinhAnh');
            $table->string('MaDoAn')->unique();
            $table->string('TenDetai');
            $table->string('Nhom')->references('id')->on('nhoms');
            $table->string('GVHD')->references('MaGiaoVien')->on('giaoviens');
            $table->string('HoiDong')->references('MaHoiDong')->on('hoidongs')->nullable();
            $table->string('ChuyenNganh')->references('MaChuyenNganh')->on('chuyennganhs');
            $table->string('Khoa')->references('MaKhoa')->on('khoas');
            $table->string('Link');
            $table->enum('TrangThai',['DONE','WAIT','FAIL'])->default('WAIT');
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
        Schema::dropIfExists('doans');
    }
};
