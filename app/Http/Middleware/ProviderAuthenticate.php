<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
class ProviderAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
       
        if (! $request->expectsJson()) {
           
           
            
            return URL::to("provider/login");
            
        }
    }
     protected function authenticate($request, array $guards)
     {
          
       
            if ($this->auth->guard('provider')->check()) {
                return $this->auth->shouldUse('provider');
            }
        
        $this->unauthenticated($request,['provider']);
    }
}