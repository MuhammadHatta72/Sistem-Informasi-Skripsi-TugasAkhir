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
//        User::factory(10)->create();
        User::create([
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'mahasiswa@gmail.com',
            'id_mahasiswa' => 1,
            'role' => 'mahasiswa',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenbiasa@gmail.com',
            'id_dosen' => null,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'kps@gmail.com',
            'id_dosen' => null,
            'role' => 'dosen',
            'sub_role' => 'KPS',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenpenilai@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_penilai',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenpengujiproposal@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_penguji_proposal',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenpembimbing@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_pembimbing',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenpengujiskripsi@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_penguji_skripsi',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

//      Seeder untuk dosen
        User::create([
            'email' => 'dosenjoko@gmail.com',
            'id_dosen' => 1,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosensupri@gmail.com',
            'id_dosen' => 2,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenbudi@gmail.com',
            'id_dosen' => 3,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosensusi@gmail.com',
            'id_dosen' => 4,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosensiti@gmail.com',
            'id_dosen' => 5,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dosenrudi@gmail.com',
            'id_dosen' => 6,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'rinadosen@gmail.com',
            'id_dosen' => 7,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'ronidosen@gmail.com',
            'id_dosen' => 8,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'donidosen@gmail.com',
            'id_dosen' => 9,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'email' => 'dinidosen@gmail.com',
            'id_dosen' => 10,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
    }
}
