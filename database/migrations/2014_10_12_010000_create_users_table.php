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
            $table->id('id_user');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum(
                'role',
                [
                    'dosen',
                    'admin',
                    'mahasiswa',
                ]
            )->default('mahasiswa');
            $table->enum(
                'sub_role',
                [
                    'KPS',
                    'dosen_penilai',
                    'dosen_penguji_proposal',
                    'dosen_pembimbing',
                    'dosen_penguji_skripsi',
                ]
            )->nullable();
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
