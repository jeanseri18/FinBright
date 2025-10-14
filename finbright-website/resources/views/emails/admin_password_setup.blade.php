<x-mail::message>
# Bonjour {{ $fullname }},

Un compte administrateur a été créé pour vous sur la plateforme **{{ config('app.name') }}**.

Avant de pouvoir vous connecter, veuillez définir votre mot de passe :

<x-mail::button :url="$link">
Définir mon mot de passe
</x-mail::button>

Ce lien est unique et ne doit pas être partagé.

Merci,  
L’équipe {{ config('app.name') }}
</x-mail::message>