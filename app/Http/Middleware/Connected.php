<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Connected
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
        
        if ((Auth::check())) {
            return $next($request);
        } else {
            return redirect()->back()->withErrors(['msg'=>"Tu n'es pas connecté ou ne possède pas les droits necessaires. Tips: demande à passer lecteur pour pouvoir lire nos articles"]);
        }    
    }
}
