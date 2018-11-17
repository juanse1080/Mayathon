<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'pk_usuario';
    protected $fillable = ['nombre','apellido','correo','password','cedula','fecha_nacimiento','nivel','pasivos','activos','empresa'];

    public function session(){
        return $this->attributes;
    }
}
