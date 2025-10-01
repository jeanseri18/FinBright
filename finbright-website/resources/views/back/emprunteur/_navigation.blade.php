<header class="flex items-center transition-[height] shrink-0 bg-background h-(--header-height)" data-kt-sticky="true"
    data-kt-sticky-class="transition-[height] fixed z-10 top-0 left-0 right-0 backdrop-blur-md bg-white/70 border-b border-border"
    data-kt-sticky-name="header" data-kt-sticky-offset="200px" id="header">
    <!-- Container -->
    <div class="kt-container-fixed flex justify-between items-center lg:gap-4" id="headerContainer">
        <!-- Logo -->
        <div class="flex items-center gap-2 2xl:-ml-[60px]">
            <a href="/metronic/tailwind/demo2/">
                {{-- <img class="dark:hidden max-h-[70px]"
                    src="{{asset('assets/media/app/finbright-logo.png')}}" /> --}}
                <img class="dark:hidden max-h-[42px]"
                    src="{{asset('assets/media/app/mini-logo-circle.png')}}" />
                <img class="hidden dark:inline-block max-h-[42px]"
                    src="{{asset('assets/media/app/mini-logo-circle-dark.png')}}" />
            </a>
            <div class="flex items-center">
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
                            Espace emprunteur
                        </span>
                    </div>
                </div>
                <!-- End of Nav -->
            </div>
            <!-- End of Navs -->
        </div>
        <!-- End of Logo -->
        <!-- Topbar -->
        @php
            $notifications = Auth::user()->notifications()->latest()->take(10)->get();
            $unreadNotifications = Auth::user()->unreadNotifications()->take(10)->get();
        @endphp
        <div class="flex items-center gap-2.5">
            <!-- Notifications -->
            <button class="kt-btn kt-btn-ghost kt-btn-icon size-9 rounded-full relative"
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
                        <i class="ki-filled ki-cross"></i>
                    </button>
                </div>
                <div class="kt-tabs kt-tabs-line justify-between px-5 mb-2" data-kt-tabs="true" id="notifications_tabs">
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
                    <div class="grid grid-cols-2 p-5 gap-2.5" id="notifications_inbox_footer">
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
                    <div class="grid grid-cols-2 p-5 gap-2.5" id="notifications_team_footer">
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
            <!-- Chat -->
            <button class="kt-btn kt-btn-ghost kt-btn-icon size-9 rounded-full" data-kt-drawer-toggle="#chat_drawer">
                <i class="ki-filled ki-messages text-lg">
                </i>
            </button>
            <!--Chat Drawer-->
            <div class="hidden kt-drawer kt-drawer-end card flex-col max-w-[90%] w-[450px] top-5 bottom-5 end-5 rounded-xl border border-border"
                data-kt-drawer="true" data-kt-drawer-container="body" id="chat_drawer">
                <div>
                    <div class="flex items-center justify-between gap-2.5 text-sm text-mono font-semibold px-5 py-3.5">
                        Chat
                        <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-dim shrink-0"
                            data-kt-drawer-dismiss="true">
                            <i class="ki-filled ki-cross">
                            </i>
                        </button>
                    </div>
                    <div class="border-b border-b-border">
                    </div>
                    <div class="border-b border-border py-2.5">
                        <div class="flex items-center justify-between flex-wrap gap-2 px-5">
                            <div class="flex items-center flex-wrap gap-2">
                                <div
                                    class="flex items-center justify-center shrink-0 rounded-full bg-accent/60 border border-border size-11">
                                    <img alt="" class="size-7"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/gitlab.svg" />
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-sm font-semibold text-mono hover:text-primary" href="#">
                                        HR Team
                                    </a>
                                    <span class="text-xs font-medium italic text-muted-foreground">
                                        Jessy is typing..
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
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
                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-white size-6 ring-background bg-green-500">
                                            +10
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-menu" data-kt-menu="true">
                                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                        data-kt-menu-item-placement="bottom-end"
                                        data-kt-menu-item-placement-rtl="bottom-start"
                                        data-kt-menu-item-toggle="dropdown"
                                        data-kt-menu-item-trigger="click|lg:hover">
                                        <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                        <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                            data-kt-menu-dismiss="true">
                                            <div class="kt-menu-item">
                                                <a class="kt-menu-link"
                                                    href="/metronic/tailwind/demo2/account/members/teams">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-users">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Invite Users
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="kt-menu-item" data-kt-menu-item-offset="-15px, 0"
                                                data-kt-menu-item-placement="right-start"
                                                data-kt-menu-item-toggle="dropdown"
                                                data-kt-menu-item-trigger="click|lg:hover">
                                                <div class="kt-menu-link">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-people">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Team
                                                    </span>
                                                    <span class="kt-menu-arrow">
                                                        <i
                                                            class="ki-filled ki-right text-xs rtl:transform rtl:rotate-180">
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]">
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="/metronic/tailwind/demo2/account/members/import-members">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-shield-search">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Find Members
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="/metronic/tailwind/demo2/account/members/import-members">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-calendar">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Meetings
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="/metronic/tailwind/demo2/account/members/import-members">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-filter-edit">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Group Settings
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-menu-item">
                                                <a class="kt-menu-link"
                                                    href="/metronic/tailwind/demo2/account/security/privacy-settings">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-setting-3">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Settings
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
                <div class="kt-scrollable-y-auto grow" data-kt-scrollable="true"
                    data-kt-scrollable-dependencies="#header" data-kt-scrollable-max-height="auto"
                    data-kt-scrollable-offset="230px">
                    <div class="flex flex-col gap-5 py-5">
                        <div class="flex items-end gap-3.5 px-5">
                            <img alt="" class="rounded-full size-9"
                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-5.png" />
                            <div class="flex flex-col gap-1.5">
                                <div
                                    class="kt-card shadow-none flex flex-col bg-accent/60 gap-2.5 p-3 rounded-bs-none text-2sm">
                                    Next week we are closing the project. Do You have questions?
                                </div>
                                <span class="text-xs font-medium text-muted-foreground">
                                    14:04
                                </span>
                            </div>
                        </div>
                        <div class="flex items-end justify-end gap-3.5 px-5">
                            <div class="flex flex-col gap-1.5">
                                <div class="kt-card shadow-none flex bg-primary flex-col gap-2.5 p-3 rounded-be-none">
                                    <p class="text-2sm font-medium text-primary-foreground">
                                        This is excellent news!
                                    </p>
                                </div>
                                <div class="flex items-center justify-end gap-2 relative">
                                    <span class="text-xs font-medium text-secondary-foreground">
                                        14:08
                                    </span>
                                    <i class="ki-filled ki-double-check text-lg absolute text-green-500">
                                    </i>
                                </div>
                            </div>
                            <div class="relative shrink-0">
                                <div class="kt-avatar size-9">
                                    <div class="kt-avatar-image">
                                        <img alt="avatar"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png">
                                        </img>
                                    </div>
                                    <div class="kt-avatar-indicator -end-2 -bottom-2">
                                        <div class="kt-avatar-status kt-avatar-status-online size-2.5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end gap-3.5 px-5">
                            <img alt="" class="rounded-full size-9"
                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                            <div class="flex flex-col gap-1.5">
                                <div
                                    class="kt-card shadow-none flex flex-col bg-accent/60 gap-2.5 p-3 rounded-bs-none text-2sm">
                                    I have checked the features, can not wait to demo them!
                                </div>
                                <span class="text-xs font-medium text-muted-foreground">
                                    14:26
                                </span>
                            </div>
                        </div>
                        <div class="flex items-end gap-3.5 px-5">
                            <img alt="" class="rounded-full size-9"
                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-1.png" />
                            <div class="flex flex-col gap-1.5">
                                <div
                                    class="kt-card shadow-none flex flex-col bg-accent/60 gap-2.5 p-3 rounded-bs-none text-2sm">
                                    I have looked over the rollout plan, and everything seems spot on.
                                </div>
                                <span class="text-xs font-medium text-muted-foreground">
                                    15:09
                                </span>
                            </div>
                        </div>
                        <div class="flex items-end justify-end gap-3.5 px-5">
                            <div class="flex flex-col gap-1.5">
                                <div class="kt-card shadow-none flex bg-primary flex-col gap-2.5 p-3 rounded-be-none">
                                    <p class="text-2sm font-medium text-primary-foreground">
                                        Haven't seen the build yet, I'll look now.
                                    </p>
                                </div>
                                <div class="flex items-center justify-end gap-2 relative">
                                    <span class="text-xs font-medium text-secondary-foreground">
                                        15:52
                                    </span>
                                    <i class="ki-filled ki-double-check text-lg absolute text-muted-foreground">
                                    </i>
                                </div>
                            </div>
                            <div class="relative shrink-0">
                                <div class="kt-avatar size-9">
                                    <div class="kt-avatar-image">
                                        <img alt="avatar"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png">
                                        </img>
                                    </div>
                                    <div class="kt-avatar-indicator -end-2 -bottom-2">
                                        <div class="kt-avatar-status kt-avatar-status-online size-2.5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end justify-end gap-3.5 px-5">
                            <div class="flex flex-col gap-1.5">
                                <div class="kt-card shadow-none flex bg-primary flex-col gap-2.5 p-3 rounded-be-none">
                                    <p class="text-2sm font-medium text-primary-foreground">
                                        Checking the build now
                                    </p>
                                </div>
                                <div class="flex items-center justify-end gap-2 relative">
                                    <span class="text-xs font-medium text-secondary-foreground">
                                        15:52
                                    </span>
                                    <i class="ki-filled ki-double-check text-lg absolute text-muted-foreground">
                                    </i>
                                </div>
                            </div>
                            <div class="relative shrink-0">
                                <div class="kt-avatar size-9">
                                    <div class="kt-avatar-image">
                                        <img alt="avatar"
                                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png">
                                        </img>
                                    </div>
                                    <div class="kt-avatar-indicator -end-2 -bottom-2">
                                        <div class="kt-avatar-status kt-avatar-status-online size-2.5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end gap-3.5 px-5">
                            <img alt="" class="rounded-full size-9"
                                src="/static/metronic/tailwind/dist/assets/media/avatars/300-4.png" />
                            <div class="flex flex-col gap-1.5">
                                <div
                                    class="kt-card shadow-none flex flex-col bg-accent/60 gap-2.5 p-3 rounded-bs-none text-2sm">
                                    Tomorrow, I will send the link for the meeting
                                </div>
                                <span class="text-xs font-medium text-muted-foreground">
                                    17:40
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Chat Footer-->
                <div class="mb-2.5">
                    <div class="flex grow gap-2 px-5 py-3.5 bg-accent/60 mb-2.5 border-y border-border"
                        id="join_request">
                        <div class="kt-avatar size-9">
                            <div class="kt-avatar-image">
                                <img alt="avatar"
                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-14.png">
                                </img>
                            </div>
                            <div class="kt-avatar-indicator -end-2 -bottom-2">
                                <div class="kt-avatar-status kt-avatar-status-online size-2.5">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-3 grow">
                            <div class="flex flex-col">
                                <div class="text-sm mb-px">
                                    <a class="hover:text-primary font-semibold text-mono" href="#">
                                        Jane Perez
                                    </a>
                                    <span class="text-secondary-foreground">
                                        wants to join chat
                                    </span>
                                </div>
                                <span class="flex items-center text-xs font-medium text-muted-foreground">
                                    1 day ago
                                    <span class="rounded-full size-1 bg-mono/30 mx-1.5">
                                    </span>
                                    Design Team
                                </span>
                            </div>
                            <div class="flex gap-2.5">
                                <button class="kt-btn kt-btn-sm kt-btn-outline kt-btn-sm"
                                    data-kt-dismiss="#join_request">
                                    Decline
                                </button>
                                <button class="kt-btn kt-btn-sm kt-btn-mono kt-btn-sm">
                                    Accept
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="relative grow mx-5">
                        <img alt=""
                            class="rounded-full size-[30px] absolute start-0 top-2/4 -translate-y-2/4 ms-2.5"
                            src="/static/metronic/tailwind/dist/assets/media/avatars/300-2.png">
                        <input class="kt-input h-auto py-4 ps-12 bg-transparent" placeholder="Write a message..."
                            type="text" value="" />
                        <div class="flex items-center gap-2.5 absolute end-3 top-1/2 -translate-y-1/2">
                            <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                <i class="ki-filled ki-exit-up">
                                </i>
                            </button>
                            <a class="kt-btn kt-btn-mono kt-btn-sm" href="#">
                                Send
                            </a>
                        </div>
                        </img>
                    </div>
                </div>
                <!--End of Chat Footer-->
            </div>
            <!--End of Chat Drawer-->
            <!-- End of Chat -->
            <!-- User -->
            <div data-kt-dropdown="true" data-kt-dropdown-offset="10px, 10px"
                data-kt-dropdown-offset-rtl="-20px, 10px" data-kt-dropdown-placement="bottom-end"
                data-kt-dropdown-placement-rtl="bottom-start" data-kt-dropdown-trigger="click">
                <div class="cursor-pointer shrink-0" data-kt-dropdown-toggle="true">
                    <img alt="{{ Auth::user()->first_name .' '. Auth::user()->last_name }}" class="size-9 rounded-full border-2 border-input shrink-0"
                        src="{{ Auth::user()->profilePicture ? Storage::url(Auth::user()->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                    </img>
                </div>
                <div class="kt-dropdown-menu w-[250px]" data-kt-dropdown-menu="true">
                    <div class="flex items-center justify-between px-2.5 py-1.5 gap-1.5">
                        <div class="flex items-center gap-2">
                            <img alt="" class="size-9 shrink-0 rounded-full border-2 border-green-500"
                                src="{{ Auth::user()->profilePicture ? Storage::url(Auth::user()->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                            <div class="flex flex-col gap-1.5">
                                <span class="text-sm text-foreground font-semibold leading-none">
                                    {{ Auth::user()->first_name .' '. Auth::user()->last_name }}
                                </span>
                                <a class="text-xs text-secondary-foreground hover:text-primary font-medium leading-none"
                                    href="/metronic/tailwind/demo2/account/home/get-started">
                                    {{ Auth::user()->email }}
                                </a>
                            </div>
                            </img>
                        </div>
                        {{-- <span class="kt-badge kt-badge-sm kt-badge-primary kt-badge-outline">
                            Pro
                        </span> --}}
                    </div>
                    @php $emprunteur = Auth::user()->emprunteur ?? null @endphp
                    <ul class="kt-dropdown-menu-sub">
                        <li>
                            <div class="kt-dropdown-menu-separator">
                            </div>
                        </li>
                        <li>
                            <a class="kt-dropdown-menu-link"
                                href="{{route('emprunteur.mon-profil')}}">
                                <i class="ki-filled ki-profile-circle">
                                </i>
                                Mon profil
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
                                            href="/metronic/tailwind/demo2/account/home/get-started">
                                            <i class="ki-filled ki-coffee">
                                            </i>
                                            Get Started
                                        </a>
                                    </li>
                                    <li>
                                        <a class="kt-dropdown-menu-link"
                                            href="/metronic/tailwind/demo2/account/home/user-profile">
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
                                                <i class="ki-filled ki-information-2 text-base text-muted-foreground">
                                                </i>
                                                <span class="kt-tooltip" data-kt-tooltip-content="true">
                                                    Payment and subscription info
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="kt-dropdown-menu-link"
                                            href="/metronic/tailwind/demo2/account/security/overview">
                                            <i class="ki-filled ki-medal-star">
                                            </i>
                                            Security
                                        </a>
                                    </li>
                                    <li>
                                        <a class="kt-dropdown-menu-link"
                                            href="/metronic/tailwind/demo2/account/members/teams">
                                            <i class="ki-filled ki-setting">
                                            </i>
                                            Members &amp; Roles
                                        </a>
                                    </li>
                                    <li>
                                        <a class="kt-dropdown-menu-link"
                                            href="/metronic/tailwind/demo2/account/integrations">
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
                                            href="/metronic/tailwind/demo2/account/security/overview">
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
                            <a class="kt-dropdown-menu-link" href="{{route('emprunteur.loan-requests.details', ['loan' => ($emprunteur && $emprunteur->loanRequests) ? $emprunteur->loanRequests->last() : null])}}">
                                <i class="ki-filled ki-message-programming">
                                </i>
                                Mon projet
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
</header>
<!-- End of Header -->
<!-- Navbar -->
<div class="border-b border-border pb-5 lg:pb-0 mb-5 lg:mb-10">
    <!-- Container -->
    <div class="kt-container-fixed flex justify-between items-center gap-2">
        <div class="grid">
            <div class="kt-scrollable-x-auto">
                <div class="kt-menu gap-5 lg:gap-7.5" data-kt-menu="true">
                    <div
                        class="kt-menu-item border-b-2 border-b-transparent kt-menu-item-active:border-b-mono kt-menu-item-here:border-b-mono {{ session('menu_actif') === 'dashboard' ? 'here' : '' }}">
                        <a class="kt-menu-link gap-2.5 pb-2 lg:pb-4"
                            href="{{route('emprunteur.dashboard')}}" tabindex="0">
                            <span
                                class="kt-menu-title text-nowrap text-sm text-foreground kt-menu-item-active:text-mono kt-menu-item-active:font-medium kt-menu-item-here:text-mono kt-menu-item-here:font-medium kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                Tableau de bord
                            </span>
                        </a>
                    </div>
                    <div
                        class="kt-menu-item border-b-2 border-b-transparent kt-menu-item-active:border-b-mono kt-menu-item-here:border-b-mono {{ session('menu_actif') === 'mes_demandes' ? 'here' : '' }}">
                        <a class="kt-menu-link gap-2.5 pb-2 lg:pb-4"
                            href="{{route('emprunteur.loan-requests.details', ['loan' => ($emprunteur && $emprunteur->loanRequests) ? $emprunteur->loanRequests->last() : null])}}" tabindex="0">
                            <span
                                class="kt-menu-title text-nowrap text-sm text-foreground kt-menu-item-active:text-mono kt-menu-item-active:font-medium kt-menu-item-here:text-mono kt-menu-item-here:font-medium kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                Mon projet
                            </span>
                        </a>
                    </div>
                    <div
                        class="kt-menu-item border-b-2 border-b-transparent kt-menu-item-active:border-b-mono kt-menu-item-here:border-b-mono {{ session('menu_actif') === 'mon_profil' ? 'here' : '' }}">
                        <a class="kt-menu-link gap-2.5 pb-2 lg:pb-4"
                            href="{{route('emprunteur.mon-profil')}}" tabindex="0">
                            <span
                                class="kt-menu-title text-nowrap text-sm text-foreground kt-menu-item-active:text-mono kt-menu-item-active:font-medium kt-menu-item-here:text-mono kt-menu-item-here:font-medium kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                Mon profil
                            </span>
                        </a>
                    </div>
                    {{-- <div class="kt-menu-item border-b-2 border-b-transparent kt-menu-item-active:border-b-mono kt-menu-item-here:border-b-mono"
                        data-kt-menu-item-placement="bottom-start" data-kt-menu-item-placement-rtl="bottom-end"
                        data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click|lg:hover">
                        <div class="kt-menu-link gap-1.5 pb-2 lg:pb-4" tabindex="0">
                            <span
                                class="kt-menu-title text-nowrap text-sm text-foreground kt-menu-item-active:text-mono kt-menu-item-active:font-medium kt-menu-item-here:text-mono kt-menu-item-here:font-medium kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                                Projects
                            </span>
                            <span class="kt-menu-arrow">
                                <i class="ki-filled ki-down text-xs text-muted-foreground">
                                </i>
                            </span>
                        </div>
                        <div class="kt-menu-dropdown kt-menu-default py-2 min-w-[200px]">
                            <div class="kt-menu-item">
                                <a class="kt-menu-link"
                                    href="/metronic/tailwind/demo2/public-profile/projects/3-columns"
                                    tabindex="0">
                                    <span class="kt-menu-title">
                                        3 Columns
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link"
                                    href="/metronic/tailwind/demo2/public-profile/projects/2-columns"
                                    tabindex="0">
                                    <span class="kt-menu-title">
                                        2 Columns
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="flex items-center text-sm text-foreground gap-5 pb-2 lg:pb-2">
            <button type="button" class="kt-btn kt-btn-primary" data-kt-modal-toggle="#modal_simulate">
                <i class="ki-filled ki-calculator"></i>
                Simuler un prêt
            </button>
            {{-- <a class="hover:text-primary" href="">
                User Guides
            </a>
            <a class="hover:text-primary" href="">
                Support
            </a> --}}
        </div>
    </div>
    <!-- End of Container -->
</div>
<!-- End of Navbar -->
