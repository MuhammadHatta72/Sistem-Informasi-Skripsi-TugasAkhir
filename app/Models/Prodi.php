<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bidang(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Bidang::class, 'prodi_bidang', 'id_prodi', 'id_bidang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswa(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'id_prodi');
    }
}
