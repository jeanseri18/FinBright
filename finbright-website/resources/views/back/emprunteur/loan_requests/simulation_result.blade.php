@extends('back.emprunteur.layouts')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h2 class="text-lg font-semibold mb-4">Résultat de la simulation</h2>
    <ul class="list-disc pl-6">
        <li>Montant : <strong>{{ $amount }} €</strong></li>
        <li>Durée : <strong>{{ $duration }} mois</strong></li>
        <li>Mensualité estimée : <strong>{{ $mensualite }} €</strong></li>
        <li>Montant total remboursé : <strong>{{ $total }} €</strong></li>
    </ul>
</div>
@endsection