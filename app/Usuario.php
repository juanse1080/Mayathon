<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable {

    use Notifiable;
    protected $table = 'usuario';
    protected $primaryKey = 'pk_usuario';
    protected $fillable = ['nombre','apellido','correo','password','cedula','fecha_nacimiento','nivel','pasivos','activos','empresa'];

    public function session(){
        return $this->attributes;
    }
}
