<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::create([
            'nik' => '1234567890',
            'nama' => 'Soekarno',
        ]);
        Dosen::create([
            'nik' => '1234567891',
            'nama' => 'Soeharto',
        ]);
    }
}
