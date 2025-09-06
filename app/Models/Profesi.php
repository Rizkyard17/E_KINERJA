<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    protected $table = 'profesi';
    protected $primaryKey = 'id_profesi';
    public $timestamps = false;

    protected $fillable = ['nama_profesi'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_profesi', 'id_profesi');
    }
}
