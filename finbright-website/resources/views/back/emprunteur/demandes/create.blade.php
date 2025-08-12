@extends('back.emprunteur.layouts')

@section('title', 'Soumettre un demande')

@section('content')
    <div class="mb-5 lg:mb-10">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-2.5">
            <div class="flex items-center flex-wrap gap-3 lg:gap-5">
                <h1 class="font-medium text-lg text-mono">Soumettre une demande de prêt</h1>
            </div>
            <div class="flex items-center gap-1">
                <a class="kt-btn kt-btn-outline flex gap-1.5" href="">
                    <i class="ki-filled ki-exit-left text-destructive"></i>
                    Annuler la demande
                </a>
            </div>
        </div>
        <!-- End of Container -->
    </div>
            
    <!-- Container -->
    <div class="kt-container-fixed" id="contentContainer">
    </div>
    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-2">
                <div class="kt-card min-w-full pb-2.5">
                    <div class="kt-card-content grid gap-5">
                        <form action="{{ route('emprunteur.save.demande') }}" method="post" enctype="multipart/form-data" class="kt-form">
                            @csrf
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Objet de la demande
                                </label>
                                <input class="kt-input" type="text" name="object" placeholder="Entrer un libellé" />
                            </div>
                            @if (session('debt_result.revenus_actuels') > 0)
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Justificatif de révenus
                                </label>
                                <input class="kt-input" type="file" name="justify_rent" multiple />
                            </div>
                            @endif
                            @if (session('debt_result.dettes') > 0)
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Justificatif de dettes
                                </label>
                                <input class="kt-input" type="file" name="justify_debt" multiple />
                            </div>
                            @endif
                            <div class="flex items-start flex-wrap lg:flex-nowrap gap-2.5 mb-2.5">
                                <label class="kt-form-label max-w-56">
                                    Détails de la demande
                                </label>
                                <textarea class="kt-textarea w-full" rows="10" name="description" placeholder="On vous écoute..."></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="kt-btn kt-btn-primary">
                                    Soumettre la demande
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Données de simulation
                            </h3>
                        </div>
                        <div class="kt-card-table kt-scrollable-x-auto pb-3">
                            <table class="kt-table align-middle text-sm text-muted-foreground" id="general_info_table">
                                <tr>
                                    <td class="min-w-56 text-secondary-foreground font-normal">
                                        Date de début :
                                    </td>
                                    <td class="min-w-48 w-full text-foreground font-normal">
                                        {{ session('simulate_result.date_debut') ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Montant :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('simulate_result.amount') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Durée :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('simulate_result.duration') ?? null }} mois
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Coût des intérêts :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('simulate_result.interets') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Coût de l'assurance :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('simulate_result.assurances') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Coût total du prêt :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('simulate_result.total') ?? null }} €
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Taux d’endettement
                            </h3>
                        </div>
                        <div class="kt-card-table kt-scrollable-x-auto pb-3">
                            <table class="kt-table align-middle text-sm text-muted-foreground" id="general_info_table">
                                <tr>
                                    <td class="min-w-56 text-secondary-foreground font-normal">
                                        Revenus actuels :
                                    </td>
                                    <td class="min-w-48 w-full text-foreground font-normal">
                                        {{ session('debt_result.revenus_actuels') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Revenus potentiel :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('debt_result.revenus_futurs') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Soutien ou garant :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('debt_result.garant') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Autres dettes :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('debt_result.dettes') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Autres charges :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('debt_result.charges') ?? null }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Taux d’endettement :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('debt_result.taux_endettement') ?? null }} %
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
@endsection

@section('javascripts')
@endsection
