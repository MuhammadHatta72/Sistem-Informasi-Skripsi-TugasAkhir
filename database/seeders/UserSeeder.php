<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'id_admin' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'mahasiswa@gmail.com',
            'id_mahasiswa' => 1,
            'role' => 'mahasiswa',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'kps@gmail.com',
            'id_dosen' => 11,
            'role' => 'kps',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

//      Seeder untuk dosen
        User::create([
            'email' => 'dosenjoko@gmail.com',
            'id_dosen' => 1,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosensupri@gmail.com',
            'id_dosen' => 2,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenbudi@gmail.com',
            'id_dosen' => 3,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosensusi@gmail.com',
            'id_dosen' => 4,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosensiti@gmail.com',
            'id_dosen' => 5,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenrudi@gmail.com',
            'id_dosen' => 6,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'rinadosen@gmail.com',
            'id_dosen' => 7,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'ronidosen@gmail.com',
            'id_dosen' => 8,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'donidosen@gmail.com',
            'id_dosen' => 9,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dinidosen@gmail.com',
            'id_dosen' => 10,
            'role' => 'dosen',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
    }
}
