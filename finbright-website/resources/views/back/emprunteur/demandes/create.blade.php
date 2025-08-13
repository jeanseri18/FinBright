@extends('back.emprunteur.layouts')

@section('title', 'Soumettre un demande')

@section('content')
    <div class="mb-5 lg:mb-10">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-2.5">
            <div class="flex items-center flex-wrap gap-3 lg:gap-5">
                <h1 class="font-medium text-lg text-mono">{{ $loan ? 'Modifier la' : 'Soumettre une' }} demande de prêt</h1>
            </div>
            <div class="flex items-center gap-1">
                <a class="kt-btn kt-btn-outline flex gap-1.5" href="{{ route('emprunteur.mes-demandes') }}">
                    <i class="ki-filled ki-exit-left text-destructive"></i>
                    {{ $loan ? 'Annuler la modification' : 'Annuler la demande' }}
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
                                    Titre de votre projet
                                </label>
                                <input class="kt-input" type="text" name="object" placeholder="Expl: Financez mon Master en IA à Polytechnique pour devenir Data Scientist" value="{{$loan->object ?? null}}" />
                            </div>
                            @if (session('debt_result.revenus_actuels') > 0 || ($loan->debt_params && $loan->debt_params['revenus_actuels'] > 0))
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Justificatif de révenus
                                    </label>
                                    <input class="kt-input" type="file" name="justify_rent" multiple required />
                                </div>
                            @endif
                            @if (session('debt_result.dettes') > 0 || ($loan->debt_params && $loan->debt_params['dettes'] > 0))
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Justificatif de dettes
                                </label>
                                <input class="kt-input" type="file" name="justify_debt" multiple required />
                            </div>
                            @endif
                            <div class="flex items-start flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Description du projet
                                </label>
                                <textarea class="kt-textarea w-full" rows="15" name="description" required placeholder="Décrivez votre parcours et vos ambitions professionnelles. Soyez fier de qui vous êtes et de votre motivation ! (max. 1500 caractères)">{{$loan->description ?? null}}</textarea>
                            </div>
                            <div class="flex items-start flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Explication du projet
                                </label>
                                <textarea class="kt-textarea w-full" rows="10" name="explication" required placeholder="Expliquez en quoi ce prêt est un levier essentiel pour la réussite de vos études et de votre projet. (max. 1000 caractères)">{{$loan->explication ?? null}}</textarea>
                            </div>
                            <div class="flex items-start flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Mettez-vous en valeur (facultatif)
                                </label>
                                <textarea class="kt-textarea w-full" rows="5" name="presentation" placeholder="Parlez-nous de vos passions, de vos engagements associatifs ou de vos expériences passées. (max. 500 caractères)">{{$loan->presentation ?? null}}</textarea>
                            </div>
                            @if (!$loan)
                            <div class="flex items-center gap-2 mt-8">
                                <input type="checkbox" name="cgu" class="kt-checkbox" id="cgu" value="1" />
                                <label class="kt-label inline-block" for="cgu">
                                    Je reconnais avoir lu et accepté les <a class="kt-link kt-link-underlined kt-link-dashed" href="">Conditions Générales d'Utilisation</a>.
                                </label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="infos_fournis" class="kt-checkbox" id="infos_fournis" value="1" />
                                <label class="kt-label inline-block" for="infos_fournis">
                                    Je comprends et accepte que les informations fournies dans ce formulaire seront utilisées par Fin'Bright pour évaluer ma demande de prêt et, en cas d'acceptation, pour créer un profil de projet qui sera visible par la communauté des prêteurs inscrits sur la plateforme.
                                </label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="declare_honneur" class="kt-checkbox" id="declare_honneur" value="1" />
                                <label class="kt-label" for="declare_honneur">Je certifie sur l'honneur que toutes les informations et tous les documents fournis dans le cadre de cette demande sont exacts, complets et sincères.</label>
                            </div>
                            @endif
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
                                        {{ session('simulate_result.date_debut') ?? $loan->simulation_result['date_debut'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Montant :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('simulate_result.amount') ?? $loan->simulation_result['amount'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Durée :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('simulate_result.duration') ?? $loan->simulation_result['duration'] }} mois
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Coût des intérêts :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('simulate_result.interets') ?? $loan->simulation_result['interets'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Coût de l'assurance :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('simulate_result.assurances') ?? $loan->simulation_result['assurances'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Coût total du prêt :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('simulate_result.total') ?? $loan->simulation_result['total'] }} €
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
                                        {{ session('debt_result.revenus_actuels') ?? $loan->debt_params['revenus_actuels'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Revenus potentiel :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('debt_result.revenus_futurs') ?? $loan->debt_params['revenus_futurs'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Soutien ou garant :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('debt_result.garant') ?? $loan->debt_params['garant'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Autres dettes :
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ session('debt_result.dettes') ?? $loan->debt_params['dettes'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Autres charges :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('debt_result.charges') ?? $loan->debt_params['charges'] }} €
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Taux d’endettement :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('debt_result.taux_endettement') ?? $loan->debt_params['taux_endettement'] }} %
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
