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
        Schema::create('prodi_bidang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_bidang');
            $table->timestamps();
            $table->foreign('id_prodi')->references('id')->on('prodis');
            $table->foreign('id_bidang')->references('id')->on('bidangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi_bidang');
    }
};
