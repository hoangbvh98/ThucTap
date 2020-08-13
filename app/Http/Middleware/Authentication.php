<?php

namespace App\Http\Middleware;

use Closure;

class Authentication
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
        if($request->header('token')){
            if($request->header('token') == 'demo_token'){
                return $next($request);
            }
            else{
                return redirect('error');
            }
        }
        else{
            return redirect('error');
        }
        
    }
}
