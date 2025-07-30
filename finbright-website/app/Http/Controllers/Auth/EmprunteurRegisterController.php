<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmprunteurRegisterController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function showForm()
    {
        return view('auth.register-emprunteur');
    }

    /**
     * Enregistre un utilisateur et le connecte.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'prenoms' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'last_name' => $validated['nom'],
            'first_name' => $validated['prenoms'],
            'email' => $validated['email'],
            'created_at' => new \DateTime(),
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole('emprunteur');
        Auth::login($user);

        return redirect()->route('emprunteur.mon-profil');
    }
}