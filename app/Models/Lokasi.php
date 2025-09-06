<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    public $timestamps = false;

    protected $fillable = [
        'nama_lokasi',
        'alamat_lengkap',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'koordinat',
    ];

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class, 'id_lokasi', 'id_lokasi');
    }
}
