<?php

namespace App\Http\Middleware;

use Closure;

class tipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->puesto == 1){
            redirect('/');
        }elseif ($request->user()->puesto == 2){
            redirect(Taller);
        }else{
            redirect(VistaChofer);
        }
    }


}
