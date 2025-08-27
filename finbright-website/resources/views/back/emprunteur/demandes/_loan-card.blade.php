@if($loan)
    <div class="flex flex-wrap gap-7.5">
        <div
            class="flex flex-col gap-3 items-center justify-center size-[140px] rounded-xl ring-1 ring-border bg-secondary-transparent">
            <div class="flex justify-center items-center size-14 rounded-full ring-1 ring-input bg-accent/60">
                <i class="ki-filled ki-ghost text-2xl text-muted-foreground"></i>
            </div>
        </div>
        <div class="flex flex-col gap-5 lg:gap-7.5 grow">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div class="flex flex-col gap-1">
                    <div class="flex items-center flex-wrap sm:flex-nowrap gap-2.5">
                        <h2 class="text-2xl font-semibold text-mono">
                            {{ substr($loan->object, 0, 70) }}
                        </h2>
                        @if ($loan->status == "En attente d'approbation") <span class="kt-badge kt-badge-sm kt-badge-warning kt-badge-outline shrink-0">
                        @elseif ($loan->status == "En cours de financement") <span class="kt-badge kt-badge-sm kt-badge-primary kt-badge-outline shrink-0">
                        @elseif ($loan->status == "Financée") <span class="kt-badge kt-badge-sm kt-badge-success kt-badge-outline shrink-0">
                        @elseif ($loan->status == "Rejetée") <span class="kt-badge kt-badge-sm kt-badge-destructive kt-badge-outline shrink-0">@endif
                            {{ ucfirst($loan->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-secondary-foreground">
                        {{ substr($loan->description, 0, 110) }}...
                    </p>
                </div>
                <div class="flex items-center gap-2.5">
                    @if ($loan->status === 'En attente d\'approbation' && !request()->routeIs('emprunteur.dashboard'))
                    <form class="kt-menu-item" method="POST" action="{{ route('emprunteur.loan-requests.annuler', $loan) }}" onsubmit="return confirm('Annuler cette demande ?')">
                        @csrf
                        <button type="submit" class="kt-btn kt-btn-outline">Annuler la demande</button>
                    </form>
                    @endif
                    <a class="kt-btn kt-btn-primary" href="{{ route('emprunteur.loan-requests.edit', $loan) }}">
                        Modifier
                    </a>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-3 lg:gap-5">
                <div
                    class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                    <span class="text-secondary-foreground text-xs">
                        Montant
                    </span>
                    <span class="text-mono text-sm leading-none font-medium">
                        {{ $loan->simulation_result['amount']. ' €' ?? null }}
                    </span>
                </div>
                <div
                    class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                    <span class="text-secondary-foreground text-xs">
                        Taux proposé
                    </span>
                    <span class="text-mono text-sm leading-none font-medium">
                        {{ Auth::user()->riskLevel->yield .'%' ?? 'Indefinie' }}
                    </span>
                </div>
                <div
                    class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                    <span class="text-secondary-foreground text-xs">
                        Durée
                    </span>
                    <span class="text-mono text-sm leading-none font-medium">
                        {{ $loan->simulation_result['duration']. ' mois' ?? 'Non disponible' }}
                    </span>
                </div>
                <div
                    class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                    <span class="text-secondary-foreground text-xs">
                        Mensualité
                    </span>
                    <span class="text-mono text-sm leading-none font-medium">
                        {{ $loan->simulation_result['mensualite']. ' €' ?? 'Non disponible' }}
                    </span>
                </div>
                <div
                    class="flex flex-col gap-1.5 px-2.75 py-2.25 border border-dashed border-input rounded-md">
                    <span class="text-secondary-foreground text-xs">
                        Total
                    </span>
                    <span class="text-mono text-sm leading-none font-medium">
                        {{ $loan->simulation_result['total']. ' €' ?? 'Non disponible' }}
                    </span>
                </div>
            </div>
            @if($loan->status !== 'En attente d\'approbation')
            <div class="flex flex-wrap gap-6 lg:gap-12">
                <div class="flex flex-col gap-3.5 grow">
                    <div class="text-sm text-secondary-foreground">
                        Collecte :
                        <span class="text-sm font-medium text-mono">
                            2239 of {{ $loan->simulation_result['amount']. ' €' ?? 0 }}
                        </span>
                    </div>
                    <div class="kt-progress kt-progress-primary max-w-2xl w-full">
                        <div class="kt-progress-indicator" style="width: 47%">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2.5 lg:min-w-24 shrink-0 -mt-3 max-w-auto">
                    <div class="text-sm font-medium text-secondary-foreground">
                        Contributeurs :
                        <span class="text-sm font-semibold text-foreground">
                            29 pers
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
            @endif
        </div>
    </div>
@endif