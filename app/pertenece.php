<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertenece extends Model
{
    //
    public $incrementing = false;
    public $primaryKey = '';
    public $timestamps = false;
    
    
    protected $fillable = ['id_vehiculo','placa_vehiculo'];
}
