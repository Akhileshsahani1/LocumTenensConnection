<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
class ProviderAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
        // if(Session()->has('loginId') && (url('provider/provider-login')  == $request->url()  || url('provider/provider-create') || url('provider/provider-forget-password') || url('provider/provider-resetPassword')  == $request->url()))
        // {

        //     //return back();
        //     return redirect('/');
        // }

        protected function redirectTo($request)
        {
           
            if (! $request->expectsJson()) {
               
                // Redirect::to('practice.home');
                return redirect('/');
                // return redirect('/practicehome');
            }
        }
         protected function authenticate($request, array $guards)
         {
              
           
                if ($this->auth->guard('provider')->check()) {
                    return $this->auth->shouldUse('provider');
                }
            
            $this->unauthenticated($request,['provider']);
        }

        
    //     return $next($request);
    // }
}
