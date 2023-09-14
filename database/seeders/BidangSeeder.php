<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bidang::create([
            'nama' => 'Teknologi Informasi',
        ]);
        Bidang::create([
            'nama' => 'Akuntansi dummy bidang D3 satu',
        ]);
        Bidang::create([
            'nama' => 'Akuntansi dummy bidang D4 satu',
        ]);
        Bidang::create([
            'nama' => 'Akuntansi dummy bidang D3 dua',
        ]);
        Bidang::create([
            'nama' => 'Akuntansi dummy bidang D4 dua',
        ]);
        Bidang::create([
            'nama' => 'Akuntansi dummy bidang D3 tiga',
        ]);
        Bidang::create([
            'nama' => 'Akuntansi dummy bidang D4 tiga',
        ]);

    }
}
