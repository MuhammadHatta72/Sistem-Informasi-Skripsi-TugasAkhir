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
        Schema::create('outlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_dosen_penilai_1')->nullable();
            $table->unsignedBigInteger('id_dosen_penilai_2')->nullable();
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->foreign('id_dosen_penilai_1')->references('id')->on('dosens');
            $table->foreign('id_dosen_penilai_2')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_bidang_1')->nullable();
            $table->foreign('id_bidang_1')->references('id')->on('bidangs');
            $table->unsignedBigInteger('id_bidang_2')->nullable();
            $table->foreign('id_bidang_2')->references('id')->on('bidangs');
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->string('judul_1');
            $table->string('judul_2');
            $table->string('pendahuluan_1');
            $table->string('pendahuluan_2');
            $table->string('teori_1');
            $table->string('teori_2');
            $table->string('metpen_1');
            $table->string('metpen_2');
            $table->enum('pilihan', ['1', '2'])->nullable();
            $table->string('catatan_kps')->nullable();
            $table->string('revisi_1')->nullable();
            $table->string('revisi_2')->nullable();
            $table->enum(
                'status1',
                [
                    'Diterima DosenPenilai1',
                    'Ditolak DosenPenilai1',
                ]
            )->nullable();
            $table->enum(
                'status2',
                [
                    'Diterima DosenPenilai2',
                    'Ditolak DosenPenilai2',
                ]
            )->nullable();
            $table->enum(
                'status',
                [
                    'Pengajuan',
                    'Diterima KPS',
                    'Diterima DosenPenilai1',
                    'Diterima DosenPenilai2',
                    'Ditolak KPS',
                    'Ditolak DosenPenilai1',
                    'Ditolak DosenPenilai2',
                    'Lulus'
                ]
            )->default('Pengajuan');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlines');
    }
};
