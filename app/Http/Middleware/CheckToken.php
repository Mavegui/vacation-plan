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
        // Check if the session has a token
        if (!session()->has('token')) {
            // Redirect to home page if no token is present
            return redirect()->route('site.home');
        }

        // Get the token from the session
        $token = session('token');

        // Set the token in the Authorization header of the request
        $request->headers->set('Authorization', 'Bearer ' . $token);

        // Pass the request to the next middleware or controller
        return $next($request);
    }
}
