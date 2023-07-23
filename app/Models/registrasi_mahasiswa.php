<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class registrasi_mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_registrasi_mahasiswa';
    protected $table = 'registrasi_mahasiswa';
    protected $keyType = "string";

    public $incrementing = false;

    /**
     * Get the user associated with the mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mahasiswa(): HasOne
    {
        return $this->hasOne(mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
