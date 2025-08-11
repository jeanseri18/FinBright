<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TwoFactorAuthentication;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

class TwoFactorController extends Controller
{
    public function show(AuthenticatedSessionController $authenticatedSession)
    {
        if (Session::get('2fa_passed')) return $authenticatedSession->redirectByRole(Auth::user());
        return view('auth.2fa');
    }

    public function verify(Request $request, AuthenticatedSessionController $authenticatedSession)
    {
        $request->validate(['code' => 'required|numeric']);
        
        /** @var User $user */
        $user = Auth::user();
        $twoFA = $user->twoFactor;

        if ($twoFA && $twoFA->code == $request->code && now()->lt($twoFA->expires_at)) {
            $twoFA->resetCode();
            Session::put('2fa_passed', true);
            return $authenticatedSession->redirectByRole($user);
        }

        return back()->withErrors(['code' => 'Code incorrect ou expiré.']);
    }

    public function resend()
    {
        /** @var User $user */
        $user = Auth::user();
        $twoFA = $user->twoFactor;

        if ($twoFA && now()->lt($twoFA->expires_at)) {
            return back()->with('status', 'Attendez 60 secondes avant de renvoyer le code.');
        }

        $twoFA ??= $user->twoFactor()->create();
        $twoFA->generateCode();

        return back()->with('status', 'Nouveau code envoyé.');
    }
}
