<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasTim extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_tim';
    protected $primaryKey = 'id_aktivitas';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'tipe_aktivitas',
        'deskripsi_aktivitas',
        'waktu_aktivitas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
