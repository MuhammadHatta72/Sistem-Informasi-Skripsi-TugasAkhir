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
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->unsignedBigInteger('id_dosen_penguji_skripsi')->nullable();
            $table->foreign('id_dosen_penguji_skripsi')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_dosen_pembimbing_1')->nullable();
            $table->foreign('id_dosen_pembimbing_1')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_dosen_pembimbing_2')->nullable();
            $table->foreign('id_dosen_pembimbing_2')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->enum(
                'status',
                [
                    'dikirim',
                    'diproses',
                    'diterima',
                    'dinilai',
                    'ditolak',
                ]
            )->default('dikirim');
            $table->string('file_1');
            $table->string('file_2');
            $table->string('file_3');
            $table->integer('nilai1')->nullable();
            $table->integer('nilai2')->nullable();
            $table->integer('nilai3')->nullable();
            $table->string('revisi')->nullable();
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
