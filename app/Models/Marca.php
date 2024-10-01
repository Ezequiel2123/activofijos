<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'nombre', // Campos que se pueden llenar
    ];
}
