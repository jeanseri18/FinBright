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
        // dd($user);

        if ($user->hasRole('emprunteur')) {
            $address = $user->address ?? [];

            if (
                !$user->is_profile_completed
                // !isset($user->birth_date) ||
                // !isset($user->birth_place) ||
                // !isset($user->nationality) ||
                // !isset($user->diploma) ||
                // !isset($address['address']) ||
                // !isset($address['ville'])
            ) {
                return redirect()->route('profil.mon-profil');
            }
        }

        return $next($request);
    }
}