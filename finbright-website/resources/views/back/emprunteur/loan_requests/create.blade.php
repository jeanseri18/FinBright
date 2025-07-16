@extends('back.emprunteur.layouts')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-xl font-bold mb-6">Simulation de prêt</h1>
    <form action="{{ route('emprunteur.loan-requests.simulate') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="type" class="block font-medium">Type de prêt</label>
            <select name="type" id="type" class="w-full border p-2 rounded">
                <option value="student">Prêt étudiant</option>
                <option value="mini">Mini-prêt</option>
            </select>
        </div>

        <div>
            <label for="amount" class="block font-medium">Montant (€)</label>
            <input type="number" name="amount" class="w-full border p-2 rounded" required min="500">
        </div>

        <div>
            <label for="duration" class="block font-medium">Durée (mois)</label>
            <input type="number" name="duration" class="w-full border p-2 rounded" required min="6" max="60">
        </div>

        <div>
            <label>
                <input type="checkbox" name="deferred" value="1" class="mr-2">
                Différé partiel (étudiants)
            </label>
        </div>

        <div>
            <label for="deferred_months" class="block font-medium">Durée différé (mois)</label>
            <input type="number" name="deferred_months" class="w-full border p-2 rounded" min="0" max="36">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simuler</button>
    </form>
</div>
@endsection