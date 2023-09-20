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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->unsignedBigInteger('id_dosen_penguji_proposal_1')->nullable();
            $table->foreign('id_dosen_penguji_proposal_1')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_dosen_penguji_proposal_2')->nullable();
            $table->foreign('id_dosen_penguji_proposal_2')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->string('judul');
            $table->string('template')->nullable();
            $table->string('kategori');
            $table->string('file');
            $table->enum(
                'status1',
                [
                    'Diterima DosenPenguji1',
                    'Diterima DosenPenguji1 Revisi',
                    'Ditolak DosenPenguji1',
                ]
            )->nullable();
            $table->enum(
                'status2',
                [
                    'Diterima DosenPenguji2',
                    'Diterima DosenPenguji2 Revisi',
                    'Ditolak DosenPenguji2',
                ]
            )->nullable();
            $table->enum(
                'status',
                [
                    'Diproses Admin',
                    'Diterima Admin',
                    'Ditolak Admin',
                    'Diterima KPS',
                    'Ditolak KPS',
                    'Lulus',
                    'Lulus dengan Revisi',
                    'Tidak Lulus',
                    'Diterima DosenPenguji2',
                    'Diterima DosenPenguji2 Revisi',
                    'Ditolak DosenPenguji2',
                    'Diterima DosenPenguji1',
                    'Diterima DosenPenguji1 Revisi',
                    'Ditolak DosenPenguji1',
                ]
            )->default('Diproses Admin');
            $table->integer('nilai_1')->nullable();
            $table->integer('nilai_2')->nullable();
            $table->string('revisi_1')->nullable();
            $table->string('revisi_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
