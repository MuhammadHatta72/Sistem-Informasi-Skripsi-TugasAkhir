<?php

namespace Database\Seeders;

use App\Models\Outline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outlines')->insert([
            'id_mahasiswa' => 1,
            'judul' => 'Judul Contoh',
            'id_dosen_penilai_1' => null,
            'id_dosen_penilai_2' => null,
            'id_jadwal' => null,
            'bab1' => 'Isi Bab 1 Contoh',
            'bab2' => 'Isi Bab 2 Contoh',
            'bab3' => 'Isi Bab 3 Contoh',
            'status' => 'Diterima',
        ]);
    }
}
