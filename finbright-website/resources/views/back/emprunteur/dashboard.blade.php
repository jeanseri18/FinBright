@extends('back.emprunteur.layouts')

@section('title', 'Tableau de bord')

@section('content')
    <!-- Container -->
    <div class="kt-container-fixed" id="contentContainer">
    </div>
    <!-- End of Container -->
    <style>
        .hero-bg {
            background-image: url("{{asset('assets/media/images/2600x1200/bg-1.png')}}");
        }

        .dark .hero-bg {
            background-image: url("{{asset('assets/media/images/2600x1200/bg-1-dark.png')}}");
        }
    </style>

    @include('back.emprunteur._profile_container')

    <!-- Container -->
    <div class="kt-container-fixed">
        <!-- begin: grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-1">
                <div class="grid gap-5 lg:gap-7.5">
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Présentation
                            </h3>
                        </div>
                        <div class="kt-card-content pt-4 pb-3">
                            <table class="kt-table-auto">
                                <tbody>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Âge
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            @if (Auth::user()->birth_date)
                                                {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->age }} ans
                                            @else
                                                Âge non renseigné
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Lieu de naissance:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            {{Auth::user()->birth_place ?? null}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Nationalité:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            {{Auth::user()->nationality ?? null}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Téléphone:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            {{Auth::user()->phone_number ?? null}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Email:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            <a class="text-foreground hover:text-primary" href="#">
                                                {{ Auth::user()->email }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Adresse :
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            {{ Auth::user()->address['adresse'] ?? null }}, {{ Auth::user()->address['rue'] ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Ville:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            {{ Auth::user()->address['ville'] ?? null }} ( {{ Auth::user()->address['code_postal'] ?? null }} )
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Cursus scolaire
                            </h3>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid gap-y-5">
                                <div class="flex align-start gap-3.5">
                                    <img alt="" class="h-9"
                                        src="{{asset('assets/media/brand-logos/jira.svg')}}" />
                                    <div class="flex flex-col gap-1">
                                        <a class="text-sm font-medium text-primary leading-none hover:text-primary"
                                            href="#">
                                            Établissement
                                        </a>
                                        <span class="text-sm font-medium text-mono">
                                            {{Auth::user()->etablissement->nom ?? null}}
                                        </span>
                                        <span class="text-xs text-secondary-foreground leading-none">
                                            {{Auth::user()->etablissement ? Auth::user()->etablissement->ville : null}} - {{Auth::user()->etablissement ? Auth::user()->etablissement->pays : null}}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex align-start gap-3.5">
                                    <img alt="" class="h-9"
                                        src="{{asset('assets/media/brand-logos/jira.svg')}}" />
                                    <div class="flex flex-col gap-1">
                                        <a class="text-sm font-medium text-primary leading-none hover:text-primary"
                                            href="#">
                                            Filière
                                        </a>
                                        <span class="text-sm font-medium text-mono">
                                            {{Auth::user()->specialization ?? null}}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex align-start gap-3.5">
                                    <img alt="" class="h-9"
                                        src="{{asset('assets/media/brand-logos/jira.svg')}}" />
                                    <div class="flex flex-col gap-1">
                                        <a class="text-sm font-medium text-primary leading-none hover:text-primary"
                                            href="#">
                                            Diplôme
                                        </a>
                                        <span class="text-sm font-medium text-mono">
                                            {{Auth::user()->diploma ?? null}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed"
                                href="/metronic/tailwind/demo2/public-profile/works">
                                Open to Work
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <!-- Projects Table -->
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Projets
                            </h3>
                            <div class="kt-menu" data-kt-menu="true">
                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                    data-kt-menu-item-placement="bottom-end"
                                    data-kt-menu-item-placement-rtl="bottom-start" data-kt-menu-item-toggle="dropdown"
                                    data-kt-menu-item-trigger="click">
                                    <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-dots-vertical text-lg">
                                        </i>
                                    </button>
                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                        data-kt-menu-dismiss="true">
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="/metronic/tailwind/demo2/account/home/settings-plain">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-add-files">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Ajouter
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item" data-kt-menu-item-offset="-15px, 0"
                                            data-kt-menu-item-placement="right-start" data-kt-menu-item-toggle="dropdown"
                                            data-kt-menu-item-trigger="click|lg:hover">
                                            <div class="kt-menu-link">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-file-up">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Exporter
                                                </span>
                                                <span class="kt-menu-arrow">
                                                    <i class="ki-filled ki-right text-xs rtl:transform rtl:rotate-180">
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[125px]">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo2/account/home/settings-sidebar">
                                                        <span class="kt-menu-title">
                                                            PDF
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo2/account/home/settings-sidebar">
                                                        <span class="kt-menu-title">
                                                            CVS
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo2/account/home/settings-sidebar">
                                                        <span class="kt-menu-title">
                                                            Excel
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
                                                    Paramètres
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-table kt-scrollable-x-auto">
                            <table class="kt-table table-fixed">
                                <thead>
                                    <tr>
                                        <th class="text-start w-52">
                                            Objet du projet
                                        </th>
                                        <th class="w-56 text-end">
                                            Collecte
                                        </th>
                                        <th class="w-36 text-end">
                                            Investisseurs
                                        </th>
                                        <th class="w-36 text-end">
                                            Date d'échéance
                                        </th>
                                        <th class="w-16">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($loanRequests as $loan)
                                    <tr>
                                        <td class="text-start">
                                            <a class="text-sm font-medium text-mono hover:text-primary" href="#">
                                                {{ $loan->objet ?? 'NEANT' }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="kt-progress kt-progress-primary h-[4px]">
                                                <div class="kt-progress-indicator" style="width: 60%">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-end rtl:justify-start shrink-0">
                                                <div class="flex -space-x-2">
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="{{asset('assets/media/avatars/blank.png')}}" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="{{asset('assets/media/avatars/blank.png')}}" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-6"
                                                            src="{{asset('assets/media/avatars/blank.png')}}" />
                                                    </div>
                                                    <div class="flex">
                                                        <span
                                                            class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-6 text-white ring-background bg-green-500">
                                                            +3
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-secondary-foreground text-end">
                                            24 Aug, 2024
                                        </td>
                                        <td class="text-start">
                                            <div class="kt-menu" data-kt-menu="true">
                                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                    data-kt-menu-item-placement="bottom-end"
                                                    data-kt-menu-item-placement-rtl="bottom-start"
                                                    data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                    <button
                                                        class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                        <i class="ki-filled ki-dots-vertical text-lg">
                                                        </i>
                                                    </button>
                                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                        data-kt-menu-dismiss="true">
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-search-list">
                                                                    </i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    View
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
                                                                    Export
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-separator">
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
                                                                    <i class="ki-filled ki-copy">
                                                                    </i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    Make a copy
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-separator">
                                                        </div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-trash">
                                                                    </i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    Remove
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Aucune demande de prêt pour le moment.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed"
                                href="">
                                Tous les Projets
                            </a>
                        </div>
                    </div>
                    <!-- End of Projects Table -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">
                        <div class="kt-card">
                            <div class="kt-card-header gap-2">
                                <h3 class="kt-card-title">
                                    Contributeurs
                                </h3>
                                <div class="kt-menu" data-kt-menu="true">
                                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                        data-kt-menu-item-placement="bottom-end"
                                        data-kt-menu-item-placement-rtl="bottom-start" data-kt-menu-item-toggle="dropdown"
                                        data-kt-menu-item-trigger="click">
                                        <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-dots-vertical text-lg">
                                            </i>
                                        </button>
                                        <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                            data-kt-menu-dismiss="true">
                                            <div class="kt-menu-item">
                                                <a class="kt-menu-link" href="">
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
                                                <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                    href="#">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-share">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Share
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="kt-menu-item" data-kt-menu-item-offset="-15px, 0"
                                                data-kt-menu-item-placement="right-start"
                                                data-kt-menu-item-toggle="dropdown"
                                                data-kt-menu-item-trigger="click|lg:hover">
                                                <div class="kt-menu-link">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-notification-status">
                                                        </i>
                                                    </span>
                                                    <span class="kt-menu-title">
                                                        Notifications
                                                    </span>
                                                    <span class="kt-menu-arrow">
                                                        <i class="ki-filled ki-right text-xs rtl:transform rtl:rotate-180">
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]">
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="/metronic/tailwind/demo2/account/home/settings-sidebar">
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
                                                            href="/metronic/tailwind/demo2/account/home/settings-sidebar">
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
                                                            href="/metronic/tailwind/demo2/account/home/settings-sidebar">
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
                                            <div class="kt-menu-separator">
                                            </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card-content">
                                <div class="flex flex-col gap-2 lg:gap-5">
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center grow gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="{{asset('assets/media/avatars/blank.png')}}">
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Tyler Hero
                                                </a>
                                                <span class="text-xs font-semibold text-secondary-foreground">
                                                    6 contributors
                                                </span>
                                            </div>
                                            </img>
                                        </div>
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                data-kt-menu-item-placement="bottom-end"
                                                data-kt-menu-item-placement-rtl="bottom-start"
                                                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg">
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
                                                        <a class="kt-menu-link"
                                                            data-kt-modal-toggle="#share_profile_modal" href="#">
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
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center grow gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="{{asset('assets/media/avatars/blank.png')}}">
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Esther Howard
                                                </a>
                                                <span class="text-xs font-semibold text-secondary-foreground">
                                                    29 contributors
                                                </span>
                                            </div>
                                            </img>
                                        </div>
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                data-kt-menu-item-placement="bottom-end"
                                                data-kt-menu-item-placement-rtl="bottom-start"
                                                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg">
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
                                                        <a class="kt-menu-link"
                                                            data-kt-modal-toggle="#share_profile_modal" href="#">
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
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center grow gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="{{asset('assets/media/avatars/blank.png')}}">
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Cody Fisher
                                                </a>
                                                <span class="text-xs font-semibold text-secondary-foreground">
                                                    34 contributors
                                                </span>
                                            </div>
                                            </img>
                                        </div>
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                data-kt-menu-item-placement="bottom-end"
                                                data-kt-menu-item-placement-rtl="bottom-start"
                                                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg">
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
                                                        <a class="kt-menu-link"
                                                            data-kt-modal-toggle="#share_profile_modal" href="#">
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
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center grow gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="{{asset('assets/media/avatars/blank.png')}}">
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    Arlene McCoy
                                                </a>
                                                <span class="text-xs font-semibold text-secondary-foreground">
                                                    1 contributors
                                                </span>
                                            </div>
                                            </img>
                                        </div>
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                data-kt-menu-item-placement="bottom-end"
                                                data-kt-menu-item-placement-rtl="bottom-start"
                                                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg">
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
                                                        <a class="kt-menu-link"
                                                            data-kt-modal-toggle="#share_profile_modal" href="#">
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
                                </div>
                            </div>
                            <div class="kt-card-footer justify-center">
                                <a class="kt-link kt-link-underlined kt-link-dashed"
                                    href="/metronic/tailwind/demo2/public-profile/network">
                                    Tous les contributeurs
                                </a>
                            </div>
                        </div>
                        <div class="kt-card">
                            <div class="kt-card-header">
                                <h3 class="kt-card-title">
                                    Statistiques
                                </h3>
                                <div class="kt-menu" data-kt-menu="true">
                                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                        data-kt-menu-item-placement="bottom-end"
                                        data-kt-menu-item-placement-rtl="bottom-start" data-kt-menu-item-toggle="dropdown"
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
                                                <a class="kt-menu-link" href="">
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
                            <div class="kt-card-content flex justify-center items-center px-3 py-1">
                                <div id="contributions_chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 lg:gap-7.5">
                        <div class="kt-card">
                            <div class="kt-card-content px-10 py-7.5 lg:pe-12.5">
                                <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                                    <div class="flex flex-col gap-3">
                                        <h2 class="text-xl font-semibold text-mono">
                                            Lorem ipsum
                                            <br />
                                            sit amet consectetur adipisicing elit.
                                        </h2>
                                        <p class="text-sm text-secondary-foreground leading-5.5">
                                            Recusandae necessitatibus eius, saepe laboriosam iure blanditiis sint unde dignissimos
                                            reiciendis corporis adipisci dolores dolorum minima delectus sit cumque maiores quas. 
                                            Saepe.
                                        </p>
                                    </div>
                                    <img alt="image" class="dark:hidden max-h-[160px]"
                                        src="{{asset('assets/media/illustrations/1.svg')}}" />
                                    <img alt="image" class="light:hidden max-h-[160px]"
                                        src="{{asset('assets/media/illustrations/1-dark.svg')}}" />
                                </div>
                            </div>
                            <div class="kt-card-footer justify-center">
                                <a class="kt-link kt-link-underlined kt-link-dashed"
                                    href="/metronic/tailwind/demo2/network/get-started">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: grid -->
    </div>
    <!-- End of Container -->
@endsection

@section('javascripts')
    <script src="{{ asset('assets/js/widgets/general.js') }}"></script>
@endsection
