<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function dosenPengujiProposal()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_penguji_proposal');
    }

    public function dosenPembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pembimbing_1');
    }

    public function dosenPembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pembimbing_2');
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
