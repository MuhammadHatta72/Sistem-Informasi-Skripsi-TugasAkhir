<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function outlines()
    {
        return $this->hasMany(Outline::class, 'dosen_id_penilai_1', 'id_dosen')
            ->orWhere('dosen_id_penilai_2', $this->id);
    }

    public function skripsiPenguji()
    {
        return $this->hasMany(Skripsi::class, 'dosen_id_penguji_skripsi', 'id_dosen');
    }

    public function skripsiPembimbing1()
    {
        return $this->hasMany(Skripsi::class, 'dosen_id_pembimbing_1', 'id_dosen');
    }

    public function skripsiPembimbing2()
    {
        return $this->hasMany(Skripsi::class, 'dosen_id_pembimbing_2', 'id_dosen');
    }

    public function proposalPenguji()
    {
        return $this->hasMany(Proposal::class, 'dosen_id_penguji_proposal', 'id_dosen');
    }

    public function proposalPembimbing1()
    {
        return $this->hasMany(Proposal::class, 'dosen_id_pembimbing_1', 'id_dosen');
    }

    public function proposalPembimbing2()
    {
        return $this->hasMany(Proposal::class, 'dosen_id_pembimbing_2', 'id_dosen');
    }
}
