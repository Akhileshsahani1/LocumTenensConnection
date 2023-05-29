<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PracticeAuthenticate extends Middleware
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
           
            
              return URL::to("practice/Welcome");
          
        }
    }
     protected function authenticate($request, array $guards)
     {
          
       
            if ($this->auth->guard('practice')->check()) {
                return $this->auth->shouldUse('practice');
            }
        
        $this->unauthenticated($request,['practice']);
    }
}