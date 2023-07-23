<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mahasiswa';
    protected $table = 'mahasiswa';
    protected $keyType = "string";

    public $incrementing = false;
}
