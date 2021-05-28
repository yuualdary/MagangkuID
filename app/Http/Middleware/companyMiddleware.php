<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class companyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        if(Auth::user()->isCompany()){
            return $next($request);
        }
        abort(403);
    }
}
