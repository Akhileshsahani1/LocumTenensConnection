<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Session;
class ProviderRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
        
    //   if(!Session()->has('loginId')){
    //         return redirect('provider-login')->with('fail',"you have to login first");
    //     }

    //    return $next($request);
    // }

    public function handle(Request $request, Closure $next, ...$guards)
    {
       
            if (Auth::guard('provider')->check()) {
                 
                return redirect()->route('provider.dashboard');
            }
        

        return $next($request);
    }

}
