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
        Schema::create('giaoviens', function (Blueprint $table) {
            $table->id();
            $table->string('HinhAnh');
            $table->string('MaGiaoVien')->unique();
            $table->string('Ten');
            $table->string('Email');
            $table->string('QueQuan');
            $table->date('NgaySinh');
            $table->string('BoMon');
            $table->string('MaKhoa')->references('MaKhoa')->on('khoas');
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
        Schema::dropIfExists('giaoviens');
    }
};
