@extends('back.emprunteur.layouts')

@section('title', 'Simulateur')

@section('content')
    <!-- Container -->
    <div class="kt-container-fixed" id="contentContainer">
    </div>
    <!-- End of Container -->
    <style>
        .hero-bg {
            background-image: url("{{asset('assets/media/images/2600x1200/bg-1.png')}}");
        }

        .dark .hero-bg {
            background-image: url("{{asset('assets/media/images/2600x1200/bg-1-dark.png')}}");
        }
    </style>

    @include('back.emprunteur._profile_container')

    <!-- Container -->
    <div class="kt-container-fixed space-y-8">
        <!-- begin: grid -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-lg text-mono font-semibold">Simulation de prêt</h3>
            </div>
        </div>
        <div id="network_cards">
            <div class="grid gap-5 lg:gap-7.5">
                <div class="kt-card">
                    <div class="kt-card-content lg:pt-9 lg:pb-7.5 max-w-2xl mx-auto mt-10">
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
                </div>
            </div>
        </div>
    </div>
@endsection