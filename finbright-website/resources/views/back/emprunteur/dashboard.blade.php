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
                                Community Badges
                            </h3>
                        </div>
                        <div class="kt-card-content pb-7.5">
                            <div class="flex items-center flex-wrap gap-3 lg:gap-4">
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-primary/10 fill-primary/5" fill="none"
                                        height="48" viewbox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill="">
                                        </path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke="">
                                        </path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-abstract-39 text-xl ps-px text-primary">
                                        </i>
                                    </div>
                                </div>
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-yellow-200 dark:stroke-yellow-950 fill-yellow-100 dark:fill-yellow-950/30"
                                        fill="none" height="48" viewbox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill="">
                                        </path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke="">
                                        </path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-abstract-44 text-xl ps-px text-yellow-600">
                                        </i>
                                    </div>
                                </div>
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-green-200 dark:stroke-green-950 fill-green-100 dark:fill-green-950/30"
                                        fill="none" height="48" viewbox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill="">
                                        </path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke="">
                                        </path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-abstract-25 text-xl ps-px text-green-600">
                                        </i>
                                    </div>
                                </div>
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-violet-200 dark:stroke-violet-950 fill-violet-100 dark:fill-violet-950/30"
                                        fill="none" height="48" viewbox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill="">
                                        </path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke="">
                                        </path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-delivery-24 text-xl ps-px text-violet-600">
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            32
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Ville:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            Amsterdam
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            État/Région:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            North Holland
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Pays:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            Netherlands
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Code postal:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            1092 NL
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm text-secondary-foreground pb-3.5 pe-3">
                                            Téléphone:
                                        </td>
                                        <td class="text-sm text-mono pb-3.5">
                                            +31 6 1234 56 78
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Work Experience
                            </h3>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid gap-y-5">
                                <div class="flex align-start gap-3.5">
                                    <img alt="" class="h-9"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg" />
                                    <div class="flex flex-col gap-1">
                                        <a class="text-sm font-medium text-primary leading-none hover:text-primary"
                                            href="#">
                                            Esprito Studios
                                        </a>
                                        <span class="text-sm font-medium text-mono">
                                            Senior Project Manager
                                        </span>
                                        <span class="text-xs text-secondary-foreground leading-none">
                                            2019 - Present
                                        </span>
                                    </div>
                                </div>
                                <div class="text-secondary-foreground font-semibold text-sm leading-none">
                                    Previous Jobs
                                </div>
                                <div class="flex align-start gap-3.5">
                                    <img alt="" class="h-9"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/weave.svg" />
                                    <div class="flex flex-col gap-1">
                                        <a class="text-sm font-medium text-primary leading-none hover:text-primary"
                                            href="#">
                                            Pesto Plus
                                        </a>
                                        <span class="text-sm font-medium text-mono">
                                            CRM Product Lead
                                        </span>
                                        <span class="text-xs text-secondary-foreground leading-none">
                                            2012 - 2019
                                        </span>
                                    </div>
                                </div>
                                <div class="flex align-start gap-3.5">
                                    <img alt="" class="h-9"
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/perrier.svg" />
                                    <div class="flex flex-col gap-1">
                                        <a class="text-sm font-medium text-primary leading-none hover:text-primary"
                                            href="#">
                                            Perrier Technologies
                                        </a>
                                        <span class="text-sm font-medium text-mono">
                                            UX Research
                                        </span>
                                        <span class="text-xs text-secondary-foreground leading-none">
                                            2010 - 2012
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
                                    <tr>
                                        <td class="text-start">
                                            <a class="text-sm font-medium text-mono hover:text-primary" href="#">
                                                Acme software development
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
                                    <tr>
                                        <td class="text-start">
                                            <a class="text-sm font-medium text-mono hover:text-primary" href="#">
                                                Strategic Partnership Deal
                                            </a>
                                        </td>
                                        <td>
                                            <div class="kt-progress h-[4px]">
                                                <div class="kt-progress-indicator" style="width: 100%">
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
                                                        <span
                                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-6 text-white ring-background bg-destructive">
                                                            M
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-secondary-foreground text-end">
                                            10 Sep, 2024
                                        </td>
                                        <td class="text-start">
                                            <div class="kt-menu" data-kt-menu="true">
                                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                    data-kt-menu-item-placement="bottom-end"
                                                    data-kt-menu-item-placement-rtl="bottom-start"
                                                    data-kt-menu-item-toggle="dropdown"
                                                    data-kt-menu-item-trigger="click">
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
                                    <tr>
                                        <td class="text-start">
                                            <a class="text-sm font-medium text-mono hover:text-primary" href="#">
                                                Client Onboarding
                                            </a>
                                        </td>
                                        <td>
                                            <div class="kt-progress kt-progress-primary h-[4px]">
                                                <div class="kt-progress-indicator" style="width: 20%">
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
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-secondary-foreground text-end">
                                            19 Sep, 2024
                                        </td>
                                        <td class="text-start">
                                            <div class="kt-menu" data-kt-menu="true">
                                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                    data-kt-menu-item-placement="bottom-end"
                                                    data-kt-menu-item-placement-rtl="bottom-start"
                                                    data-kt-menu-item-toggle="dropdown"
                                                    data-kt-menu-item-trigger="click">
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
                                    <tr>
                                        <td class="text-start">
                                            <a class="text-sm font-medium text-mono hover:text-primary" href="#">
                                                Widget Supply Agreement
                                            </a>
                                        </td>
                                        <td>
                                            <div class="kt-progress kt-progress-success h-[4px]">
                                                <div class="kt-progress-indicator" style="width: 100%">
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
                                                            class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-6 text-primary-foreground ring-background bg-primary">
                                                            +1
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-secondary-foreground text-end">
                                            5 May, 2024
                                        </td>
                                        <td class="text-start">
                                            <div class="kt-menu" data-kt-menu="true">
                                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                    data-kt-menu-item-placement="bottom-end"
                                                    data-kt-menu-item-placement-rtl="bottom-start"
                                                    data-kt-menu-item-toggle="dropdown"
                                                    data-kt-menu-item-trigger="click">
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
                                    <tr>
                                        <td class="text-start">
                                            <a class="text-sm font-medium text-mono hover:text-primary" href="#">
                                                Project X Redesign
                                            </a>
                                        </td>
                                        <td>
                                            <div class="kt-progress kt-progress-primary h-[4px]">
                                                <div class="kt-progress-indicator" style="width: 80%">
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
                                                            +2
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-secondary-foreground text-end">
                                            1 Feb, 2025
                                        </td>
                                        <td class="text-start">
                                            <div class="kt-menu" data-kt-menu="true">
                                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                    data-kt-menu-item-placement="bottom-end"
                                                    data-kt-menu-item-placement-rtl="bottom-start"
                                                    data-kt-menu-item-toggle="dropdown"
                                                    data-kt-menu-item-trigger="click">
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
                                            Unlock Creative
                                            <br />
                                            Partnerships on Our Blog
                                        </h2>
                                        <p class="text-sm text-secondary-foreground leading-5.5">
                                            Explore exciting collaboration opportunities with our blog.
                                            We're open to partnerships, guest posts, and more.
                                            Join us to share your insights and grow your audience.
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
