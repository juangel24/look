<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class ValidateUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
    //  * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Session::get('usuario');
        if ($user){
            return $next($request); 
            
        }
        return redirect('/');
        
    }
}
