<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;

class CheckDebugbar
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
        // dump(\Auth::user(), session()->all()); // Verifica o usuário autenticado e os dados da sessão

        // \Debugbar::disable();

        // if(\Auth::check() && \Auth::user()->id == 2)        
        // {
        //     \Debugbar::enable();
        // }
        
        return $next($request);
    }
}
