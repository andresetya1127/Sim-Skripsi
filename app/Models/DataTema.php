<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTema extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tema';
    protected $keyType = "string";
}
