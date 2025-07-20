@extends('back.emprunteur.layouts')

@section('title', 'Détails')

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
        <!-- begin: grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">
            <div class="col-span-2">
                <style>
                    .upgrade-bg {
                        background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-14.png');
                    }

                    .dark .upgrade-bg {
                        background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-14-dark.png');
                    }
                </style>
                <div class="kt-card rounded-xl">
                    <div
                        class="flex items-center flex-wrap md:flex-nowrap justify-between grow gap-5 p-5 rtl:bg-[center_left_-8rem] bg-[center_right_-8rem] bg-no-repeat bg-[length:700px] upgrade-bg">
                        <div class="flex items-center gap-4">
                            <div class="relative size-[50px] shrink-0">
                                <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none" height="48"
                                    viewbox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
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
                                    <i class="ki-filled ki-cheque text-xl text-primary">
                                    </i>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="flex items-center flex-wrap sm:flex-nowrap gap-2.5">
                                    <a class="text-base font-medium text-mono hover:text-primary" href="#">
                                        Upgrade your Components.io to Enterprise
                                    </a>
                                    <span class="kt-badge kt-badge-sm kt-badge-destructive kt-badge-outline shrink-0">
                                        Trial expires in 29 days
                                    </span>
                                </div>
                                <div class="text-sm text-secondary-foreground">
                                    Enterprise Components.io is a website offering high-quality, advanced UI components
                                    designed for developers, enhancing
                                    <br />
                                    efficiency and aesthetics in web and mobile app development.
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 shrink-0">
                            <a class="kt-btn kt-btn-ghost" href="#">
                                Cancel Trial
                            </a>
                            <a class="kt-btn kt-btn-mono" href="#">
                                Upgrade Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="kt-card">
                    <div class="kt-card-content lg:py-7.5">
                        <div class="flex flex-wrap gap-7.5">
                            <div
                                class="flex flex-col gap-3 items-center justify-center size-[140px] rounded-xl ring-1 ring-border bg-secondary-transparent">
                                <div class="flex justify-center items-center size-14 rounded-full ring-1 ring-input bg-accent/60">
                                    <i class="ki-filled ki-ghost text-2xl text-muted-foreground"></i>
                                </div>
                                <span class="text-sm font-semibold text-mono">
                                    Cloud One
                                </span>
                                </img>
                            </div>
                            <div class="flex flex-col gap-5 lg:gap-7.5 grow">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center flex-wrap sm:flex-nowrap gap-2.5">
                                            <h2 class="text-2xl font-semibold text-mono">
                                                Cloud One Enterprise
                                            </h2>
                                            <span class="kt-badge kt-badge-sm kt-badge-success kt-badge-outline shrink-0">
                                                Monthly Plan
                                            </span>
                                        </div>
                                        <p class="text-sm text-secondary-foreground">
                                            Essential Features for Startups and Individuals
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <a class="kt-btn kt-btn-outline" href="#">
                                            Cancel Plan
                                        </a>
                                        <a class="kt-btn kt-btn-primary" href="#">
                                            Upgrade Plan
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center flex-wrap gap-3 lg:gap-5">
                                    <div
                                        class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                                        <span class="text-mono text-sm leading-none font-medium">
                                            Trial
                                        </span>
                                        <span class="text-secondary-foreground text-xs">
                                            Status
                                        </span>
                                    </div>
                                    <div
                                        class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                                        <span class="text-mono text-sm leading-none font-medium">
                                            10,000
                                        </span>
                                        <span class="text-secondary-foreground text-xs">
                                            Query runs
                                        </span>
                                    </div>
                                    <div
                                        class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                                        <span class="text-mono text-sm leading-none font-medium">
                                            Unlimited
                                        </span>
                                        <span class="text-secondary-foreground text-xs">
                                            API calls
                                        </span>
                                    </div>
                                    <div
                                        class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                                        <span class="text-mono text-sm leading-none font-medium">
                                            $99.00
                                        </span>
                                        <span class="text-secondary-foreground text-xs">
                                            Price
                                        </span>
                                    </div>
                                    <div
                                        class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                                        <span class="text-mono text-sm leading-none font-medium">
                                            17 Aug, 2024
                                        </span>
                                        <span class="text-secondary-foreground text-xs">
                                            Next bill date
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-6 lg:gap-12">
                                    <div class="flex flex-col gap-3.5 grow">
                                        <div class="text-sm text-secondary-foreground">
                                            UQuery runs:
                                            <span class="text-sm font-medium text-mono">
                                                2239 of 10,000 used
                                            </span>
                                        </div>
                                        <div class="kt-progress kt-progress-primary max-w-2xl w-full">
                                            <div class="kt-progress-indicator" style="width: 47%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2.5 lg:min-w-24 shrink-0 -mt-3 max-w-auto">
                                        <div class="text-sm font-medium text-secondary-foreground">
                                            Seats:
                                            <span class="text-sm font-semibold text-foreground">
                                                29 of 120 used
                                            </span>
                                        </div>
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
                                                    class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-6 text-primary-foreground size-6 ring-background bg-green-500">
                                                    +16
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1 flex">
                <div class="kt-card grow">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">
                            Latest Payment
                        </h3>
                        <button class="kt-btn kt-btn-outline">
                            <i class="ki-filled ki-exit-down">
                            </i>
                            Download PDF
                        </button>
                    </div>
                    <div class="kt-card-content pt-4 pb-3">
                        <table class="kt-table-auto">
                            <tbody>
                                <tr>
                                    <td class="text-sm text-secondary-foreground min-w-36 pb-5 pe-6">
                                        Typ of Plan
                                    </td>
                                    <td class="flex items-center gap-2.5 text-sm text-foreground">
                                        Cloud One Enterprise
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm text-secondary-foreground min-w-36 pb-5 pe-6">
                                        Payment Date
                                    </td>
                                    <td class="flex items-center gap-2.5 text-sm text-foreground">
                                        6 Aug, 2024
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm text-secondary-foreground min-w-36 pb-5 pe-6">
                                        Card used to pay:
                                    </td>
                                    <td class="flex items-center gap-2.5 text-sm text-foreground">
                                        <img alt="" class="w-10 shrink-0"
                                            src="{{asset('assets/media/brand-logos/visa.svg')}}" />
                                        Ending 3604
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm text-secondary-foreground min-w-36 pb-5 pe-6">
                                        Total Payment:
                                    </td>
                                    <td class="flex items-center gap-2.5 text-sm text-foreground">
                                        $24.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1 flex">
                <div class="kt-card grow">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">
                            Next Payment
                        </h3>
                    </div>
                    <div class="kt-card-content lg:7.5">
                        <div class="flex flex-col gap-5">
                            <div
                                class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-4 py-4 bg-secondary-transparent">
                                <div class="flex items-center gap-3.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
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
                                            <i class="ki-filled ki-calendar text-xl text-primary">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <a class="text-sm font-medium hover:text-primary text-mono" href="#">
                                            on 17 Aug, 2024
                                        </a>
                                        <p class="text-sm text-secondary-foreground">
                                            Due date
                                        </p>
                                    </div>
                                </div>
                                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline kt-btn-primary rounded-full">
                                    <i class="ki-filled ki-check">
                                    </i>
                                </button>
                            </div>
                            <div class="place-self-end lg:pb-2.5">
                                <a class="kt-btn kt-btn-primary" href="#">
                                    Manage Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1 flex">
                <div class="kt-card grow">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">
                            Payment Methods
                        </h3>
                        <button class="kt-btn kt-btn-outline">
                            <i class="ki-filled ki-credit-cart">
                            </i>
                            Add New
                        </button>
                    </div>
                    <div class="kt-card-content lg:pb-7.5">
                        <div class="grid gap-5">
                            <div
                                class="flex items-center justify-between border border-border rounded-xl gap-2 px-4 py-4 bg-secondary-transparent">
                                <div class="flex items-center gap-3.5">
                                    <img alt="" class="w-10 shrink-0"
                                        src="{{asset('assets/media/brand-logos/visa.svg')}}" />
                                    <div class="flex flex-col">
                                        <a class="text-sm font-medium text-mono hover:text-primary mb-px" href="#">
                                            Jason Tatum
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            Ending 3604 Expires on 12/2026
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5">
                                    <span class="kt-badge kt-badge-sm kt-badge-success kt-badge-outline">
                                        Primary
                                    </span>
                                    <div class="flex gap-0.5">
                                        <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </div>
                                        <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between border border-border rounded-xl gap-2 px-4 py-4 bg-secondary-transparent">
                                <div class="flex items-center gap-3.5">
                                    <img alt="" class="w-10 shrink-0"
                                        src="{{asset('assets/media/brand-logos/ideal.svg')}}" />
                                    <div class="flex flex-col">
                                        <a class="text-sm font-medium text-mono hover:text-primary mb-px" href="#">
                                            Jason Tatum
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            iDeal with ABN Ambro
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5">
                                    <div class="flex gap-0.5">
                                        <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </div>
                                        <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between border border-border rounded-xl gap-2 px-4 py-4 bg-secondary-transparent">
                                <div class="flex items-center gap-3.5">
                                    <img alt="" class="w-10 shrink-0"
                                        src="{{asset('assets/media/brand-logos/paypal.svg')}}" />
                                    <div class="flex flex-col">
                                        <a class="text-sm font-medium text-mono hover:text-primary mb-px" href="#">
                                            Jason Tatum
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            jasontt@studio.co
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5">
                                    <div class="flex gap-0.5">
                                        <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </div>
                                        <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1">
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">
                            Billing and Invoicing
                        </h3>
                        <button class="kt-btn kt-btn-outline">
                            <i class="ki-filled ki-exit-down">
                            </i>
                            Download All
                        </button>
                    </div>
                    <div class="kt-card-table kt-scrollable-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th class="min-w-52">
                                        Invoice
                                    </th>
                                    <th class="min-w-16 text-end">
                                        Status
                                    </th>
                                    <th class="min-w-32 text-end">
                                        Date
                                    </th>
                                    <th class="min-w-16 text-end">
                                        Amount
                                    </th>
                                    <th class="w-8">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-sm text-foreground">
                                        Invoice-2024-xd912c
                                    </td>
                                    <td class="lg:text-end">
                                        <div class="kt-badge kt-badge-sm kt-badge-warning kt-badge-outline">
                                            Upcoming
                                        </div>
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        6 Aug, 2024
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        $24.00
                                    </td>
                                    <td>
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
                                                                <i class="ki-filled ki-trash">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Share
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm text-foreground">
                                        Invoice-2024-rq857m
                                    </td>
                                    <td class="lg:text-end">
                                        <div class="kt-badge kt-badge-sm kt-badge-success kt-badge-outline">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        17 Jun, 2024
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        $29.99
                                    </td>
                                    <td>
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
                                                                <i class="ki-filled ki-trash">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Share
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm text-foreground">
                                        Invoice-2024-hg234x
                                    </td>
                                    <td class="lg:text-end">
                                        <div class="kt-badge kt-badge-sm kt-badge-danger kt-badge-outline">
                                            Declined
                                        </div>
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        21 Apr, 2024
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        $6.59
                                    </td>
                                    <td>
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
                                                                <i class="ki-filled ki-trash">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Share
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm text-foreground">
                                        Invoice-2024-lp098y
                                    </td>
                                    <td class="lg:text-end">
                                        <div class="kt-badge kt-badge-sm kt-badge-success kt-badge-outline">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        14 Mar, 2024
                                    </td>
                                    <td class="text-sm text-foreground lg:text-end">
                                        $24.00
                                    </td>
                                    <td>
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
                                                                <i class="ki-filled ki-trash">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Share
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
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                            View all Payments
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="grid lg:grid-cols-2 gap-5 lg:gap-7.5">
                    <div class="kt-card">
                        <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                            <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                                <div class="flex flex-col items-start gap-3">
                                    <h2 class="text-xl font-medium text-mono">
                                        Questions ?
                                    </h2>
                                    <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                        Visit our Help Center for detailed assistance on billing, payments, and
                                        subscriptions.
                                    </p>
                                </div>
                                <img alt="image" class="dark:hidden max-h-[150px]"
                                    src="{{asset('assets/media/illustrations/2.svg')}}" />
                                <img alt="image" class="light:hidden max-h-[150px]"
                                    src="{{asset('assets/media/illustrations/2-dark.svg')}}" />
                            </div>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed" href="">
                                Go to Help Center
                            </a>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                            <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                                <div class="flex flex-col items-start gap-3">
                                    <h2 class="text-xl font-medium text-mono">
                                        Contact Support
                                    </h2>
                                    <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                        Need assistance? Contact our support team for prompt, personalized help your queries
                                        &amp; concerns.
                                    </p>
                                </div>
                                <img alt="image" class="dark:hidden max-h-[150px]"
                                    src="{{asset('assets/media/illustrations/4.svg')}}" />
                                <img alt="image" class="light:hidden max-h-[150px]"
                                    src="{{asset('assets/media/illustrations/4-dark.svg')}}" />
                            </div>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed"
                                href="https://devs.keenthemes.com/unresolved">
                                Contact Support
                            </a>
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
@endsection
