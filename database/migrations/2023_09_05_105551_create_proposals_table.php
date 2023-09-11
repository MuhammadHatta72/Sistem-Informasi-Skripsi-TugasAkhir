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
            $table->unsignedBigInteger('id_dosen_penguji_proposal')->nullable();
            $table->unsignedBigInteger('id_dosen_pembimbing_1')->nullable();
            $table->unsignedBigInteger('id_dosen_pembimbing_2')->nullable();
            $table->foreignId('id_jadwal')->nullable();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->foreign('id_dosen_penguji_proposal')->references('id')->on('dosens');
            // $table->foreign('id_dosen_penilai_2')->references('id')->on('dosens');
            //            $table->integer('mahasiswa_id')->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            //            $table->integer('dosen_id_penguji_proposal')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            //            $table->integer('dosen_id_pembimbing_1')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            //            $table->integer('dosen_id_pembimbing_2')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            //            $table->integer('jadwal_id')->foreign('id_jadwal')->references('id_jadwal')->on('jadwals');
            $table->string('judul');
            $table->text('data1');
            $table->text('data2');
            $table->text('data3');
            $table->enum(
                'status',
                [
                    'dikirim',
                    'diproses',
                    'diterima',
                    'ditolak',
                    'Lulus',
                    'Tidak Lulus',
                ]
            )->default('dikirim');
            $table->integer('nilai1')->nullable();
            $table->string('revisi')->nullable();
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
