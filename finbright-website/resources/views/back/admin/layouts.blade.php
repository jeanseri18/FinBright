<!DOCTYPE html>
<!--
Author: DIGIT'comm - Moussa Fofana
Product Name: Fin'Bright
Website: https://digitcommunication.ci/
Email:
Contact:
-->
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="author" content="DIGIT'comm : Moussa Fofana" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description" />

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('title', ' | Investisseur Backoffice')</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/media/app/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
    <link href="{{ asset('assets/media/app/favicon-32x32.png') }}" rel="icon" sizes="32x32" type="image/png" />
    <link href="{{ asset('assets/media/app/favicon-16x16.png') }}" rel="icon" sizes="16x16" type="image/png" />
    <link href="{{ asset('assets/media/app/favicon.ico') }}" rel="shortcut icon" />

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />

    <link href="{{ asset('assets/vendors/apexcharts/apexcharts.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/keenicons/styles.bundle.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('stylesheet')
</head>

<body
    class="antialiased flex h-full text-base text-foreground bg-background [--header-height:60px] [--sidebar-width:270px] lg:overflow-hidden bg-mono dark:bg-background">
    <!-- Theme Mode -->
    <script>
        const defaultThemeMode = 'system'; // light|dark|system
        let themeMode;

        if (document.documentElement) {
            if (localStorage.getItem('kt-theme')) {
                themeMode = localStorage.getItem('kt-theme');
            } else if (
                document.documentElement.hasAttribute('data-kt-theme-mode')
            ) {
                themeMode =
                    document.documentElement.getAttribute('data-kt-theme-mode');
            } else {
                themeMode = defaultThemeMode;
            }

            if (themeMode === 'system') {
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                    'dark' :
                    'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <!-- End of Theme Mode -->
    <!-- Page -->
    <!-- Base -->
    <div class="flex grow">
        <!-- Header -->
        <header
            class="flex lg:hidden items-center fixed z-10 top-0 start-0 end-0 shrink-0 bg-mono dark:bg-background h-(--header-height)"
            id="header">
            <!-- Container -->
            <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
                <a href="">
                    <img class="size-[34px]" src="{{ asset('assets/media/app/mini-logo-circle-success.svg') }}" />
                </a>
                <button class="kt-btn kt-btn-icon kt-btn-dim hover:text-white -me-2" data-kt-drawer-toggle="#sidebar">
                    <i class="ki-filled ki-menu">
                    </i>
                </button>
            </div>
            <!-- End of Container -->
        </header>
        <!-- End of Header -->
        <!-- Wrapper -->
        <div class="flex flex-col lg:flex-row grow pt-(--header-height) lg:pt-0">
            <!-- Sidebar -->
            <div class="flex-col fixed top-0 bottom-0 z-20 hidden lg:flex items-stretch shrink-0 w-(--sidebar-width) dark [--kt-drawer-enable:true] lg:[--kt-drawer-enable:false]"
                data-kt-drawer="true" data-kt-drawer-class="kt-drawer kt-drawer-start flex top-0 bottom-0"
                id="sidebar">
                <!-- Sidebar Header -->
                <div class="flex flex-col gap-2.5" id="sidebar_header">
                    <div class="flex items-center gap-2.5 px-3.5 h-[70px]">
                        <a href="/metronic/tailwind/demo10/index.html">
                            <img class="size-[34px]" src="{{ asset('assets/media/app/mini-logo-circle.png') }}" />
                        </a>
                        <div class="kt-menu kt-menu-default grow" data-kt-menu="true">
                            <div class="kt-menu-item grow" data-kt-menu-item-offset="0, 15px">
                                <div class="kt-menu-label cursor-pointer text-mono font-medium grow justify-between">
                                    <span class="text-lg font-medium text-inverse grow">
                                        Fin'Bright Admin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 px-3.5">
                        <!-- Input -->
                        <a class="kt-btn kt-btn-secondary text-white [&amp;_i]:text-white justify-center min-w-[198px]"
                            href="">
                            <i class="ki-filled ki-plus">
                            </i>
                            Add New
                        </a>
                        <!-- End of Input -->
                        <button class="kt-btn kt-btn-icon kt-btn-secondary [&amp;_i]:text-white"
                            data-kt-modal-toggle="#search_modal">
                            <i class="ki-filled ki-magnifier">
                            </i>
                        </button>
                    </div>
                </div>
                <!-- End of Sidebar Header -->
                <!-- Sidebar menu -->
                <div class="flex items-stretch grow shrink-0 justify-center my-5" id="sidebar_menu">
                    <div class="kt-scrollable-y-auto grow" data-kt-scrollable="true"
                        data-kt-scrollable-dependencies="#sidebar_header, #sidebar_footer"
                        data-kt-scrollable-height="auto" data-kt-scrollable-offset="0px"
                        data-kt-scrollable-wrappers="#sidebar_menu">
                        <!-- Primary Menu -->
                        <div class="mb-5">
                            <div class="kt-menu flex flex-col w-full gap-1.5 px-3.5" data-kt-menu="true"
                                data-kt-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                                <div class="kt-menu-item {{ session('menu_actif') === 'dashboard' ? 'active' : '' }}">
                                    <a class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-active:bg-accent/60 kt-menu-link-hover:bg-accent/60 !menu-item-here:bg-transparent"
                                        href="{{ route('admin.dashboard') }}">
                                        <span
                                            class="kt-menu-icon items-start text-lg text-secondary-foreground kt-menu-item-active:text-mono kt-menu-item-here:text-mono">
                                            <i class="ki-filled ki-home-3">
                                            </i>
                                        </span>
                                        <span
                                            class="kt-menu-title text-sm text-foreground font-medium kt-menu-item-here:text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                            Tableau de bord
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h3 class="text-sm text-muted-foreground uppercase ps-5 inline-block my-3">
                                Projets
                            </h3>
                            <div class="kt-menu flex flex-col w-full gap-1.5 px-3.5" data-kt-menu="true"
                                data-kt-menu-accordion-expand-all="false" id="sidebar_primary_menu">

                                <div class="kt-menu-item {{ in_array(session('menu_actif'), ['demande_prets', 'projets_en_cours', 'liste_invest']) ? 'here show' : null }}" 
                                    data-kt-menu-item-toggle="accordion"
                                    data-kt-menu-item-trigger="click">
                                    <div
                                        class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-hover:bg-transparent kt-menu-item-here:bg-transparent">
                                        <span
                                            class="kt-menu-icon items-start text-muted-foreground text-lg kt-menu-item-here:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                            <i class="ki-filled ki-two-credit-cart"></i>
                                        </span>
                                        <span
                                            class="kt-menu-title font-medium text-sm text-secondary-foreground kt-menu-item-here:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                            Gestion des projets
                                        </span>
                                        <span
                                            class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-muted-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                            <span class="inline-flex kt-menu-item-show:hidden">
                                                <i class="ki-filled ki-down text-xs">
                                                </i>
                                            </span>
                                            <span class="hidden kt-menu-item-show:inline-flex">
                                                <i class="ki-filled ki-up text-xs">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="kt-menu-accordion gap-px ps-7">
                                        <div class="kt-menu-item {{ session('menu_actif') === 'projets_en_cours' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="{{ route('admin.prets.enCours') }}">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Projets en cours
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item {{ session('menu_actif') === 'demande_prets' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="{{ route('admin.prets.demandes') }}">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Demandes de prêts
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item {{ session('menu_actif') === 'liste_invest' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="{{ route('admin.investissements.liste') }}">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Investissements
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-menu flex flex-col w-full gap-1.5 px-3.5" data-kt-menu="true"
                                data-kt-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                                <div class="kt-menu-item {{ session('menu_actif') === 'emprunteurs' ? 'active' : '' }}">
                                    <a class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-active:bg-accent/60 kt-menu-link-hover:bg-accent/60 !menu-item-here:bg-transparent"
                                        href="{{ route('admin.emprunteurs.liste') }}">
                                        <span
                                            class="kt-menu-icon items-start text-lg text-secondary-foreground kt-menu-item-active:text-mono kt-menu-item-here:text-mono">
                                            <i class="ki-filled ki-people"></i>
                                        </span>
                                        <span
                                            class="kt-menu-title text-sm text-foreground font-medium kt-menu-item-here:text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                            Liste des emprunteurs
                                        </span>
                                    </a>
                                </div>
                                <div class="kt-menu-item {{ session('menu_actif') === 'investisseurs' ? 'active' : '' }}">
                                    <a class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-active:bg-accent/60 kt-menu-link-hover:bg-accent/60 !menu-item-here:bg-transparent"
                                        href="{{ route('admin.investisseurs.liste') }}">
                                        <span
                                            class="kt-menu-icon items-start text-lg text-secondary-foreground kt-menu-item-active:text-mono kt-menu-item-here:text-mono">
                                            <i class="ki-filled ki-users"></i>
                                        </span>
                                        <span
                                            class="kt-menu-title text-sm text-foreground font-medium kt-menu-item-here:text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                            Liste des investisseurs
                                        </span>
                                    </a>
                                </div>
                                <div class="kt-menu-item {{ in_array(session('menu_actif'), ['etablissements', 'taux_interet']) ? 'here show' : null }}" 
                                    data-kt-menu-item-toggle="accordion"
                                    data-kt-menu-item-trigger="click">
                                    <div
                                        class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-hover:bg-transparent kt-menu-item-here:bg-transparent">
                                        <span
                                            class="kt-menu-icon items-start text-muted-foreground text-lg kt-menu-item-here:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                            <i class="ki-filled ki-setting-2">
                                            </i>
                                        </span>
                                        <span
                                            class="kt-menu-title font-medium text-sm text-secondary-foreground kt-menu-item-here:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                            Réglage
                                        </span>
                                        <span
                                            class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-muted-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                            <span class="inline-flex kt-menu-item-show:hidden">
                                                <i class="ki-filled ki-down text-xs">
                                                </i>
                                            </span>
                                            <span class="hidden kt-menu-item-show:inline-flex">
                                                <i class="ki-filled ki-up text-xs">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="kt-menu-accordion gap-px ps-7">
                                        <div class="kt-menu-item {{ session('menu_actif') === 'etablissements' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="{{ route('admin.reglage.etablissements') }}">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Liste des établissements
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item {{ session('menu_actif') === 'taux_interet' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="{{ route('admin.reglage.taux') }}">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Modifier les taux d'intérêt
                                                </span>
                                            </a>
                                        </div>
                                        {{-- <div class="kt-menu-item">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    API Keys
                                                </span>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Primary Menu -->
                        <!-- Secondary Menu -->
                        <div>
                            <h3 class="text-sm text-muted-foreground uppercase ps-5 inline-block mb-3">
                                Sécurité
                            </h3>
                            <div class="kt-menu flex flex-col w-full gap-1.5 px-3.5" data-kt-menu="true"
                                data-kt-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                                <div class="kt-menu-item {{ in_array(session('menu_actif'), ['utilisateurs', 'roles']) ? 'here show' : null }}" data-kt-menu-item-toggle="accordion"
                                    data-kt-menu-item-trigger="click">
                                    <div
                                        class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-hover:bg-transparent kt-menu-item-here:bg-transparent">
                                        <span
                                            class="kt-menu-icon items-start text-muted-foreground text-lg kt-menu-item-here:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                            <i class="ki-filled ki-user"></i>
                                        </span>
                                        <span
                                            class="kt-menu-title font-medium text-sm text-secondary-foreground kt-menu-item-here:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                            Gestion des utilisateurs
                                        </span>
                                        <span
                                            class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-muted-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                            <span class="inline-flex kt-menu-item-show:hidden">
                                                <i class="ki-filled ki-down text-xs">
                                                </i>
                                            </span>
                                            <span class="hidden kt-menu-item-show:inline-flex">
                                                <i class="ki-filled ki-up text-xs">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="kt-menu-accordion gap-px ps-7">
                                        <div class="kt-menu-item {{ session('menu_actif') === 'utilisateurs' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="{{ route('admin.securite.utilisateurs') }}">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Liste des utilisateurs
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item {{ session('menu_actif') === 'roles' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Rôles
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item {{ session('menu_actif') === 'permissions' ? 'active' : '' }}">
                                            <a class="kt-menu-link py-2 px-2.5 rounded-md kt-menu-item-active:bg-secondary kt-menu-link-hover:bg-secondary"
                                                href="">
                                                <span
                                                    class="kt-menu-title text-sm text-foreground kt-menu-item-active:font-medium kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                    Permissions
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <a class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-active:bg-accent/60 kt-menu-link-hover:bg-accent/60 !menu-item-here:bg-transparent"
                                        href="">
                                        <span
                                            class="kt-menu-icon items-start text-lg text-secondary-foreground kt-menu-item-active:text-mono kt-menu-item-here:text-mono">
                                            <i class="ki-filled ki-graph-3"></i>
                                        </span>
                                        <span
                                            class="kt-menu-title text-sm text-foreground font-medium kt-menu-item-here:text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                            ChangeLogs
                                        </span>
                                    </a>
                                </div>
                                <div class="kt-menu-item">
                                    <a class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md kt-menu-item-active:bg-accent/60 kt-menu-link-hover:bg-accent/60 !menu-item-here:bg-transparent"
                                        href="">
                                        <span
                                            class="kt-menu-icon items-start text-lg text-secondary-foreground kt-menu-item-active:text-mono kt-menu-item-here:text-mono">
                                            <i class="ki-filled ki-trash"></i>
                                        </span>
                                        <span
                                            class="kt-menu-title text-sm text-foreground font-medium kt-menu-item-here:text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                            Corbeil
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Secondary Menu -->
                    </div>
                </div>
                <!-- End of Sidebar kt-menu-->
                <!-- Footer -->
                <div class="flex flex-center justify-between shrink-0 ps-4 pe-3.5 mb-3.5" id="sidebar_footer">
                    <!-- User -->
                    <div data-kt-dropdown="true" data-kt-dropdown-offset="10px, 10px"
                        data-kt-dropdown-offset-rtl="-20px, 10px" data-kt-dropdown-placement="bottom-start"
                        data-kt-dropdown-placement-rtl="bottom-end" data-kt-dropdown-trigger="click">
                        <div class="cursor-pointer shrink-0" data-kt-dropdown-toggle="true">
                            <img alt=""
                                class="size-9 rounded-full border-2 border-mono/25 shrink-0 cursor-pointer"
                                src="{{ asset('assets/media/avatars/gray/5.png') }}" />
                        </div>
                        <div class="kt-dropdown-menu w-[250px]" data-kt-dropdown-menu="true">
                            <div class="flex items-center justify-between px-2.5 py-1.5 gap-1.5">
                                <div class="flex items-center gap-2">
                                    <img alt="" class="size-9 shrink-0 rounded-full border-2 border-green-500"
                                        src="{{ asset('assets/media/avatars/300-2.png') }}" />
                                    <div class="flex flex-col gap-1.5">
                                        <span class="text-sm text-foreground font-semibold leading-none">
                                            {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                        </span>
                                        <a class="text-xs text-secondary-foreground hover:text-primary font-medium leading-none"
                                            href="">
                                            {{ Auth::user()->email }}
                                        </a>
                                    </div>
                                </div>
                                <span class="kt-badge kt-badge-sm kt-badge-primary kt-badge-outline">
                                    Vérifié
                                </span>
                            </div>
                            <ul class="kt-dropdown-menu-sub">
                                <li>
                                    <div class="kt-dropdown-menu-separator">
                                    </div>
                                </li>
                                <li>
                                    <a class="kt-dropdown-menu-link" href="">
                                        <i class="ki-filled ki-badge">
                                        </i>
                                        Public Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="kt-dropdown-menu-link" href="">
                                        <i class="ki-filled ki-profile-circle">
                                        </i>
                                        My Profile
                                    </a>
                                </li>
                                <li data-kt-dropdown="true" data-kt-dropdown-placement="right-start"
                                    data-kt-dropdown-trigger="hover">
                                    <button class="kt-dropdown-menu-toggle" data-kt-dropdown-toggle="true">
                                        <i class="ki-filled ki-setting-2">
                                        </i>
                                        My Account
                                        <span class="kt-dropdown-menu-indicator">
                                            <i class="ki-filled ki-right text-xs">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-dropdown-menu w-[220px]" data-kt-dropdown-menu="true">
                                        <ul class="kt-dropdown-menu-sub">
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="">
                                                    <i class="ki-filled ki-coffee">
                                                    </i>
                                                    Get Started
                                                </a>
                                            </li>
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="">
                                                    <i class="ki-filled ki-some-files">
                                                    </i>
                                                    My Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="#">
                                                    <span class="flex items-center gap-2">
                                                        <i class="ki-filled ki-icon">
                                                        </i>
                                                        Billing
                                                    </span>
                                                    <span class="ms-auto inline-flex items-center"
                                                        data-kt-tooltip="true" data-kt-tooltip-placement="top">
                                                        <i
                                                            class="ki-filled ki-information-2 text-base text-muted-foreground">
                                                        </i>
                                                        <span class="kt-tooltip" data-kt-tooltip-content="true">
                                                            Payment and subscription info
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="">
                                                    <i class="ki-filled ki-medal-star">
                                                    </i>
                                                    Security
                                                </a>
                                            </li>
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="">
                                                    <i class="ki-filled ki-setting">
                                                    </i>
                                                    Members &amp; Roles
                                                </a>
                                            </li>
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="">
                                                    <i class="ki-filled ki-switch">
                                                    </i>
                                                    Integrations
                                                </a>
                                            </li>
                                            <li>
                                                <div class="kt-dropdown-menu-separator">
                                                </div>
                                            </li>
                                            <li>
                                                <a class="kt-dropdown-menu-link" href="">
                                                    <span class="flex items-center gap-2">
                                                        <i class="ki-filled ki-shield-tick">
                                                        </i>
                                                        Notifications
                                                    </span>
                                                    <input checked="" class="ms-auto kt-switch" name="check"
                                                        type="checkbox" value="1" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="kt-dropdown-menu-link" href="">
                                        <i class="ki-filled ki-message-programming">
                                        </i>
                                        Dev Forum
                                    </a>
                                </li>
                                <li data-kt-dropdown="true" data-kt-dropdown-placement="right-start"
                                    data-kt-dropdown-trigger="hover">
                                    <button class="kt-dropdown-menu-toggle py-1" data-kt-dropdown-toggle="true">
                                        <span class="flex items-center gap-2">
                                            <i class="ki-filled ki-icon">
                                            </i>
                                            Langue
                                        </span>
                                        <span class="ms-auto kt-badge kt-badge-stroke shrink-0">
                                            Français
                                            <img alt="" class="inline-block size-3.5 rounded-full"
                                                src="{{ asset('assets/media/flags/france.svg') }}" />
                                        </span>
                                    </button>
                                    <div class="kt-dropdown-menu w-[180px]" data-kt-dropdown-menu="true">
                                        <ul class="kt-dropdown-menu-sub">
                                            <li class="active">
                                                <a class="kt-dropdown-menu-link" href="?dir=ltr">
                                                    <span class="flex items-center gap-2">
                                                        <img alt="" class="inline-block size-4 rounded-full"
                                                            src="{{ asset('assets/media/flags/france.svg') }}" />
                                                        <span class="kt-menu-title">
                                                            Français
                                                        </span>
                                                    </span>
                                                    <i
                                                        class="ki-solid ki-check-circle ms-auto text-green-500 text-base">
                                                    </i>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a class="kt-dropdown-menu-link" href="?dir=rtl">
                                                    <span class="flex items-center gap-2">
                                                        <img alt="" class="inline-block size-4 rounded-full"
                                                            src="{{ asset('assets/media/flags/united-states.svg') }}" />
                                                        <span class="kt-menu-title">
                                                            English
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="kt-dropdown-menu-separator">
                                    </div>
                                </li>
                            </ul>
                            <div class="px-2.5 pt-1.5 mb-2.5 flex flex-col gap-3.5">
                                <div class="flex items-center gap-2 justify-between">
                                    <span class="flex items-center gap-2">
                                        <i class="ki-filled ki-moon text-base text-muted-foreground">
                                        </i>
                                        <span class="font-medium text-2sm">
                                            Mode sombre
                                        </span>
                                    </span>
                                    <input class="kt-switch" data-kt-theme-switch-state="dark"
                                        data-kt-theme-switch-toggle="true" name="check" type="checkbox"
                                        value="1" />
                                </div>
                                <a class="kt-btn kt-btn-outline justify-center w-full" href="{{ route('logout') }}">
                                    Déconnexion
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End of User -->
                    @php
                        $notifications = Auth::user()->notifications()->latest()->take(10)->get();
                        $unreadNotifications = Auth::user()->unreadNotifications()->take(10)->get();
                    @endphp
                    <div class="flex items-center gap-1.5">
                        <!-- Notifications -->
                        <button
                            class="kt-btn kt-btn-ghost kt-btn-icon size-8 hover:bg-background hover:[&amp;_i]:text-primary relative"
                            data-kt-drawer-toggle="#notifications_drawer">
                            <i class="ki-filled ki-notification-status text-lg"></i>
                            <span class="kt-badge kt-badge-xs kt-badge-success rounded-full absolute top-0 start-0">{{ count($unreadNotifications) }}</span>
                        </button>
                        <!--Notifications Drawer-->
                        <div class="hidden kt-drawer kt-drawer-end card flex-col max-w-[90%] w-[450px] top-5 bottom-5 end-5 rounded-xl border border-border"
                            data-kt-drawer="true" data-kt-drawer-container="body" id="notifications_drawer">
                            <div class="flex items-center justify-between gap-2.5 text-sm text-mono font-semibold px-5 py-2.5 border-b border-b-border"
                                id="notifications_header">
                                Notifications
                                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-dim shrink-0"
                                    data-kt-drawer-dismiss="true">
                                    <i class="ki-filled ki-cross">
                                    </i>
                                </button>
                            </div>
                            <div class="kt-tabs kt-tabs-line justify-between px-5 mb-2" data-kt-tabs="true"
                                id="notifications_tabs">
                                <div class="flex items-center gap-5">
                                    <button class="kt-tab-toggle py-3 relative active" data-kt-tab-toggle="#notifications_tab_news">
                                        Nouveaux messages
                                        <span class="rounded-full bg-green-500 size-[5px] absolute top-2 rtl:start-0 end-0 transform translate-y-1/2 translate-x-full">
                                        </span>
                                    </button>
                                    <button class="kt-tab-toggle py-3" data-kt-tab-toggle="#notifications_tab_all">
                                        Tous les messages
                                    </button>
                                </div>
                            </div>
                            <div class="grow flex flex-col" id="notifications_tab_news">
                                <div class="grow kt-scrollable-y-auto" data-kt-scrollable="true"
                                    data-kt-scrollable-dependencies="#header" data-kt-scrollable-max-height="auto"
                                    data-kt-scrollable-offset="150px">
                                    <div class="grow flex flex-col gap-5 pt-3 pb-4 divider-y divider-border">
                                        @forelse ($unreadNotifications as $notif)
                                        <div class="flex {{ isset($notif->data['icon']) ? 'items-center' : null }} grow gap-2.5 px-5" id="notification_{{ $notif->id }}">
                                            @if ( isset($notif->data['avatar']) )
                                            <div class="kt-avatar size-8">
                                                <div class="kt-avatar-image">
                                                    <img alt="avatar"
                                                        src="{{ Storage::url($notif->data['avatar'] ?? 'assets/media/avatars/blank.png') }}" />
                                                </div>
                                            </div>
                                            @else {!! $notif->data['icon'] !!} @endif
                                            <div class="flex flex-col gap-3.5 grow">
                                                <div class="flex flex-col gap-1">
                                                    <div class="text-sm font-medium mb-px">
                                                        {!! $notif->message !!}
                                                    </div>
                                                    <span class="flex items-center text-xs font-medium text-muted-foreground">
                                                        {{ $notif->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                @if(!empty($notif->data['buttons']))
                                                    <div class="flex flex-wrap gap-2.5">
                                                        {!! $notif->data['buttons'] !!}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if (!$loop->last) <div class="border-b border-b-border"></div> @endif
                                        @empty
                                            <div class="px-5 py-2 text-sm text-muted-foreground">
                                                Aucune nouvelle notification
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="border-b border-b-border">
                                </div>
                                <div class="grid grid-cols-2 p-5 gap-2.5" id="notifications_all_footer">
                                    <button class="kt-btn kt-btn-outline justify-center">
                                        Archive all
                                    </button>
                                    <button class="kt-btn kt-btn-outline justify-center">
                                        Mark all as read
                                    </button>
                                </div>
                            </div>
                            <div class="grow flex flex-col hidden" id="notifications_tab_all">
                                <div class="grow kt-scrollable-y-auto" data-kt-scrollable="true"
                                    data-kt-scrollable-dependencies="#header" data-kt-scrollable-max-height="auto"
                                    data-kt-scrollable-offset="150px">
                                    <div class="flex flex-col gap-5 pt-3 pb-4">
                                        @forelse ($notifications as $notif)
                                        <div class="flex {{ isset($notif->data['icon']) ? 'items-center' : null }} grow gap-2.5 px-5" id="notification_{{ $notif->id }}">
                                            @if ( isset($notif->data['avatar']) )
                                            <div class="kt-avatar size-8">
                                                <div class="kt-avatar-image">
                                                    <img alt="avatar"
                                                        src="{{ Storage::url($notif->data['avatar'] ?? 'assets/media/avatars/blank.png') }}" />
                                                </div>
                                            </div>
                                            @else {!! $notif->data['icon'] !!} @endif
                                            <div class="flex flex-col gap-3.5 grow">
                                                <div class="flex flex-col gap-1">
                                                    <div class="text-sm font-medium mb-px">
                                                        {!! $notif->message !!}
                                                    </div>
                                                    <span class="flex items-center text-xs font-medium text-muted-foreground">
                                                        {{ $notif->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                @if(!empty($notif->data['buttons']))
                                                    <div class="flex flex-wrap gap-2.5">
                                                        {!! $notif->data['buttons'] !!}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if (!$loop->last) <div class="border-b border-b-border"></div> @endif
                                        @empty
                                            
                                        @endforelse
                                    </div>
                                </div>
                                <div class="border-b border-b-border">
                                </div>
                                <div class="grid grid-cols-2 p-5 gap-2.5" id="notifications_inbox_footer">
                                    <button class="kt-btn kt-btn-outline justify-center">
                                        Archive all
                                    </button>
                                    <button class="kt-btn kt-btn-outline justify-center">
                                        Mark all as read
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--End of Notifications Drawer-->
                        <!-- End of Notifications -->
                        <a class="kt-btn kt-btn-ghost kt-btn-icon size-8 hover:bg-background hover:[&amp;_i]:text-primary"
                            href="{{ route('logout') }}">
                            <i class="ki-filled ki-exit-right">
                            </i>
                        </a>
                    </div>
                </div>
                <!-- End of Footer -->
            </div>
            <!-- End of Sidebar -->
            <!-- Main -->
            <div class="flex flex-col grow lg:rounded-l-xl bg-background border border-input lg:ms-(--sidebar-width)">
                <div class="flex flex-col grow kt-scrollable-y-auto lg:[--kt-scrollbar-width:auto] pt-5"
                    id="scrollable_content">
                    <main class="grow" role="content">
                        <!-- Container -->
                        @yield('content')
                        <!-- End of Container -->

                    </main>
                    <!-- Footer -->
                    <footer class="footer">
                        <!-- Container -->
                        <div class="kt-container-fixed">
                            <div
                                class="flex flex-col md:flex-row justify-center md:justify-between items-center gap-3 py-5">
                                <div class="flex order-2 md:order-1 gap-2 font-normal text-sm">
                                    <span class="text-muted-foreground">
                                        2025©
                                    </span>
                                    <a class="text-secondary-foreground hover:text-primary" href="">
                                        Fin'Bright.
                                    </a>
                                </div>
                                <nav
                                    class="flex order-1 md:order-2 gap-4 font-normal text-sm text-secondary-foreground">
                                    <a class="hover:text-primary"
                                        href="https://keenthemes.com/metronic/tailwind/docs">
                                        Docs
                                    </a>
                                    <a class="hover:text-primary" href="https://1.envato.market/Vm7VRE">
                                        Purchase
                                    </a>
                                    <a class="hover:text-primary"
                                        href="https://keenthemes.com/metronic/tailwind/docs/getting-started/license">
                                        FAQ
                                    </a>
                                    <a class="hover:text-primary" href="https://devs.keenthemes.com">
                                        Support
                                    </a>
                                    <a class="hover:text-primary"
                                        href="https://keenthemes.com/metronic/tailwind/docs/getting-started/license">
                                        License
                                    </a>
                                </nav>
                            </div>
                        </div>
                        <!-- End of Container -->
                    </footer>
                    <!-- End of Footer -->
                </div>
            </div>
            <!-- End of Main -->
        </div>
        <!-- End of Wrapper -->
    </div>
    <!-- End of Base -->
    <div class="kt-modal" data-kt-modal="true" id="search_modal">
        <div class="kt-modal-content max-w-[600px] top-[15%]">
            <div class="kt-modal-header py-4 px-5">
                <i class="ki-filled ki-magnifier text-muted-foreground text-xl">
                </i>
                <input class="kt-input kt-input-ghost" name="query" placeholder="Tap to start search"
                    type="text" value="">
                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-dim shrink-0" data-kt-modal-dismiss="true">
                    <i class="ki-filled ki-cross">
                    </i>
                </button>
                </input>
            </div>
            <div class="kt-modal-body p-0 pb-5">
                <div class="kt-tabs kt-tabs-line justify-between px-5 mb-2.5" data-kt-tabs="true">
                    <div class="flex items-center gap-5">
                        <button class="kt-tab-toggle py-5 active" data-kt-tab-toggle="#search_modal_mixed">
                            Mixed
                        </button>
                        <button class="kt-tab-toggle py-5" data-kt-tab-toggle="#search_modal_settings">
                            Settings
                        </button>
                        <button class="kt-tab-toggle py-5" data-kt-tab-toggle="#search_modal_integrations">
                            Integrations
                        </button>
                        <button class="kt-tab-toggle py-5" data-kt-tab-toggle="#search_modal_users">
                            Users
                        </button>
                        <button class="kt-tab-toggle py-5" data-kt-tab-toggle="#search_modal_docs">
                            Docs
                        </button>
                        <button class="kt-tab-toggle py-5" data-kt-tab-toggle="#search_modal_empty">
                            Empty
                        </button>
                        <button class="kt-tab-toggle py-5" data-kt-tab-toggle="#search_modal_no-results">
                            No Results
                        </button>
                    </div>
                    <div class="kt-menu -mt-px" data-kt-menu="true">
                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                            data-kt-menu-item-placement="bottom-end" data-kt-menu-item-placement-rtl="bottom-start"
                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                            <button class="kt-menu-toggle kt-btn kt-btn-icon kt-btn-ghost">
                                <i class="ki-filled ki-setting-2">
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
                                            View
                                        </span>
                                    </a>
                                </div>
                                <div class="kt-menu-item" data-kt-menu-item-offset="-15px, 0"
                                    data-kt-menu-item-placement="right-start" data-kt-menu-item-toggle="dropdown"
                                    data-kt-menu-item-trigger="click|lg:hover">
                                    <div class="kt-menu-link">
                                        <span class="kt-menu-icon">
                                            <i class="ki-filled ki-notification-status">
                                            </i>
                                        </span>
                                        <span class="kt-menu-title">
                                            Export
                                        </span>
                                        <span class="kt-menu-arrow">
                                            <i class="ki-filled ki-right text-xs rtl:transform rtl:rotate-180">
                                            </i>
                                        </span>
                                    </div>
                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]">
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="/metronic/tailwind/demo10/account/home/settings-sidebar">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-sms">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Email
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="/metronic/tailwind/demo10/account/home/settings-sidebar">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-message-notify">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    SMS
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="/metronic/tailwind/demo10/account/home/settings-sidebar">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-notification-status">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Push
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <a class="kt-menu-link" href="#">
                                        <span class="kt-menu-icon">
                                            <i class="ki-filled ki-pencil">
                                            </i>
                                        </span>
                                        <span class="kt-menu-title">
                                            Edit
                                        </span>
                                    </a>
                                </div>
                                <div class="kt-menu-item">
                                    <a class="kt-menu-link" href="#">
                                        <span class="kt-menu-icon">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </span>
                                        <span class="kt-menu-title">
                                            Delete
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-scrollable-y-auto" data-kt-scrollable="true" data-kt-scrollable-max-height="auto"
                    data-kt-scrollable-offset="300px">
                    <div class="" id="search_modal_mixed">
                        <div class="flex flex-col gap-2.5">
                            <div>
                                <div class="text-xs text-secondary-foreground font-medium pt-2.5 pb-1.5 ps-5">
                                    Settings
                                </div>
                                <div class="kt-menu kt-menu-default px-0.5 flex-col">
                                    <div class="kt-menu-item">
                                        <a class="kt-menu-link" href="#">
                                            <span class="kt-menu-icon">
                                                <i class="ki-filled ki-badge">
                                                </i>
                                            </span>
                                            <span class="kt-menu-title">
                                                Public Profile
                                            </span>
                                        </a>
                                    </div>
                                    <div class="kt-menu-item">
                                        <a class="kt-menu-link" href="#">
                                            <span class="kt-menu-icon">
                                                <i class="ki-filled ki-setting-2">
                                                </i>
                                            </span>
                                            <span class="kt-menu-title">
                                                My Account
                                            </span>
                                        </a>
                                    </div>
                                    <div class="kt-menu-item">
                                        <a class="kt-menu-link" href="#">
                                            <span class="kt-menu-icon">
                                                <i class="ki-filled ki-message-programming">
                                                </i>
                                            </span>
                                            <span class="kt-menu-title">
                                                Devs Forum
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-b-border">
                            </div>
                            <div>
                                <div class="text-xs text-secondary-foreground font-medium pt-2.5 pb-1.5 ps-5">
                                    Integrations
                                </div>
                                <div class="kt-menu kt-menu-default px-0.5 flex-col">
                                    <div class="kt-menu-item">
                                        <div class="kt-menu-link flex items-center jistify-between gap-2">
                                            <div class="flex items-center grow gap-2">
                                                <div
                                                    class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                                    <img alt="" class="size-6 shrink-0"
                                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg" />
                                                </div>
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="text-sm font-semibold text-mono hover:text-primary"
                                                        href="#">
                                                        Jira
                                                    </a>
                                                    <span class="text-xs font-medium text-secondary-foreground">
                                                        Project management
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex justify-end shrink-0">
                                                <div class="flex -space-x-2">
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <span
                                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-6 text-white size-6 ring-background bg-green-500">
                                                            +3
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-menu-item">
                                        <div class="kt-menu-link flex items-center jistify-between gap-2">
                                            <div class="flex items-center grow gap-2">
                                                <div
                                                    class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                                    <img alt="" class="size-6 shrink-0"
                                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/inferno.svg" />
                                                </div>
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="text-sm font-semibold text-mono hover:text-primary"
                                                        href="#">
                                                        Inferno
                                                    </a>
                                                    <span class="text-xs font-medium text-secondary-foreground">
                                                        Real-time photo sharing app
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex justify-end shrink-0">
                                                <div class="flex -space-x-2">
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-14.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-12.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-b-border">
                            </div>
                            <div>
                                <div class="text-xs text-secondary-foreground font-medium pt-2.5 pb-1.5 ps-5">
                                    Users
                                </div>
                                <div class="kt-menu kt-menu-default px-0.5 flex-col">
                                    <div class="grid gap-1">
                                        <div class="kt-menu-item">
                                            <div class="kt-menu-link flex justify-between gap-2">
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-9 shrink-0"
                                                        src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                                                    <div class="flex flex-col">
                                                        <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                            href="#">
                                                            Tyler Hero
                                                        </a>
                                                        <span class="text-2sm font-normal text-muted-foreground">
                                                            tyler.hero@gmail.com connections
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2.5">
                                                    <div
                                                        class="kt-badge rounded-full kt-badge-outline kt-badge-success gap-1.5">
                                                        <span class="kt-badge-dot">
                                                        </span>
                                                        In Office
                                                    </div>
                                                    <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                        <i class="ki-filled ki-dots-vertical text-lg">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-menu-item">
                                            <div class="kt-menu-link flex justify-between gap-2">
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-9 shrink-0"
                                                        src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                                    <div class="flex flex-col">
                                                        <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                            href="#">
                                                            Esther Howard
                                                        </a>
                                                        <span class="text-2sm font-normal text-muted-foreground">
                                                            esther.howard@gmail.com connections
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2.5">
                                                    <div
                                                        class="kt-badge rounded-full kt-badge-outline kt-badge-destructive gap-1.5">
                                                        <span class="kt-badge-dot">
                                                        </span>
                                                        On Leave
                                                    </div>
                                                    <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                        <i class="ki-filled ki-dots-vertical text-lg">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="search_modal_settings">
                        <div class="kt-menu kt-menu-default px-0.5 flex-col">
                            <div class="text-xs text-secondary-foreground font-medium pt-2.5 ps-5 pb-1.5">
                                Shortcuts
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-home-2">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Go to Dashboard
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-badge">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Public Profile
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-profile-circle">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        My Profile
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-setting-2">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        My Account
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-message-programming">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Devs Forum
                                    </span>
                                </a>
                            </div>
                            <div class="text-xs text-secondary-foreground font-medium pt-2.5 ps-5 pt-2.5 pb-1.5">
                                Actions
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-user">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Create User
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-user-edit">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Create Team
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-subtitle">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Change Plan
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-setting">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title">
                                        Setup Branding
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="search_modal_integrations">
                        <div class="kt-menu kt-menu-default px-0.5 flex-col">
                            <div class="kt-menu-item">
                                <div class="kt-menu-link flex items-center jistify-between gap-2">
                                    <div class="flex items-center grow gap-2">
                                        <div
                                            class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                            <img alt="" class="size-6 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="text-sm font-semibold text-mono hover:text-primary"
                                                href="#">
                                                Jira
                                            </a>
                                            <span class="text-xs font-medium text-secondary-foreground">
                                                Project management
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end shrink-0">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                            </div>
                                            <div class="flex">
                                                <span
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-6 text-white size-6 ring-background bg-green-500">
                                                    +3
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-menu-item">
                                <div class="kt-menu-link flex items-center jistify-between gap-2">
                                    <div class="flex items-center grow gap-2">
                                        <div
                                            class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                            <img alt="" class="size-6 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/brand-logos/inferno.svg" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="text-sm font-semibold text-mono hover:text-primary"
                                                href="#">
                                                Inferno
                                            </a>
                                            <span class="text-xs font-medium text-secondary-foreground">
                                                Real-time photo sharing app
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end shrink-0">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-14.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-12.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-9.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-menu-item">
                                <div class="kt-menu-link flex items-center jistify-between gap-2">
                                    <div class="flex items-center grow gap-2">
                                        <div
                                            class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                            <img alt="" class="size-6 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/brand-logos/evernote.svg" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="text-sm font-semibold text-mono hover:text-primary"
                                                href="#">
                                                Evernote
                                            </a>
                                            <span class="text-xs font-medium text-secondary-foreground">
                                                Notes management app
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end shrink-0">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-6.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-8.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-menu-item">
                                <div class="kt-menu-link flex items-center jistify-between gap-2">
                                    <div class="flex items-center grow gap-2">
                                        <div
                                            class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                            <img alt="" class="size-6 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/brand-logos/gitlab.svg" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="text-sm font-semibold text-mono hover:text-primary"
                                                href="#">
                                                Gitlab
                                            </a>
                                            <span class="text-xs font-medium text-secondary-foreground">
                                                Notes management app
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end shrink-0">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-18.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-17.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-menu-item">
                                <div class="kt-menu-link flex items-center jistify-between gap-2">
                                    <div class="flex items-center grow gap-2">
                                        <div
                                            class="flex items-center justify-center size-10 shrink-0 rounded-full border border-border bg-accent/60">
                                            <img alt="" class="size-6 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/brand-logos/google-webdev.svg" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="text-sm font-semibold text-mono hover:text-primary"
                                                href="#">
                                                Google webdev
                                            </a>
                                            <span class="text-xs font-medium text-secondary-foreground">
                                                Building web expierences
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end shrink-0">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-14.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-20.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-21.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-menu-item px-4 pt-2">
                                <a class="kt-btn kt-btn-outline justify-center" href="#">
                                    Go to Apps
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="search_modal_users">
                        <div class="kt-menu kt-menu-default px-0.5 flex-col">
                            <div class="grid gap-1">
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex justify-between gap-2">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-3.png" />
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Tyler Hero
                                                </a>
                                                <span class="text-2sm font-normal text-muted-foreground">
                                                    tyler.hero@gmail.com connections
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="kt-badge rounded-full kt-badge-outline kt-badge-success gap-1.5">
                                                <span class="kt-badge-dot">
                                                </span>
                                                In Office
                                            </div>
                                            <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex justify-between gap-2">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Esther Howard
                                                </a>
                                                <span class="text-2sm font-normal text-muted-foreground">
                                                    esther.howard@gmail.com connections
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="kt-badge rounded-full kt-badge-outline kt-badge-destructive gap-1.5">
                                                <span class="kt-badge-dot">
                                                </span>
                                                On Leave
                                            </div>
                                            <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex justify-between gap-2">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-11.png" />
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Jacob Jones
                                                </a>
                                                <span class="text-2sm font-normal text-muted-foreground">
                                                    jacob.jones@gmail.com connections
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="kt-badge rounded-full kt-badge-outline kt-badge-primary gap-1.5">
                                                <span class="kt-badge-dot">
                                                </span>
                                                Remote
                                            </div>
                                            <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex justify-between gap-2">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    TLeslie Alexander
                                                </a>
                                                <span class="text-2sm font-normal text-muted-foreground">
                                                    leslie.alexander@gmail.com connections
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="kt-badge rounded-full kt-badge-outline kt-badge-success gap-1.5">
                                                <span class="kt-badge-dot">
                                                </span>
                                                In Office
                                            </div>
                                            <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex justify-between gap-2">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png" />
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Cody Fisher
                                                </a>
                                                <span class="text-2sm font-normal text-muted-foreground">
                                                    cody.fisher@gmail.com connections
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="kt-badge rounded-full kt-badge-outline kt-badge-primary gap-1.5">
                                                <span class="kt-badge-dot">
                                                </span>
                                                Remote
                                            </div>
                                            <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-menu-item px-4 pt-2">
                                    <a class="kt-btn kt-btn-outline justify-center" href="#">
                                        Go to Users
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="search_modal_docs">
                        <div class="kt-menu kt-menu-default px-0.5 flex-col">
                            <div class="grid">
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex items-center">
                                        <div class="flex items-center grow gap-2.5">
                                            <img
                                                src="/static/metronic/tailwind/dist/assets/media/file-types/pdf.svg" />
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-sm font-semibold text-mono cursor-pointer hover:text-primary mb-px">
                                                    Project-pitch.pdf
                                                </span>
                                                <span class="text-xs font-medium text-muted-foreground">
                                                    4.7 MB 26 Sep 2024 3:20 PM
                                                </span>
                                            </div>
                                        </div>
                                        <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex items-center">
                                        <div class="flex items-center grow gap-2.5">
                                            <img
                                                src="/static/metronic/tailwind/dist/assets/media/file-types/doc.svg" />
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-sm font-semibold text-mono cursor-pointer hover:text-primary mb-px">
                                                    Report-v1.docx
                                                </span>
                                                <span class="text-xs font-medium text-muted-foreground">
                                                    2.3 MB 1 Oct 2024 12:00 PM
                                                </span>
                                            </div>
                                        </div>
                                        <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex items-center">
                                        <div class="flex items-center grow gap-2.5">
                                            <img
                                                src="/static/metronic/tailwind/dist/assets/media/file-types/javascript.svg" />
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-sm font-semibold text-mono cursor-pointer hover:text-primary mb-px">
                                                    Framework-App.js
                                                </span>
                                                <span class="text-xs font-medium text-muted-foreground">
                                                    0.8 MB 17 Oct 2024 6:46 PM
                                                </span>
                                            </div>
                                        </div>
                                        <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex items-center">
                                        <div class="flex items-center grow gap-2.5">
                                            <img
                                                src="/static/metronic/tailwind/dist/assets/media/file-types/ai.svg" />
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-sm font-semibold text-mono cursor-pointer hover:text-primary mb-px">
                                                    Framework-App.js
                                                </span>
                                                <span class="text-xs font-medium text-muted-foreground">
                                                    0.8 MB 17 Oct 2024 6:46 PM
                                                </span>
                                            </div>
                                        </div>
                                        <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="kt-menu-item">
                                    <div class="kt-menu-link flex items-center">
                                        <div class="flex items-center grow gap-2.5">
                                            <img
                                                src="/static/metronic/tailwind/dist/assets/media/file-types/php.svg" />
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-sm font-semibold text-mono cursor-pointer hover:text-primary mb-px">
                                                    appController.js
                                                </span>
                                                <span class="text-xs font-medium text-muted-foreground">
                                                    0.1 MB 21 Nov 2024 3:20 PM
                                                </span>
                                            </div>
                                        </div>
                                        <button class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-sm">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="kt-menu-item px-4 pt-2.5">
                                    <a class="kt-btn kt-btn-outline justify-center" href="#">
                                        Go to Users
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="search_modal_empty">
                        <div class="flex flex-col text-center py-9 gap-5">
                            <div class="flex justify-center">
                                <img alt="image" class="dark:hidden max-h-[113px]"
                                    src="/static/metronic/tailwind/dist/assets/media/illustrations/33.svg" />
                                <img alt="image" class="light:hidden max-h-[113px]"
                                    src="/static/metronic/tailwind/dist/assets/media/illustrations/33-dark.svg" />
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <h3 class="text-base font-semibold text-mono text-center">
                                    Looking for something..
                                </h3>
                                <span class="text-sm font-medium text-center text-secondary-foreground">
                                    Initiate your digital experience with
                                    <br />
                                    our intuitive dashboard
                                </span>
                            </div>
                            <div class="flex justify-center">
                                <a class="kt-btn kt-btn-outline flex justify-center" href="#">
                                    View Projects
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="search_modal_no-results">
                        <div class="flex flex-col text-center py-9 gap-5">
                            <div class="flex justify-center">
                                <img alt="image" class="dark:hidden max-h-[113px]"
                                    src="/static/metronic/tailwind/dist/assets/media/illustrations/33.svg" />
                                <img alt="image" class="light:hidden max-h-[113px]"
                                    src="/static/metronic/tailwind/dist/assets/media/illustrations/33-dark.svg" />
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <h3 class="text-base font-semibold text-mono text-center">
                                    No Results Found
                                </h3>
                                <span class="text-sm font-medium text-center text-secondary-foreground">
                                    Refine your query to discover relevant items
                                </span>
                            </div>
                            <div class="flex justify-center">
                                <a class="kt-btn kt-btn-outline flex justify-center" href="#">
                                    View Projects
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @php
        $type = session('success') ? 'success' : (session('error') || $errors->any() ? 'error' : null);
        $message = session('success') ?? session('error') ?? ($errors->any() ? $errors->first() : null);
    @endphp

    @if ($type && $message)
    <div id="floating-alert"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-6 z-100 px-6 py-4 rounded shadow-lg flex items-center gap-3
                transition-all duration-500 ease-in-out opacity-0 scale-95
                {{ $type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' }}">
        @if ($type === 'success')
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-green-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-red-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        @endif

        <span>{{ $message }}</span>
    </div>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendors/ktui/ktui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>

    @yield('javascripts')
    <!-- End of Scripts -->

    <script type="text/javascript">
        window.onload = () => {
            const alert = document.getElementById('floating-alert');
            if (alert) {
                // Affiche avec animation (scale + fade)
                setTimeout(() => {
                    alert.classList.remove('opacity-0', 'scale-95');
                    alert.classList.add('opacity-100', 'scale-100');
                }, 100); // petit délai pour trigger l'animation CSS

                // Masquer après 5 secondes
                setTimeout(() => {
                    alert.classList.remove('opacity-100', 'scale-100');
                    alert.classList.add('opacity-0', 'scale-95');

                    // Supprimer du DOM après disparition
                    setTimeout(() => {
                        alert.remove();
                    }, 500); // correspond à la durée de transition
                }, 5000);
            }
        };
    </script>
</body>

</html>
