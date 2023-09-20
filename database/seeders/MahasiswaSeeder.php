<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '1234567890',
            'nama' => 'Budi',
            'id_prodi' => 1,
            'id_kelas' => 2,
        ]);
        Mahasiswa::create([
            'nim' => '1234567891',
            'nama' => 'Andi',
            'id_prodi' => 2,
            'id_kelas' => 1,
        ]);
        Mahasiswa::create([
            'nim' => '1234567892',
            'nama' => 'Tono',
            'id_prodi' => 3,
            'id_kelas' => 1,
        ]);
    }
}
