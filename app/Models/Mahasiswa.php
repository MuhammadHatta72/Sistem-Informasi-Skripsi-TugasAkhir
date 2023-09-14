<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'id_mahasiswa');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function outlines()
    {
        return $this->hasMany(Outline::class, 'mahasiswa_id');
    }

    public function skripsis()
    {
        return $this->hasMany(Skripsi::class, 'mahasiswa_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'mahasiswa_id');
    }
}
