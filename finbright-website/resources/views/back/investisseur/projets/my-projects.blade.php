@extends('back.investisseur.layouts')

@section('title', 'Mes investissements')

@section('stylesheet')
<style type="text/css">
</style>
@endsection

@section('content')
    <div class="kt-container-fixed">
        <!-- begin: projects -->
        <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
            <!-- begin: toolbar -->
            <div class="flex flex-wrap items-center gap-5 justify-between">
                <h3 class="text-lg text-mono font-semibold">
                    {{ count($investments) < 10 ? '0' . count($investments) : count($investments) }} investissements
                </h3>
                <div class="flex items-center flex-wrap gap-5">
                    <!-- Input recherche -->
                    <div class="flex">
                        <label class="kt-input">
                            <i class="ki-filled ki-magnifier"></i>
                            <input id="search_input" placeholder="Entrer objet ou un nom d'emprunteur" type="text" value="" />
                        </label>
                    </div>
                    <div class="kt-toggle-group kt-toggle-group-sm" data-kt-tabs="true">
                        <a class="kt-btn kt-btn-icon active" data-kt-tab-toggle="#projects_cards" href="#">
                            <i class="ki-filled ki-category">
                            </i>
                        </a>
                        <a class="kt-btn kt-btn-icon" data-kt-tab-toggle="#projects_list" href="#">
                            <i class="ki-filled ki-row-horizontal">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: toolbar -->
            <!-- begin: cards -->
            <div id="projects_cards">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5">
                    @foreach ($investments as $invest)
                        @php $loan = $invest->loanRequest @endphp
                        <div class="kt-card p-7.5">
                            <div class="flex items-center justify-between mb-3 lg:mb-6">
                                <div class="flex items-center justify-center size-[50px] rounded-lg bg-accent/60"
                                    data-kt-tooltip="true" data-kt-tooltip-placement="top-start">
                                    <img alt="" class="rounded-md"
                                        src="{{ $loan->emprunteur->user->profilePicture ? Storage::url($loan->emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                    <span data-kt-tooltip-content="true" class="kt-tooltip kt-tooltip-light">
                                        <span class="flex items-center gap-2">
                                            <span class="flex items-center gap-1.5">
                                                <i class="ki-filled ki-user-square"></i>
                                            </span>
                                            {{ $loan->emprunteur->user->first_name .' '. $loan->emprunteur->user->last_name }}
                                        </span>
                                    </span>
                                </div>
                                <span class="kt-badge kt-badge-outline kt-badge-{{ $invest->status == "Accepté" ? "success" : ($invest->status == "En attente de signature" ? "warning" : "destructive") }}">{{$invest->status}}</span>
                            </div>
                            <div class="flex flex-col mb-3 lg:mb-6">
                                <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="{{ route('investisseur.projet.details', $loan) }}">
                                    {{ $loan->object ?? 'Inconnu' }}
                                </a>
                                <span class="text-sm text-secondary-foreground">
                                    Montant : {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                </span>
                            </div>
                            <div class="grid md:grid-cols-3 items-center justify-between gap-2 mb-3">
                                <div
                                    class="grid grid-cols-1 h-full content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Durée de remboursement
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 h-full content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Taux d'intérêt
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->simulation_result['interets'] . '€' ?? 'Non évalué' }}
                                    </span>
                                </div>
                                <div
                                    class="grid grid-cols-1 h-full content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                    <span class="text-secondary-foreground text-xs">
                                        Niveau de risque
                                    </span>
                                    <span class="text-mono text-sm leading-none font-medium">
                                        {{ $loan->emprunteur->riskLevel ? ($loan->emprunteur->riskLevel->profile == 'A' ? 'Faible' : ($loan->emprunteur->riskLevel->profile == 'B' ? 'Moyen' : 'Risque élévé')) : 'Évalué' }}
                                    </span>
                                </div>
                            </div>
                            @if ($loan->status != "En attente de confirmation")
                            <div class="flex flex-col items-end gap-2">
                                @php $indicator = 0;
                                    if ($loan->simulation_result['amount'] > 0) {
                                        $indicator = ($loan->total_investissements * 100) / $loan->simulation_result['amount'];
                                    }
                                @endphp
                                <span class="kt-badge kt-badge-outline kt-badge-primary rounded-full">{{ number_format($indicator, 1, ',', ' ') }}%</span>
                                <div class="kt-progress h-1.5 kt-progress-primary mb-4">
                                    <div class="kt-progress-indicator" style="width: {{$indicator}}%">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -space-x-2">
                                @foreach ($loan->investments->take(5) as $invest)
                                <div class="flex">
                                    @if ($invest->investisseur->user->profilePicture)
                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                        src="{{ Storage::url($invest->investisseur->user->profilePicture->filename) }}" />
                                    @else
                                    <span class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                        S</span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Afficher plus de projets
                    </a>
                </div>
            </div>
            <!-- end: cards -->
            <!-- begin: list -->
            <div class="hidden" id="projects_list">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    @foreach ($investments as $invest)
                        @php $loan = $invest->loanRequest @endphp
                        <div class="kt-card p-7">
                            <div class="flex items-center flex-wrap justify-between gap-5">
                                <div class="flex items-center gap-3.5">
                                    <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                        <img alt="" class="rounded-md"
                                            src="{{ $loan->emprunteur->user->profilePicture ? Storage::url($loan->emprunteur->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}">
                                        </img>
                                    </div>
                                    <div class="flex flex-col">
                                        <a class="text-lg font-media/brand text-mono hover:text-primary mb-px"
                                            href="{{ route('investisseur.projet.details', $loan) }}">
                                            {{ $loan->object ? Str::limit($loan->object, 35, '...') : 'Inconnu' }}
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            {{ substr($loan->description, 0, 35) }}...
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center flex-wrap gap-5 lg:gap-10">
                                    <div class="flex">
                                        <span class="text-sm text-secondary-foreground">
                                            Montant : {{ $loan->simulation_result['total'] . ' €' ?? null }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto max-w-28 whitespace-normal">
                                            <span class="text-secondary-foreground text-xs">
                                                Durée de remboursement
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->simulation_result['duration'] . ' mois' ?? 'Non disponible' }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Taux d'intérêt
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->simulation_result['interets'] . '€' ?? 'Non évalué' }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 content-between gap-1.5 border border-dashed border-input shrink-0 rounded-md px-2.5 py-2 min-w-24 max-w-auto">
                                            <span class="text-secondary-foreground text-xs">
                                                Niveau de risque
                                            </span>
                                            <span class="text-mono text-sm leading-none font-medium">
                                                {{ $loan->emprunteur->riskLevel ? ($loan->emprunteur->riskLevel->profile == 'A' ? 'Risque faible' : ($loan->emprunteur->riskLevel->profile == 'B' ? 'Risque moyen' : 'Risque élévé')) : 'Non évalué' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-5 lg:gap-14">
                                        @if ($loan->status != "En attente de confirmation")
                                        <div class="flex flex-col items-end gap-2">
                                            @php $indicator = 0;
                                                if ($loan->simulation_result['amount'] > 0) {
                                                    $indicator = ($loan->total_investissements * 100) / $loan->simulation_result['amount'];
                                                }
                                            @endphp
                                            <div class="kt-progress h-1.5 w-36 kt-progress-primary mb-2">
                                                <div class="kt-progress-indicator" style="width: {{$indicator}}%">
                                                </div>
                                            </div>
                                            <div class="flex justify-end w-24">
                                                <div class="flex -space-x-2">
                                                    @foreach ($loan->investments->take(5) as $invest)
                                                    <div class="flex">
                                                        @if ($invest->investisseur->user->profilePicture)
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                            src="{{ Storage::url($invest->investisseur->user->profilePicture->filename) }}" />
                                                        @else
                                                        <span class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-[30px] text-primary-foreground ring-background bg-primary">
                                                            S</span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                data-kt-menu-item-placement="bottom-end"
                                                data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg">
                                                    </i>
                                                </button>
                                                <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                                    data-kt-menu-dismiss="true">
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link"
                                                            href="{{ route('investisseur.projet.details', $loan) }}">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-some-files">
                                                                </i>
                                                            </span>
                                                            <span class="kt-menu-title">
                                                                Voir détails
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
                    @endforeach
                    {{-- <div class="kt-card p-7">
                        <div class="flex items-center flex-wrap justify-between gap-5">
                            <div class="flex items-center gap-3.5">
                                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-accent/60">
                                    <img alt="" class=""
                                        src="/static/metronic/tailwind/dist/assets/media/brand-logos/telegram.svg">
                                    </img>
                                </div>
                                <div class="flex flex-col">
                                    <a class="text-lg font-media/brand text-mono hover:text-primary mb-px" href="#">
                                        Radiant Wave
                                    </a>
                                    <span class="text-sm text-secondary-foreground">
                                        Short-term accommodation marketplace
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap gap-5 lg:gap-20">
                                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                    <span class="kt-badge kt-badge-success kt-badge-outline">
                                        Completed
                                    </span>
                                    <div class="kt-progress h-1.5 w-36 kt-progress-success">
                                        <div class="kt-progress-indicator" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 lg:gap-14">
                                    <div class="flex justify-end w-24">
                                        <div class="flex -space-x-2">
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-24.png" />
                                            </div>
                                            <div class="flex">
                                                <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-[30px]"
                                                    src="/static/metronic/tailwind/dist/assets/media/avatars/300-7.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end" data-kt-menu-item-toggle="dropdown"
                                            data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                                data-kt-menu-dismiss="true">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo9/account/home/settings-enterprise">
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
                                                        href="/metronic/tailwind/demo9/account/members/import-members">
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
                                                    <a class="kt-menu-link"
                                                        href="/metronic/tailwind/demo9/account/activity">
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
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="flex grow justify-center pt-5 lg:pt-7.5">
                    <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                        Show more projects
                    </a>
                </div>
            </div>
            <!-- end: list -->
        </div>
        <!-- end: projects -->
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript">
    document.getElementById('search_input').addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        const cards = document.querySelectorAll('#projects_cards .project-card');

        cards.forEach(card => {
            const object = card.dataset.object;
            const investor = card.dataset.investor;

            if (object.includes(query) || investor.includes(query)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
    </script>
@endsection
