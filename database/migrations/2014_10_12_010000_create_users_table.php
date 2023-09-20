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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->nullable();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->unsignedBigInteger('id_dosen')->nullable();
            $table->foreign('id_dosen')->references('id')->on('dosens');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->foreign('id_prodi')->references('id')->on('prodis');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum(
                'role',
                [
                    'kps',
                    'dosen',
                    'admin',
                    'mahasiswa',
                ]
            )->default('mahasiswa');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
