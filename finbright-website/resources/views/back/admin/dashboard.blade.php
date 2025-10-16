@extends('back.admin.layouts')

@section('title', 'Tableau de bord')

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
                    Tableau de bord
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{route('home')}}">
                        Accueil
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-mono">
                        Tableau de bord
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                href="{{ route('admin.export.csv', ['entity' => 'investments_insight']) }}">
                    <i class="ki-filled ki-exit-down"></i>
                    Exporter les insights
                </a>
            </div>
        </div>
        <!-- End of Container -->
    </div>
    <!-- End of Toolbar -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid gap-5 lg:gap-7.5">
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
                <div class="lg:col-span-2">
                    <div class="kt-card h-full">
                        <div class="kt-card-content flex flex-col place-content-center gap-5">
                            <div class="flex justify-center">
                                <img alt="image" class="dark:hidden max-h-[180px]"
                                    src="{{asset('assets/media/illustrations/32.svg')}}" />
                                <img alt="image" class="light:hidden max-h-[180px]"
                                    src="{{asset('assets/media/illustrations/32-dark.svg')}}" />
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col gap-3 text-center">
                                    <h2 class="text-xl font-semibold text-mono">
                                        Suivi simplifié des projets en cours
                                    </h2>
                                    <p class="text-sm font-medium text-secondary-foreground">
                                        Gardez une vue d’ensemble sur l’avancement de vos projets, attribuez des tâches, 
                                        fixez des échéances et suivez la progression en temps réel pour garantir le respect des délais.
                                    </p>
                                </div>
                                <div class="flex justify-center">
                                    <a class="kt-btn kt-btn-primary" href="{{route('admin.prets.enCours')}}">
                                        Projets en cours
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="kt-card h-full">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Fonds collectés
                            </h3>
                            <div class="kt-menu" data-kt-menu="true">
                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                    data-kt-menu-item-placement="bottom-start" data-kt-menu-item-toggle="dropdown"
                                    data-kt-menu-item-trigger="click">
                                    <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-dots-vertical text-lg">
                                        </i>
                                    </button>
                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                        data-kt-menu-dismiss="true">
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link" data-kt-modal-toggle="#report_user_modal"
                                                href="{{ route('admin.export.csv', ['entity' => 'investments_insight']) }}">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-exit-down"></i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Exporter
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-setting-3">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Réglage
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            function number_shorten($number)
                            {
                                if ($number >= 1000000000) {
                                    return intval($number / 1000000000) . 'B';
                                } elseif ($number >= 1000000) {
                                    return intval($number / 1000000) . 'M';
                                } elseif ($number >= 1000) {
                                    return intval($number / 1000) . 'k';
                                }

                                return intval($number);
                            }
                        @endphp
                        <div class="kt-card-content flex flex-col gap-4 p-5 lg:p-7.5 lg:pt-4">
                            <div class="flex flex-col gap-0.5">
                                <span class="text-sm font-normal text-secondary-foreground">
                                    Tout au long de l'année
                                </span>
                                <div class="flex items-center gap-2.5">
                                    <span class="text-3xl font-semibold text-mono">
                                        {{ number_shorten($statsInvests['totalInvesti']) }} €
                                    </span>
                                    <span class="kt-badge kt-badge-outline kt-badge-success kt-badge-sm">
                                        {{ $statsInvests['indicateur']['value'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-1 mb-1.5">
                                <div class="bg-green-500 h-2 w-full max-w-[{{ $statsInvests['pctAnnuel'] }}%] rounded-xs">
                                </div>
                                <div class="bg-destructive h-2 w-full max-w-[{{ $statsInvests['pctSemestriel'] }}%] rounded-xs">
                                </div>
                                <div class="bg-violet-500 h-2 w-full max-w-[{{ $statsInvests['pctMensuel'] }}%] rounded-xs">
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-4 mb-1">
                                <div class="flex items-center gap-1.5">
                                    <span class="rounded-full size-2 rounded-full kt-badge-success">
                                    </span>
                                    <span class="text-sm font-normal text-foreground">
                                        Annuel
                                    </span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="rounded-full size-2 rounded-full kt-badge-destructive">
                                    </span>
                                    <span class="text-sm font-normal text-foreground">
                                        Semestriel
                                    </span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="rounded-full size-2 rounded-full kt-badge-info">
                                    </span>
                                    <span class="text-sm font-normal text-foreground">
                                        Mensuel
                                    </span>
                                </div>
                            </div>
                            <div class="border-b border-input">
                            </div>
                            <div class="grid gap-3">
                                @foreach ($loanInProgress as $loan)
                                <div class="flex items-center justify-between flex-wrap gap-2">
                                    <div class="flex items-center gap-1.5">
                                        <i class="ki-filled ki-shop text-base text-muted-foreground">
                                        </i>
                                        <span class="text-sm font-normal text-mono">
                                            {{ substr($loan->object, 0, 16) }}{{mb_strlen($loan->object) > 16 ? "..." : null}}
                                        </span>
                                    </div>
                                    <div class="flex items-center text-sm font-medium text-foreground gap-6">
                                        <span class="lg:text-right">
                                            {{ number_shorten($loan->total_investissements) }} €
                                        </span>
                                        <span class="lg:text-right flex items-center gap-1">
                                            <i class="ki-filled ki-arrow-{{ ($loan->days_diff && $loan->days_diff < 7) ? 'up text-green-500' : 'down text-destructive' }}"></i>
                                            {{ number_format($loan->invest_percent, 1, ',', ' ') }}%
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: grid -->
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
                <div class="lg:col-span-2">
                    <div class="grid">
                        <div class="kt-card kt-card-grid h-full min-w-full">
                            <div class="kt-card-header">
                                <h3 class="kt-card-title">
                                    Demandes de Prêts
                                </h3>
                                <div class="kt-input max-w-48">
                                    <i class="ki-filled ki-magnifier">
                                    </i>
                                    <input id="search_input" data-kt-datatable-search="#kt_datatable_1" placeholder="Rechercher une demande"
                                        type="text" />
                                </div>
                            </div>
                            <div class="kt-card-table">
                                <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="5"
                                    id="teams_datatable">
                                    <div class="kt-scrollable-x-auto">
                                        <table class="kt-table kt-table-border table-fixed" data-kt-datatable-table="true"
                                            id="kt_datatable_1">
                                            <thead>
                                                <tr>
                                                    <th class="w-[125px]">
                                                        <span class="kt-table-col">
                                                            <span class="kt-table-col-label">
                                                                Projets
                                                            </span>
                                                            <span class="kt-table-col-sort">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="w-[250px]">
                                                        <span class="kt-table-col">
                                                            <span class="kt-table-col-label">
                                                                Emprunteur
                                                            </span>
                                                            <span class="kt-table-col-sort">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="w-[150px]">
                                                        <span class="kt-table-col">
                                                            <span class="kt-table-col-label">
                                                                Statut
                                                            </span>
                                                            <span class="kt-table-col-sort">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="w-[125px]">
                                                        <span class="kt-table-col">
                                                            <span class="kt-table-col-label">
                                                                Montant demandé
                                                            </span>
                                                            <span class="kt-table-col-sort">
                                                            </span>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($loanRequests as $loan)
                                                <tr>
                                                    <td class="text-foreground font-normal">
                                                        {{ $loan->object }}
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                                src="{{ $loan->emprunteur->user->profilePicture ? Storage::url($loan->emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                                            <div class="flex flex-col">
                                                                <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                                                    href="#">
                                                                    {{ $loan->emprunteur->user->first_name .' '. $loan->emprunteur->user->last_name }}
                                                                </a>
                                                                <a class="text-sm text-secondary-foreground font-normal hover:text-primary"
                                                                    href="#">
                                                                    {{ $loan->emprunteur->user->email ?? null }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="kt-badge 
                                                            {{ $loan->status == 'En attente de confirmation' ? 'kt-badge-warning' : ($loan->status == 'En cours de financement' ? 'kt-badge-success' : 'kt-badge-destructive') }}
                                                            kt-badge-outline rounded-[30px] whitespace-normal">
                                                            <span class="kt-badge-dot size-1.5"></span>
                                                            {{ $loan->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div
                                        class="kt-card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-secondary-foreground text-sm font-medium">
                                        <div class="flex items-center gap-2 order-2 md:order-1">
                                            Affichage de 
                                            <select class="kt-select w-16" data-kt-datatable-size="true"
                                                data-kt-select="" name="perpage">
                                            </select>
                                            par page
                                        </div>
                                        <div class="flex items-center gap-4 order-1 md:order-2">
                                            <span data-kt-datatable-info="true">
                                            </span>
                                            <div class="kt-datatable-pagination" data-kt-datatable-pagination="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="kt-card h-full">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Nouvels emprunteurs
                            </h3>
                        </div>
                        <div class="kt-card-content flex flex-col gap-5">
                            <div class="kt-input-group">
                                <input class="kt-input" placeholder="Emprunteur" type="text" value="" />
                                <span class="kt-btn kt-btn-primary">
                                    Rechercher
                                </span>
                            </div>
                            <div class="flex flex-col gap-5 max-h-[240px] overflow-y-auto">
                                @forelse ($newEmprunteurs as $emprunteur)
                                <div class="flex items-center justify-between gap-2.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="">
                                            <img class="h-9 rounded-full"
                                                src="{{ $emprunteur->user->profilePicture ? Storage::url($emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono hover:text-primary"
                                                href="#" onclick="openModal({{ $emprunteur->id }})">
                                                {{ $emprunteur->user->first_name .' '. $emprunteur->user->last_name }}
                                            </a>
                                            <span class="text-sm text-secondary-foreground">
                                                {{ \Carbon\Carbon::parse($emprunteur->user->birth_date)->format('d-m-Y') .' | '. ucwords(str_replace(['-', '_'], ' ', $emprunteur->user->birth_place)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <a class="kt-btn kt-btn-icon kt-btn-ghost" href="#" onclick="openModal({{ $emprunteur->id }})">
                                            <i class="ki-filled ki-document"></i>
                                        </a>
                                    </div>
                                </div>
                                @empty
                                    Aucun nouvel emprunteur ce mois
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: grid -->
        </div>
    </div>
    <!-- End of Container -->

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="modal_kyc">
        <div class="kt-modal-content max-w-2xl">
            <div class="kt-modal-body">
                <div class="kt-card">
                    <div class="kt-card-header p-0 bg-no-repeat bg-cover bg-center kt-card-rounded-t h-40"
                        style="background-image: url({{asset('assets/media/images/2600x1200/bg-7.png')}})">
                    </div>
                    <div class="kt-card-content mb-7.5 p-0">
                        <div class="flex transform -translate-y-1/2 px-5 lg:px-7.5 gap-1.5">
                            <div class="size-[120px] in-[.authors-row]:size-[80px] shrink-0 relative">
                                <img id="user_avatar" class="rounded-full" src="{{asset('assets/media/avatars/blank.png')}}" />
                                <div
                                    class="flex size-3 bg-green-500 rounded-full ring-2 ring-background absolute bottom-2 start-[93px] in-[.authors-row]:start-[64px]">
                                </div>
                            </div>
                            <div class="flex flex-col justify-end grow">
                                <div class="flex items-center justify-between flex-wrap md:flex-nowrap gap-2">
                                    <div class="flex flex-col justify-end gap-0.5">
                                        <div class="flex items-center gap-1.5">
                                            <a id="user_name" class="hover:text-primary text-base leading-5 font-medium text-mono" href="#">
                                                Lorem Ipsum
                                            </a>
                                            <svg class="text-primary" fill="none" height="16" viewbox="0 0 15 16" width="15"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z"
                                                    fill="currentColor">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="text-secondary-foreground text-xs">
                                            <span id="user_BirthDate">Houston</span>, 
                                            <span id="user_adresse">Texas</span>
                                        </span>
                                    </div>
                                    <div class="w-50">
                                        @php
                                            // Définir la configuration en tant que tableau PHP
                                            $config = [
                                                'displayTemplate' => '<div class="flex items-center gap-2">{{icon}}<span class="text-foreground">{{text}}</span></div>',
                                                'optionTemplate' => '<div class="flex items-center gap-2">{{icon}} <span class="text-foreground">{{text}}</span></div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5 ms-auto hidden text-primary kt-select-option-selected:block"><path d="M20 6 9 17l-5-5"/></svg></div>',
                                            ];
                                            $statuses = [
                                                ['value' => 'pending', 'label' => 'À approuver', 'icon' => '<i class=\"ki-filled ki-arrow-circle-left\"></i>'],
                                                ['value' => 'validated', 'label' => 'Validé', 'icon' => '<i class=\"ki-filled ki-check-squared\"></i>'],
                                                ['value' => 'rejected', 'label' => "Rejeté", 'icon' => '<i class=\"ki-filled ki-cross-square\"></i>'],
                                            ];
                                        @endphp
                                        <select
                                            name="kyc_status"
                                            class="kt-select"
                                            data-kt-select="true"
                                            data-kt-select-placeholder="Sélectionner un statut..."
                                            data-kt-select-config='@json($config)'
                                            >
                                            @foreach($statuses as $status)
                                                <option value="{{ $status['value'] }}"
                                                    data-kt-select-option='@json(["icon" => $status["icon"]])'
                                                    >
                                                    {{ $status['label'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modal_tabs" class="">
                            <div id="user_docs" class="flex gap-5 kt-scrollable-x -mt-8 ms-7.5" style="position: unset">
                                <div class="kt-card mb-4 border-0 last:me-5">
                                    <div class="bg-cover bg-no-repeat kt-card-rounded-t w-[240px] shrink-0 h-44"
                                        style="background-image: url({{asset('assets/media/images/600x600/6.jpg')}})">
                                    </div>
                                    <div class="kt-card-border kt-card-rounded-b px-3.5 pt-5 pb-2.5">
                                        <a class="font-medium block text-mono hover:text-primary text-base leading-4 mb-2" href="#">
                                            Geometric Patterns
                                        </a>
                                        <div class="text-sm text-secondary-foreground">
                                            Token ID:
                                            <span class="text-sm font-medium text-foreground">
                                                81023
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="reject_motif" class="hidden px-8">
                                <form action="" method="post" class="kt-form">
                                    @csrf
                                    <div class="kt-form-item">
                                        <label class="kt-form-label">Motif du rejet</label>
                                        <div class="kt-form-control">
                                            <input name="status" type="hidden" value="rejected">
                                            <textarea
                                                required
                                                name="kyc_motif"
                                                class="kt-textarea"
                                                placeholder="Saisissez le motif du refus..."
                                                rows="8"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5 justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">Enregistrer</button>
                                        <button type="button" class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true">
                                            Annuler
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card-footer flex-col gap-4">
                        <div id="alert_msg" class="w-full"></div>
                        <a class="kt-link kt-link-underlined kt-link-dashed"
                            type="button"
                            class="kt-modal-close"
                            aria-label="Close modal"
                            data-kt-modal-dismiss="#modal_kyc"
                            href="javascript:;">
                            Fermer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script src="{{asset('assets/js/widgets/general.js')}}"></script>
    <script type="text/javascript">
    function renderPdfPreview(url, container) {
        const loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(pdf => {
            // Charger seulement la première page
            pdf.getPage(1).then(page => {
                const scale = 0.5; // zoom (ajuste selon ta carte)
                const viewport = page.getViewport({ scale });
                const canvas = document.createElement("canvas");
                const context = canvas.getContext("2d");

                canvas.height = viewport.height;
                canvas.width = viewport.width;
                canvas.classList.add("w-full", "h-44", "object-contain", "rounded-md");

                container.innerHTML = ""; // vider
                container.appendChild(canvas);

                page.render({ canvasContext: context, viewport: viewport });
            });
        });
    }
    const modalEl = document.querySelector('#modal_kyc');
    const modal = KTModal.getInstance(modalEl) || new KTModal(modalEl);
    const kycStatusSelect = modalEl.querySelector('select[name="kyc_status"]');
    let currentEntityId = null; // On mémorise l'ID de l'emprunteur ouvert

    const statuses = @json($statuses);

    const openModal = (entityId) => {
        currentEntityId = entityId; // On garde l'ID

        // Et éventuellement envoyer l'ID à ton backend
        fetch(`/admin/emprunteurs/${entityId}/json`)
            .then(res => res.json())
            .then(data => {
                document.querySelector('#alert_msg').innerHTML = '';
                kycStatusSelect.innerHTML = '';

                const userNameEl = modalEl.querySelector('#user_name');
                const kycIconEl = userNameEl.nextElementSibling; // Le <svg> juste après l'a

                // Mettre le nom de l'utilisateur
                userNameEl.innerText = data.user_name;
                // Afficher ou cacher le SVG selon kyc_status
                if (data.kyc_status === "validated" || data.kyc_status === "Validé") {
                    kycIconEl.style.display = "inline-block";
                } else {
                    kycIconEl.style.display = "none";
                }
                modalEl.querySelector('#user_BirthDate').innerText = data.birth_date 
                    ? 'Né le ' + new Intl.DateTimeFormat('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(data.birth_date)) 
                    : 'Non renseigné';
                modalEl.querySelector('#user_adresse').innerText = data.adresse
                    ? 'Habite à '+ data.adresse
                    : 'Non renseigné';
                modalEl.querySelector('#user_avatar').src = data.avatar 
                    ? ('/storage/' + data.avatar) 
                    : "{{ asset('assets/media/avatars/blank.png') }}";
                
                let form = modalEl.querySelector('form');
                form.action = `/admin/emprunteurs/${currentEntityId}/update-kyc-status`;
                
                let documents = '';
                data.user_docs.forEach(doc => {
                    const fileUrl = `/storage/${doc['file_name']}`;
                    const extension = doc['file_name'].split('.').pop().toLowerCase();

                    let preview = `<div class="w-[240px] h-44 flex items-center justify-center bg-gray-100 rounded-md">Aperçu non disponible</div>`;

                    if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension)) {
                        // Images directes
                        preview = `<img src="${fileUrl}" alt="${doc['type']}" 
                                    class="w-full h-full object-cover kt-card-rounded-t" />`;
                    }
                    else if (extension === 'pdf') {
                        const id = `pdf_preview_${doc.id}`;
                        preview = `<div id="${id}" class="w-[240px] h-44 bg-gray-100 rounded-md flex items-center justify-center">Chargement PDF...</div>`;
                        // Après rendu de la carte → générer le canvas PDF
                        setTimeout(() => {
                            renderPdfPreview(`/storage/${doc.file_name}`, document.getElementById(id));
                        }, 300);
                    } 
                    else if (['doc','docx'].includes(extension)) {
                        preview = `<div class="w-[240px] h-44 flex items-center justify-center bg-gray-200 rounded-md text-sm text-gray-600">
                                    Aperçu Word non dispo
                                </div>`;
                    }
                    const formattedType = doc['type']
                        .replace(/_/g, ' ')
                        .replace(/\b\w/g, c => c.toUpperCase());

                    documents += `
                        <div class="kt-card mb-4 border-0 last:me-5">
                            <div class="w-[240px] shrink-0 h-44">
                                <a href="/mon-profil/documents/${doc['id']}/export" target="_blank">${preview}</a>
                            </div>
                            <div class="kt-card-border kt-card-rounded-b px-3.5 pt-5 pb-2.5">
                                <a class="font-medium block text-mono hover:text-primary text-base leading-4 mb-2" 
                                    href="/mon-profil/documents/${doc['id']}/export" target="_blank">
                                    ${formattedType}
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Statut :
                                    <select 
                                        name="doc_status" 
                                        data-doc-id="${doc['id']}" 
                                        class="kt-select"
                                        data-kt-select="true"
                                        data-kt-select-placeholder="Choisir une option..."
                                        data-kt-select-config='{
                                            "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                        }'>
                                        <option value="À approuver" ${doc['status'] === 'À approuver' ? 'selected' : ''}>À approuver</option>
                                        <option value="Validé" ${doc['status'] === 'Validé' ? 'selected' : ''}>Validé</option>
                                        <option value="Refusé" ${doc['status'] === 'Refusé' ? 'selected' : ''}>Refusé</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    `;
                });

                statuses.forEach(status => {
                    const isSelected = data.kyc_status == status.value ? 'selected' : ''; 
                    kycStatusSelect.innerHTML += `
                        <option value="${status.value}" ${isSelected}
                            data-kt-select-option='{"icon": "${status.icon ?? ''}"}'>
                            ${status.label}
                        </option>
                    `;
                });

                modalEl.querySelector('#user_docs').innerHTML = documents;
                modal.show();
                // On réinitialise les KtSelect
                const selectEl = modalEl.querySelector('[data-kt-select="true"]');
                KTSelect.createInstances(selectEl);
            })
            .catch(err => console.error("Erreur lors du chargement :", err));
    }
    document.addEventListener('DOMContentLoaded', () => {
        modalEl.addEventListener('change', (e) => {
            const docId = e.target.dataset.docId;
            const newStatus = e.target.value;

            if (e.target.name === 'doc_status') {
                fetch(`/admin/documents/${docId}/update-status`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(res => res.json())
                .then(resp => {
                    if (resp.success) {
                        console.log("Statut mis à jour :", newStatus);
                    }
                })
                .catch(err => console.error("Erreur maj statut :", err));
            }
            else if (e.target.name === 'kyc_status') {
                if (e.target.value !== 'rejected') {
                    // afficher user_docs
                    document.querySelector('#user_docs').classList.remove('hidden');
                    // cacher reject_motif
                    document.querySelector('#reject_motif').classList.add('hidden');

                    fetch(`/admin/emprunteurs/${currentEntityId}/update-kyc-status`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ status: newStatus })
                    })
                    .then(res => res.json())
                    .then(resp => {
                        var respStatus = resp.success ? 'kt-alert-success' : 'kt-alert-destructive';
                        
                        document.querySelector('#alert_msg').innerHTML = `
                            <div class="kt-alert kt-alert-light ${respStatus}" id="alert_4">
                                <div class="kt-alert-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                                </div>
                                <div class="kt-alert-title">${resp.message}</div>
                                <div class="kt-alert-toolbar">
                                    <div class="kt-alert-actions">
                                        <button class="kt-link kt-link-xs kt-link-underlined text-mono">
                                        Fermer</button>
                                        <button class="kt-alert-close" data-kt-dismiss="#alert_4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
                    })
                    .catch(err => console.error("Erreur maj statut :", err));
                }
                else {
                    // cacher user_docs
                    document.querySelector('#user_docs').classList.add('hidden');
                    // afficher reject_motif
                    document.querySelector('#reject_motif').classList.remove('hidden');
                }
            }
        });
    });

    document.getElementById('search_input').addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        const trList = document.querySelectorAll('[data-kt-datatable-table="true"] tbody tr');

        trList.forEach(tr => {
            const rowText = tr.innerText.toLowerCase();
            tr.style.display = rowText.includes(query) ? '' : 'none';
        });
    });
    </script>
@endsection
