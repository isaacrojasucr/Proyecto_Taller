<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class revision_calendarizada extends Model
{
    //

    protected $fillable = ['nombre','estado','km_inicial','km_revision','detalle'];
}
