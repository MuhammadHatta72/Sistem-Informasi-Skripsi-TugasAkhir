<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outline extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function dosenPenilai1()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id_penilai_1', 'id_dosen');
    }

    public function dosenPenilai2()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id_penilai_2', 'id_dosen');
    }

    // public function jadwal()
    // {
    //     return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id_jadwal');
    // }

    public function jadwal()
    {
        return $this->morphOne(Jadwal::class, 'schedulable');
    }
}
