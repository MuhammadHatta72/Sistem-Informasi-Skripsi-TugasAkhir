<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{

    public function prodi(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Prodi::class, 'prodi_bidang', 'id_bidang', 'id_prodi');
    }

    public function outline(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Outline::class, 'id_bidang');
    }
}
