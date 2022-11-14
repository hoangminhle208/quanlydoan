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
        Schema::create('lops', function (Blueprint $table) {
            $table->id();
            $table->string('MaLop')->unique();
            $table->string('MaChuyenNganh')->references('MaChuyenNganh')->on('chuyennganhs');
            $table->string('MaKhoa')->references('MaKhoa')->on('khoas');
            $table->integer('SiSo');
            $table->string('MaNienKhoa')->references('MaNienKhoa')->on('nienkhoas');
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
        Schema::dropIfExists('lops');
    }
};
