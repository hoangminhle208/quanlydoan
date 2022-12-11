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
        Schema::create('chuyennganhs', function (Blueprint $table) {
            $table->id();
            $table->string('MaChuyenNganh')->unique();
            $table->string('TenChuyenNganh');
            $table->string('MaKhoa')->references('MaKhoa')->on('khoas');
            $table->string('MoTa')->nullable();
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
        Schema::dropIfExists('chuyennganhs');
    }
};
