@extends('back.admin.layouts')

@section('title', 'Demandes de prêt')

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
                    Demandes de prêts
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
                        Demandes de prêts
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <a class="kt-btn kt-btn-outline" href="/metronic/tailwind/demo10/account/home/get-started">
                    <i class="ki-filled ki-exit-down">
                    </i>
                    Exporter
                </a>
                <div class="kt-menu kt-menu-default" data-kt-menu="true">
                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 0" data-kt-menu-item-placement="bottom-end"
                        data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="hover">
                        <button class="kt-menu-toggle kt-btn kt-btn-outline flex-nowrap">
                            <span class="flex items-center me-1">
                                <i class="ki-filled ki-calendar text-base!">
                                </i>
                            </span>
                            <span class="hidden md:inline text-nowrap">
                                September, 2024
                            </span>
                            <span class="inline md:hidden text-nowrap">
                                Sep, 2024
                            </span>
                            <span class="flex items-center lg:ms-4">
                                <i class="ki-filled ki-down text-xs!">
                                </i>
                            </span>
                        </button>
                        <div class="kt-menu-dropdown w-48 py-2 kt-scrollable-y max-h-[250px]">
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        January, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        February, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item active">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        March, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        April, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        May, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        June, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        July, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        August, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        September, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        October, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        November, 2024
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        December, 2024
                                    </span>
                                </a>
                            </div>
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
                        Affichage de {{ count($loanRequests) >= 10 ? '10 sur '. count($loanRequests) : count($loanRequests)}} demandes
                    </h3>
                    <div class="flex flex-wrap gap-2 lg:gap-5">
                        <div class="flex">
                            <label class="kt-input">
                                <i class="ki-filled ki-magnifier">
                                </i>
                                <input data-kt-datatable-search="#team_crew_table" placeholder="Search users" type="text"
                                    value="" />
                            </label>
                        </div>
                        <div class="flex flex-wrap gap-2.5">
                            <select class="kt-select w-36" data-kt-select="true"
                                data-kt-select-placeholder="Select a status">
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
                            <select class="kt-select w-36" data-kt-select="true"
                                data-kt-select-placeholder="Select a sort">
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
                    </div>
                </div>
                <div class="kt-card-content">
                    <div data-kt-datatable="true" data-kt-datatable-state-save="false" id="team_crew_table">
                        <div class="kt-scrollable-x-auto">
                            <table class="kt-table table-auto kt-table-border" data-kt-datatable-table="true">
                                <thead>
                                    <tr>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Projet
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[300px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Emprunteur
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Statut
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="max-w-[130px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label whitespace-normal">
                                                    Montant demandé
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="max-w-[120px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label whitespace-normal">
                                                    Durée de campagne
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
                                    @forelse ($loanRequests as $loan)
                                    <tr>
                                        <td class="text-foreground font-normal">
                                            {{ $loan->object }}
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img alt="" class="rounded-full size-9 shrink-0"
                                                    src="{{ $loan->emprunteur->user->profilePicture ? Storage::url($loan->emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                                <div class="flex flex-col">
                                                    <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                                        href="#">
                                                        {{ $loan->emprunteur->user->first_name .' '. $loan->emprunteur->user->last_name }}
                                                    </a>
                                                    <a class="text-sm text-secondary-foreground font-normal hover:text-primary"
                                                        href="#">
                                                        {{ $loan->emprunteur->user->email ?? null }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="loan-status">
                                            <span class="kt-badge 
                                                {{ $loan->status == 'En attente de confirmation' ? 'kt-badge-warning' : ($loan->status == 'En cours de financement' ? 'kt-badge-success' : 'kt-badge-destructive') }}
                                                kt-badge-outline rounded-[30px]">
                                                <span class="kt-badge-dot size-1.5"></span>
                                                {{ $loan->status }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                        </td>
                                        <td class="text-foreground font-normal">
                                            {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                        </td>
                                        <td class="text-center">
                                            <div class="kt-menu flex-inline" data-kt-menu="true">
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
                                                            <a class="kt-menu-link" href="#" data-loan-id="{{ $loan->id }}" data-status="En attente de confirmation">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-update-file"></i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    En attente
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#" data-loan-id="{{ $loan->id }}" data-status="En cours de financement">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-file-right"></i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    Valider
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#" data-loan-id="{{ $loan->id }}" data-status="Rejetée">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-delete-folder"></i>
                                                                </span>
                                                                <span class="kt-menu-title">
                                                                    Rejeter
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
                                Show
                                <select class="kt-select w-16" data-kt-datatable-size="true" data-kt-select=""
                                    name="perpage">
                                </select>
                                per page
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
                                    Questions ?
                                </h2>
                                <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                    Visit our Help Center for detailed assistance on billing, payments, and subscriptions.
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
                                src="{{asset('assets/media/illustrations/31.svg')}}" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/31-dark.svg')}}" />
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
    <!-- End of Container -->
@endsection

@section('javascripts')
    <script type="text/javascript">
    document.addEventListener('click', function(e) {
        const link = e.target.closest('.kt-menu-link[data-status]');
        if (!link) return;

        e.preventDefault();

        const status = link.dataset.status;
        const loan = link.dataset.loanId;
        const tdStatus = link.closest('tr').querySelector('.loan-status');

        fetch(`/admin/prets/${loan}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status })
        })
        .then(async res => {
            const text = await res.text(); 
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error("Réponse du serveur (non JSON) :", text);
                throw e;
            }
        })
        .then(data => {
            if(data.success){
                showSuccessAlert(data.status);
                let badgeClass = '';
                switch(data.status) {
                    case 'En attente de confirmation': badgeClass = 'kt-badge-warning'; break;
                    case 'En cours de financement': badgeClass = 'kt-badge-success'; break;
                    case 'Rejetée': badgeClass = 'kt-badge-destructive'; break;
                }
                tdStatus.innerHTML = `
                    <span class="kt-badge ${badgeClass} kt-badge-outline rounded-[30px]">
                        <span class="kt-badge-dot size-1.5"></span>
                        ${data.status}
                    </span>
                `;
            }
        });
    });
    
    function showSuccessAlert(status) {
        // Créer le conteneur d'alerte
        const alert = document.createElement('div');
        alert.className = 'kt-alert kt-alert-light kt-alert-success absolute inset-x-0 top-10 z-50 max-w-lg m-auto shadow-md';
        alert.id = 'alert_temp'; // ID temporaire pour pouvoir le retirer
        alert.innerHTML = `
            <div class="kt-alert-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" 
                    aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 16v-4"></path>
                    <path d="M12 8h.01"></path>
                </svg>
            </div>
            <div class="kt-alert-title">Statut mis à jour : ${status}</div>
            <div class="kt-alert-toolbar">
                <div class="kt-alert-actions">
                    <button class="kt-link kt-link-xs kt-link-underlined text-mono">Fermer</button>
                    <button class="kt-alert-close" data-kt-dismiss="#alert_temp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x" 
                            aria-hidden="true">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `;

        // Ajouter l’alerte dans un conteneur dédié ou au début du body
        document.body.prepend(alert);

        // Fermer au clic sur le bouton "Fermer"
        alert.querySelector('button.kt-link').addEventListener('click', () => {
            alert.remove();
        });

        // Fermer automatiquement après 5 secondes
        setTimeout(() => {
            alert.remove();
        }, 5000);
    }
    </script>
@endsection
