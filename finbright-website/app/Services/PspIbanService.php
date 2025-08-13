<?php

namespace App\Services;

class PspIbanService
{
    /**
     * Simule un call PSP pour enregistrer/valider l’IBAN.
     * Retourne ['status' => 'validated'|'pending'|'rejected', 'psp_account_id' => '...']
     */
    public function submitIban(string $userId, string $iban): array
    {
        // TODO branche réelle Stripe/MangoPay ici
        // Stub simple : valider si IBAN commence par FR/BE/DE etc.
        $ok = preg_match('/^(FR|BE|DE|ES|IT|NL|PT|LU)/i', $iban);
        return [
            'status' => $ok ? 'validated' : 'rejected',
            'psp_account_id' => $ok ? 'psp_acc_'.$userId : null,
        ];
    }
}