<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;

    protected $table = 'sarana_prasarana';

    protected $fillable = [
        'nama',
        'kapasitas',
        'id_wewenang',
        'fasilitas',
    ];

    public function peminjaman(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_sarana_prasarana');
    }

    public function wewenang(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wewenang::class, 'id_wewenang');
    }
}
