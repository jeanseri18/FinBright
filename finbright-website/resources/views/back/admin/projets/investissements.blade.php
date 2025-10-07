@extends('back.admin.layouts')

@section('title', 'Demandes d\'investissement')

@section('stylesheet')
    <style type="text/css">
    </style>
@endsection

@section('content')
    <!-- Toolbar -->
    <div class="pb-5">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
            <div class="flex flex-col flex-wrap gap-1">
                <h1 class="font-medium text-lg text-mono">
                    Liste des investissements
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{ route('admin.dashboard') }}">
                        Tableau de bord
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Projets
                    </span>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Liste des investissements
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                href="{{ route('admin.export.csv', ['entity' => 'investments', 'month' => $months->first()['value'] ?? '']) }}">
                    <i class="ki-filled ki-exit-down"></i>
                    Exporter
                </a>

                <!-- Dropdown de sélection du mois -->
                <div class="kt-menu kt-menu-default" data-kt-menu="true">
                    <div class="kt-menu-item"
                        data-kt-menu-item-offset="0, 0"
                        data-kt-menu-item-placement="bottom-end"
                        data-kt-menu-item-toggle="dropdown"
                        data-kt-menu-item-trigger="hover">

                        <button class="kt-menu-toggle kt-btn kt-btn-outline flex-nowrap">
                            <span class="flex items-center me-1">
                                <i class="ki-filled ki-calendar text-base!"></i>
                            </span>
                            <span id="selectedMonthLabel" class="hidden md:inline text-nowrap">
                                {{ $months->first()['label'] ?? 'Aucun mois' }}
                            </span>
                            <span id="selectedMonthShort" class="inline md:hidden text-nowrap">
                                {{ $months->first()['short'] ?? '' }}
                            </span>
                            <span class="flex items-center lg:ms-4">
                                <i class="ki-filled ki-down text-xs!"></i>
                            </span>
                        </button>

                        <div class="kt-menu-dropdown w-48 py-2 kt-scrollable-y max-h-[250px]">
                            @foreach ($months as $month)
                                <div class="kt-menu-item {{ $loop->first ? 'active' : '' }}">
                                    <a class="kt-menu-link"
                                    href="#"
                                    data-value="{{ $month['value'] }}"
                                    data-label="{{ $month['label'] }}"
                                    data-short="{{ $month['short'] }}">
                                        <span class="kt-menu-title">{{ $month['label'] }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Container -->
    </div>
    <!-- End of Toolbar -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <!-- begin: works -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-base text-mono font-medium">
                    Affichage de {{ count($investments) >= 10 ? '10 sur '. count($investments) : count($investments)}} investissement(s)
                </h3>
                <div class="flex items-center flex-wrap gap-5">
                    <form action="" method="GET" class="flex items-center flex-wrap gap-5">
                        <select name="statut" class="kt-select w-36" data-kt-select="true"
                            data-kt-select-placeholder="Sélectionner un statut">
                            <option value="" {{ request('statut') == '' ? 'selected' : '' }}>Tous les statuts</option>
                            <option value="En cours de financement" {{ request('statut') == 'En cours de financement' ? 'selected' : '' }}>En cours de financement</option>
                            <option value="Financée" {{ request('statut') == 'Financée' ? 'selected' : '' }}>Financée</option>
                            <option value="Rejetée" {{ request('statut') == 'Rejetée' ? 'selected' : '' }}>Rejetée</option>
                        </select>
                        <select name="ordre" class="kt-select w-36" data-kt-select="true"
                            data-kt-select-placeholder="Ordre d'affichage">
                            <option value="1" {{ request('ordre') == 1 ? 'selected' : '' }}>Plus recents</option>
                            <option value="2" {{ request('ordre') == 2 ? 'selected' : '' }}>Plus anciens</option>
                        </select>
                        <button class="kt-btn kt-btn-outline kt-btn-primary">
                            <i class="ki-filled ki-setting-4">
                            </i>
                            Filtrer
                        </button>
                    </form>
                    <div class="flex">
                        <label class="kt-input">
                            <i class="ki-filled ki-magnifier">
                            </i>
                            <input id="search_input" placeholder="Rechercher un investissement" type="text" value="" />
                        </label>
                    </div>
                    <div class="kt-toggle-group kt-toggle-group-sm" data-kt-tabs="true">
                        <a class="kt-btn kt-btn-icon active" data-kt-tab-toggle="#network_cards" href="#">
                            <i class="ki-filled ki-category">
                            </i>
                        </a>
                        <a class="kt-btn kt-btn-icon" data-kt-tab-toggle="#network_list" href="#">
                            <i class="ki-filled ki-row-horizontal">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- begin: cards -->
            <div id="network_cards">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">
                    @forelse ($investments as $invest)
                    <div class="kt-card invest-card" 
                        data-amount="{{ strtolower($invest->amount ?? '') }}" 
                        data-investor="{{ strtolower($invest->investisseur->user->first_name .' '. $invest->investisseur->user->last_name) }}" 
                        data-denomination="{{ strtolower($invest->investisseur->denomination_sociale) }}" 
                        data-forme="{{ strtolower($invest->investisseur->forme_juridique) }}">
                        <div class="kt-card-header kt-card-rounded-t flex justify-end items-start relative p-0 bg-no-repeat bg-cover bg-center h-[120px]"
                            style="background-image: url({{ asset('assets/media/images/2600x1200/bg-' . rand(7,13) . '.png') }})">
                            <div class="kt-menu mt-2.5 me-2.5" data-kt-menu="true">
                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                    data-kt-menu-item-placement="bottom-end"
                                    data-kt-menu-item-placement-rtl="bottom-start" data-kt-menu-item-toggle="dropdown"
                                    data-kt-menu-item-trigger="click">
                                    <button class="kt-menu-toggle kt-btn kt-btn-icon kt-btn-ghost bg-transparent!">
                                        <i class="ki-filled ki-setting-2 text-lg">
                                        </i>
                                    </button>
                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                        data-kt-menu-dismiss="true">
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link" href="#">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-document">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Détails
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                href="#">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-share">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Partager
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link" href="#">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-file-up">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Exporter
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-content pt-0">
                            <div class="flex justify-center transform -translate-y-1/2">
                                <div class="size-20 shrink-0 relative">
                                    <img class="rounded-full"
                                        src="{{ $invest->investisseur->user->profilePicture ? Storage::url($invest->investisseur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                    <div
                                        class="flex size-2.5 bg-green-500 rounded-full ring-2 ring-background absolute bottom-0.5 start-16 transform -translate-y-1/2">
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center gap-1.5 mb-px -mt-7.5">
                                <a class="hover:text-primary text-base leading-5 font-medium text-mono" href="#">
                                    {{ $invest->investisseur->type_of_lender == "Personne physique" 
                                    ? $invest->investisseur->user->first_name .' '. $invest->investisseur->user->last_name
                                    : $invest->investisseur->denomination_sociale .' ('. $invest->investisseur->forme_juridique .')' }}
                                </a>
                                <svg class="text-primary" fill="none" height="16" viewbox="0 0 15 16"
                                    width="15" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex flex-wrap justify-center items-center gap-3.5 mb-7">
                                <a class="text-xs text-secondary-foreground hover:text-primary" href="#">
                                    {{ $invest->investisseur->user->address['adresse'] ?? null .' '. $invest->investisseur->user->address['rue'] ?? null .' '. $invest->investisseur->user->address['code_postal'] ?? null .' '. $invest->investisseur->user->address['ville'] ?? null }}
                                </a>
                                <div class="flex items-center text-xs font-medium text-green-500">
                                    @if(isset($invest->investisseur->risk))
                                        <span class="kt-badge 
                                            {{ $invest->investisseur->risk['level'] === 'Élevé' ? 'bg-red-100 text-red-800' : 
                                            ($invest->investisseur->risk['level'] === 'Standard' ? 'bg-yellow-100 text-yellow-800' : 
                                                'bg-green-100 text-green-800') }}">
                                            {{ $invest->investisseur->risk['level'] }} ({{ $invest->investisseur->risk['score'] }})
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5 mb-3">
                                <div
                                    class="grid grid-cols-1 gap-1.5 border-[1.5px] border-dashed border-input rounded-md px-2.5 py-2 shrink-0 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Montant
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ number_format($invest->amount, 0, ',', ' ') }} €
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 gap-1.5 border-[1.5px] border-dashed border-input rounded-md px-2.5 py-2 shrink-0 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Type
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $invest->type_investment == "pret_sans_interet" ? "Sans intérêt" : ($invest->type_investment == "pret_avec_interet" ? "Avec intérêt" : "Don") }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 gap-1.5 border-[1.5px] border-dashed border-input rounded-md px-2.5 py-2 shrink-0 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Intérêts
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        Indéfini
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed"
                                href="">
                                Voir détails
                            </a>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Afficher plus
                    </a>
                </div>
            </div>
            <!-- end: cards -->
            <!-- begin: list -->
            <div class="hidden" id="network_list">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    @forelse ($investments as $invest)
                    <div class="kt-card p-7.5 invest-card" 
                        data-amount="{{ strtolower($invest->amount ?? '') }}" 
                        data-investor="{{ strtolower($invest->investisseur->user->first_name .' '. $invest->investisseur->user->last_name) }}" 
                        data-denomination="{{ strtolower($invest->investisseur->denomination_sociale) }}" 
                        data-forme="{{ strtolower($invest->investisseur->forme_juridique) }}">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="size-20 shrink-0 relative">
                                    <img class="rounded-full"
                                        src="{{ $invest->investisseur->user->profilePicture ? Storage::url($invest->investisseur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                    <div
                                        class="flex size-2.5 bg-green-500 rounded-full ring-2 ring-background absolute bottom-0.5 start-16 transform -translate-y-1/2">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-1.5 mb-px">
                                        <a class="hover:text-primary text-base leading-5 font-medium text-mono"
                                            href="#">
                                            {{ $invest->investisseur->type_of_lender == "Personne physique" 
                                            ? $invest->investisseur->user->first_name .' '. $invest->investisseur->user->last_name
                                            : $invest->investisseur->denomination_sociale .' ('. $invest->investisseur->forme_juridique .')' }}
                                        </a>
                                        <svg class="text-primary" fill="none" height="16" viewbox="0 0 15 16"
                                            width="15" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z"
                                                fill="currentColor">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-3.5">
                                        <a class="text-sm text-secondary-foreground hover:text-primary" href="#">
                                            {{ $invest->investisseur->user->address['adresse'] ?? null .' '. $invest->investisseur->user->address['rue'] ?? null .' '. $invest->investisseur->user->address['code_postal'] ?? null .' '. $invest->investisseur->user->address['ville'] ?? null }}
                                        </a>
                                        <div class="flex items-center text-sm text-green-500">
                                            @if(isset($invest->investisseur->risk))
                                                <span class="kt-badge 
                                                    {{ $invest->investisseur->risk['level'] === 'Élevé' ? 'bg-red-100 text-red-800' : 
                                                    ($invest->investisseur->risk['level'] === 'Standard' ? 'bg-yellow-100 text-yellow-800' : 
                                                        'bg-green-100 text-green-800') }}">
                                                    {{ $invest->investisseur->risk['level'] }} ({{ $invest->investisseur->risk['score'] }})
                                                </span>
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-2 lg:gap-5">
                                    <div
                                        class="grid grid-cols-1 gap-1.5 border border-dashed border-input shrink-0 rounded-md min-w-24 max-w-auto px-2.5 py-2">
                                        <span class="text-secondary-foreground text-xs">
                                            Montant
                                        </span>
                                        <span class="text-mono text-sm leading-none font-medium">
                                            {{ number_format($invest->amount, 0, ',', ' ') }} €
                                        </span>
                                    </div>
                                    <div
                                        class="grid grid-cols-1 gap-1.5 border border-dashed border-input shrink-0 rounded-md min-w-24 max-w-auto px-2.5 py-2">
                                        <span class="text-secondary-foreground text-xs">
                                            Type
                                        </span>
                                        <span class="text-mono text-sm leading-none font-medium">
                                            {{ $invest->type_investment == "pret_sans_interet" ? "Sans intérêt" : ($invest->type_investment == "pret_avec_interet" ? "Avec intérêt" : "Don") }}
                                        </span>
                                    </div>
                                    <div
                                        class="grid grid-cols-1 gap-1.5 border border-dashed border-input shrink-0 rounded-md min-w-24 max-w-auto px-2.5 py-2">
                                        <span class="text-secondary-foreground text-xs">
                                            Intérêts
                                        </span>
                                        <span class="text-mono text-sm leading-none font-medium">
                                            Indéfini
                                        </span>
                                    </div>
                                </div>
                                <a class="kt-link kt-link-underlined kt-link-dashed"
                                    href="">
                                    Voir détails
                                </a>
                                <i class="ki-filled ki-setting-2 text-secondary-foreground text-lg">
                                </i>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed"
                        href="">
                        Afficher plus
                    </a>
                </div>
            </div>
            <!-- end: list -->
        </div>
        <!-- end: works -->
    </div>
    <!-- End of Container -->
@endsection

@section('javascripts')
    <script src="{{ asset('assets/js/widgets/general.js') }}"></script>
    <script type="text/javascript">
    document.getElementById('search_input').addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        const cards = document.querySelectorAll('#network_cards .invest-card');

        cards.forEach(card => {
            const amount = card.dataset.amount;
            const investor = card.dataset.investor;
            const denomination = card.dataset.denomination;
            const forme = card.dataset.forme;

            if (amount.includes(query) || investor.includes(query) || denomination.includes(query) || forme.includes(query)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });


    const exportBtn = document.getElementById('exportBtn');

    document.querySelectorAll('.kt-menu-link[data-value]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const value = this.dataset.value;
            const label = this.dataset.label;
            const shortLabel = this.dataset.short;

            // Mettre à jour le bouton Exporter (href dynamique)
            exportBtn.href = `/admin/export/investments/${value}`;

            // Mettre à jour l’affichage du mois sélectionné
            document.getElementById('selectedMonthLabel').textContent = label;
            document.getElementById('selectedMonthShort').textContent = shortLabel;

            // Mettre en surbrillance l’élément actif
            document.querySelectorAll('.kt-menu-item').forEach(i => i.classList.remove('active'));
            this.closest('.kt-menu-item').classList.add('active');
        });
    });
    </script>
@endsection
