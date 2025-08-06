<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $twoFA = $user->twoFactor;

            if (
                $twoFA &&
                $twoFA->is_enabled &&
                $twoFA->code &&
                now()->lt($twoFA->expires_at) &&
                !$twoFA->confirmed_at &&
                !$request->is('2fa') && !$request->is('2fa/*')
            ) {
                return redirect()->route('2fa.verify.form');
            }
        }

        return $next($request);
    }
}
