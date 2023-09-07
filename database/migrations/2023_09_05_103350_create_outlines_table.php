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
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
//            $table->foreignId('id_dosen_penilai_1')->constrained('dosens')->nullable();
//            $table->foreignId('id_dosen_penilai_2')->constrained('dosens')->nullable();
//            $table->foreignId('id_jadwal')->constrained('jadwals')->nullable();
            //            $table->integer('mahasiswa_id')->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            //            $table->integer('dosen_id_penilai_1')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            //            $table->integer('dosen_id_penilai_2')->foreign('id_dosen')->references('id_dosen')->on('dosens');
            //            $table->integer('jadwal_id')->foreign('id_jadwal')->references('id_jadwal')->on('jadwals');
            $table->string('judul');
            $table->string('bab1');
            $table->string('bab2');
            $table->string('bab3');
            $table->enum(
                'status',
                [
                    'dikirim',
                    'diproses',
                    'diterima',
                    'ditolak',
                ]
            )->default('dikirim');
            // $table->integer('nilai1');
            // $table->integer('nilai2');
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
