<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'id_dosen');
    }

    public function outlines()
    {
        return $this->hasMany(Outline::class, 'id_dosen_penilai_1')
            ->orWhere('id_dosen_penilai_2', $this->id);
    }

    public function skripsiPenguji()
    {
        return $this->hasMany(Skripsi::class, 'id_dosen_penguji_skripsi');
    }

    public function skripsiPembimbing1()
    {
        return $this->hasMany(Skripsi::class, 'id_dosen_pembimbing_1');
    }

    public function skripsiPembimbing2()
    {
        return $this->hasMany(Skripsi::class, 'id_dosen_pembimbing_2');
    }

    public function proposalPenguji()
    {
        return $this->hasMany(Proposal::class, 'id_dosen_penguji_proposal');
    }

    public function proposalPembimbing1()
    {
        return $this->hasMany(Proposal::class, 'id_dosen_pembimbing_1');
    }

    public function proposalPembimbing2()
    {
        return $this->hasMany(Proposal::class, 'id_dosen_pembimbing_2');
    }
}
