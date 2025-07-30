<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureProfileIsCompleted
{
    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->hasRole('emprunteur')) {
            $data = $user->extra_data ?? [];

            if (
                !isset($data['categorie_socio_pro']) ||
                !isset($data['piece_identite']) ||
                !isset($data['justificatif_domicile']) ||
                !isset($data['justificatif_revenus'])
            ) {
                // return redirect()->route('emprunteur.mon-profil');
                return true;
            }
        }

        return $next($request);
    }
}