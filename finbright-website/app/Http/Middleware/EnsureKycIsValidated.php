<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureKycIsValidated
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user || $user->kyc_status !== 'Validé') {
            return redirect()->route('investisseur.profil')
                ->with('error', 'Veuillez compléter vos informations pour accéder à cette section.');
        }
        return $next($request);
    }
}