<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\TwoFactorAuthentication;

class TwoFactorController extends Controller
{
    public function show()
    {
        return view('auth.2fa');
    }

    public function verify(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);
        
        /** @var User $user */
        $user = Auth::user();
        $twoFA = $user->twoFactor;

        if ($twoFA && $twoFA->code == $request->code && now()->lt($twoFA->expires_at)) {
            $twoFA->resetCode();
            Session::put('2fa_passed', true);
            return redirect()->intended('/mon-profil');
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
