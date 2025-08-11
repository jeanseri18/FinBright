<x-mail::message>
# Code de vérification

Bonjour {{ $user->first_name }},

Votre code de vérification à six chiffres pour votre compte Fin'Bright est :

<h1 style="text-align: center; font-size: 24px; letter-spacing: 2px;">{{ $user->twoFactor->code }}</h1>

Ce code est valide pour les 60 prochaines secondes.

Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.

Merci,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
