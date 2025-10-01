@extends('back.investisseur.layouts')

@section('title', 'Découvrir les projets')

@section('stylesheet')
<style type="text/css">
    #report_user_modal .kt-select-dropdown.open {
        position: absolute !important;
    }

    @layer utilities {
        .kt-stepper-first\:hidden {
            [data-kt-stepper-initialized].first & {
                display: none;
            }
        }
        .kt-stepper-last\:hidden {
            [data-kt-stepper-initialized].last & {
                display: none;
            }
        }
        .kt-stepper-last\:inline-flex {
            [data-kt-stepper-initialized].last & {
                display: inline-flex;
            }
        }
        .kt-stepper-item-active\:text-primary-foreground {
            [data-kt-stepper-item].active & {
                color: var(--primary-foreground);
            }
        }
        .kt-stepper-item-active\:bg-primary {
            [data-kt-stepper-item].active & {
                background-color: var(--primary);
            }
        }
        .kt-stepper-item-completed\:hidden {
            [data-kt-stepper-item].completed & {
                display: none;
            }
        }
        .kt-stepper-item-completed\:inline {
            [data-kt-stepper-item].completed & {
                display: inline;
            }
        }
        .kt-stepper-item-completed\:text-white {
            [data-kt-stepper-item].completed & {
                color: var(--color-white);
            }
        }
        .kt-stepper-item-completed\:bg-green-500 {
            [data-kt-stepper-item].completed & {
                background-color: var(--color-green-500);
            }
        }
    }
</style>
@endsection

@section('content')
    <div class="kt-container-fixed">
        <!-- begin: projects -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <!-- begin: toolbar -->
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-lg text-mono font-semibold">
                    {{ count($loanRequests) < 10 ? '0' . count($loanRequests) : count($loanRequests) }} projets à financer
                </h3>
                <div class="flex items-center flex-wrap gap-5">
                    <form method="GET" class="flex items-center gap-2.5">
                        <input type="number" name="min_amount" placeholder="Montant min" value="{{ request('min_amount') }}" class="kt-input max-w-[130px]">
                        <input type="number" name="max_amount" placeholder="Montant max" value="{{ request('max_amount') }}" class="kt-input max-w-[130px]">
                        <select name="risk_level" class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Niveau de risque">
                            <option value="Tout" {{ request('risk_level') == "Tout" ? "selected" : null }}>Tous les niveaux</option>
                            <option value="A" {{ request('risk_level') == "A" ? "selected" : null }}>Faible</option>
                            <option value="B" {{ request('risk_level') == "B" ? "selected" : null }}>Moyen</option>
                            <option value="C" {{ request('risk_level') == "C" ? "selected" : null }}>Élévé</option>
                        </select>
                        <button type="submit" class="kt-btn kt-btn-outline kt-btn-primary">
                            <i class="ki-filled ki-setting-4">
                            </i>
                            Filtrer
                        </button>
                    </form>
                    <!-- Input recherche -->
                    <div class="flex">
                        <label class="kt-input">
                            <i class="ki-filled ki-magnifier"></i>
                            <input id="search_input" placeholder="Entrer objet ou un nom d'emprunteur" type="text" value="" />
                        </label>
                    </div>
                    <div class="kt-toggle-group kt-toggle-group-sm" data-kt-tabs="true">
                        <a class="kt-btn kt-btn-icon active" data-kt-tab-toggle="#projects_cards" href="#">
                            <i class="ki-filled ki-category">
                            </i>
                        </a>
                        <a class="kt-btn kt-btn-icon" data-kt-tab-toggle="#projects_list" href="#">
                            <i class="ki-filled ki-row-horizontal">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: toolbar -->
            <!-- begin: cards -->
            <div id="projects_cards">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5">
                    @foreach ($loanRequests as $loan)
                        <div class="kt-card p-7.5 project-card" 
                            data-object="{{ strtolower($loan->object ?? '') }}" 
                            data-investor="{{ strtolower($loan->emprunteur->user->first_name .' '. $loan->emprunteur->user->last_name) }}">
                            <div class="flex items-center justify-between mb-3 lg:mb-6">
                                <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60"
                                    data-kt-tooltip="true" data-kt-tooltip-placement="top-start">
                                    <img alt="" class="rounded-md"
                                        src="{{ $loan->emprunteur->user->profilePicture ? Storage::url($loan->emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                    <span data-kt-tooltip-content="true" class="kt-tooltip kt-tooltip-light">
                                        <span class="flex items-center gap-2">
                                            <span class="flex items-center gap-1.5">
                                                <i class="ki-filled ki-user-square"></i>
                                            </span>
                                            {{ $loan->emprunteur->user->first_name .' '. $loan->emprunteur->user->last_name }}
                                        </span>
                                    </span>
                                </div>
                                <button type="button" class="kt-btn kt-btn-primary" onclick="openFicheDetail({{ $loan->id }})">
                                    <i class="ki-filled ki-users"></i>
                                    Voir détails
                                </button>
                            </div>
                            <div class="flex flex-col mb-3 lg:mb-6">
                                <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="{{ route('investisseur.projet.details', $loan) }}">
                                    {{ $loan->object ?? 'NaN' }}
                                </a>
                                <span class="text-sm text-secondary-foreground">
                                    Montant : {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                </span>
                            </div>
                            <div class="grid md:grid-cols-3 items-center justify-between gap-2 mb-3">
                                <div
                                    class="grid grid-cols-1 h-full content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Durée de remboursement
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 h-full content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Taux d'intérêt
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->simulation_result['interets'] . '€' ?? 'Non évalué' }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 h-full content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Niveau de risque
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->emprunteur->riskLevel ? ($loan->emprunteur->riskLevel->profile == 'A' ? 'Faible' : ($loan->emprunteur->riskLevel->profile == 'B' ? 'Moyen' : 'Élévé')) : 'Non évalué' }}
                                    </span>
                                </div>
                            </div>
                            @if ($loan->status != "En attente de confirmation")
                            <div class="flex flex-col items-end gap-2">
                                @php $indicator = 0;
                                    if ($loan->simulation_result['amount'] > 0) {
                                        $indicator = ($loan->total_investissements * 100) / $loan->simulation_result['amount'];
                                    }
                                @endphp
                                <span class="kt-badge kt-badge-outline kt-badge-primary rounded-full">{{ number_format($indicator, 1, ',', ' ') }}%</span>
                                <div class="kt-progress h-1.5 kt-progress-primary mb-4">
                                    <div class="kt-progress-indicator" style="width: {{$indicator}}%">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -space-x-2">
                                @foreach ($loan->investments->take(5) as $invest)
                                <div class="flex">
                                    @if ($invest->investisseur->user->profilePicture)
                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                        src="{{ Storage::url($invest->investisseur->user->profilePicture->filename) }}" />
                                    @else
                                    <span class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                        S</span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Afficher plus de projets
                    </a>
                </div>
            </div>
            <!-- end: cards -->
            <!-- begin: list -->
            <div class="hidden" id="projects_list">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    @foreach ($loanRequests as $loan)
                        <div class="kt-card p-7">
                            <div class="flex items-center flex-wrap justify-between gap-5">
                                <div class="flex items-center gap-3.5">
                                    <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                        <img alt="" class="rounded-md"
                                            src="{{ $loan->emprunteur->user->profilePicture ? Storage::url($loan->emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                                        </img>
                                    </div>
                                    <div class="flex flex-col">
                                        <a class="text-lg font-media/brand text-mono hover:text-primary mb-px"
                                            href="{{ route('investisseur.projet.details', $loan) }}">
                                            {{ $loan->object ?? 'NaN' }}
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            {{ substr($loan->description, 0, 35) }}...
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                    <div class="flex">
                                        <span class="text-sm text-secondary-foreground">
                                            Montant : {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Durée de remboursement
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Taux d'intérêt
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->simulation_result['interets'] . '€' ?? 'Non évalué' }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Niveau de risque
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->emprunteur->riskLevel ? ($loan->emprunteur->riskLevel->profile == 'A' ? 'Risque faible' : ($loan->emprunteur->riskLevel->profile == 'B' ? 'Risque moyen' : 'Risque élévé')) : 'Non évalué' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-5 lg:gap-14">
                                        @if ($loan->status != "En attente de confirmation")
                                        <div class="flex flex-col items-end gap-2">
                                            @php $indicator = 0;
                                                if ($loan->simulation_result['amount'] > 0) {
                                                    $indicator = ($loan->total_investissements * 100) / $loan->simulation_result['amount'];
                                                }
                                            @endphp
                                            <div class="kt-progress h-1.5 w-36 kt-progress-primary mb-2">
                                                <div class="kt-progress-indicator" style="width: {{$indicator}}%">
                                                </div>
                                            </div>
                                            <div class="flex justify-end w-24">
                                                <div class="flex -space-x-2">
                                                    @foreach ($loan->investments->take(5) as $invest)
                                                    <div class="flex">
                                                        @if ($invest->investisseur->user->profilePicture)
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                            src="{{ Storage::url($invest->investisseur->user->profilePicture->filename) }}" />
                                                        @else
                                                        <span class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                                            S</span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                data-kt-menu-item-placement="bottom-end"
                                                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg">
                                                    </i>
                                                </button>
                                                <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                                    data-kt-menu-dismiss="true">
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="{{ route('investisseur.projet.details', $loan) }}">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-some-files">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Voir détails
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="#" onclick="openFicheDetail({{ $loan->id }})">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-setting-3">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Investir
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Show more projects
                    </a>
                </div>
            </div>
            <!-- end: list -->
        </div>
        <!-- end: projects -->
    </div>

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="report_user_modal">
        <div class="kt-modal-content max-w-2xl">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">
                    Projet : <span id="modal_project_subject"></span>
                </h3>
                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true">
                    <i class="ki-filled ki-cross">
                    </i>
                </button>
            </div>
            <div class="kt-modal-body p-0">
                <form method="POST" id="modal_invest_form">
                    @csrf
                    <div class="p-5">
                        <div class="grid place-items-center gap-1">
                            <div class="flex justify-center items-center rounded-full">
                                <img id="modal_project_avatar" class="rounded-full max-h-[55px] max-w-full" src="" />
                            </div>
                            <div class="flex items-center justify-center gap-1">
                                <a id="modal_project_name" class="hover:text-primary text-sm leading-5 font-semibold text-mono" href="#">
                                    Jenny Klabber
                                </a>
                                <svg class="text-primary" fill="none" height="13" viewbox="0 0 15 16" width="13"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-b-border">
                    </div>
                    <div class="flex flex-col gap-5 p-5">
                        <div class="grid md:grid-cols-2 gap-x-4 sm:gap-x-15">
                            <div class="flex justify-between gap-3"><strong>Montant demandé :</strong> <span id="modal_project_amount"></span></div>
                            <div class="flex justify-between gap-3"><strong>Montant restant :</strong> <span id="modal_project_remaining_amount"></span></div>
                            <div class="flex justify-between gap-3"><strong>Durée de remboursement :</strong> <span id="modal_project_duration"></span></div>
                            <div class="flex justify-between gap-3"><strong>Taux d'intérêt :</strong> <span id="modal_project_rate"></span></div>
                            <div class="flex justify-between gap-3"><strong>Niveau de risque :</strong> <span id="modal_project_risk"></span></div>
                        </div>
                        <div>
                            <p><strong>Description :</strong></p>
                            <div class="kt-scrollable overflow-y-auto max-h-[150px] pe-2 w-full">
                                <p id="modal_project_description" class="text-gray-700"></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 space-y-4">
                        <select id="loan_type" name="type_investissement" class="kt-select w-full" data-kt-select="true" data-kt-select-placeholder="Type d'investissement" required>
                            <option value="pret_sans_interet">Prêt sans intérêt</option>
                            <option value="pret_avec_interet">Prêt avec intérêt</option>
                            <option value="don">Dons</option>
                        </select>

                        <div class="kt-card shadow-none p-3.5">
                            <div class="flex justify-between items-center flex-wrap gap-2 mb-7">
                                <div class="flex items-center gap-3.5 pt-1">
                                    <span id="amount_display" class="text-2xl font-semibold text-foreground">100€</span>
                                    <span id="amount_message" class="text-sm text-secondary-foreground md:max-w-xs">
                                        Pour un financement sans intérêt, vous pouvez investir jusqu’à 5000 € maximum.
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="range card" id="range_1" min="100" type="range" name="amount" value="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 justify-end p-5">
                        <button type="submit" class="kt-btn kt-btn-primary">Investir</button>
                        <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="kt-modal kt-modal-center" data-kt-modal-persistent="true" data-kt-modal="true" id="profiled_user_modal">
        <div class="kt-modal-content max-w-2xl">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Questionnaire de Profil d'Investisseur (obligatoire)</h3>
                {{-- <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true">
                    <i class="ki-filled ki-cross"></i>
                </button> --}}
            </div>
            <div class="kt-modal-body max-h-[700px] p-0">
                <form action="" method="post">
                    @csrf
                    <div id="form_stepper" data-kt-stepper="true">
                        <div class="flex h-auto px-10 py-5">
                            <div data-kt-stepper-item="#stepper_1" class="active flex gap-2.5 items-center">
                                <div class="shrink-0 rounded-full size-8 flex items-center justify-center text-sm font-semibold bg-muted text-muted-foreground kt-stepper-item-active:bg-primary kt-stepper-item-active:text-primary-foreground kt-stepper-item-completed:bg-green-500 kt-stepper-item-completed:text-white">
                                    <span data-kt-stepper-number="true" class="kt-stepper-item-completed:hidden">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-4 hidden kt-stepper-item-completed:inline" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <span class="text-sm text-muted-foreground kt-stepper-item-completed:opacity-70">Situation Financière</span>
                                </div>
                            </div>
                            <div data-kt-stepper-item="#stepper_2" class="flex gap-2.5 items-center">
                                <div class="shrink-0 rounded-full size-8 flex items-center justify-center text-sm font-semibold bg-muted text-muted-foreground kt-stepper-item-active:bg-primary kt-stepper-item-active:text-primary-foreground kt-stepper-item-completed:bg-green-500 kt-stepper-item-completed:text-white">
                                    <span data-kt-stepper-number="true" class="kt-stepper-item-completed:hidden">2</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-4 hidden kt-stepper-item-completed:inline" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <span class="text-sm text-muted-foreground kt-stepper-item-completed:opacity-70">Connaissances et Expérience</span>
                                </div>
                            </div>
                            <div data-kt-stepper-item="#stepper_3" class="flex gap-2.5 items-center">
                                <div
                                    class="shrink-0 rounded-full size-8 flex items-center justify-center text-sm font-semibold bg-muted text-muted-foreground kt-stepper-item-active:bg-primary kt-stepper-item-active:text-primary-foreground kt-stepper-item-completed:bg-green-500 kt-stepper-item-completed:text-white">
                                    <span data-kt-stepper-number="true" class="kt-stepper-item-completed:hidden">3</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-4 hidden kt-stepper-item-completed:inline" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <span class="text-sm text-muted-foreground kt-stepper-item-completed:opacity-70">Objectifs et Horizon de Placement</span>
                                </div>
                            </div>
                            <div data-kt-stepper-item="#stepper_4" class="flex gap-2.5 items-center">
                                <div
                                    class="shrink-0 rounded-full size-8 flex items-center justify-center text-sm font-semibold bg-muted text-muted-foreground kt-stepper-item-active:bg-primary kt-stepper-item-active:text-primary-foreground kt-stepper-item-completed:bg-green-500 kt-stepper-item-completed:text-white">
                                    <span data-kt-stepper-number="true" class="kt-stepper-item-completed:hidden">3</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-4 hidden kt-stepper-item-completed:inline" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <span class="text-sm text-muted-foreground kt-stepper-item-completed:opacity-70">Tolérance au Risque</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-b border-b-border"></div>
                        
                        <div class="" id="stepper_1">
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Quelle est la tranche de revenus annuels nets de votre foyer fiscal ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked class="kt-radio radio-sm" name="renevu_foyer_fiscal" type="radio" value="-20000"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Moins de 20 000 €
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="renevu_foyer_fiscal" type="radio" value="20000-40000"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                20 000 - 40 000 €
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="renevu_foyer_fiscal" type="radio" value="+40000"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Plus de 40 000 €
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Quelle est une estimation de votre patrimoine financier (épargne, placements), hors immobilier ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked class="kt-radio radio-sm" name="patrinoine_financier" type="radio" value="-10000"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Moins de 10 000 €
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="patrinoine_financier" type="radio" value="10000-50000"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                10 000 - 50 000 €
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="patrinoine_financier" type="radio" value="+50000"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Plus de 50 000 €
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Quelle est l'origine principale des fonds que vous envisagez d'investir sur Fin'Bright ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-checkbox checkbox-sm" name="origine_des_fonds" type="checkbox" value="epargne-revenus-professionnels"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Épargne issue de revenus professionnels
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-checkbox checkbox-sm" name="origine_des_fonds" type="checkbox" value="heritage-donation"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Héritage / Donation
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-checkbox checkbox-sm" name="origine_des_fonds" type="checkbox" value="cession-actifs"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Cession d'actifs
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-checkbox checkbox-sm" name="origine_des_fonds" type="checkbox" value="autre"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Autre
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hidden" id="stepper_2">
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Avez-vous déjà investi dans des produits financiers présentant un risque de perte en capital (ex: actions, fonds d'investissement) ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="deja-investi" type="radio" value="oui"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Oui
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="deja-investi" type="radio" value="non"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Non
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Avez-vous déjà prêté sur une plateforme de financement participatif ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="deja_prete" type="radio" value="oui"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Oui
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="deja_prete" type="radio" value="non"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Non
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Parmi les affirmations suivantes, laquelle est correcte ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="affirmation_correcte" type="radio" value="a"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                A. Le capital prêté sur une plateforme est garanti.
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="affirmation_correcte" type="radio" value="b"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                B. Le capital prêté sur une plateforme n'est pas garanti et peut être perdu.
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="affirmation_correcte" type="radio" value="c"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                C. Je ne sais pas.
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hidden" id="stepper_3">
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Quel est votre objectif principal en prêtant sur Fin'Bright ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="report-option" type="radio" value="diversifier"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Diversifier mon épargne
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="report-option" type="radio" value="rechercher"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Rechercher un rendement potentiellement plus élevé que les livrets
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="report-option" type="radio" value="soutenir"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Soutenir des projets étudiants qui ont du sens
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Pour combien de temps pouvez-vous raisonnablement immobiliser les sommes que vous prêtez ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="temps_de_pret" type="radio" value="-2 ans"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Moins de 2 ans
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="temps_de_pret" type="radio" value="2 - 5 ans"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Entre 2 et 5 ans
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="temps_de_pret" type="radio" value="5 - 7 ans"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Entre 5 et 7 ans
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="temps_de_pret" type="radio" value="+7 ans"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Plus de 7 ans
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hidden" id="stepper_4">
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Imaginez que le portefeuille de prêts que vous avez financé subisse 15% de défauts. Quelle serait votre réaction la plus probable ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="reaction_apres_defaults" type="radio" value="panique"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Je panique et cherche à me désengager au plus vite
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="reaction_apres_defaults" type="radio" value="inquiet"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Je suis inquiet mais je maintiens mes positions
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="reaction_apres_defaults" type="radio" value="fait partir des risques"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Je considère que cela fait partie du risque et n'y vois pas de problème majeur
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="text-sm text-mono font-semibold">
                                    Quelle part de votre épargne totale seriez-vous prêt(e) à consacrer au financement participatif, un placement considéré comme risqué ?
                                </div>
                                <div class="flex flex-col gap-3.5">
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input checked="" class="kt-radio radio-sm" name="part_a_consacrer" type="radio" value="-5%"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Moins de 5%
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="part_a_consacrer" type="radio" value="5% - 10%"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Entre 5% et 10%
                                            </div>
                                        </div>
                                    </label>
                                    <label class="kt-form-label flex items-center gap-2.5">
                                        <input class="kt-radio radio-sm" name="part_a_consacrer" type="radio" value="+10%"/>
                                        <div class="flex flex-col gap-0.5">
                                            <div class="text-sm font-semibold text-mono">
                                                Plus de 10%
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="border-b border-b-border"></div>

                        <div class="text-2sm font-medium text-center text-foreground p-5">
                            Don't worry, your report is completely anonymous; the person you're
                            <br/>
                            reporting will not be informed that you've submitted it
                        </div> --}}

                        <div class="border-b border-b-border"></div>
                    
                        <div class="flex items-center gap-2.5 justify-end p-5">
                            <button type="button" class="kt-btn kt-btn-outline kt-stepper-first:hidden" data-kt-stepper-back="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left" aria-hidden="true">
                                    <path d="m12 19-7-7 7-7"></path>
                                    <path d="M19 12H5"></path>
                                </svg>
                                Retour
                            </button>
                            <button type="button" class="kt-btn kt-btn-outline kt-stepper-last:hidden" data-kt-stepper-next="true">
                                Suivant
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </button>
                            <button type="submit" class="kt-btn kt-btn-primary hidden kt-stepper-last:inline-flex">
                                Soumettre
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="user_evaluate_modal">
        <div class="kt-modal-content max-w-[500px]">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Évaluation de l'Adéquation du Prêteur</h3>
                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true">
                    <i class="ki-filled ki-cross"></i>
                </button>
            </div>
            <div class="kt-modal-body p-0">
                <div class="p-5">
                    <div class="grid place-items-center gap-1">
                        <div class="flex justify-center items-center rounded-full">
                            <img class="rounded-full max-h-[55px] max-w-full" src="{{ Auth::user()->profilePicture ? Storage::url(Auth::user()->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}"/>
                        </div>
                        <div class="flex items-center justify-center gap-1">
                            <a class="hover:text-primary text-sm leading-5 font-semibold text-mono" href="#">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</a>
                            <svg class="text-primary" fill="none" height="13" viewbox="0 0 15 16" width="13" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z" fill="currentColor">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="border-b border-b-border"></div>
                <div class="flex justify-between gap-5 p-5">
                    <div id="profil" class="text-sm text-mono font-semibold"></div>
                    <div id="score" class="text-sm text-mono font-semibold"></div>
                </div>
                <div class="border-b border-b-border"></div>
            
                <div id="message" class="text-2sm font-medium text-center text-foreground p-5">
                    Don't worry, your report is completely anonymous; the person you're
                    <br/>
                    reporting will not be informed that you've submitted it
                </div>
                <div class="border-b border-b-border"></div>
                <div class="flex items-center gap-2.5 justify-end p-5">
                    <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true">Fermer</button>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('javascripts')
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        const modalEl = KTDom.getElement('#profiled_user_modal');
        const modal1 = KTModal.getInstance(modalEl);
        @if (!Auth::user()->investisseur or !Auth::user()->investisseur->profile)
            modal1?.show();
        @endif
        
        const stepperEl = document.querySelector('#form_stepper');
        const stepper = KTStepper.getInstance(stepperEl);

        stepper.on('change', (detail) => {
            // Si on recule, pas besoin de valider
            if (detail.step < detail.from) return;

            const currentStep = stepperEl.querySelector('#stepper_' + (detail.step - 1));
            if (!currentStep) return;

            const groups = {};
            currentStep.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                groups[input.name] ??= [];
                groups[input.name].push(input);
            });

            let isValid = true;
            Object.values(groups).forEach(group => {
                const checked = group.some(el => el.checked);
                group.forEach(el => el.classList.toggle("ring-2", !checked));
                group.forEach(el => el.classList.toggle("ring-red-500", !checked));
                if (!checked) isValid = false;
            });

            if (!isValid) {
                detail.cancel = true;
                alert("Merci de sélectionner une option obligatoire avant de continuer.");
            }
        });

        document.querySelector('#profiled_user_modal form').addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            fetch("{{ route('investisseur.profil.evaluer') }}", {
                method: "POST",
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // cible le modal résultat
                    const modalEvaluate = document.querySelector('#user_evaluate_modal');
                    const modal2 = KTModal.getInstance(modalEvaluate);
                    const statut = data.evaluation['profil'] == "Prudent" ? "primary" : (data.evaluation['profil'] == "Équilibré" ? "warning" : "destructive");
                    
                    modalEvaluate.querySelector('#profil').innerHTML = `Profile : <span class="kt-badge kt-badge-outline kt-badge-${statut} rounded-full">${data.evaluation['profil']}</span>`;
                    modalEvaluate.querySelector('#score').innerText = `Score : ${data.evaluation['score']}`;
                    modalEvaluate.querySelector('#message').innerText = data.evaluation['message'];
                    
                    modal1.on('hide', (detail) => {
                        detail.cancel = false;
                    });
                    modal2.show();
                }
            })
            .catch(err => console.error("Erreur:", err));
        });

        modal1.on('hide', (detail) => {
            detail.cancel = true;
            console.log('hide action canceled');
        });
    });
    
    document.getElementById('search_input').addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        const cards = document.querySelectorAll('#projects_cards .project-card');

        cards.forEach(card => {
            const object = card.dataset.object;
            const investor = card.dataset.investor;

            if (object.includes(query) || investor.includes(query)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });

    const modalEl = document.querySelector('#report_user_modal');
    const modal3 = KTModal.getInstance(modalEl);
    // Initialisation de la variable (exemple)
    var remaining_amount = 0;

    function openFicheDetail(loanId) {
        fetch(`/investisseur/projet/${loanId}/json`)
            .then(res => res.json())
            .then(data => {
                const formatter = new Intl.NumberFormat('fr-FR', {
                    style: 'currency',
                    currency: 'EUR',
                    minimumFractionDigits: 0
                });
                remaining_amount = data.amount;
                updateLimit();

                document.getElementById('modal_project_subject').innerText = data.object || "Projet étudiant";
                document.getElementById('modal_project_name').innerText = data.user_name;
                document.getElementById('modal_project_amount').innerText = formatter.format(data.amount);
                document.getElementById('modal_project_remaining_amount').innerText = formatter.format(data.remaining_amount);
                document.getElementById('modal_project_duration').innerText = data.duration + " mois";
                document.getElementById('modal_project_rate').innerText = data.risk_rate ? (data.risk_rate +"%") : 'Inconnu';
                document.getElementById('modal_project_risk').innerHTML = data.risk_level 
                ? (
                    data.risk_level == "A" 
                    ? '<span class="kt-badge kt-badge-outline kt-badge-primary">Faible</span>' 
                    : (
                        data.risk_level == "B" 
                        ? '<span class="kt-badge kt-badge-outline kt-badge-warning">Moyen</span>' 
                        : '<span class="kt-badge kt-badge-outline kt-badge-destructive">Élévé</span>')
                    ) 
                : "Inconnu";
                document.getElementById('modal_project_description').innerText = data.description ?? "";

                document.getElementById('modal_project_avatar').src = data.avatar ? ('/storage/'+ data.avatar) : "{{asset('assets/media/avatars/blank.png')}}";

                // Update invest form
                let form = document.getElementById('modal_invest_form');
                form.action = `/investisseur/contribuer/${loanId}`;

                // Ouvrir le modal
                modal3.show();
            });
    }

    const select = document.querySelector("#loan_type");
    const range = document.querySelector("#range_1");
    const display = document.querySelector("#amount_display");
    const message = document.querySelector("#amount_message");

    // Fonction pour mettre à jour la limite du slider
    function updateLimit() {
        // Définir les limites max par type
        const limits = {
            "pret_sans_interet": 5000,
            "pret_avec_interet": 2000,
            "don": remaining_amount
        };

        let type = select.value;
        let maxLimit = limits[type] || 5000;

        // Si remaining_amount est plus petit, on prend ça comme max
        if (remaining_amount < maxLimit) {
            maxLimit = remaining_amount;
        }

        range.max = maxLimit;

        // Si la valeur actuelle dépasse le max → on ajuste
        if (parseInt(range.value) > maxLimit) {
            range.value = maxLimit;
        }

        // Mettre à jour le message
        let messages = {
            "pret_sans_interet": `Pour un financement sans intérêt, vous pouvez investir jusqu’à ${maxLimit} € maximum.`,
            "pret_avec_interet": `Pour un financement avec intérêt, vous pouvez investir jusqu’à ${maxLimit} € maximum.`,
            "don": `Pour un don, vous pouvez donner jusqu’à ${maxLimit} € maximum.`
        };
        message.innerText = messages[type] || "";
        updateDisplay();
    }

    // Fonction pour afficher la valeur avec une "animation"
    function updateDisplay() {
        let value = parseInt(range.value);
        let current = parseInt(display.innerText.replace("€", "")) || 0;

        // Animation simple (compteur)
        let step = (value - current) / 20; 
        let count = 0;

        let interval = setInterval(() => {
            current += step;
            display.innerText = `${Math.round(current)}€`;
            if (++count >= 20) {
                clearInterval(interval);
                display.innerText = `${value}€`;
            }
        }, 20);
    }

    // Events
    select.addEventListener("change", updateLimit);
    range.addEventListener("input", updateDisplay);

    // Init au chargement
    updateLimit();
    </script>
@endsection
