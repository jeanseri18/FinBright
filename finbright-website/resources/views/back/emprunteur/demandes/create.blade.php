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
                <a class="kt-btn kt-btn-outline flex gap-1.5" href="{{route('emprunteur.loan-requests.details', ['loan' => Auth::user()->loanRequests ? Auth::user()->loanRequests->last() : null])}}">
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
                        <form action="{{ route('emprunteur.save.demande', ['loanId' => $loan->id ?? null]) }}" method="post" enctype="multipart/form-data" class="kt-form">
                            @csrf
                            @if ($errors->any())
                                <div class="kt-alert kt-alert-light kt-alert-destructive" id="alert_4">
                                    <div class="kt-alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" aria-hidden="true">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 16v-4"></path>
                                            <path d="M12 8h.01"></path>
                                        </svg>
                                    </div>
                                    <div class="kt-alert-title">
                                        <ul class="list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Titre de votre projet
                                </label>
                                <input class="kt-input" type="text" name="object" placeholder="Expl: Financez mon Master en IA à Polytechnique pour devenir Data Scientist" value="{{$loan->object ?? null}}" required />
                            </div>
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56" data-kt-tooltip="true" data-kt-tooltip-placement="top-end">
                                    Durée de la campagne
                                    <i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>
                                    <span data-kt-tooltip-content="true" class="kt-tooltip">
                                        <span class="flex items-center gap-1.5"><i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>La durée est modifiable que 2 fois,</span>
                                        <span class="flex items-center gap-1.5"><i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>Elle est de maximum 9 mois après le début de la campagne,</span>
                                        <span class="flex items-center gap-1.5"><i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>Elle est uniquement modifiable que 7 jours avant la fin de la campagne</span>
                                    </span>
                                </label>
                                <div class="kt-input-group w-full">
                                    @php
                                        if ($loan) {
                                            $endDate = $loan->created_at->copy()->addMonths((int) $loan->duree_campagne);
                                            $daysRemaining = now()->diffInDays($endDate, false);
                                            $maxEndDate = $loan->created_at->copy()->addMonths(9);
                                            $disabled = $loan->duree_campagne_modifications >= 2 || $daysRemaining < 7 || now()->greaterThanOrEqualTo($maxEndDate);
                                        }
                                        else $disabled = false;
                                    @endphp

                                    <input class="kt-input" type="number"
                                        name="duree_campagne"
                                        min="1" max="9"
                                        placeholder="Entrer une durée entre 1 et 9 mois"
                                        value="{{ $loan->duree_campagne ?? null }}"
                                        onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57"
                                        required
                                        @if($disabled) disabled @endif
                                    />
                                    <span class="kt-input-addon">mois</span>
                                </div>
                            </div>
                            @if (session('debt_result.revenus_actuels') > 0 || ($loan && $loan->debt_params['revenus_actuels'] > 0))
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Justificatif de révenus
                                    </label>
                                    <input class="kt-input" type="file" name="justify_rent" multiple required />
                                </div>
                            @endif
                            @if (session('debt_result.dettes') > 0 || ($loan && $loan->debt_params['dettes'] > 0))
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
                                <input type="checkbox" name="cgu" class="kt-checkbox" id="cgu" value="1" required />
                                <label class="kt-label inline-block" for="cgu">
                                    Je reconnais avoir lu et accepté les <a class="kt-link kt-link-underlined kt-link-dashed" href="{{route('terms-of-use')}}" target="_blank">Conditions Générales d'Utilisation</a>.
                                </label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="infos_fournis" class="kt-checkbox" id="infos_fournis" value="1" required />
                                <label class="kt-label inline-block" for="infos_fournis">
                                    Je comprends et accepte que les informations fournies dans ce formulaire seront utilisées par Fin'Bright pour évaluer ma demande de prêt et, en cas d'acceptation, pour créer un profil de projet qui sera visible par la communauté des prêteurs inscrits sur la plateforme.
                                </label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="declare_honneur" class="kt-checkbox" id="declare_honneur" value="1" required />
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
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Durée du différé :
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ session('simulate_result.deferred_months') ?? $loan->simulation_result['deferred_months'] }} mois
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
