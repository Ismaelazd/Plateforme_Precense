<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class notMember
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
        if ((1 == Auth::user()->role_id)) {
            return redirect()->back()->withErrors(['msg'=>"Tu n'es pas connecté ou ne possède pas les droits necessaires. Tips: demande à passer lecteur pour pouvoir lire nos articles"]);
        } else {
            return $next($request);
        }   
    }
}
