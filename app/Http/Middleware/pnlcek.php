<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class pnlcek
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
         if(!Session::get('login')){
            return redirect('/')->with('failed', 'You must Login First!');
        }
        else {
            $role = Session::get('role');
            if ($role == "2" || $role =="1"){
                return redirect('/dashboard')->with('coba', 'Permission Denied');
            }
        }
        return $next($request);
    }
}
