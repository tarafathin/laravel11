<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('leave', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('karyawan_id');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->integer('jumlah_hari')->nullable();
        $table->string('jenis_cuti');
        $table->string('status_pengajuan')->default('menunggu');
        $table->text('keterangan')->nullable();
        $table->timestamps();

        $table->foreign('karyawan_id')->references('id')->on('employees')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('leave');
    }
};
