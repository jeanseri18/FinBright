@extends('back.admin.layouts')

@section('title', 'Security Log')

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
                    Security Log
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
                        Security Log
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                    href="{{ route('admin.export.csv', ['entity' => 'logs', 'month' => $months->first()['value'] ?? '']) }}">
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
        <div class="grid gap-5 lg:gap-7.5">
            <div class="kt-card kt-card-grid min-w-full">
                <div class="kt-card-header py-5 flex-wrap">
                    <h3 class="kt-card-title">
                        Security Log
                    </h3>
                    <div class="flex flex-wrap gap-2 lg:gap-5">
                        <form action="" method="GET" class="flex flex-wrap gap-2.5">
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
                        <div class="flex">
                            <label class="kt-input">
                                <i class="ki-filled ki-magnifier">
                                </i>
                                <input id="search_input" placeholder="Rechercher une permission" type="text"
                                    value="" />
                            </label>
                        </div>
                        @php
                            $auto = \App\Models\Setting::get('logs.auto_delete', true);
                        @endphp
                        <label class="kt-label">
                            Suppression automatique
                            <input {{ $auto ? 'checked' : '' }} class="kt-switch kt-switch-sm" name="auto_delete" type="checkbox" value="1" />
                        </label>
                    </div>
                </div>
                <div class="kt-card-content">
                    <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="10">
                        <div class="kt-scrollable-x-auto">
                            <table class="kt-table table-auto kt-table-border" data-kt-datatable-table="true"
                                id="security_log_table">
                                <thead>
                                    <tr>
                                        {{-- <th class="w-[60px]">
                                            <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-check="true"
                                                type="checkbox">
                                            </input>
                                        </th> --}}
                                        <th class="min-w-[200px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Période
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[200px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Événement
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[200px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Action
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[130px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Adresse IP
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[130px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Utilisateur
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[110px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Gravité
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
                                    @foreach ($logs as $log)
                                    <tr>
                                        {{-- <td>
                                            <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-row-check="true"
                                                type="checkbox" value="1" />
                                        </td> --}}
                                        <td>
                                            {{ $log->created_at->format('d M Y, à H:i') }}
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.5">
                                                <i class="ki-filled ki-information-4 text-lg 
                                                    {{ $log->severity === 'Critique' ? 'text-yellow-500' : 
                                                    ($log->severity === 'Élévé' ? 'text-destructive' :
                                                    ($log->severity === 'Moyen' ? 'text-yellow-500' : 'text-green-500')) }}">
                                                </i>
                                                <span class="font-semibold text-secondary-foreground">
                                                    {{ $log->event_type }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $log->action_taken }}
                                        </td>
                                        <td>
                                            {{ $log->source_ip }}
                                        </td>
                                        <td>
                                            {{ $log->admin?->fullname ?? 'System' }}
                                        </td>
                                        <td>
                                            <span class="kt-badge kt-badge-outline kt-badge-{{ strtolower($log->severity) }}">
                                                {{ $log->severity }}
                                            </span>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.securite.log.delete', $log->id) }}" method="POST" id="delete-form-{{ $log->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="kt-btn kt-btn-icon kt-btn-ghost kt-btn-destructive kt-btn-sm" onclick="confirmDelete({{ $log->id }})">
                                                    <span class="kt-menu-icon">
                                                        <i class="ki-filled ki-trash"></i>
                                                    </span>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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
                                src="{{asset('assets/media/illustrations/2.svg')}}" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/2-dark.svg')}}" />
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
                                src="{{asset('assets/media/illustrations/4.svg')}}" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="{{asset('assets/media/illustrations/4-dark.svg')}}" />
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
    
    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="modal_auto_delete">
        <div class="kt-modal-content max-w-[500px] w-full">
            <div class="kt-modal-header justify-end border-0 pt-5">
                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline" data-kt-modal-dismiss="true">
                    <i class="ki-filled ki-cross"></i>
                </button>
            </div>
            <div class="kt-modal-body flex flex-col items-center pt-0 pb-10">
                <div class="mb-9">
                    <img alt="image" class="dark:hidden max-h-[150px]" src="{{asset('assets/media/illustrations/30.svg')}}"/>
                    <img alt="image" class="light:hidden max-h-[150px]" src="{{asset('assets/media/illustrations/30-dark.svg')}}"/>
                </div>
                <h3 class="text-lg font-medium text-mono text-center mb-3">
                    Suppression automatique
                </h3>
                <div class="text-sm text-center text-secondary-foreground mb-7">
                    Les logs sont désormais en mode suppression automatique
                    <br/>
                    Ils seront tous supprimés au bout d'une semaine (7 jours) rénouvelables.
                </div>
                <a class="kt-btn kt-btn-primary flex justify-center" href="#" data-kt-modal-dismiss="true">
                    D'accord.
                </a>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <!-- Ajout PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', () => {
            const modalEl = KTDom.getElement('#modal_auto_delete');
            const modal = KTModal.getInstance(modalEl);

            document.querySelector('[name="auto_delete"]').addEventListener('change', (e) => {
                e.target.disabled = true;
                var auto_delete = e.target.checked;
                
                fetch(`{{ route('admin.securite.logs.settings') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'auto_delete': auto_delete,
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data.message);
                    if (data.data.auto_delete) modal?.show();
                })
                .catch(err => console.error("Erreur lors du chargement :", err))
                .finally(() => {
                    e.target.disabled = false;
                });
            });
        });

        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce log ? Cette action est irréversible.")) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        }

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
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const value = this.dataset.value;
                const label = this.dataset.label;
                const shortLabel = this.dataset.short;

                // Mettre à jour le bouton Exporter (href dynamique)
                exportBtn.href = `/admin/export/logs/${value}`;

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
