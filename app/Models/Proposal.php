<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function dosenPengujiProposal()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id_penguji_proposal', 'id_dosen');
    }

    public function dosenPembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id_pembimbing_1', 'id_dosen');
    }

    public function dosenPembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id_pembimbing_2', 'id_dosen');
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
