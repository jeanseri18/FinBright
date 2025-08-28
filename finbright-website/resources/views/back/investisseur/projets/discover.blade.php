@extends('back.investisseur.layouts')

@section('title', 'Découvrir les projets')

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
                        <select class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Niveau de risque">
                            <option value="A">Faible</option>
                            <option value="B">Moyen</option>
                            <option value="C">Élévé</option>
                        </select>
                        <button type="submit" class="kt-btn kt-btn-outline kt-btn-primary">
                            <i class="ki-filled ki-setting-4">
                            </i>
                            Filtrer
                        </button>
                    </form>
                    <div class="flex">
                        <label class="kt-input">
                            <i class="ki-filled ki-magnifier">
                            </i>
                            <input placeholder="Entrer un nom, objet" type="text" value="" />
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
                        <div class="kt-card p-7.5">
                            <div class="flex items-center justify-between mb-3 lg:mb-6">
                                <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60"
                                    data-kt-tooltip="true" data-kt-tooltip-placement="top-start">
                                    <img alt="" class="rounded-md"
                                        src="{{ $loan->user->profilePicture ? Storage::url($loan->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                    <span data-kt-tooltip-content="true" class="kt-tooltip kt-tooltip-light">
                                        <span class="flex items-center gap-2">
                                            <span class="flex items-center gap-1.5"><i
                                                    class="ki-filled ki-user-square"></i></span>
                                            {{ $loan->user->first_name }} {{ $loan->user->last_name }}
                                        </span>
                                    </span>
                                </div>
                                <button type="button" class="kt-btn kt-btn-primary" onclick="openFicheDetail({{ $loan->id }})">
                                    <i class="ki-filled ki-users"></i>
                                    Voir détails
                                </button>
                            </div>
                            <div class="flex flex-col mb-3 lg:mb-6">
                                <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#" onclick="openFicheDetail({{ $loan->id }})">
                                    {{ $loan->object ?? 'NaN' }}
                                </a>
                                <span class="text-sm text-secondary-foreground">
                                    Montant : {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between flex-wrap gap-2 mb-3.5 lg:mb-7">
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Durée
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Taux
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->user->riskLevel ? $loan->user->riskLevel->yield . '%' : 'Non évalué' }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Niveau de risque
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->user->riskLevel ? ($loan->user->riskLevel->profile == 'A' ? 'Risque faible' : ($loan->user->riskLevel->profile == 'B' ? 'Risque moyen' : 'Risque élévé')) : 'Non évalué' }}
                                    </span>
                                </div>
                            </div>
                            <div class="kt-progress h-1.5 kt-progress-primary mb-4 lg:mb-8">
                                <div class="kt-progress-indicator" style="width: 55%">
                                </div>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="flex">
                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                        src="{{ asset('assets/media/avatars/blank.png') }}" />
                                </div>
                                <div class="flex">
                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                        src="{{ asset('assets/media/avatars/blank.png') }}" />
                                </div>
                                <div class="flex">
                                    <span
                                        class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                        S
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="{{asset('assets/media/brand-blank.svg')}}" />
                            </div>
                            <a class="kt-btn kt-btn-primary">
                                <i class="ki-filled ki-users"></i>
                                Investir
                            </a>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Radiant Wave
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Short-term accommodation marketplace
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 09
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 23
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-success mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 100%">
                            </div>
                        </div>
                        <div class="flex -space-x-2">
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
                            </div>
                        </div>
                    </div> --}}
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
                                            src="{{ $loan->user->profilePicture ? Storage::url($loan->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                                        </img>
                                    </div>
                                    <div class="flex flex-col">
                                        <a class="text-lg font-media/brand text-mono hover:text-primary mb-px"
                                            href="#">
                                            {{ $loan->object ?? 'NaN' }}
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            {{ substr($loan->description, 0, 35) }}...
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                    {{-- <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                        @if ($loan->status == 'En attente')
                                            <span class="kt-badge kt-badge-primary kt-badge-outline">
                                            @elseif ($loan->status == 'Collecte en attente')
                                                <span class="kt-badge kt-badge-succes kt-badge-outline">
                                                @elseif ($loan->status == 'Annulée')
                                                    <span class="kt-badge kt-badge-destructive kt-badge-outline">
                                        @endif
                                        {{ ucfirst($loan->status) }}
                                        </span>
                                        <div class="kt-progress h-1.5 w-36 kt-progress-primary">
                                            <div class="kt-progress-indicator" style="width: 55%">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="flex">
                                        <span class="text-sm text-secondary-foreground">
                                            Montant : {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Durée
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Taux
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->user->riskLevel ? $loan->user->riskLevel->yield . '%' : 'Non évalué' }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Niveau de risque
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->user->riskLevel ? ($loan->user->riskLevel->profile == 'A' ? 'Risque faible' : ($loan->user->riskLevel->profile == 'B' ? 'Risque moyen' : 'Risque élévé')) : 'Non évalué' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-5 lg:gap-14">
                                        <div class="flex justify-end w-24">
                                            <div class="flex -space-x-2">
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                        src="{{ asset('assets/media/avatars/300-4.png') }}" />
                                                </div>
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                        src="{{ asset('assets/media/avatars/300-2.png') }}" />
                                                </div>
                                                <div class="flex">
                                                    <span
                                                        class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                                        S
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
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
                                                            href="#" onclick="openFicheDetail({{ $loan->id }})">
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
                                                            href="">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-setting-3">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Tableau d'amortissement
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
                    {{-- <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/telegram.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Radiant Wave
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Short-term accommodation marketplace
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-success kt-badge-outline">
                                        Completed
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-success">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-24.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-7.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end" data-kt-menu-item-toggle="dropdown"
                                            data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                                data-kt-menu-dismiss="true">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo9/account/home/settings-enterprise">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-setting-3">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Settings
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo9/account/members/import-members">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-some-files">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Import
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo9/account/activity">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-cloud-change">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Activity
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" data-kt-modal-toggle="#report_user_modal"
                                                        href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-dislike">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Report
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
    <div class="kt-modal" data-kt-modal="true" id="report_user_modal">
        <div class="kt-modal-content max-w-[500px] top-[15%]">
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
                        <div class="grid md:grid-cols-2 gap-4">
                            <p><strong>Montant demandé :</strong> <span id="modal_project_amount"></span></p>
                            <p><strong>Durée :</strong> <span id="modal_project_duration"></span></p>
                            <p><strong>Taux d'intérêt :</strong> <span id="modal_project_rate"></span></p>
                            <p><strong>Niveau de risque :</strong> <span id="modal_project_risk"></span></p>
                            <p><strong>Montant restant :</strong> <span id="modal_project_remaining_amount"></span></p>
                        </div>
                        <p><strong>Description :</strong></p>
                        <div class="kt-scrollable overflow-y-auto max-h-[300px] pe-2 w-full">
                            <p id="modal_project_description" class="text-gray-700"></p>
                        </div>
                        <select class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Type de prêt">
                            <option>Prêt sans intérêt</option>
                            <option>Prêt avec intérêt</option>
                            <option>Dons</option>
                        </select>
                        <div class="kt-input-group">
                            <input type="number" name="amount" min="" max="2000" placeholder="Montant à investir" class="kt-input" required onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                            <span class="kt-input-addon kt-input-addon-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-euro" aria-hidden="true">
                                    <path d="M4 10h12"></path>
                                    <path d="M4 14h9"></path>
                                    <path d="M19 6a7.7 7.7 0 0 0-5.2-2A7.9 7.9 0 0 0 6 12c0 4.4 3.5 8 7.8 8 2 0 3.8-.8 5.2-2"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="border-b border-b-border">
                    </div>
                    <div class="text-2sm font-medium text-foreground py-5 px-8">
                        <ul class="list-disc">
                            <li>Prêt sans intérêt : maximum 5000 €.</li>
                            <li>Prêt avec intérêt : maximum 2000 €.</li>
                            <li>Dons : pas de limite.</li>
                        </ul>
                    </div>
                    <div class="border-b border-b-border">
                    </div>
                    <div class="flex items-center gap-2.5 justify-end p-5" id="report_user_modal">
                        <button type="submit" class="kt-btn kt-btn-primary">Investir</button>
                        <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @section('javascripts')
        <script type="text/javascript">
        const modalEl = document.querySelector('#report_user_modal');
        const modal = KTModal.getInstance(modalEl);
		function openFicheDetail(loanId) {
            fetch(`/investisseur/projet/${loanId}/json`)
                .then(res => res.json())
                .then(data => {
                    const formatter = new Intl.NumberFormat('fr-FR', {
                        style: 'currency',
                        currency: 'EUR',
                        minimumFractionDigits: 0
                    });
                    document.getElementById('modal_project_subject').innerText = data.object || "Projet étudiant";
                    document.getElementById('modal_project_name').innerText = data.user_name;
                    document.getElementById('modal_project_amount').innerText = formatter.format(data.amount);
                    document.getElementById('modal_project_remaining_amount').innerText = formatter.format(data.remaining_amount);
                    document.getElementById('modal_project_duration').innerText = data.duration + " mois";
                    document.getElementById('modal_project_rate').innerText = data.risk_rate ? (data.risk_rate +"%") : 'Inconnu';
                    document.getElementById('modal_project_risk').innerText = data.risk_level ? (data.risk_level == "A" ? "Faible" : (data.risk_level == "B" ? "Moyen" : "Élévé")) : "Inconnu";
                    document.getElementById('modal_project_description').innerText = data.description ?? "";

                    document.getElementById('modal_project_avatar').src = data.avatar ? ('/storage/'+ data.avatar) : "{{asset('assets/media/avatars/blank.png')}}";

                    // Update invest form
                    let form = document.getElementById('modal_invest_form');
                    form.action = `/investisseur/contribuer/${loanId}`;

                    // Ouvrir le modal
                    modal.show();
                });
        }
        </script>
    @endsection
