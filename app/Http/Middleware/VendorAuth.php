<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class VendorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (empty(Auth::user())) {
            return redirect()->route('/admin')->with('error', 'Please log in to access this page.');
        } 
        elseif(Auth::user()->roles_id=="5"){
          return $next($request);
        } else {
            abort(404);
           exit();
        }
        //return $next($request);
    }
}
