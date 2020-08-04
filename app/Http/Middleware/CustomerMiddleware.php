<?php

namespace App\Http\Middleware;

use Closure;

class CustomerMiddleware
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
        if($this->auth->guest()){
            return redirect('login');
        }
        elseif($this->auth->user()->is_admin===1){
            return redirect('home');
        }

        return $next($request);
    }
}
