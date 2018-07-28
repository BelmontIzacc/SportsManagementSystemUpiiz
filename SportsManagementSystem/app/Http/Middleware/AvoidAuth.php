<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AvoidAuth
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
    	if(Auth::check() && Auth::user()->tipo() == 1){
        return redirect('/admin');
      } else if(Auth::check() && Auth::user()->tipo() == 3){
        return redirect('/coord');
      }else{
          return redirect('/');
      }

        return $next($request);
    }
}
