<?php
// app/Helpers/helpers.php

use Illuminate\Support\Str;

if (! function_exists('splitPhoneNumber')) {
    /**
     * Découpe un numéro en [prefix, localNumber].
     *
     * @param string|null $phone       Numéro complet stocké (ex: "+33 6 12 34 56 78" ou "0033612345678" ou "33612345678")
     * @param array $indicatifs        Tableau d'indicatifs (élément ['value' => '+33', ...])
     * @param string $defaultPrefix    Préfixe par défaut si aucun indicatif ne matche (ex: '+33')
     * @return array [prefixNormalized('+33'), localNumber (sans le préfixe)]
     */
    function splitPhoneNumber(?string $phone, array $indicatifs = [], string $defaultPrefix = '+33'): array
    {
        $phone = trim((string) $phone);
        $normalized = preg_replace('/[^\d+]/', '', $phone); // enlever espaces, parenthèses, tirets

        if ($normalized === '') {
            return [$defaultPrefix, ''];
        }

        // Trier les indicatifs par longueur décroissante pour matcher les plus longs d'abord
        usort($indicatifs, fn($a, $b) => strlen($b['value']) - strlen($a['value']));

        foreach ($indicatifs as $ind) {
            $val = (string) ($ind['value'] ?? '');
            $digits = ltrim($val, '+'); // ex: '33'
            if ($val === '') continue;

            // formes possibles dans la DB / saisie : "+33", "33", "0033"
            $forms = [
                '+' . $digits,
                $digits,
                '00' . $digits,
            ];

            foreach ($forms as $form) {
                if (Str::startsWith($normalized, $form)) {
                    $prefix = '+' . $digits; // normaliser toujours avec '+'
                    $local = substr($normalized, strlen($form));
                    // ne pas supprimer les zéros locaux automatiquement — on retourne tel quel
                    return [$prefix, $local !== false ? $local : ''];
                }
            }
        }

        // Si aucun indicatif explicite ne match, extraire 1 à 4 premiers chiffres comme indicatif probable
        if (preg_match('/^\+?(\d{1,4})/', $normalized, $m)) {
            $prefix = '+' . $m[1];
            $startLen = strlen($m[0]);
            $local = substr($normalized, $startLen);
            return [$prefix, $local !== false ? $local : ''];
        }

        // fallback
        return [$defaultPrefix, $normalized];
    }
}

if (! function_exists('buildPhoneNumber')) {
    /**
     * Reconstruit le numéro complet à partir du préfixe et du numéro local.
     *
     * @param string $prefix    ex: '+33' ou '33'
     * @param string $local     ex: '612345678'
     * @return string           ex: '+33612345678'
     */
    function buildPhoneNumber(string $prefix, string $local): string
    {
        $p = trim($prefix);
        $p = $p === '' ? '+33' : (Str::startsWith($p, '+') ? $p : ('+' . ltrim($p, '0')));

        $localNormalized = preg_replace('/[^\d]/', '', (string)$local);

        return $p . $localNormalized;
    }
}