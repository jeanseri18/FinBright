<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminPasswordResetController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Lien invalide ou déjà utilisé.']);
        }

        // Vérifie la correspondance du token
        if (!Hash::check($request->token, $record->token)) {
            return back()->withErrors(['token' => 'Le lien de réinitialisation est invalide.']);
        }

        return view('back.admin.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Admin $admin, $password) {
                $admin->forceFill([
                    'password' => Hash::make($password),
                    'status' => 'Actif',
                ])->save();

                Auth::guard('admin')->login($admin);
            }
        );

        // Supprime le token pour empêcher toute réutilisation
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.dashboard')->with('success', 'Mot de passe défini avec succès. Bienvenur sur votre tableau de bord.')
            : back()->withErrors(['email' => __($status)]);
    }
}