<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Redirection selon le rôle
        if ($user->hasRole('admin')) {
            return redirect()->intended('/admin/dashboard');
        }

        if ($user->hasRole('emprunteur')) {
            return redirect()->intended('/emprunteur/dashboard');
        }

        if ($user->hasRole('investisseur')) {
            return redirect()->intended('/investisseur/dashboard');
        }

        // Redirection par défaut
        return redirect()->intended('/');
    }
}