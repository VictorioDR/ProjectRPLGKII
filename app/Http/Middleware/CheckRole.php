<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        //Ambil guard dari parameter rute atau gunakan guard default
        $guard = $request->route()->parameter('guard', 'web');

        if (Auth::guard($guard)->check()) {
            $userRole = Auth::guard($guard)->user()->role;

        //Pastikan hanya peran yang diizinkan yang dapat di akses
        if (in_array($userRole, $roles)) {
            return $next($request);
        }
    }

        return redirect()->route('dashboard.index')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
