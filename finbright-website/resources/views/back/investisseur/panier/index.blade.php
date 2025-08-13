@extends('back.investisseur.layouts')

@section('content')
<div class="kt-card">
    <div class="kt-card-header"><h3>Mon panier d’investissement</h3></div>
    <div class="kt-card-content space-y-4">
        @foreach($items as $item)
            <div class="flex justify-between border rounded p-3">
                <div>
                    <div class="font-semibold">Projet #{{ $item->loanRequest->id }} — {{ number_format($item->amount, 0, ',', ' ') }} €</div>
                    <div class="text-sm text-muted">Montant projet : {{ number_format($item->loanRequest->amount, 0, ',', ' ') }} €</div>
                </div>
                <div class="flex gap-2">
                    <form method="POST" action="{{ route('investisseur.panier.update', $item) }}">
                        @csrf
                        <input name="amount" type="number" min="50" step="50" value="{{ $item->amount }}" class="kt-input w-32">
                        <button class="kt-btn kt-btn-secondary">Mettre à jour</button>
                    </form>
                    <form method="POST" action="{{ route('investisseur.panier.remove', $item) }}">
                        @csrf @method('DELETE')
                        <button class="kt-btn kt-btn-danger">Retirer</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="text-right font-bold">Total : {{ number_format($total, 0, ',', ' ') }} €</div>

        <form method="POST" action="{{ route('investisseur.panier.checkout') }}" class="text-right">
            @csrf
            <button class="kt-btn kt-btn-primary">Passer au paiement (simulation)</button>
        </form>
    </div>
</div>
@endsection