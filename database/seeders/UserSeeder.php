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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'id_mahasiswa' => 1,
            'role' => 'mahasiswa',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Dosen Biasa',
            'email' => 'dosenbiasa@gmail.com',
            'id_dosen' => 1,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'KPS',
            'email' => 'kps@gmail.com',
            'id_dosen' => 2,
            'role' => 'dosen',
            'sub_role' => 'KPS',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Dosen Penilai',
            'email' => 'dosenpenilai@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_penilai',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Dosen Penguji Proposal',
            'email' => 'dosenpengujiproposal@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_penguji_proposal',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Dosen Pembimbing',
            'email' => 'dosenpembimbing@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_pembimbing',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Dosen Penguji Skripsi',
            'email' => 'dosenpengujiskripsi@gmail.com',
            'role' => 'dosen',
            'sub_role' => 'dosen_penguji_skripsi',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

//      Seeder untuk dosen
        User::create([
            'name' => 'joko',
            'email' => 'dosenjoko@gmail.com',
            'id_dosen' => 1,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'supri',
            'email' => 'dosensupri@gmail.com',
            'id_dosen' => 2,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'budi',
            'email' => 'dosenbudi@gmail.com',
            'id_dosen' => 3,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'susi',
            'email' => 'dosensusi@gmail.com',
            'id_dosen' => 4,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'siti',
            'email' => 'dosensiti@gmail.com',
            'id_dosen' => 5,
            'role' => 'dosen',
            'sub_role' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
    }
}
