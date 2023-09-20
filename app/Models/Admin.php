<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\KPS;
use App\Models\User;
use App\Models\Proposal;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'id_user',
        'nama',
        'nip',
        'limit_dosen',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_admin');
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'id_admin');
    }

    public function kps()
    {
        return $this->hasMany(KPS::class, 'id_admin');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_admin');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_admin');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_admin');
    }
}
