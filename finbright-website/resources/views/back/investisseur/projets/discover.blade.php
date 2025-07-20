@extends('back.investisseur.layouts')

@section('title', 'Découvrir les projets')

@section('content')
    <div class="kt-container-fixed">
        <!-- begin: projects -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <!-- begin: toolbar -->
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-lg text-mono font-semibold">
                    12 Demandes de prêts à financer
                </h3>
                <div class="flex items-center flex-wrap gap-5">
                    <div class="flex items-center gap-2.5">
                        <select class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Select a status">
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
                            <select class="kt-select w-36" data-kt-select="true" data-kt-select-placeholder="Select a sort">
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
                            Filters
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
                                <img alt="" class=""
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/plurk.svg" />
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
                                Phoenix SaaS
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Montant : {{ $loan->amount }} €
                            </span>
                        </div>
                        <div class="flex items-center justify-between flex-wrap gap-2 mb-3.5 lg:mb-7">
                            <div
                                class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                <span class="text-secondary-foreground text-xs">
                                    Durée
                                </span>
                                <span class="text-mono text-sm leading-none font-medium">
                                    {{ $loan->duration }} mois
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

                    <div class="kt-card p-7.5">
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
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="{{asset('assets/media/brand-blank.svg')}}" />
                            </div>
                            <a class="kt-btn kt-btn-outline">
                                <i class="ki-filled ki-check-circle"></i>
                                Déjà investi
                            </a>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Dreamweaver
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Social media photo sharing
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 05
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 12
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-input mb-4 lg:mb-8">
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
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
                            </div>
                            <div class="flex">
                                <span
                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                    +10
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="{{asset('assets/media/brand-blank.svg')}}" />
                            </div>
                            <span class="kt-badge kt-badge-primary kt-badge-outline">
                                In Progress
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Horizon Quest
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Team communication and collaboration
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 03
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 11
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-primary mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 19%">
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
                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-destructive-inverse ring-background bg-destructive">
                                    M
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="{{asset('assets/media/brand-logos/blank.svg')}}" />
                            </div>
                            <span class="kt-badge kt-badge-outline">
                                Upcoming
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Golden Gate Analytics
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Note-taking and organization app
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 22
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 14
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-input mb-4 lg:mb-8">
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
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="{{asset('assets/media/brand-logos/blank.svg')}}" />
                            </div>
                            <span class="kt-badge kt-badge-success kt-badge-outline">
                                Completed
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Celestial SaaS
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                CRM App application to HR efficienty
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 14
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 25
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
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="{{asset('assets/media/avatars/blank.png')}}" />
                            </div>
                            <div class="flex">
                                <span
                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                    +10
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="{{asset('assets/media/brand-blank.svg')}}" />
                            </div>
                            <span class="kt-badge kt-badge-outline">
                                Upcoming
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Nexus Design System
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Online discussion and forum platform
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 17
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 08
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-input mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 100%">
                            </div>
                        </div>
                        <div class="flex -space-x-2">
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-14.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-19.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/btcchina.svg" />
                            </div>
                            <span class="kt-badge kt-badge-primary kt-badge-outline">
                                In Progress
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                Neptune App
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Team messaging and collaboration
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
                        <div class="kt-progress h-1.5 kt-progress-primary mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 35%">
                            </div>
                        </div>
                        <div class="flex -space-x-2">
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-21.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-32.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                            </div>
                            <div class="flex">
                                <span
                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                    +1
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/patientory.svg" />
                            </div>
                            <span class="kt-badge kt-badge-outline">
                                Upcoming
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                SparkleTech
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Meditation and relaxation app
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 14
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 21
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-input mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 100%">
                            </div>
                        </div>
                        <div class="flex -space-x-2">
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                            </div>
                            <div class="flex">
                                <span
                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                    K
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg" />
                            </div>
                            <span class="kt-badge kt-badge-success kt-badge-outline">
                                Completed
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                EmberX CRM
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Commission-free stock trading
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 01
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 13
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
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-12.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-20.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                            </div>
                            <div class="flex">
                                <span
                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                    +5
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/plastic-scm.svg" />
                            </div>
                            <span class="kt-badge kt-badge-outline">
                                Upcoming
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                LunaLink
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Meditation and relaxation app
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 14
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 21
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-input mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 100%">
                            </div>
                        </div>
                        <div class="flex -space-x-2">
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-16.png" />
                            </div>
                        </div>
                    </div>
                    <div class="kt-card p-7.5">
                        <div class="flex items-center justify-between mb-3 lg:mb-6">
                            <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60">
                                <img alt="" class=""
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/perrier.svg" />
                            </div>
                            <span class="kt-badge kt-badge-primary kt-badge-outline">
                                In Progress
                            </span>
                        </div>
                        <div class="flex flex-col mb-3 lg:mb-6">
                            <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                TerraCrest App
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                Video conferencing software
                            </span>
                        </div>
                        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                            <span class="text-sm text-secondary-foreground">
                                Start:
                                <span class="text-sm font-medium text-foreground">
                                    Mar 22
                                </span>
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                End:
                                <span class="text-sm font-medium text-foreground">
                                    Dec 28
                                </span>
                            </span>
                        </div>
                        <div class="kt-progress h-1.5 kt-progress-primary mb-4 lg:mb-8">
                            <div class="kt-progress-indicator" style="width: 55%">
                            </div>
                        </div>
                        <div class="flex -space-x-2">
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                            </div>
                            <div class="flex">
                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                            </div>
                            <div class="flex">
                                <span
                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                    F
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Show more projects
                    </a>
                </div>
            </div>
            <!-- end: cards -->
            <!-- begin: list -->
            <div class="hidden" id="projects_list">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/plurk.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Phoenix SaaS
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Real-time photo sharing app
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-primary kt-badge-outline">
                                        In Progress
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
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
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
                    <div class="kt-card p-7">
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
                    </div>
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/kickstarter.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Dreamweaver
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Social media photo sharing
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-outline">
                                        Upcoming
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-input">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-21.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                                    +10
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/quickbooks.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Horizon Quest
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Team communication and collaboration
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-primary kt-badge-outline">
                                        In Progress
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-primary">
                                        <div class="kt-progress-indicator" style="width: 19%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-destructive-inverse ring-background bg-destructive">
                                                    M
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/google-analytics.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Golden Gate Analytics
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Note-taking and organization app
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-outline">
                                        Upcoming
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-input">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-17.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-16.png" />
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/google-webdev.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Celestial SaaS
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        CRM App application to HR efficienty
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
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-6.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-23.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-12.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                                    +10
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/figma.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Nexus Design System
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Online discussion and forum platform
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-outline">
                                        Upcoming
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-input">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-14.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-19.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/btcchina.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Neptune App
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Team messaging and collaboration
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-primary kt-badge-outline">
                                        In Progress
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-primary">
                                        <div class="kt-progress-indicator" style="width: 35%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-21.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-32.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                                    +1
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/patientory.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        SparkleTech
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Meditation and relaxation app
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-outline">
                                        Upcoming
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-input">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                                    K
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        EmberX CRM
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Commission-free stock trading
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
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-12.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-20.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white ring-background bg-green-500">
                                                    +5
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/plastic-scm.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px"
                                        href="#">
                                        LunaLink
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Meditation and relaxation app
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-outline">
                                        Upcoming
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-input">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-16.png" />
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
                    <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/perrier.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px"
                                        href="#">
                                        TerraCrest App
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Video conferencing software
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-primary kt-badge-outline">
                                        In Progress
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
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                                    F
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