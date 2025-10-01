<header class="flex items-center transition-[height] shrink-0 bg-background h-(--header-height)" data-kt-sticky="true"
    data-kt-sticky-class="transition-[height] fixed z-10 top-0 left-0 right-0 shadow-xs backdrop-blur-md bg-white/70 dark:bg-coal-500/70 dark:border-b dark:border-b-light"
    data-kt-sticky-name="header" data-kt-sticky-offset="100px" id="header">
    <!-- Container -->
    <div class="kt-container-fixed flex lg:justify-between items-center gap-2.5">
        <!-- Logo -->
        <div class="flex items-center gap-1 lg:w-[400px] grow lg:grow-0">
            <button class="kt-btn kt-btn-icon kt-btn-ghost -ms-2.5 lg:hidden" data-kt-drawer-toggle="#navbar">
                <i class="ki-filled ki-menu">
                </i>
            </button>
            <div class="flex items-center gap-2">
                <a href="{{route('investisseur.dashboard')}}">
                    {{-- <img class="dark:hidden max-h-[70px]"
                        src="{{asset('assets/media/app/finbright-logo.png')}}" /> --}}
                    <img class="dark:hidden max-h-[34px]"
                        src="{{asset('assets/media/app/mini-logo-circle.png')}}" />
                    <img class="hidden dark:inline-block max-h-[34px]"
                        src="{{asset('assets/media/app/mini-logo-circle-dark.png')}}" />
                </a>
                <h3 class="text-mono text-lg font-medium hidden md:block">
                    Fin'Bright
                </h3>
            </div>
            <!-- Navs -->
            <div class="hidden lg:flex items-center">
                <div class="border-e border-border h-5 mx-4">
                </div>
                <!-- Nav -->
                <div class="kt-menu kt-menu-default">
                    <div class="kt-menu-item">
                        <span class="kt-menu-toggle text-mono text-sm font-medium">
                            Espace investisseur
                        </span>
                    </div>
                </div>
                <!-- End of Nav -->
            </div>
            <!-- End of Navs -->
        </div>
        <!-- End of Logo -->
        <div class="kt-input w-[36px] lg:w-60">
            <i class="ki-filled ki-magnifier">
            </i>
            <input class="min-w-0" placeholder="Recherche" type="text" value="" />
            <span class="text-xs text-secondary-foreground text-nowrap hidden lg:inline">
                cmd + /
            </span>
        </div>
        <!-- Topbar -->
        @php
            $notifications = Auth::user()->notifications()->latest()->take(10)->get();
            $unreadNotifications = Auth::user()->unreadNotifications()->take(10)->get();
        @endphp
        <div class="flex items-center gap-2 lg:gap-3.5 lg:w-[400px] justify-end">
            <div class="flex items-center gap-2 me-0.5">
                <!-- Notifications -->
                <button
                    class="kt-btn kt-btn-ghost kt-btn-icon size-9 rounded-full hover:bg-transparent hover:[&amp;_i]:text-primary relative"
                    data-kt-drawer-toggle="#notifications_drawer">
                    <i class="ki-filled ki-notification-status text-lg"></i>
                    @if (count($unreadNotifications) > 0)<span class="kt-badge kt-badge-xs kt-badge-success rounded-full absolute top-0 start-0">{{ count($unreadNotifications) }}</span>@endif
                </button>
                <!--Notifications Drawer-->
                <div class="hidden kt-drawer kt-drawer-end card flex-col max-w-[90%] w-[450px] top-5 bottom-5 end-5 rounded-xl border border-border"
                    data-kt-drawer="true" data-kt-drawer-container="body" id="notifications_drawer">
                    <div class="flex items-center justify-between gap-2.5 text-sm text-mono font-semibold px-5 py-2.5 border-b border-b-border"
                        id="notifications_header">
                        Notifications
                        <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-dim shrink-0" data-kt-drawer-dismiss="true">
                            <i class="ki-filled ki-cross">
                            </i>
                        </button>
                    </div>
                    <div class="kt-tabs kt-tabs-line justify-between px-5 mb-2" data-kt-tabs="true"
                        id="notifications_tabs">
                        <div class="flex items-center gap-5">
                            <button class="kt-tab-toggle py-3 relative active" data-kt-tab-toggle="#notifications_tab_news">
                                Nouveaux messages
                                <span class="rounded-full bg-green-500 size-[5px] absolute top-2 rtl:start-0 end-0 transform translate-y-1/2 translate-x-full"></span>
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
                                <div class="flex grow gap-2.5 px-5" id="notification_{{ $notif->id }}">
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
                                        @if(!empty($notif->data['reason']))
                                            <div class='kt-card shadow-none flex flex-col gap-2.5 p-3.5 rounded-lg bg-muted/70'>
                                                {!! $notif->data['reason'] !!}
                                            </div>
                                        @endif
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
                                Tout archiver
                            </button>
                            <button class="kt-btn kt-btn-outline justify-center">
                                Marquer tout comme lu
                            </button>
                        </div>
                    </div>
                    <div class="grow flex flex-col hidden" id="notifications_tab_all">
                        <div class="grow kt-scrollable-y-auto" data-kt-scrollable="true"
                            data-kt-scrollable-dependencies="#header" data-kt-scrollable-max-height="auto"
                            data-kt-scrollable-offset="150px">
                            <div class="flex flex-col gap-5 pt-3 pb-4">
                                @forelse ($notifications as $notif)
                                <div class="flex grow gap-2.5 px-5" id="notification_{{ $notif->id }}">
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
                                        @if(!empty($notif->data['reason']))
                                            <div class='kt-card shadow-none flex flex-col gap-2.5 p-3.5 rounded-lg bg-muted/70'>
                                                {!! $notif->data['reason'] !!}
                                            </div>
                                        @endif
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
                        <div class="grid grid-cols-2 p-5 gap-2.5" id="notifications_inbox_footer">
                            <button class="kt-btn kt-btn-outline justify-center">
                                Tout archiver
                            </button>
                            <button class="kt-btn kt-btn-outline justify-center">
                                Marquer tout comme lu
                            </button>
                        </div>
                    </div>
                </div>
                <!--End of Notifications Drawer-->
                <!-- End of Notifications -->
                <!-- User -->
                <div data-kt-dropdown="true" data-kt-dropdown-offset="10px, 10px"
                    data-kt-dropdown-offset-rtl="-20px, 10px" data-kt-dropdown-placement="bottom-end"
                    data-kt-dropdown-placement-rtl="bottom-start" data-kt-dropdown-trigger="click">
                    <button
                        class="kt-btn kt-btn-ghost kt-btn-icon size-9 rounded-full hover:bg-transparent hover:[&amp;_i]:text-primary"
                        data-kt-dropdown-toggle="true">
                        <i class="ki-filled ki-profile-circle text-lg">
                        </i>
                    </button>
                    <div class="kt-dropdown-menu w-[250px]" data-kt-dropdown-menu="true">
                        <div class="flex items-center justify-between px-2.5 py-1.5 gap-1.5">
                            <div class="flex items-center gap-2">
                                <img alt="{{ Auth::user()->first_name .' '. Auth::user()->last_name }}" class="size-9 shrink-0 rounded-full border-2 border-green-500"
                                    src="{{ Auth::user()->profilePicture ? Storage::url(Auth::user()->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-sm text-foreground font-semibold leading-none">
                                        {{ Auth::user()->first_name .' '. Auth::user()->last_name }}
                                    </span>
                                    <a class="text-xs text-secondary-foreground hover:text-primary font-medium leading-none"
                                        href="/metronic/tailwind/demo9/account/home/get-started">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="kt-dropdown-menu-sub">
                            <li>
                                <div class="kt-dropdown-menu-separator">
                                </div>
                            </li>
                            <li>
                                <a class="kt-dropdown-menu-link"
                                    href="{{ route('investisseur.profil') }}">
                                    <i class="ki-filled ki-profile-circle">
                                    </i>
                                    Mon compte
                                </a>
                            </li>
                            {{-- <li data-kt-dropdown="true" data-kt-dropdown-placement="right-start"
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
                                            <a class="kt-dropdown-menu-link"
                                                href="/metronic/tailwind/demo9/account/home/get-started">
                                                <i class="ki-filled ki-coffee">
                                                </i>
                                                Get Started
                                            </a>
                                        </li>
                                        <li>
                                            <a class="kt-dropdown-menu-link"
                                                href="/metronic/tailwind/demo9/account/home/user-profile">
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
                                                <span class="ms-auto inline-flex items-center" data-kt-tooltip="true"
                                                    data-kt-tooltip-placement="top">
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
                                            <a class="kt-dropdown-menu-link"
                                                href="/metronic/tailwind/demo9/account/security/overview">
                                                <i class="ki-filled ki-medal-star">
                                                </i>
                                                Security
                                            </a>
                                        </li>
                                        <li>
                                            <a class="kt-dropdown-menu-link"
                                                href="/metronic/tailwind/demo9/account/members/teams">
                                                <i class="ki-filled ki-setting">
                                                </i>
                                                Members &amp; Roles
                                            </a>
                                        </li>
                                        <li>
                                            <a class="kt-dropdown-menu-link"
                                                href="/metronic/tailwind/demo9/account/integrations">
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
                                            <a class="kt-dropdown-menu-link"
                                                href="/metronic/tailwind/demo9/account/security/overview">
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
                            </li> --}}
                            <li>
                                <a class="kt-dropdown-menu-link" href="{{ route('investisseur.decouvrir') }}">
                                    <i class="ki-filled ki-message-programming">
                                    </i>
                                    Exploration des Projets
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
                                            src="{{asset('assets/media/flags/france.svg')}}" />
                                    </span>
                                </button>
                                <div class="kt-dropdown-menu w-[180px]" data-kt-dropdown-menu="true">
                                    <ul class="kt-dropdown-menu-sub">
                                        <li class="active">
                                            <a class="kt-dropdown-menu-link" href="?dir=ltr">
                                                <span class="flex items-center gap-2">
                                                    <img alt="" class="inline-block size-4 rounded-full"
                                                        src="{{asset('assets/media/flags/france.svg')}}" />
                                                    <span class="kt-menu-title">
                                                        Français
                                                    </span>
                                                </span>
                                                <i class="ki-solid ki-check-circle ms-auto text-green-500 text-base">
                                                </i>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a class="kt-dropdown-menu-link" href="?dir=rtl">
                                                <span class="flex items-center gap-2">
                                                    <img alt="" class="inline-block size-4 rounded-full"
                                                        src="{{asset('assets/media/flags/united-states.svg')}}" />
                                                    <span class="kt-menu-title">
                                                        Anglais
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
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="kt-btn kt-btn-outline justify-center w-full"
                                    :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Deconnexion') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End of User -->
            </div>
            <!-- End of Topbar -->
        </div>
        <!-- End of Container -->
    </div>
</header>
<!-- End of Header -->
<!-- Navbar -->
<div class="bg-muted hidden lg:flex lg:items-stretch border-y border-input lg:mb-10 [--kt-drawer-enable:true] lg:[--kt-drawer-enable:false]"
    data-kt-drawer="true"
    data-kt-drawer-class="kt-drawer kt-drawer-start fixed z-10 top-0 bottom-0 w-full me-5 max-w-[250px] p-5 lg:p-0 overflow-auto"
    id="navbar">
    <!-- Container -->
    <div class="kt-container-fixed lg:flex lg:flex-wrap lg:justify-between lg:items-center gap-2 px-0 lg:px-7.5">
        <!-- Mega Menu -->
        <div class="kt-menu items-stretch flex-col lg:flex-row gap-5 lg:gap-7.5 grow lg:grow-0" data-kt-menu="true"
            id="mega_menu">
            <div class="kt-menu-item {{ session('menu_actif') === 'dashboard' ? 'active' : '' }}">
                <a class="kt-menu-link lg:py-3.5 border-b border-b-transparent kt-menu-item-active:border-b-mono text-foreground kt-menu-item-hover:text-mono kt-menu-item-active:text-mono kt-menu-item-here:border-b-mono kt-menu-item-here:text-mono"
                    href="{{route('investisseur.dashboard')}}">
                    <span class="kt-menu-title font-medium text-foreground text-sm">
                        Tableau de bord
                    </span>
                </a>
            </div>
            <div class="kt-menu-item {{ session('menu_actif') === 'decouvrir' ? 'active' : '' }}">
                <a class="kt-menu-link lg:py-3.5 border-b border-b-transparent kt-menu-item-active:border-b-mono text-foreground kt-menu-item-hover:text-mono kt-menu-item-active:text-mono kt-menu-item-here:border-b-mono kt-menu-item-here:text-mono"
                    href="{{route('investisseur.decouvrir')}}">
                    <span class="kt-menu-title font-medium text-foreground text-sm">
                        Exploration des Projets
                    </span>
                </a>
            </div>
            <div class="kt-menu-item {{ session('menu_actif') === 'investissements' ? 'active' : '' }}">
                <a class="kt-menu-link lg:py-3.5 border-b border-b-transparent kt-menu-item-active:border-b-mono text-foreground kt-menu-item-hover:text-mono kt-menu-item-active:text-mono kt-menu-item-here:border-b-mono kt-menu-item-here:text-mono"
                    href="{{ route('investisseur.projets') }}">
                    <span class="kt-menu-title font-medium text-foreground text-sm">
                        Mes investissements
                    </span>
                </a>
            </div>
            <div class="kt-menu-item {{ session('menu_actif') === 'mon_compte' ? 'active' : '' }}">
                <a class="kt-menu-link lg:py-3.5 border-b border-b-transparent kt-menu-item-active:border-b-mono text-foreground kt-menu-item-hover:text-mono kt-menu-item-active:text-mono kt-menu-item-here:border-b-mono kt-menu-item-here:text-mono"
                    href="{{route('investisseur.profil')}}">
                    <span class="kt-menu-title font-medium text-foreground text-sm">
                        Mon compte
                    </span>
                </a>
            </div>
            {{-- <div class="kt-menu-item" data-kt-menu-item-offset="0,0|lg:-20px, 0"
                data-kt-menu-item-offset-rtl="0,0|lg:20px, 0" data-kt-menu-item-overflow="true"
                data-kt-menu-item-placement="bottom-start" data-kt-menu-item-placement-rtl="bottom-end"
                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click|lg:hover">
                <div
                    class="kt-menu-link lg:py-3.5 border-b border-b-transparent kt-menu-item-active:border-b-mono text-foreground kt-menu-item-hover:text-mono kt-menu-item-active:text-mono kt-menu-item-here:border-b-mono kt-menu-item-here:text-mono">
                    <span class="kt-menu-title font-medium text-foreground text-sm">
                        Help
                    </span>
                    <span class="kt-menu-arrow flex lg:hidden">
                        <span class="flex kt-menu-item-show:hidden">
                            <i class="ki-filled ki-plus text-xs text-secondary-foreground">
                            </i>
                        </span>
                        <span class="hidden kt-menu-item-show:inline-flex">
                            <i class="ki-filled ki-minus text-xs text-secondary-foreground">
                            </i>
                        </span>
                    </span>
                </div>
                <div class="kt-menu-dropdown kt-menu-default py-2.5 w-full max-w-[220px]">
                    <div class="kt-menu-item">
                        <a class="kt-menu-link"
                            href=""
                            tabindex="0">
                            <span class="kt-menu-icon">
                                <i class="ki-filled ki-coffee">
                                </i>
                            </span>
                            <span class="kt-menu-title grow-0">
                                Getting Started
                            </span>
                        </a>
                    </div>
                    <div class="kt-menu-item" data-kt-menu-item-placement="right-start"
                        data-kt-menu-item-placement-rtl="left-start" data-kt-menu-item-toggle="dropdown"
                        data-kt-menu-item-trigger="click|lg:hover">
                        <div class="kt-menu-link">
                            <span class="kt-menu-icon">
                                <i class="ki-filled ki-information">
                                </i>
                            </span>
                            <span class="kt-menu-title">
                                Support Forum
                            </span>
                            <span class="kt-menu-arrow">
                                <i class="ki-filled ki-right text-xs rtl:transform rtl:rotate-180">
                                </i>
                            </span>
                        </div>
                        <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px] lg:max-w-[220px]">
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="" tabindex="0">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-questionnaire-tablet">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title grow-0">
                                        All Questions
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="" tabindex="0">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-star">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title grow-0">
                                        Popular Questions
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href=""
                                    tabindex="0">
                                    <span class="kt-menu-icon">
                                        <i class="ki-filled ki-message-question">
                                        </i>
                                    </span>
                                    <span class="kt-menu-title grow-0">
                                        Ask Question
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-menu-item">
                        <a class="kt-menu-link"
                            href=""
                            tabindex="0">
                            <span class="kt-menu-icon">
                                <i class="ki-filled ki-subtitle">
                                </i>
                            </span>
                            <span class="kt-menu-title">
                                Licenses &amp; FAQ
                            </span>
                            <span class="kt-menu-badge" data-kt-tooltip="#menu_tooltip_3">
                                <i class="ki-filled ki-information-2 text-muted-foreground text-base">
                                </i>
                            </span>
                            <div class="kt-tooltip" id="menu_tooltip_3">
                                Learn more about licenses
                            </div>
                        </a>
                    </div>
                    <div class="kt-menu-item">
                        <a class="kt-menu-link" href=""
                            tabindex="0">
                            <span class="kt-menu-icon">
                                <i class="ki-filled ki-questionnaire-tablet">
                                </i>
                            </span>
                            <span class="kt-menu-title grow-0">
                                Documentation
                            </span>
                        </a>
                    </div>
                    <div class="kt-menu-separator">
                    </div>
                    <div class="kt-menu-item">
                        <a class="kt-menu-link" href="" tabindex="0">
                            <span class="kt-menu-icon">
                                <i class="ki-filled ki-share">
                                </i>
                            </span>
                            <span class="kt-menu-title grow-0">
                                Contact Us
                            </span>
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- End of Mega Menu -->
    </div>
    <!-- End of Container -->
</div>
<!-- End of Navbar -->
