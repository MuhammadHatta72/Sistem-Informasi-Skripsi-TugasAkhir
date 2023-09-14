<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'nama' => 'D3 Akuntansi',
        ]);
        Prodi::create([
            'nama' => 'D4 Akuntansi Manajemen',
        ]);
        Prodi::create([
            'nama' => 'D4 Keuangan',
        ]);
    }
}
