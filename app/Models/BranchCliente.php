<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCliente extends Model
{
    use HasFactory;
    protected $table='categorias'; //nombre de la table
    protected $primaryKey = 'codigo'; //llave primaria de la tabla
    protected $fillable = ['nombre']; //campos para asignacion masiva

}
