<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class revision_calendarizada extends Model
{
    //
    public $timestamps = false;

    protected $fillable = ['nombre','estado','km_inicial','km_revision','detalle'];
}
