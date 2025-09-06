<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompok';
    protected $primaryKey = 'id_kelompok';
    public $timestamps = false;

    protected $fillable = [
        'id_lokasi',
        'nama_kelompok',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_kelompok', 'id_kelompok');
    }

    public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'id_kelompok', 'id_kelompok');
    }
}
