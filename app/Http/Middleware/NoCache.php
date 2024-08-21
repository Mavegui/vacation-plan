<?php

namespace App\Http\Middleware;

use Closure;

class NoCache
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
        // Pass the request to the next middleware or controller
        $response = $next($request);

        // Set Cache-Control headers to prevent caching
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        // Set Pragma header for HTTP/1.0 compatibility
        $response->headers->set('Pragma', 'no-cache');
        // Set Expires header to a past date to prevent caching
        $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        // Return the modified response
        return $response;
    }
}
