<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!$request->user()->status)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');
        }elseif ($request->user()->role !== $role)
        {
            return redirect()->back();
        }

        return $next($request);
    }
}
