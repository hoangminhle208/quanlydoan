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
        Schema::create('nhoms', function (Blueprint $table) {
            $table->id();
            $table->string('TenNhom');
            $table->string('NhomTruong')->references('MaSinhVien')->on('sinhviens')->unique();
            $table->string('ThanhVien1')->references('MaSinhVien')->on('sinhviens');
            $table->string('ThanhVien2')->references('MaSinhVien')->on('sinhviens');
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
        Schema::dropIfExists('nhoms');
    }
};
