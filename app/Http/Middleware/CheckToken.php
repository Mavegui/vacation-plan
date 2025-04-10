<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * This method checks if a session token is present. If a token is found,
     * it is set in the Authorization header of the request. If no token is found,
     * the user is redirected to the home page.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming request instance.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next  The next middleware in the stack.
     * @return \Symfony\Component\HttpFoundation\Response  The response from the next middleware or the redirect response.
     */
    public function handle(Request $request, Closure $next): Response
    {    
        
        if (!session()->has('token')) {
            return redirect()->route('site.home');
        }

        $token = session('token');
        $request->headers->set('Authorization', 'Bearer ' . $token);

        return $next($request);
    }
}
