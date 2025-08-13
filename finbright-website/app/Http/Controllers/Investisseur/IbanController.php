<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PspIbanService;

class IbanController extends Controller
{
    public function form() { return view('back.investisseur.iban.form'); }

    public function store(Request $request, PspIbanService $psp)
    {
        $request->validate(['iban' => 'required|string|max:34']); // affine le pattern si besoin
        $user = Auth::user();

        // Appel PSP
        $result = $psp->submitIban((string)$user->id, $request->iban);

        $user->iban = $request->iban;
        $user->iban_status = strtolower($result['status'] ?? 'pending');
        if (!empty($result['psp_account_id'])) {
            $user->psp_account_id = $result['psp_account_id'];
        }
        $user->save();

        return back()->with(
            $user->iban_status === 'validated' ? 'success' : 'error',
            $user->iban_status === 'validated'
                ? 'IBAN vérifié avec succès.'
                : 'IBAN rejeté par le PSP (test).'
        );
    }
}