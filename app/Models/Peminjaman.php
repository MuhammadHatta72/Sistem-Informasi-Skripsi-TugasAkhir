<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'id_user',
        'id_sarana_prasarana',
        'id_wewenang',
        'dokumen',
        'kegiatan',
        'penanggung_jawab',
        'nim',
        'status',
        'daya_listrik',
        'catatan_admin',
        'tanggal_mulai',
        'tanggal_selesai',
        'jam_mulai',
        'jam_selesai'
    ];

    public function saranaPrasarana(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SaranaPrasarana::class, 'id_sarana_prasarana');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function wewenang(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wewenang::class, 'id_wewenang');
    }

}
