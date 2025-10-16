@extends('back.admin.layouts')

@section('title', 'Liste des investisseurs')

@section('stylesheet')
    <style type="text/css">
    #modal_kyc .kt-select-dropdown.open {
        position: absolute !important;
    }
    </style>
@endsection

@section('content')
    <!-- Toolbar -->
    <div class="pb-5">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
            <div class="flex flex-col flex-wrap gap-1">
                <h1 class="font-medium text-lg text-mono">
                    Liste des investisseurs
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{ route('admin.dashboard') }}">
                        Tableau de bord
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Projets
                    </span>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Liste des investisseurs
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                href="{{ route('admin.export.csv', ['entity' => 'investisseurs', 'month' => $months->first()['value'] ?? '']) }}">
                    <i class="ki-filled ki-exit-down"></i>
                    Exporter
                </a>

                <!-- Dropdown de sélection du mois -->
                <div class="kt-menu kt-menu-default" data-kt-menu="true">
                    <div class="kt-menu-item"
                        data-kt-menu-item-offset="0, 0"
                        data-kt-menu-item-placement="bottom-end"
                        data-kt-menu-item-toggle="dropdown"
                        data-kt-menu-item-trigger="hover">

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
                                    <a class="kt-menu-link"
                                    href="#"
                                    data-value="{{ $month['value'] }}"
                                    data-label="{{ $month['label'] }}"
                                    data-short="{{ $month['short'] }}">
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
        <div class="grid gap-5 lg:gap-7.5">
            <div class="kt-card kt-card-grid min-w-full">
                <div class="kt-card-header flex-wrap gap-2">
                    <h3 class="kt-card-title text-sm">
                        Affichage de {{ count($investisseurs) >= 10 ? '10 sur '. count($investisseurs) : count($investisseurs)}} investisseurs
                    </h3>
                    <div class="flex flex-wrap gap-2 lg:gap-5">
                        <div class="flex">
                            <label class="kt-input">
                                <i class="ki-filled ki-magnifier">
                                </i>
                                <input id="search_input" placeholder="Rechercher un investisseur" type="text" value="" />
                            </label>
                        </div>
                        <form action="" method="GET" class="flex flex-wrap gap-2.5">
                            <select name="statut" class="kt-select w-36" data-kt-select="true"
                                data-kt-select-placeholder="Statut KYC">
                                <option value="" {{ request('statut') == '' ? 'selected' : '' }}>Tout</option>
                                <option value="1" {{ request('statut') == 1 ? 'selected' : '' }}>Activé</option>
                                <option value="2" {{ request('statut') == 2 ? 'selected' : '' }}>Desactivé</option>
                            </select>
                            <select name="ordre" class="kt-select w-36" data-kt-select="true"
                                data-kt-select-placeholder="Ordre d'affichage">
                                <option value="1" {{ request('ordre') == 1 ? 'selected' : '' }}>Plus recents</option>
                                <option value="2" {{ request('ordre') == 2 ? 'selected' : '' }}>Plus anciens</option>
                            </select>
                            <button class="kt-btn kt-btn-outline kt-btn-primary">
                                <i class="ki-filled ki-setting-4">
                                </i>
                                Filtrer
                            </button>
                        </form>
                    </div>
                </div>
                <div class="kt-card-content">
                    <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="10">
                        <div class="kt-scrollable-x-auto">
                            <table class="kt-table table-auto kt-table-border" data-kt-datatable-table="true">
                                <thead>
                                    <tr>
                                        <th class="min-w-[200px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Investisseurs
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="max-w-[120px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Type
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="max-w-[100px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label whitespace-normal">
                                                    Scoring risque
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[125px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Adresses
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="max-w-[50px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label whitespace-normal">
                                                    Check KYC
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[125px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Responsable
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="w-[60px]">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($investisseurs as $investisseur)
                                    <tr>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img alt="" class="rounded-full size-7 shrink-0"
                                                    src="{{ $investisseur->user->profilePicture ? Storage::url($investisseur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                                <a class="text-sm font-medium text-mono hover:text-primary"
                                                    href="#" onclick="openModal({{ $investisseur->id }})">
                                                    {{ $investisseur->type_of_lender == "Personne physique" 
                                                    ? $investisseur->user->first_name .' '. $investisseur->user->last_name
                                                    : $investisseur->denomination_sociale .' ('. $investisseur->forme_juridique .')' }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="font-normal text-foreground">
                                            {{ $investisseur->type_of_lender }}
                                        </td>
                                        <td class="font-normal text-foreground">
                                            @if(isset($investisseur->risk))
                                                <span class="kt-badge 
                                                    {{ $investisseur->risk['level'] === 'Élevé' ? 'bg-red-100 text-red-800' : 
                                                    ($investisseur->risk['level'] === 'Standard' ? 'bg-yellow-100 text-yellow-800' : 
                                                        'bg-green-100 text-green-800') }}">
                                                    {{ $investisseur->risk['level'] }} ({{ $investisseur->risk['score'] }})
                                                </span>
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="flex flex-wrap gap-1.5">
                                                @if ($investisseur->user->address['adresse'])
                                                <span class="kt-badge kt-badge-outline">
                                                    {{ $investisseur->user->address['adresse'] ?? null .' '. $investisseur->user->address['rue'] ?? null .' '. $investisseur->user->address['code_postal'] ?? null .' '. $investisseur->user->address['ville'] ?? null }}
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <input class="kt-switch kt-switch-sm" 
                                                name="check_kyc" type="checkbox"
                                                {{ $investisseur->user->kyc_status == "validated" ? "checked" : null }}
                                                value="{{ $investisseur->id }}" />
                                        </td>
                                        <td>
                                            <a class="text-sm font-medium text-mono hover:text-primary"
                                                href="#">
                                                Inconnu
                                            </a>
                                        </td>
                                        <td>
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
                                                            <a class="kt-menu-link" href="#" onclick="openModal({{ $investisseur->id }})">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-search-list">
                                                                    </i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    Détails
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
                                                                    Bloquer
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        
                                    @endforelse
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
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
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
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision. Metronic embraces flexible licensing
                                    options that empower you to choose the perfect fit for your project's needs and budget.
                                    Understanding the factors influencing each plan's pricing helps you make an informed
                                    decision. Metronic embraces flexible licensing options that empower you to choose the
                                    perfect fit for your project's needs and budget. Understanding the factors influencing
                                    each plan's pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
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
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
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
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
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
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
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
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
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
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 gap-5 lg:gap-7.5">
                <div class="kt-card">
                    <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                        <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                            <div class="flex flex-col items-start gap-3">
                                <h2 class="text-xl font-medium text-mono">
                                    Des questions ?
                                </h2>
                                <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                    Consultez notre centre d'aide pour obtenir une assistance détaillée sur la facturation, les paiements et les abonnements.
                                </p>
                            </div>
                            <img alt="image" class="dark:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/29.svg')}}" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/29-dark.svg')}}" />
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="">
                            Aller au centre d'aide
                        </a>
                    </div>
                </div>
                <div class="kt-card">
                    <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                        <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                            <div class="flex flex-col items-start gap-3">
                                <h2 class="text-xl font-medium text-mono">
                                    Contacter l'assistance
                                </h2>
                                <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                    Besoin d'aide ? Contactez notre équipe d'assistance pour une aide rapide et personnalisée à vos questions &amp; préoccupations.
                                </p>
                            </div>
                            <img alt="image" class="dark:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/31.svg')}}" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/31-dark.svg')}}" />
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed"
                            href="">
                            Contacter l'assistance
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="modal_kyc">
        <div class="kt-modal-content max-w-2xl">
            <div class="kt-modal-body">
                <div class="kt-card">
                    <div class="kt-card-header p-0 bg-no-repeat bg-cover bg-center kt-card-rounded-t h-40"
                        style="background-image: url({{asset('assets/media/images/2600x1200/bg-7.png')}})">
                    </div>
                    <div class="kt-card-content mb-7.5 p-0">
                        <div class="flex transform -translate-y-1/2 px-5 lg:px-7.5 gap-1.5">
                            <div class="size-[120px] in-[.authors-row]:size-[80px] shrink-0 relative">
                                <img id="invest_avatar" class="rounded-full" src="{{asset('assets/media/avatars/blank.png')}}" />
                                <div
                                    class="flex size-3 bg-green-500 rounded-full ring-2 ring-background absolute bottom-2 start-[93px] in-[.authors-row]:start-[64px]">
                                </div>
                            </div>
                            <div class="flex flex-col justify-end grow">
                                <div class="flex items-center justify-between flex-wrap md:flex-nowrap gap-2">
                                    <div class="flex flex-col justify-end gap-0.5 max-w-[275px]">
                                        <div class="flex items-center gap-1.5">
                                            <a id="invest_name" class="hover:text-primary text-base leading-5 font-medium text-mono" href="#">
                                                Lorem Ipsum
                                            </a>
                                            <svg class="text-primary" fill="none" height="16" viewbox="0 0 15 16" width="15"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z"
                                                    fill="currentColor">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="text-secondary-foreground text-xs">
                                            <span id="invest_infos"></span>
                                        </span>
                                    </div>
                                    <div class="w-45">
                                        @php
                                            // Définir la configuration en tant que tableau PHP
                                            $config = [
                                                'displayTemplate' => '<div class="flex items-center gap-2">{{icon}}<span class="text-foreground">{{text}}</span></div>',
                                                'optionTemplate' => '<div class="flex items-center gap-2">{{icon}} <span class="text-foreground">{{text}}</span></div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5 ms-auto hidden text-primary kt-select-option-selected:block"><path d="M20 6 9 17l-5-5"/></svg></div>',
                                            ];
                                            $statuses = [
                                                ['value' => 'pending', 'label' => 'À approuver', 'icon' => '<i class=\"ki-filled ki-arrow-circle-left\"></i>'],
                                                ['value' => 'validated', 'label' => 'Validé', 'icon' => '<i class=\"ki-filled ki-check-squared\"></i>'],
                                                ['value' => 'rejected', 'label' => "Rejeté", 'icon' => '<i class=\"ki-filled ki-cross-square\"></i>'],
                                            ];
                                        @endphp
                                        <select
                                            name="kyc_status"
                                            class="kt-select"
                                            data-kt-select="true"
                                            data-kt-select-placeholder="Sélectionner un statut..."
                                            data-kt-select-config='@json($config)'
                                            >
                                            @foreach($statuses as $status)
                                                <option value="{{ $status['value'] }}"
                                                    data-kt-select-option='@json(["icon" => $status["icon"]])'
                                                    >
                                                    {{ $status['label'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modal_tabs" class="max-h-[400px] -mt-8">
                            <div id="invest_details" class="space-y-3 px-5 lg:px-7.5">
                                <div class="kt-tabs kt-tabs-line mb-6" data-kt-tabs="true">
                                    <button class="kt-tab-toggle active" data-kt-tab-toggle="#invest_legal_pers">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-user" aria-hidden="true">
                                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                                            <circle cx="12" cy="10" r="3"></circle>
                                            <path d="M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"></path>
                                        </svg>Représentant légal
                                    </button>
                                    <button class="kt-tab-toggle" data-kt-tab-toggle="#invest_members">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar" aria-hidden="true">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>Liste des membres du conseil
                                    </button>
                                    <button class="kt-tab-toggle" data-kt-tab-toggle="#invest_docs">
                                        <i class="ki-filled ki-note-2"></i>Documents
                                    </button>
                                </div>
                                <div class="text-sm">
                                    <div id="invest_legal_pers" class="kt-menu kt-menu-default px-0.5 flex-col"></div>
                                    <div id="invest_members" class="hidden kt-card-table" data-kt-datatable="true" data-kt-datatable-page-size="5" data-kt-datatable-state-save="true"></div>
                                    <div id="invest_docs" class="hidden flex gap-5 kt-scrollable-x" style="position: unset"></div>
                                </div>
                            </div>
                            <div id="reject_motif" class="hidden px-8">
                                <form action="" method="post" class="kt-form">
                                    @csrf
                                    <div class="kt-form-item">
                                        <label class="kt-form-label">Motif du rejet</label>
                                        <div class="kt-form-control">
                                            <input name="status" type="hidden" value="rejected">
                                            <textarea
                                                required
                                                name="kyc_motif"
                                                class="kt-textarea"
                                                placeholder="Saisissez le motif du refus..."
                                                rows="8"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5 justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">Enregistrer</button>
                                        <button type="button" class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card-footer flex-col gap-4">
                        <div id="alert_msg" class="w-full"></div>
                        <a class="kt-link kt-link-underlined kt-link-dashed"
                            type="button"
                            class="kt-modal-close"
                            aria-label="Close modal"
                            data-kt-modal-dismiss="#modal_kyc"
                            href="javascript:;">
                            Fermer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="modal_motif">
        <div class="kt-modal-content max-w-[400px]">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Spécification du motif</h3>
                <button type="button" class="kt-modal-close" aria-label="Close modal" data-kt-modal-dismiss="#modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="kt-modal-body">
                <form action="" method="post" class="kt-form">
                    @csrf
                    <div class="kt-form-item">
                        <label class="kt-form-label">Motif du refus</label>
                        <div class="kt-form-control">
                            <input name="status" type="hidden" value="rejected">
                            <textarea
                                name="kyc_motif"
                                class="kt-textarea"
                                placeholder="Saisissez le motif du refus..."
                                rows="8"
                            ></textarea>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 justify-end">
                        <button type="submit" class="kt-btn kt-btn-primary">Enregistrer</button>
                        <button type="button" class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <!-- Ajout PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

    <script type="text/javascript">
    function renderPdfPreview(url, container) {
        const loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(pdf => {
            // Charger seulement la première page
            pdf.getPage(1).then(page => {
                const scale = 0.5; // zoom (ajuste selon ta carte)
                const viewport = page.getViewport({ scale });
                const canvas = document.createElement("canvas");
                const context = canvas.getContext("2d");

                canvas.height = viewport.height;
                canvas.width = viewport.width;
                canvas.classList.add("w-full", "h-44", "object-contain", "rounded-md");

                container.innerHTML = ""; // vider
                container.appendChild(canvas);

                page.render({ canvasContext: context, viewport: viewport });
            });
        });
    }
    const modalEl = document.querySelector('#modal_kyc');
    const modal = KTModal.getInstance(modalEl) || new KTModal(modalEl);
    const modalEl2 = document.querySelector('#modal_motif');
    const modal2 = KTModal.getInstance(modalEl2) || new KTModal(modalEl2);
    const kycStatusSelect = modalEl.querySelector('select[name="kyc_status"]');
    let currentEntityId = null; // On mémorise l'ID de l'emprunteur ouvert

    const statuses = @json($statuses);

    const openModal = (entityId) => {
        currentEntityId = entityId; // On garde l'ID

        // Et éventuellement envoyer l'ID à ton backend
        fetch(`/admin/investisseurs/${entityId}/json`)
            .then(res => res.json())
            .then(data => {
                document.querySelector('#alert_msg').innerHTML = '';
                kycStatusSelect.innerHTML = '';
                
                const userNameEl = modalEl.querySelector('#invest_name');
                const kycIconEl = userNameEl.nextElementSibling; // Le <svg> juste après l'a

                // Mettre le nom de l'utilisateur
                userNameEl.innerText = data.type_of_lender == "Personne morale" ? `${data.denomination_sociale} (${data.forme_juridique})` : data.user_name;
                // Afficher ou cacher le SVG selon kyc_status
                if (data.kyc_status === "validated" || data.kyc_status === "Validé") {
                    kycIconEl.style.display = "inline-block";
                } else {
                    kycIconEl.style.display = "none";
                }

                // recuperer les documents du représentant
                let userDocs = '';
                data.user_docs.forEach(doc => {
                    const file_name = (doc.file_alt ?? doc.file_name).replace(/_/g, ' ').replace(/^./, str => str.toUpperCase());
                    const statusClass = 
                        doc.status === 'À approuver' ? 'warning' : 
                        (doc.status === 'Validé' ? 'success' : 'destructive');

                    userDocs += `
                        <div class="kt-alert mb-4" id="alert_${doc.id}">
                            <div class="kt-alert-title">
                                ${file_name}
                                <span class="kt-badge kt-badge-outline kt-badge-${statusClass} rounded-full">${doc.status}</span>
                            </div>
                            <div class="kt-alert-toolbar">
                                <div class="kt-alert-actions">
                                    <a href="/mon-profil/documents/${doc.id}/export" target="_blank" class="kt-link kt-link-xs kt-link-underlined text-mono hover:text-primary">Voir</a>
                                </div>
                            </div>
                        </div>
                    `;
                });

                // recuperer les membre représentant du bureau
                let invest_members = '';
                data.membres.forEach(membre => {
                    var docs = '';
                    membre.documents.forEach(doc => {
                        const docClass = 
                            doc.status === 'À approuver' ? 'text-warning' : 
                            (doc.status === 'Validé' ? 'text-green-500' : 'text-danger');
                        docs = `<a href="/mon-profil/documents/${doc.id}/export" target="_blank" class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline">
                                    <i class="ki-filled ki-folder-down ${docClass}"></i>
                                </a>`;
                    });

                    invest_members += `
                        <tr>
                            <td>
                                ${membre.nom} ${membre.prenoms}
                            </td>
                            <td>
                                ${membre.birth_date}
                            </td>
                            <td>
                                ${membre.birth_place}
                            </td>
                            <td>
                                ${membre.nationalite}
                            </td>
                            <td>
                                ${membre.adresse}
                            </td>
                            <td class="text-end">
                                <span class="inline-flex gap-2.5">${docs}</span>
                            </td>
                        </tr>
                    `;
                });

                var risk = data.risk['level'] == 'Élevé' 
                    ? '<span class="kt-badge bg-red-100 text-red-800">' 
                    : (data.risk['level'] === 'Standard' 
                        ? '<span class="kt-badge bg-yellow-100 text-yellow-800">' 
                        : '<span class="kt-badge bg-green-100 text-green-800">')
                risk += `Risque ${data.risk['level']} (${data.risk['score']})</span>`;

                modalEl.querySelector('#invest_infos').innerHTML = data.type_of_lender == "Personne morale"
                    ? `Créé le ${new Intl.DateTimeFormat('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(data.creation_date))}, situé à ${data.adresse} ${risk}`
                    : `Né le ${new Intl.DateTimeFormat('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(data.birth_date))}, habite à ${data.adresse} ${risk}`;
                modalEl.querySelector('#invest_legal_pers').innerHTML = data.type_of_lender == "Personne morale"  
                    ? `
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-badge"></i></span>
                                <span class="kt-menu-title">Nom & prénoms</span>
                                <span class="tel">${data.user_name}</span>
                            </a>
                        </div>
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-calendar-8"></i></span>
                                <span class="kt-menu-title">Date de naissance</span>
                                <span class="tel">${new Intl.DateTimeFormat('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(data.birth_date))}</span>
                            </a>
                        </div>
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-geolocation-home"></i></span>
                                <span class="kt-menu-title">Pays de naissance</span>
                                <span class="tel">${data.birth_place}</span>
                            </a>
                        </div>
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-address-book"></i></span>
                                <span class="kt-menu-title">Nationalité</span>
                                <span class="tel">${data.nationality}</span>
                            </a>
                        </div>
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-phone"></i></span>
                                <span class="kt-menu-title">Numéro de téléphone</span>
                                <span class="tel">${data.phone_number}</span>
                            </a>
                        </div>
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-map"></i></span>
                                <span class="kt-menu-title">Adresse</span>
                                <span class="tel">${data.adresse_representant}</span>
                            </a>
                        </div>
                        <div class="kt-menu-item">
                            <a class="kt-menu-link" href="#">
                                <span class="kt-menu-icon"><i class="ki-filled ki-briefcase"></i></span>
                                <span class="kt-menu-title">Fonction au sein de l'entité</span>
                                <span class="tel">${data.fonction}</span>
                            </a>
                        </div>
                        ${userDocs}
                    `
                    : null;
                modalEl.querySelector('#invest_members').innerHTML = data.type_of_lender == "Personne morale" 
                    ? `<div class="kt-table-wrapper kt-scrollable">
                        <table class="kt-table" data-kt-datatable-table="true">
                            <thead>
                                <tr>
                                    <th scope="col" class="min-w-40" data-kt-datatable-column="nom">Nom & prénoms</th>
                                    <th scope="col" class="w-30" data-kt-datatable-column="date">Date de naissance</th>
                                    <th scope="col" class="w-30" data-kt-datatable-column="lieu">Pays de naissance</th>
                                    <th scope="col" class="w-30" data-kt-datatable-column="nationalite">Nationalité</th>
                                    <th scope="col" class="w-30" data-kt-datatable-column="adresse">Adresse</th>
                                    <th scope="col" class="w-16" data-kt-datatable-column="pi">Pièce d'identité</th>
                                </tr>
                            </thead>
                            <tbody>${invest_members}</tbody>
                        </table>
                    </div>`
                    : null;
                modalEl.querySelector('#invest_avatar').src = data.avatar 
                    ? ('/storage/' + data.avatar) 
                    : "{{ asset('assets/media/avatars/blank.png') }}";

                let form = modalEl.querySelector('form');
                form.action = `/admin/investisseurs/${currentEntityId}/update-kyc-status`;
                
                let documents = '';
                data.invest_docs.forEach(doc => {
                    const fileUrl = `/storage/${doc['file_name']}`;
                    const extension = doc['file_name'].split('.').pop().toLowerCase();

                    let preview = `<div class="w-[240px] h-44 flex items-center justify-center bg-gray-100 rounded-md">Aperçu non disponible</div>`;

                    if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension)) {
                        // Images directes
                        preview = `<img src="${fileUrl}" alt="${doc['type']}" 
                                    class="w-full h-full object-cover kt-card-rounded-t" />`;
                    }
                    else if (extension === 'pdf') {
                        const id = `pdf_preview_${doc.id}`;
                        preview = `<div id="${id}" class="w-[240px] h-44 bg-gray-100 rounded-md flex items-center justify-center">Chargement PDF...</div>`;
                        // Après rendu de la carte → générer le canvas PDF
                        setTimeout(() => {
                            renderPdfPreview(`/storage/${doc.file_name}`, document.getElementById(id));
                        }, 300);
                    } 
                    else if (['doc','docx'].includes(extension)) {
                        preview = `<div class="w-[240px] h-44 flex items-center justify-center bg-gray-200 rounded-md text-sm text-gray-600">
                                    Aperçu Word non dispo
                                </div>`;
                    }
                    const formattedType = doc['file_alt']
                        .replace(/_/g, ' ')             // remplace les underscores par des espaces
                        .replace(/^./, str => str.toUpperCase()); // met en majuscule seulement la première lettre

                    documents += `
                        <div class="kt-card mb-4 border-0 last:me-5">
                            <div class="w-[240px] shrink-0 h-44">
                                <a href="/mon-profil/documents/${doc['id']}/export" target="_blank">${preview}</a>
                            </div>
                            <div class="kt-card-border kt-card-rounded-b px-3.5 pt-5 pb-2.5">
                                <a class="font-medium block text-mono hover:text-primary text-base leading-4 mb-2" 
                                    href="/mon-profil/documents/${doc['id']}/export" target="_blank">
                                    ${formattedType}
                                </a>
                                <div class="text-sm text-secondary-foreground">
                                    Statut :
                                    <select 
                                        name="doc_status" 
                                        data-doc-id="${doc['id']}" 
                                        class="kt-select"
                                        data-kt-select="true"
                                        data-kt-select-placeholder="Choisir une option..."
                                        data-kt-select-config='{
                                            "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                        }'>
                                        <option value="À approuver" ${doc['status'] === 'À approuver' ? 'selected' : ''}>À approuver</option>
                                        <option value="Validé" ${doc['status'] === 'Validé' ? 'selected' : ''}>Validé</option>
                                        <option value="Refusé" ${doc['status'] === 'Refusé' ? 'selected' : ''}>Refusé</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    `;
                });

                statuses.forEach(status => {
                    const isSelected = data.kyc_status == status.value ? 'selected' : ''; 
                    kycStatusSelect.innerHTML += `
                        <option value="${status.value}" ${isSelected}
                            data-kt-select-option='{"icon": "${status.icon ?? ''}"}'>
                            ${status.label}
                        </option>
                    `;
                });

                data.type_of_lender == "Personne physique"
                    ? (modalEl.querySelector('[data-kt-tabs="true"]').classList.add('hidden'), modalEl.querySelector('#invest_docs').classList.remove('hidden'))
                    : (modalEl.querySelector('[data-kt-tabs="true"]').classList.remove('hidden'), modalEl.querySelector('#invest_docs').classList.add('hidden'));

                modalEl.querySelector('#invest_docs').innerHTML = documents;
                modal.show();
                // On réinitialise les KtSelect
                const selectEl = modalEl.querySelector('[data-kt-select="true"]');
                KTSelect.createInstances(selectEl);
            })
            .catch(err => console.error("Erreur lors du chargement :", err));
    }
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[name=check_kyc]').forEach(input => {
            input.addEventListener('change', (e) => {
                currentEntityId = e.target.value; // On garde l'ID
                
                if (e.target.checked) {
                    // Et éventuellement envoyer l'ID à ton backend
                    openModal(currentEntityId);
                }
                else {
                    let form = modalEl2.querySelector('form');
                    form.action = `/admin/investisseurs/${currentEntityId}/update-kyc-status`;
                    modal2.show()
                }
            });
        });

        modalEl.addEventListener('change', (e) => {
            const docId = e.target.dataset.docId;
            const newStatus = e.target.value;

            if (e.target.name === 'doc_status') {
                fetch(`/admin/documents/${docId}/update-status`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(res => res.json())
                .then(resp => {
                    if (resp.success) {
                        console.log("Statut mis à jour :", newStatus);
                    }
                })
                .catch(err => console.error("Erreur maj statut :", err));
            }
            else if (e.target.name === 'kyc_status') {
                if (e.target.value !== 'rejected') {
                    // afficher user_docs
                    document.querySelector('#invest_details').classList.remove('hidden');
                    // cacher reject_motif
                    document.querySelector('#reject_motif').classList.add('hidden');

                    fetch(`/admin/investisseurs/${currentEntityId}/update-kyc-status`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ status: newStatus })
                    })
                    .then(res => res.json())
                    .then(resp => {
                        var respStatus = resp.success ? 'kt-alert-success' : 'kt-alert-destructive';
                        
                        document.querySelector('#alert_msg').innerHTML = `
                            <div class="kt-alert kt-alert-light ${respStatus}" id="alert_4">
                                <div class="kt-alert-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                                </div>
                                <div class="kt-alert-title">${resp.message}</div>
                                <div class="kt-alert-toolbar">
                                    <div class="kt-alert-actions">
                                        <button class="kt-link kt-link-xs kt-link-underlined text-mono">
                                        Fermer</button>
                                        <button class="kt-alert-close" data-kt-dismiss="#alert_4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
                    })
                    .catch(err => console.error("Erreur maj statut :", err));
                }
                else {
                    // cacher user_docs
                    document.querySelector('#invest_details').classList.add('hidden');
                    // afficher reject_motif
                    document.querySelector('#reject_motif').classList.remove('hidden');
                }
            }
        });

        // À la fermeture du modal
        modal.on('hide', () => {
            if (currentEntityId) {
                const kycSelect = modalEl.querySelector('select[name="kyc_status"]');
                const input = document.querySelector(`input[name=check_kyc][value="${currentEntityId}"]`);
                // Si le KYC n'est pas validé, décocher l'input
                if (modalEl.dataset.kycStatus !== 'validated' && kycSelect.value !== 'validated') {
                    if (input) input.checked = false;
                }
                else input.checked = true;
                currentEntityId = null; // Reset
            }
        });

        modal2.on('hide', () => {
            if (currentEntityId) {
                const input = document.querySelector(`input[name=check_kyc][value="${currentEntityId}"]`);
                if (input) input.checked = true;
                currentEntityId = null; // Reset
            }
        });
    });

    document.getElementById('search_input').addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        const trList = document.querySelectorAll('[data-kt-datatable-table="true"] tbody tr');

        trList.forEach(tr => {
            const rowText = tr.innerText.toLowerCase();
            tr.style.display = rowText.includes(query) ? '' : 'none';
        });
    });

    const exportBtn = document.getElementById('exportBtn');

    document.querySelectorAll('.kt-menu-link[data-value]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const value = this.dataset.value;
            const label = this.dataset.label;
            const shortLabel = this.dataset.short;

            // Mettre à jour le bouton Exporter (href dynamique)
            exportBtn.href = `/admin/export/investisseurs/${value}`;

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
