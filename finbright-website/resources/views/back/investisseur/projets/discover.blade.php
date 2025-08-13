@extends('back.investisseur.layouts')

@section('title', 'Découvrir les projets')

@section('content')
    <div class="kt-container-fixed">
        <!-- begin: projects -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <!-- begin: toolbar -->
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-lg text-mono font-semibold">
                    {{ count($loanRequests) < 10 ? '0'. count($loanRequests) : count($loanRequests) }} Demandes de prêts à financer
                </h3>
                <div class="flex items-center flex-wrap gap-5">
                    <div class="flex items-center gap-2.5">
                        <select class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Statut">
                            <option value="1">
                            Active
                            </option>
                            <option value="2">
                            Disabled
                            </option>
                            <option value="2">
                            Pending
                            </option>
                            </select>
                            <select class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Ordre">
                            <option value="1">
                            Latest
                            </option>
                            <option value="2">
                            Older
                            </option>
                            <option value="3">
                            Oldest
                            </option>
                        </select>
                        <button class="kt-btn kt-btn-outline kt-btn-primary">
                            <i class="ki-filled ki-setting-4">
                            </i>
                            Filtres
                        </button>
                    </div>
                    <div class="flex">
                        <label class="kt-input">
                            <i class="ki-filled ki-magnifier">
                            </i>
                            <input placeholder="Entrer un nom, objet" type="text" value=""/>
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
                    @foreach($loanRequests as $loan)
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class="rounded-md"
                                    src="{{ $loan->user->profilePicture ? Storage::url($loan->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                            </div>
                            <form method="POST" action="{{ route('investisseur.investir', $loan) }}" class="mt-3">
                                @csrf
                                {{-- <input type="number" name="amount" placeholder="Montant à investir (€)" class="input" min="100" required> --}}
                                <button type="submit" class="kt-btn kt-btn-primary">
                                    <i class="ki-filled ki-users"></i>
                                    Investir
                                </button>
                            </form>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                {{ $loan->object ?? 'NaN' }}
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Montant : {{ $loan->simulation_result['total']. ' €' ?? null }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between flex-wrap gap-2 mb-3.5 lg:mb-7">
                            <div
                                class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                <span class="text-secondary-foreground text-xs">
                                    Durée
                                </span>
                                <span class="text-mono text-sm leading-none font-medium">
                                    {{ $loan->simulation_result['duration']. ' mois' ?? 'Non disponible' }}
                                </span>
                            </div>
                            <div
                                class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                <span class="text-secondary-foreground text-xs">
                                    Mensualité
                                </span>
                                <span class="text-mono text-sm leading-none font-medium">
                                    {{ number_format($loan->simulation_result['mensualite'], 2) }} €
                                </span>
                            </div>
                            <div
                                class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                <span class="text-secondary-foreground text-xs">
                                    Total
                                </span>
                                <span class="text-mono text-sm leading-none font-medium">
                                    {{ number_format($loan->simulation_result['total'], 2) }} €
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
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
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
                    @foreach($loanRequests as $loan)
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class="rounded-md"
                                        src="{{ $loan->user->profilePicture ? Storage::url($loan->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        {{ $loan->object ?? 'NaN' }}
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        {{ substr($loan->description, 0, 80) }}...
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    @if ($loan->status == "En attente") <span class="kt-badge kt-badge-primary kt-badge-outline">
                                    @elseif ($loan->status == "Collecte en attente") <span class="kt-badge kt-badge-succes kt-badge-outline">
                                    @elseif ($loan->status == "Annulée") <span class="kt-badge kt-badge-destructive kt-badge-outline">@endif
                                        {{ ucfirst($loan->status) }}
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-primary">
                                        <div class="kt-progress-indicator" style="width: 55%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="{{asset('assets/media/avatars/300-4.png')}}" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="{{asset('assets/media/avatars/300-2.png')}}" />
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
@endsection

@section('javascripts')
@endsection