<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel yang digunakan.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Primary key tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * Kolom yang bisa diisi massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'name',              // username login
        'nama_lengkap',      // nama lengkap
        'email',             // email (unique)
        'password',          // password (hashed)
        'role',              // peran: user, admin, superadmin
        'posisi',            // jabatan/posisi
        'id_profesi',        // foreign key ke profesi
        'id_kelompok',       // foreign key ke kelompok
        'tanggal_lahir',     // tanggal lahir
        'nik',               // nomor induk kependudukan
        'no_hp',             // nomor handphone
        'status',            // status: aktif, nonaktif, dll
        'last_login',        // terakhir login
        'email_verified_at', // waktu verifikasi email
    ];

    /**
     * Kolom yang harus di-hidden saat di-array atau JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast atribut ke tipe data tertentu.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir'     => 'date',
        'last_login'        => 'datetime',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    /**
     * Mutator: Hash password otomatis saat diset.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Relasi ke tabel Profesi.
     */
    public function profesi()
    {
        return $this->belongsTo(Profesi::class, 'id_profesi', 'id_profesi');
    }

    /**
     * Relasi ke tabel Kelompok.
     */
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'id_kelompok', 'id_kelompok');
    }
}