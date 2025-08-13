<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InvestisseurRegisterController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function showForm()
    {
        return view('auth.register-investisseur');
    }

    /**
     * Enregistre un utilisateur et le connecte.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'created_at' => new \DateTime(),
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole('investisseur');
        $twoFA = $user->twoFactor()->create(['is_enabled' => true]);
        $twoFA->generateCode();

        Auth::login($user);

        return redirect()->route('2fa.verify.form');
    }
}