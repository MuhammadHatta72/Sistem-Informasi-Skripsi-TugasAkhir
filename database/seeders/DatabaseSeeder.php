<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ProdiSeeder::class,
            BidangSeeder::class,
            KelasSeeder::class,
            ProdiBidangSeeder::class,
            MahasiswaSeeder::class,
            DosenSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            OutlineSeeder::class,
        ]);
    }
}
