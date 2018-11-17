<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $primaryKey = 'pk_solicitud';
    protected $fillable = ['pk_solicitud','fk_usuario','titulo','descropcion','categoria','estado','riesgo','monto_requerido','monto_juntado','interes','tiempo_recaudacion','tiempo_devolucion'];
}
