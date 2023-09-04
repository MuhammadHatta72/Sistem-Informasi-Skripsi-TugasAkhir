<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wewenang extends Model
{
    use HasFactory;

    protected $table = 'wewenang';

    protected $fillable = [
        'name',
        'pj',
        'jabatan',
        'nip',
        'ttd'
    ];

    public function saranaPrasarana(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SaranaPrasarana::class, 'id_wewenang');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'id_wewenang');

    }

    public function peminjaman(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_wewenang');
    }
}
