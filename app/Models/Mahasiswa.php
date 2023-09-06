<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function outlines()
    {
        return $this->hasMany(Outline::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function skripsis()
    {
        return $this->hasMany(Skripsi::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'mahasiswa_id', 'id_mahasiswa');
    }
}
