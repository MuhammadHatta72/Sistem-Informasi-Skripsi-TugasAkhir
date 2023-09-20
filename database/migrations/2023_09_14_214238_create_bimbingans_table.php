<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->unsignedBigInteger('id_dosen_pembimbing_1')->nullable();
            $table->foreign('id_dosen_pembimbing_1')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_dosen_pembimbing_2')->nullable();
            $table->foreign('id_dosen_pembimbing_2')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_dosen_pembimbing_abstrak')->nullable();
            $table->foreign('id_dosen_pembimbing_abstrak')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->string('judul');
            $table->string('bidang');
            $table->string('proposalbimbingan');
            $table->enum(
                'status',
                [
                    'dikirim',
                    'diterima admin',
                    'ditolak admin',
                    'diterima kps',
                    'ditolak kps',
                    'diproses dosen pembimbing',
                    'ditolak dosen pembimbing',
                    'lulus bimbingan',
                ]
            )->default('dikirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingans');
    }
};
