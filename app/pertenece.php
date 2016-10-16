<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertenece extends Model
{
    //
    public $timestamps = false;
    
    
    protected $fillable = ['id_vehiculo','placa_vehiculo', 'Km_inicial'];
}
