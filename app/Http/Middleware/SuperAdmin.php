<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        $loggedRole = Auth::user()->user_type_id;

        if($loggedRole == 1)
        {
            return $next($request);
        }
        elseif ($loggedRole == 2)
        {
            return redirect()->route('admin.dashboard');
        }
        elseif ($loggedRole == 3)
        {
            return redirect()->route('user.dashboard');
        }

    }
}