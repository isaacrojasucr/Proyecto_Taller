<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repuesto extends Model
{
    //
    protected $fillable = [
        'nombre', 'vida_util', 'km_inicial','cantidad','placa_vehiculo'
    ];

    protected $table = 'repuestos';
    
    public $timestamps = false;


}
