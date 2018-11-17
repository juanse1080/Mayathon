<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inversion extends Model {
    protected $table = 'inversion';
    protected $primaryKey = 'pk_inversion';
    protected $fillable = ['pk_inversion', 'fk_solicitud','monto'];
}
