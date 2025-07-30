<?php

namespace App\Http\Controllers\Emprunteur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmprunteurController extends Controller
{
    public function index()
    {
        return view('back.emprunteur.dashboard');
    }

    /**
     * Affiche le formulaire de simulation.
     */
    public function profil()
    {
        return view('back.emprunteur.mon-profil');
    }

    /**
     * Enregistrement des pièces justificatives et infos.
     */
    public function saveProfil(Request $request)
    {
        $request->validate([
            'categorie_socio_pro' => 'required|string|max:255',
            'piece_identite' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'justificatif_domicile' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'justificatif_revenus' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $user = Auth::user();

        // Uploads
        $user->extra_data = [
            'categorie_socio_pro' => $request->categorie_socio_pro,
            'piece_identite' => $request->file('piece_identite')->store('documents/emprunteurs/piece_identite', 'public'),
            'justificatif_domicile' => $request->file('justificatif_domicile')->store('documents/emprunteurs/justificatif_domicile', 'public'),
            'justificatif_revenus' => $request->file('justificatif_revenus')->store('documents/emprunteurs/justificatif_revenus', 'public'),
        ];

        $user->save();

        return redirect()->route('emprunteur.dashboard')->with('success', 'Profil complété avec succès.');
    }
}