<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'placa', 'modelo', 'marca','habilitado','km_total'
    ];
    
    public $primaryKey = 'placa';
    
    public $incrementing = false;

    public $table = 'vehiculos';
    
}
