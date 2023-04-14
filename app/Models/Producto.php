<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //que atributos permito con carga masiva de un formulario
    protected $fillable=['cod','nombre','nombre_corto','descripcion','PVP','familia'];
    use HasFactory;
    // nombre de tabla
    protected $table="producto";

    //Especifico la clave de la tabla
    protected $primaryKey="cod";
    protected $keyType="string";
    public $incrementing=false;
// Si no tengo los campos create_at update_at
    public $timestamps = false;

}
