@extends('back.emprunteur.layouts')

@section('title', 'Liste des demandes')

@section('content')
    <!-- Container -->
    <div class="kt-container-fixed" id="contentContainer">
    </div>
    <!-- End of Container -->
    <style>
        .hero-bg {
            background-image: url("{{ asset('assets/media/images/2600x1200/bg-1.png') }}");
        }

        .dark .hero-bg {
            background-image: url("{{ asset('assets/media/images/2600x1200/bg-1-dark.png') }}");
        }
    </style>

    @include('back.emprunteur._profile_container')

    <!-- Container -->
    <div class="kt-container-fixed">
        <!-- begin: projects -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <!-- begin: toolbar -->
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-lg text-mono font-semibold">
                    6 Demandes
                </h3>
                <div class="kt-toggle-group" data-kt-tabs="true">
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
            <!-- end: toolbar -->
            <!-- begin: cards -->
            <div id="projects_cards">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">
                    @forelse($loanRequests as $loan)
                    <div class="kt-card overflow-hidden grow justify-between">
                        <div class="p-5 mb-5">
                            <div class="flex items-center justify-between mb-5">
                                <span class="kt-badge kt-badge-primary kt-badge-outline">
                                    {{ ucfirst($loan->status) }}
                                </span>
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
                                            @if($loan->status === 'En attente')
                                            <div class="kt-menu-item">
                                                <a class="kt-menu-link"
                                                    href="{{ route('emprunteur.loan-requests.edit', $loan) }}">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-setting-3">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Modifier
                                                    </span>
                                                </a>
                                            </div>
                                            @endif
                                            <div class="kt-menu-item">
                                                <a class="kt-menu-link"
                                                    href="/metronic/tailwind/demo2/account/members/import-members">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-some-files">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Documents justificatifs
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="kt-menu-item">
                                                <a class="kt-menu-link" href="/metronic/tailwind/demo2/account/activity">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-cloud-change">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Suivi d'activités
                                                    </span>
                                                </a>
                                            </div>
                                            @if($loan->status === 'En attente')
                                            <form class="kt-menu-item" method="POST" action="{{ route('emprunteur.loan-requests.annuler', $loan) }}" onsubmit="return confirm('Annuler cette demande ?')">
                                                <button type="submit" class="kt-menu-link" data-kt-modal-toggle="#report_user_modal">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-dislike">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Annuler la demande
                                                    </span>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center mb-2">
                                <div class="flex justify-center items-center size-14 rounded-full ring-1 ring-input bg-accent/60">
                                    <i class="ki-filled ki-ghost text-2xl text-muted-foreground"></i>
                                </div>
                            </div>
                            <div class="text-center mb-7">
                                <a class="text-lg font-medium text-mono hover:text-primary" href="{{ route('emprunteur.loan-requests.edit', $loan) }}">
                                    Phoenix SaaS
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Montant : <strong>{{ $loan->amount }} €</strong>
                                </div>
                            </div>
                            <div class="grid justify-center gap-1.5 mb-7.5">
                                <span class="text-xs uppercase text-secondary-foreground text-center">
                                    Contributeurs
                                </span>
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="{{asset('assets/media/avatars/300-1.png')}}" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="{{asset('assets/media/avatars/300-2.png')}}" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="{{asset('assets/media/avatars/300-4.png')}}" />
                                    </div>
                                    <div class="flex">
                                        <span
                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-primary-foreground ring-background bg-primary">
                                            S
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5">
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
                        </div>
                        <div class="kt-progress kt-progress-primary h-1">
                            <div class="kt-progress-indicator" style="width: 60%">
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="kt-card p-8 lg:p-12">
                        <div class="kt-card-content">
                            <div class="grid justify-center py-5">
                                <img alt="" class="dark:hidden max-h-[170px]" src="/static/metronic/tailwind/dist/assets/media/illustrations/11.svg"/>
                                <img alt="" class="light:hidden max-h-[170px]" src="/static/metronic/tailwind/dist/assets/media/illustrations/11-dark.svg"/>
                            </div>
                            <div class="text-lg font-medium text-mono text-center">
                                Upload Item to Get Started
                            </div>
                            <div class="text-sm text-secondary-foreground text-center gap-1">
                                Begin by crafting your inaugural list in minutes.
                                <a class="text-sm font-medium link" href="/metronic/tailwind/demo2/account/billing/plans">
                                Get Started!
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforelse

                    <div class="kt-card overflow-hidden grow justify-between">
                        <div class="p-5 mb-5">
                            <div class="flex items-center justify-between mb-5">
                                <span class="kt-badge kt-badge-outline">
                                    Upcoming
                                </span>
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
                                                    href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                    href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                <a class="kt-menu-link" href="/metronic/tailwind/demo2/account/activity">
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
                            <div class="flex justify-center mb-2">
                                <div class="flex justify-center items-center size-14 rounded-full ring-1 ring-input bg-accent/60">
                                    <i class="ki-filled ki-ghost text-2xl text-muted-foreground"></i>
                                </div>
                            </div>
                            <div class="text-center mb-7">
                                <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                    Golden Gate Analytics
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Team communication and collaboration tool
                                </div>
                            </div>
                            <div class="grid justify-center gap-1.5 mb-7.5">
                                <span class="text-xs uppercase text-secondary-foreground text-center">
                                    team
                                </span>
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-17.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-16.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5">
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        2-4 months
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Duration
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        Global
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Location
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        $25 hour
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Rate
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-progress kt-progress-primary h-1">
                            <div class="kt-progress-indicator" style="width: 20%">
                            </div>
                        </div>
                    </div>
                    <div class="kt-card overflow-hidden grow justify-between">
                        <div class="p-5 mb-5">
                            <div class="flex items-center justify-between mb-5">
                                <span class="kt-badge kt-badge-outline">
                                    Upcoming
                                </span>
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
                                                    href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                    href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                <a class="kt-menu-link" href="/metronic/tailwind/demo2/account/activity">
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
                            <div class="flex justify-center mb-2">
                                <img alt="" class="min-w-12 shrink-0"
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg">
                                </img>
                            </div>
                            <div class="text-center mb-7">
                                <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                    SparkleTech
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Short-term accommodation marketplace
                                </div>
                            </div>
                            <div class="grid justify-center gap-1.5 mb-7.5">
                                <span class="text-xs uppercase text-secondary-foreground text-center">
                                    team
                                </span>
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-19.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5">
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        3-5 months
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Duration
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        Remote
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Location
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        $16 hour
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Rate
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-progress kt-progress-primary h-1">
                            <div class="kt-progress-indicator" style="width: 25%">
                            </div>
                        </div>
                    </div>
                    <div class="kt-card overflow-hidden grow justify-between">
                        <div class="p-5 mb-5">
                            <div class="flex items-center justify-between mb-5">
                                <span class="kt-badge kt-badge-success kt-badge-outline">
                                    Completed
                                </span>
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
                                                    href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                    href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                <a class="kt-menu-link" href="/metronic/tailwind/demo2/account/activity">
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
                            <div class="flex justify-center mb-2">
                                <img alt="" class="min-w-12 shrink-0"
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/equacoin.svg">
                                </img>
                            </div>
                            <div class="text-center mb-7">
                                <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                    Nexus Design System
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Visual discovery and inspiration
                                </div>
                            </div>
                            <div class="grid justify-center gap-1.5 mb-7.5">
                                <span class="text-xs uppercase text-secondary-foreground text-center">
                                    team
                                </span>
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-11.png" />
                                    </div>
                                    <div class="flex">
                                        <span
                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-white ring-background bg-yellow-500">
                                            W
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5">
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        2-6 months
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Duration
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        Onsite
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Location
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        $45 hour
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Rate
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-progress kt-progress-success h-1">
                            <div class="kt-progress-indicator" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="kt-card overflow-hidden grow justify-between">
                        <div class="p-5 mb-5">
                            <div class="flex items-center justify-between mb-5">
                                <span class="kt-badge kt-badge-success kt-badge-outline">
                                    Completed
                                </span>
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
                                                    href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                    href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                <a class="kt-menu-link" href="/metronic/tailwind/demo2/account/activity">
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
                            <div class="flex justify-center mb-2">
                                <img alt="" class="min-w-12 shrink-0"
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/slack.svg">
                                </img>
                            </div>
                            <div class="text-center mb-7">
                                <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                    Neptune App
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Peer-to-peer mobile payment service
                                </div>
                            </div>
                            <div class="grid justify-center gap-1.5 mb-7.5">
                                <span class="text-xs uppercase text-secondary-foreground text-center">
                                    team
                                </span>
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-17.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-19.png" />
                                    </div>
                                    <div class="flex">
                                        <span
                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-white ring-background bg-violet-500">
                                            P
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5">
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        3-8 months
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Duration
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        Flexible
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Location
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        $34 hour
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Rate
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-progress kt-progress-success h-1">
                            <div class="kt-progress-indicator" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="kt-card overflow-hidden grow justify-between">
                        <div class="p-5 mb-5">
                            <div class="flex items-center justify-between mb-5">
                                <span class="kt-badge kt-badge-primary kt-badge-outline">
                                    In Progress
                                </span>
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
                                                    href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                    href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                <a class="kt-menu-link" href="/metronic/tailwind/demo2/account/activity">
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
                            <div class="flex justify-center mb-2">
                                <img alt="" class="min-w-12 shrink-0"
                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/grab.svg">
                                </img>
                            </div>
                            <div class="text-center mb-7">
                                <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                    Radiant Wave
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Team communication and collaboration
                                </div>
                            </div>
                            <div class="grid justify-center gap-1.5 mb-7.5">
                                <span class="text-xs uppercase text-secondary-foreground text-center">
                                    team
                                </span>
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-24.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-7.png" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                                    </div>
                                    <div class="flex">
                                        <span
                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-primary-foreground ring-background bg-primary">
                                            S
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-wrap gap-2 lg:gap-5">
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        2-5 months
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Duration
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        Remote
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Location
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-mono text-sm leading-none font-medium">
                                        $33 hour
                                    </span>
                                    <span class="text-secondary-foreground text-xs">
                                        Rate
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-progress kt-progress-primary h-1">
                            <div class="kt-progress-indicator" style="width: 20%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Voir plus
                    </a>
                </div>
            </div>
            <!-- end: cards -->
            <!-- begin: list -->
            <div class="hidden" id="projects_list">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    @forelse($loanRequests as $loan)
                    <div class="kt-card p-7.5">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center min-w-12">
                                    <div class="flex justify-center items-center size-14 rounded-full ring-1 ring-input bg-accent/60">
                                        <i class="ki-filled ki-ghost text-2xl text-muted-foreground"></i>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-medium text-mono hover:text-primary" href="{{ route('emprunteur.loan-requests.edit', $loan) }}">
                                        Phoenix SaaS
                                    </a>
                                    <div class="text-sm text-secondary-foreground">
                                        Montant : <strong>{{ $loan->amount }} €</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <div class="flex items-center lg:justify-center flex-wrap gap-2 lg:gap-5">
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
                                    <div class="w-[125px] shrink-0">
                                        <span class="kt-badge kt-badge-primary kt-badge-outline">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="grid justify-end min-w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="{{asset('assets/media/avatars/300-1.png')}}" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="{{asset('assets/media/avatars/300-2.png')}}" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="{{asset('assets/media/avatars/300-4.png')}}" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-primary-foreground ring-background bg-primary">
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
                                                @if($loan->status === 'En attente')
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="{{ route('emprunteur.loan-requests.edit', $loan) }}">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-setting-3">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Modifier
                                                        </span>
                                                    </a>
                                                </div>
                                                @endif
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-some-files">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Documents justificatifs
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-cloud-change">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Suivi d'activités
                                                        </span>
                                                    </a>
                                                </div>
                                                @if($loan->status === 'En attente')
                                                <form class="kt-menu-item" method="POST" action="{{ route('emprunteur.loan-requests.annuler', $loan) }}" onsubmit="return confirm('Annuler cette demande ?')">
                                                    @csrf
                                                    <button type="submit" class="kt-menu-link">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-dislike">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Annuler la demande
                                                        </span>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>Aucune demande de prêt pour le moment.</p>
                    @endforelse
                    <div class="kt-card p-7.5">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center min-w-12">
                                    <img alt="" class="min-w-12 shrink-0"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/btcchina.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                        Golden Gate Analytics
                                    </a>
                                    <div class="text-sm text-secondary-foreground">
                                        Team communication and collaboration tool
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <div class="flex items-center lg:justify-center flex-wrap gap-2 lg:gap-5">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                2-4 months
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Duration
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                Global
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Location
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                $25 hour
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Rate
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[125px] shrink-0">
                                        <span class="kt-badge kt-badge-outline">
                                            Upcoming
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="grid justify-end min-w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-17.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
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
                                                        href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                        href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                        href="/metronic/tailwind/demo2/account/activity">
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
                    <div class="kt-card p-7.5">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center min-w-12">
                                    <img alt="" class="min-w-12 shrink-0"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                        SparkleTech
                                    </a>
                                    <div class="text-sm text-secondary-foreground">
                                        Short-term accommodation marketplace
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <div class="flex items-center lg:justify-center flex-wrap gap-2 lg:gap-5">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                3-5 months
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Duration
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                Remote
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Location
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                $16 hour
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Rate
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[125px] shrink-0">
                                        <span class="kt-badge kt-badge-outline">
                                            Upcoming
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="grid justify-end min-w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-19.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
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
                                                        href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                        href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                        href="/metronic/tailwind/demo2/account/activity">
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
                    <div class="kt-card p-7.5">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center min-w-12">
                                    <img alt="" class="min-w-12 shrink-0"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/equacoin.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                        Nexus Design System
                                    </a>
                                    <div class="text-sm text-secondary-foreground">
                                        Visual discovery and inspiration
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <div class="flex items-center lg:justify-center flex-wrap gap-2 lg:gap-5">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                2-6 months
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Duration
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                Onsite
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Location
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                $45 hour
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Rate
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[125px] shrink-0">
                                        <span class="kt-badge kt-badge-success kt-badge-outline">
                                            Completed
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="grid justify-end min-w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-11.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-white ring-background bg-yellow-500">
                                                    W
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
                                                        href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                        href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                        href="/metronic/tailwind/demo2/account/activity">
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
                    <div class="kt-card p-7.5">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center min-w-12">
                                    <img alt="" class="min-w-12 shrink-0"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/slack.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                        Neptune App
                                    </a>
                                    <div class="text-sm text-secondary-foreground">
                                        Peer-to-peer mobile payment service
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <div class="flex items-center lg:justify-center flex-wrap gap-2 lg:gap-5">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                3-8 months
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Duration
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                Flexible
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Location
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                $34 hour
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Rate
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[125px] shrink-0">
                                        <span class="kt-badge kt-badge-success kt-badge-outline">
                                            Completed
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="grid justify-end min-w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-17.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-19.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-white ring-background bg-violet-500">
                                                    P
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
                                                        href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                        href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                        href="/metronic/tailwind/demo2/account/activity">
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
                    <div class="kt-card p-7.5">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center min-w-12">
                                    <img alt="" class="min-w-12 shrink-0"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/grab.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-medium text-mono hover:text-primary" href="">
                                        Radiant Wave
                                    </a>
                                    <div class="text-sm text-secondary-foreground">
                                        Team communication and collaboration
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-12">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <div class="flex items-center lg:justify-center flex-wrap gap-2 lg:gap-5">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                2-5 months
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Duration
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                Remote
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Location
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-mono text-sm leading-none font-medium">
                                                $33 hour
                                            </span>
                                            <span class="text-secondary-foreground text-xs">
                                                Rate
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[125px] shrink-0">
                                        <span class="kt-badge kt-badge-primary kt-badge-outline">
                                            In Progress
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="grid justify-end min-w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-24.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-7.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-7"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-7 text-primary-foreground ring-background bg-primary">
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
                                                        href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                        href="/metronic/tailwind/demo2/account/members/import-members">
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
                                                        href="/metronic/tailwind/demo2/account/activity">
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
                        Voir plus
                    </a>
                </div>
            </div>
            <!-- end: list -->
        </div>
        <!-- end: projects -->
    </div>
    <!-- End of Container -->
@endsection

@section('javascripts')
@endsection
