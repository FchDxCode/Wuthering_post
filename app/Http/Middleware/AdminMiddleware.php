<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            Log::info('AdminMiddleware passed');
            return $next($request);
        }

        Log::info('AdminMiddleware failed');
        dd('User is not an admin.'); 

        return redirect('/');
    }
}
