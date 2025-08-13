<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Files;

class InvestorKycController extends Controller
{
    public function form()
    {
        $user = Auth::user();
        return view('back.investisseur.kyc.form', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Exemple de KYC minimal : identité + domicile
        $validated = $request->validate([
            'identity_doc' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'proof_address' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Upload + enregistrement Files (réutilise ta logique existante)
        foreach (['identity_doc' => 'Pièce identité', 'proof_address' => 'Justif. domicile'] as $field => $alt) {
            $f = $request->file($field);
            if ($f && $f->isValid()) {
                $path = $f->store('kyc', 'public');
                Files::create([
                    'filename' => $path,
                    'alt' => $alt,
                    'type' => $f->extension(), // adapte à ton enum
                    'filesize' => $f->getSize(),
                ]);
            }
        }

        // Marquer KYC en pending (validation manuelle admin, ou auto si tu veux)
        $user->kyc_status = 'pending';
        $user->save();

        return redirect()->route('investisseur.kyc.form')
            ->with('success', 'KYC soumis. En attente de validation.');
    }

    // (Optionnel) Validation par admin ailleurs.
}