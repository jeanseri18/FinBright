@extends('back.admin.layouts')

@section('title', 'Corbeille')

@section('stylesheet')
    <style type="text/css">
    </style>
@endsection

@section('content')
    <!-- Toolbar -->
    <div class="pb-5">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
            <div class="flex flex-col flex-wrap gap-1">
                <h1 class="font-medium text-lg text-mono">
                    Corbeille
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{ route('admin.dashboard') }}">
                        Tableau de bord
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Sécurité
                    </span>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Corbeille
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                    href="{{ route('admin.export.csv', ['entity' => 'trash', 'month' => $months->first()['value'] ?? '']) }}">
                    <i class="ki-filled ki-exit-down"></i>
                    Exporter
                </a>

                <!-- Dropdown de sélection du mois -->
                <div class="kt-menu kt-menu-default" data-kt-menu="true">
                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 0" data-kt-menu-item-placement="bottom-end"
                        data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="hover">

                        <button class="kt-menu-toggle kt-btn kt-btn-outline flex-nowrap">
                            <span class="flex items-center me-1">
                                <i class="ki-filled ki-calendar text-base!"></i>
                            </span>
                            <span id="selectedMonthLabel" class="hidden md:inline text-nowrap">
                                {{ $months->first()['label'] ?? 'Aucun mois' }}
                            </span>
                            <span id="selectedMonthShort" class="inline md:hidden text-nowrap">
                                {{ $months->first()['short'] ?? '' }}
                            </span>
                            <span class="flex items-center lg:ms-4">
                                <i class="ki-filled ki-down text-xs!"></i>
                            </span>
                        </button>

                        <div class="kt-menu-dropdown w-48 py-2 kt-scrollable-y max-h-[250px]">
                            @foreach ($months as $month)
                                <div class="kt-menu-item {{ $loop->first ? 'active' : '' }}">
                                    <a class="kt-menu-link" href="#" data-value="{{ $month['value'] }}"
                                        data-label="{{ $month['label'] }}" data-short="{{ $month['short'] }}">
                                        <span class="kt-menu-title">{{ $month['label'] }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Container -->
    </div>
    <!-- End of Toolbar -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <!-- begin: grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card kt-card-grid min-w-full">
                        <div class="kt-card-header py-5 flex-wrap">
                            <h3 class="kt-card-title">
                                Corbeille
                            </h3>
                            {{-- <label class="kt-label">
                                Suppression automatique
                                <input class="kt-switch kt-switch-sm" name="check" type="checkbox" value="1" />
                            </label> --}}
                        </div>
                        <div class="kt-card-content">
                            <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="10">
                                <div class="kt-scrollable-x-auto">
                                    <table class="kt-table kt-table-border" data-kt-datatable-table="true"
                                        id="backups_table">
                                        <thead>
                                            <tr>
                                                <th class="min-w-[260px]">
                                                    <span class="kt-table-col">
                                                        <span class="kt-table-col-label">
                                                            Quand
                                                        </span>
                                                        <span class="kt-table-col-sort">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[260px]">
                                                    <span class="kt-table-col">
                                                        <span class="kt-table-col-label">
                                                            Détails
                                                        </span>
                                                        <span class="kt-table-col-sort">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="w-[100px]">
                                                </th>
                                                <th class="w-[100px]">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flex flex-col gap-1">
                                                        <span class="leading-none font-medium text-sm text-mono">
                                                            Il y a 7 minutes
                                                        </span>
                                                        <span class="text-sm text-secondary-foreground font-normal">
                                                            24 Jan, 2024, 9:24:53
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-col gap-1">
                                                        <span class="leading-none font-medium text-sm text-mono">
                                                            Routine Quick Backup
                                                        </span>
                                                        <span
                                                            class="flex items-center gap-2 text-xs text-secondary-foreground font-normal">
                                                            <span class="flex items-center gap-1">
                                                                <i class="ki-filled ki-files text-sm text-muted-foreground">
                                                                </i>
                                                                Etablissement
                                                            </span>
                                                            <span class="border-r border-r-input h-4">
                                                            </span>
                                                            <span class="flex items-center gap-1">
                                                                <i
                                                                    class="ki-filled ki-user text-sm text-muted-foreground">
                                                                </i>
                                                                Admin test
                                                            </span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="kt-btn kt-btn-sm" href="#">
                                                        Supprimer
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="kt-btn kt-btn-outline" href="#">
                                                        Restaurer
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex flex-col gap-1">
                                                        <span class="leading-none font-medium text-sm text-mono">
                                                            Aujourd'hui
                                                        </span>
                                                        <span class="text-sm text-secondary-foreground font-normal">
                                                            24 Jan, 2024, 14:09:26
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-col gap-1">
                                                        <span class="leading-none font-medium text-sm text-mono">
                                                            Early Morning Sync
                                                        </span>
                                                        <span
                                                            class="flex items-center gap-2 text-xs text-secondary-foreground font-normal">
                                                            <span class="flex items-center gap-1">
                                                                <i
                                                                    class="ki-filled ki-files text-sm text-muted-foreground">
                                                                </i>
                                                                Files
                                                            </span>
                                                            <span class="border-r border-r-input h-4">
                                                            </span>
                                                            <span class="flex items-center gap-1">
                                                                <i
                                                                    class="ki-filled ki-user text-sm text-muted-foreground">
                                                                </i>
                                                                Admin test
                                                            </span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="kt-btn kt-btn-sm" href="#">
                                                        Supprimer
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="kt-btn kt-btn-outline" href="#">
                                                        Restaurer
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="kt-card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-secondary-foreground text-sm font-medium">
                                    <div class="flex items-center gap-2 order-2 md:order-1">
                                        Affichage de 
                                        <select class="kt-select w-16" data-kt-datatable-size="true" data-kt-select=""
                                            name="perpage">
                                        </select>
                                        par page
                                    </div>
                                    <div class="flex items-center gap-4 order-1 md:order-2">
                                        <span data-kt-datatable-info="true">
                                        </span>
                                        <div class="kt-datatable-pagination" data-kt-datatable-pagination="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                FAQ
                            </h3>
                        </div>
                        <div class="kt-card-content py-3">
                            <div data-kt-accordion="true" data-kt-accordion-expand-all="true">
                                <div class="kt-accordion-item not-last:border-b border-b-border"
                                    data-kt-accordion-item="true">
                                    <button aria-controls="faq_1_content" class="kt-accordion-toggle py-4"
                                        data-kt-accordion-toggle="#faq_1_content">
                                        <span class="text-base text-mono">
                                            How is pricing determined for each plan?
                                        </span>
                                        <span class="kt-accordion-active:hidden inline-flex">
                                            <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                        <span class="kt-accordion-active:inline-flex hidden">
                                            <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-accordion-content hidden" id="faq_1_content">
                                        <div class="text-secondary-foreground text-base pb-4">
                                            Metronic embraces flexible licensing options that empower you to choose the
                                            perfect fit for your project's needs and budget. Understanding the factors
                                            influencing each plan's pricing helps you make an informed decision. Metronic
                                            embraces flexible licensing options that empower you to choose the perfect fit
                                            for your project's needs and budget. Understanding the factors influencing each
                                            plan's pricing helps you make an informed decision. Metronic embraces flexible
                                            licensing options that empower you to choose the perfect fit for your project's
                                            needs and budget. Understanding the factors influencing each plan's pricing
                                            helps you make an informed decision
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-accordion-item not-last:border-b border-b-border"
                                    data-kt-accordion-item="true">
                                    <button aria-controls="faq_2_content" class="kt-accordion-toggle py-4"
                                        data-kt-accordion-toggle="#faq_2_content">
                                        <span class="text-base text-mono">
                                            What payment methods are accepted for subscriptions?
                                        </span>
                                        <span class="kt-accordion-active:hidden inline-flex">
                                            <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                        <span class="kt-accordion-active:inline-flex hidden">
                                            <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-accordion-content hidden" id="faq_2_content">
                                        <div class="text-secondary-foreground text-base pb-4">
                                            Metronic embraces flexible licensing options that empower you to choose the
                                            perfect fit for your project's needs and budget. Understanding the factors
                                            influencing each plan's pricing helps you make an informed decision
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-accordion-item not-last:border-b border-b-border"
                                    data-kt-accordion-item="true">
                                    <button aria-controls="faq_3_content" class="kt-accordion-toggle py-4"
                                        data-kt-accordion-toggle="#faq_3_content">
                                        <span class="text-base text-mono">
                                            Are there any hidden fees in the pricing?
                                        </span>
                                        <span class="kt-accordion-active:hidden inline-flex">
                                            <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                        <span class="kt-accordion-active:inline-flex hidden">
                                            <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-accordion-content hidden" id="faq_3_content">
                                        <div class="text-secondary-foreground text-base pb-4">
                                            Metronic embraces flexible licensing options that empower you to choose the
                                            perfect fit for your project's needs and budget. Understanding the factors
                                            influencing each plan's pricing helps you make an informed decision
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-accordion-item not-last:border-b border-b-border"
                                    data-kt-accordion-item="true">
                                    <button aria-controls="faq_4_content" class="kt-accordion-toggle py-4"
                                        data-kt-accordion-toggle="#faq_4_content">
                                        <span class="text-base text-mono">
                                            Is there a discount for annual subscriptions?
                                        </span>
                                        <span class="kt-accordion-active:hidden inline-flex">
                                            <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                        <span class="kt-accordion-active:inline-flex hidden">
                                            <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-accordion-content hidden" id="faq_4_content">
                                        <div class="text-secondary-foreground text-base pb-4">
                                            Metronic embraces flexible licensing options that empower you to choose the
                                            perfect fit for your project's needs and budget. Understanding the factors
                                            influencing each plan's pricing helps you make an informed decision
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-accordion-item not-last:border-b border-b-border"
                                    data-kt-accordion-item="true">
                                    <button aria-controls="faq_5_content" class="kt-accordion-toggle py-4"
                                        data-kt-accordion-toggle="#faq_5_content">
                                        <span class="text-base text-mono">
                                            Do you offer refunds on subscription cancellations?
                                        </span>
                                        <span class="kt-accordion-active:hidden inline-flex">
                                            <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                        <span class="kt-accordion-active:inline-flex hidden">
                                            <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-accordion-content hidden" id="faq_5_content">
                                        <div class="text-secondary-foreground text-base pb-4">
                                            Metronic embraces flexible licensing options that empower you to choose the
                                            perfect fit for your project's needs and budget. Understanding the factors
                                            influencing each plan's pricing helps you make an informed decision
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-accordion-item not-last:border-b border-b-border"
                                    data-kt-accordion-item="true">
                                    <button aria-controls="faq_6_content" class="kt-accordion-toggle py-4"
                                        data-kt-accordion-toggle="#faq_6_content">
                                        <span class="text-base text-mono">
                                            Can I add extra features to my current plan?
                                        </span>
                                        <span class="kt-accordion-active:hidden inline-flex">
                                            <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                        <span class="kt-accordion-active:inline-flex hidden">
                                            <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                            </i>
                                        </span>
                                    </button>
                                    <div class="kt-accordion-content hidden" id="faq_6_content">
                                        <div class="text-secondary-foreground text-base pb-4">
                                            Metronic embraces flexible licensing options that empower you to choose the
                                            perfect fit for your project's needs and budget. Understanding the factors
                                            influencing each plan's pricing helps you make an informed decision
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card">
                        <div class="kt-card-header mb-1">
                            <h3 class="kt-card-title">
                                Paramètre de suppression
                            </h3>
                        </div>
                        <div class="kt-card-group flex items-center justify-between py-4 gap-2.5">
                            <div class="flex flex-col justify-center gap-1.5">
                                <span class="leading-none font-medium text-sm text-mono">
                                    Suppression automatique
                                </span>
                                <span class="text-sm text-secondary-foreground">
                                    Protection programmée des données
                                </span>
                            </div>
                            <input checked="" class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                value="1" />
                        </div>
                        <div class="kt-card-group flex items-center justify-between py-4 gap-2.5">
                            <div class="flex flex-col justify-center gap-1.5">
                                <span class="leading-none font-medium text-sm text-mono">
                                    Frequence
                                </span>
                                <span class="text-sm text-secondary-foreground">
                                    Sélectionner votre préférence
                                </span>
                            </div>
                            <select class="kt-select max-w-32" data-kt-select="true">
                                <option value="daily">
                                    Par jour
                                </option>
                                <option selected="" value="weekly">
                                    Par semaine
                                </option>
                                <option value="monthly">
                                    Par mois
                                </option>
                                <option value="yearly">
                                    Par an
                                </option>
                            </select>
                        </div>
                        <div class="kt-card-group flex items-center justify-between py-4 gap-2.5">
                            <div class="flex flex-col justify-center gap-1.5">
                                <span class="leading-none font-medium text-sm text-mono">
                                    Suppression manuelle
                                </span>
                                <span class="text-sm text-secondary-foreground">
                                    Suppression en cas de besoin
                                </span>
                            </div>
                            <a class="kt-btn kt-btn-outline" href="#">
                                Démarrer
                            </a>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-content py-10 flex flex-col gap-5 lg:gap-7.5">
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
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
                                            <i class="ki-filled ki-book text-xl ps-px text-primary">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Garantir l'intégrité des données : Systèmes de suppression et de récupération
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Protégez vos données grâce à nos solutions de sauvegarde et de restauration résilientes. Des guides détaillés et des stratégies d'experts fournissent la feuille de route pour une protection solide des données et une récupération rapide.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                    En savoir plus
                                </a>
                            </div>
                            <span class="hidden not-last:block not-last:border-b border-b-border">
                            </span>
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
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
                                            <i class="ki-filled ki-data text-xl ps-px text-primary">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Assurance de restauration : Ressources de sauvegarde proactives
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Préparez-vous à l'inattendu grâce à des plans de sauvegarde proactifs. Accédez à nos ressources étendues pour établir un protocole de récupération fiable, garantissant la continuité et la tranquillité d'esprit.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                    En savoir plus
                                </a>
                            </div>
                            <span class="hidden not-last:block not-last:border-b border-b-border">
                            </span>
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
    <!-- Ajout PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

    <script type="text/javascript">
        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce log ? Cette action est irréversible.")) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        }

        const exportBtn = document.getElementById('exportBtn');
        document.querySelectorAll('.kt-menu-link[data-value]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const value = this.dataset.value;
                const label = this.dataset.label;
                const shortLabel = this.dataset.short;

                // Mettre à jour le bouton Exporter (href dynamique)
                exportBtn.href = `/admin/export/trash/${value}`;

                // Mettre à jour l’affichage du mois sélectionné
                document.getElementById('selectedMonthLabel').textContent = label;
                document.getElementById('selectedMonthShort').textContent = shortLabel;

                // Mettre en surbrillance l’élément actif
                document.querySelectorAll('.kt-menu-item').forEach(i => i.classList.remove('active'));
                this.closest('.kt-menu-item').classList.add('active');
            });
        });
    </script>
@endsection
