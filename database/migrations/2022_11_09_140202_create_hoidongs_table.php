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
        Schema::create('hoidongs', function (Blueprint $table) {
            $table->id();
            $table->string('MaHoiDong')->unique();
            $table->string('MaChuTich')->references('MaGiaoVien')->on('giaoviens');
            $table->string('MaThuKy')->references('MaGiaoVien')->on('giaoviens');
            $table->string('MaGiaoVienPhanBien')->references('MaGiaoVien')->on('giaoviens');
            $table->string('MoTa');
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
        Schema::dropIfExists('hoidongs');
    }
};
