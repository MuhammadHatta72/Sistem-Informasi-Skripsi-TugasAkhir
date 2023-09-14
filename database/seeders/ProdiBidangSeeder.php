<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiD3 = Prodi::find(1);
        $bidangD31 = Bidang::find(2);
        $bidangD32 = Bidang::find(4);
        $bidangD33 = Bidang::find(6);

        $prodiD3->bidang()->attach($bidangD31);
        $prodiD3->bidang()->attach($bidangD32);
        $prodiD3->bidang()->attach($bidangD33);

        $prodiD4 = Prodi::find(2);
        $bidangD41 = Bidang::find(3);
        $bidangD42 = Bidang::find(5);
        $bidangD43 = Bidang::find(7);

        $prodiD4->bidang()->attach($bidangD41);
        $prodiD4->bidang()->attach($bidangD42);
        $prodiD4->bidang()->attach($bidangD43);

    }
}
