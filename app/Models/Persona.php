<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "tbl_persona";
    protected $primaryKey = "id_per";
    protected $fillable = [
        "id_per",
        "nombres_per",
        "apellidos_per",
        "fecha_nacimiento_per",
        "genero_per",
        "correo_per",
        "direccion_per"
    ];
    public $timestamps = false;
}
