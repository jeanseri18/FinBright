@extends('back.investisseur.layouts')

@section('content')
<div class="kt-card max-w-xl mx-auto">
    <div class="kt-card-header"><h3>Déclarer IBAN</h3></div>
    <div class="kt-card-content">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <form method="POST" action="{{ route('investisseur.iban.store') }}" class="space-y-4">
            @csrf
            <label class="kt-label">IBAN
                <input type="text" name="iban" class="kt-input" placeholder="FR76..." required>
            </label>
            <button class="kt-btn kt-btn-primary">Valider</button>
        </form>
    </div>
</div>
@endsection