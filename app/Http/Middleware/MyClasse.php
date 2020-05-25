<?php

namespace App\Http\Middleware;

use App\Classe;
use Closure;
use Illuminate\Support\Facades\Auth;

class MyClasse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $classe)
    {
        dd($classe);
        if ((2 == Auth::user()->role_id && Auth::user()->classe_id == $classe->id) || 1 == Auth::user()->role_id) {
            return $next($request);
        } else {
            return redirect()->back()->withErrors(['msg'=>"Tu n'es pas connecté ou ne possède pas les droits necessaires. Tips: demande à passer lecteur pour pouvoir lire nos articles"]);
        } 
    }
}
