@extends('back.investisseur.layouts')

@section('content')
<div class="kt-card max-w-xl mx-auto">
    <div class="kt-card-header"><h3>KYC Investisseur</h3></div>
    <div class="kt-card-content">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <form method="POST" action="{{ route('investisseur.kyc.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <label class="kt-label">Pièce d’identité
                <input type="file" name="identity_doc" class="kt-input" required>
            </label>
            <label class="kt-label">Justificatif de domicile
                <input type="file" name="proof_address" class="kt-input" required>
            </label>
            <button class="kt-btn kt-btn-primary">Soumettre</button>
        </form>
    </div>
</div>
@endsection