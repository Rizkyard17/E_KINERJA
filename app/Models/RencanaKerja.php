<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaKerja extends Model
{
    use HasFactory;

    protected $table = 'rencana_kerja';
    protected $primaryKey = 'id_rencana_kerja';
    public $timestamps = false;

    protected $fillable = [
        'id_kelompok',
        'judul_kegiatan',
        'tanggal_kegiatan',
        'detail_kegiatan',
        'status_kegiatan',
        'evaluasi_kegiatan',
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'id_kelompok', 'id_kelompok');
    }
}
