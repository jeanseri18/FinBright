<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedByRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            /** @var User $user */
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->hasRole('emprunteur')) {
                return redirect()->route('emprunteur.dashboard');
            }

            if ($user->hasRole('investisseur')) {
                return redirect()->route('investisseur.dashboard');
            }
        }

        return $next($request);
    }
}