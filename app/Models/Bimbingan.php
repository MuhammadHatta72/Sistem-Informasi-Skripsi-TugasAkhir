<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'id_dosen_pembimbing_1',
        'id_dosen_pembimbing_2',
        'id_dosen_pembimbing_intern',
        'id_jadwal',
        'judul',
        'proposalbimbingan',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function dosenPembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pembimbing_1');
    }

    public function dosenPembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pembimbing_2');
    }

    public function dosenPembimbingIntern()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pembimbing_intern');
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
