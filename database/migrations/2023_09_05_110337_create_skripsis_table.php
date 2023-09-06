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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id('id_skripsi');
            $table->integer('mahasiswa_id')->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            $table->integer('dosen_id_penguji_skripsi')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            $table->integer('dosen_id_pembimbing_1')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            $table->integer('dosen_id_pembimbing_2')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            $table->integer('jadwal_id')->foreign('id_jadwal')->references('id_jadwal')->on('jadwals');
            $table->string('judul');
            $table->enum(
                'status',
                [
                    'dikirim',
                    'diproses',
                    'diterima',
                    'ditolak',
                ]
            )->default('dikirim');
            $table->string('path_dokumen');
            $table->integer('nilai1');
            $table->integer('nilai2');
            $table->integer('nilai3');
            $table->string('revisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
