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
                                            Pays de naissance:
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
                                            {{Auth::user()->emprunteur->etablissement->nom ?? null}}
                                        </span>
                                        <span class="text-xs text-secondary-foreground leading-none">
                                            {{Auth::user()->emprunteur->etablissement ? Auth::user()->emprunteur->etablissement->ville : null}} - {{Auth::user()->emprunteur->etablissement ? Auth::user()->emprunteur->etablissement->pays : null}}
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
                                            {{Auth::user()->emprunteur->specialization ?? null}}
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
                                            {{Auth::user()->emprunteur->diploma ?? null}}
                                        </span>
                                    </div>
                                </div>
                            </div>
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
                                                href="{{ route('emprunteur.loan-requests.details', $loan) }}">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-add-files">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Consulter
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
                                                        href="">
                                                        <span class="kt-menu-title">
                                                            PDF
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-title">
                                                            CVS
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-title">
                                                            Excel
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-setting-3">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Modifier
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-content lg:py-7.5">
                            @if(isset($loan) && ! is_null($total = data_get($loan, 'simulation_result.total')))
                                @include('back.emprunteur.demandes._loan-card', ['loan' => $loan])
                            @else
                                <div class="grid justify-center pb-5">
                                    <img alt="" class="dark:hidden max-h-[170px]" src="{{asset('assets/media/illustrations/11.svg')}}"/>
                                    <img alt="" class="light:hidden max-h-[170px]" src="{{asset('assets/media/illustrations/11-dark.svg')}}"/>
                                </div>
                                <div class="text-lg font-medium text-mono text-center">
                                    Aucun projet pour l'instant
                                </div>
                                <div class="text-sm text-secondary-foreground text-center gap-1">
                                    Pour commencer un nouveau projet, 
                                    <a class="kt-link kt-link-underlined kt-link-dashed" href="javascript:;" data-kt-modal-toggle="#modal_simulate">
                                    faites une simulation de prêt.
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- End of Projects Table -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">
                        <div class="kt-card">
                            <div class="kt-card-header gap-2">
                                <h3 class="kt-card-title">
                                    Contributeurs
                                </h3>
                            </div>
                            <div class="kt-card-content">
                                <div class="flex flex-col gap-2 lg:gap-5">
                                    @forelse($loan->investments as $invest)
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center grow gap-2.5">
                                            <img alt="" class="rounded-full size-9 shrink-0"
                                                src="{{ $invest->investisseur->user->profilePicture ? Storage::url($invest->investisseur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                                            <div class="flex flex-col">
                                                <a class="text-sm font-semibold text-mono hover:text-primary mb-px"
                                                    href="#">
                                                    {{ $invest->investisseur->user->first_name .' '. $invest->investisseur->user->last_name }}
                                                </a>
                                                <span class="text-xs font-semibold text-secondary-foreground">
                                                    {{ count($invest->investisseur->investments) }} contributrions
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
                                    @empty
                                    Aucun contributeur pour l'instant
                                    @endforelse
                                </div>
                            </div>
                            <div class="kt-card-footer justify-center">
                                <a class="kt-link kt-link-underlined kt-link-dashed"
                                    href="">
                                    Tous les contributeurs
                                </a>
                            </div>
                        </div>
                        <div class="kt-card">
                            <div class="kt-card-header">
                                <h3 class="kt-card-title">
                                    Statistiques
                                </h3>
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
                                    href="">
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
    <script type="text/javascript">
        const montantTotal = @php echo json_encode($loan->simulation_result['amount']); @endphp;
        const total = parseFloat(montantTotal) || 0;
        
        const investments = @json($loan->investments);
        let totalPourcentageArrondi = 0;
        
        const contributeurs = Array.isArray(investments) 
            ? investments.map(item => {
                let nom = item.investisseur.user.first_name || '';
                return nom.toUpperCase().replace(/[^A-Z]/g, '').substring(0, 5);
            }) : [];
        const amounts = investments.map(item => parseFloat(item.amount) || 0);
        const pourcentages = amounts.map(amount => {
            const p = Math.round((amount / total) * 100);
            totalPourcentageArrondi += p;
            return p;
        });
        contributeurs.push("RESTE");
        pourcentages.push(100 - totalPourcentageArrondi);

    </script>
@endsection
