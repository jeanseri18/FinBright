<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedByRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
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

            return abort(403, 'Rôle non reconnu.');
        }

        return $next($request);
    }
}