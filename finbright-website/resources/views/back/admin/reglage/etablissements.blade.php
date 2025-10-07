@extends('back.admin.layouts')

@section('title', 'Liste des établissements')

@section('stylesheet')
    <style type="text/css">
        #new_etablissement .kt-select-dropdown.open {
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
                    Liste des établissements
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{ route('admin.dashboard') }}">
                        Tableau de bord
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Réglage
                    </span>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Liste des établissements
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                    href="{{ route('admin.export.csv', ['entity' => 'etablissements', 'month' => $months->first()['value'] ?? '']) }}">
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
                <div class="kt-card-header flex-wrap gap-2">
                    <h3 class="kt-card-title text-sm">
                        Affichage de {{ count($etablissements) >= 10 ? '10 sur ' . count($etablissements) : count($etablissements) }}
                        établissement(s)
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
                                <input id="search_input" placeholder="Rechercher un établissement" type="text"
                                    value="" />
                            </label>
                        </div>
                        <button class="kt-btn kt-btn-primary" onclick="openModal()">
                            <i class="ki-filled ki-plus"></i>
                            Ajouter établissement
                        </button>
                    </div>
                </div>
                <div class="kt-card-table kt-scrollable-x-auto">
                    <table class="kt-table table-fixed" data-kt-datatable-table="true">
                        <thead>
                            <tr>
                                <th class="text-start w-[150px]">
                                    Établissement
                                </th>
                                <th class="text-end w-[100px]">
                                    Ville
                                </th>
                                <th class="text-end w-[100px]">
                                    Pays
                                </th>
                                <th class="text-end w-[110px]">
                                    Date
                                </th>
                                <th class="w-[30px]">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($etablissements as $etablissement)
                            <tr>
                                <td class="text-start">
                                    <a class="text-sm font-medium text-mono hover:text-primary" href="#" onclick="openModal({{$etablissement->id}})">
                                        {{$etablissement->nom ?? null}}
                                    </a>
                                </td>
                                <td class="text-sm text-foreground text-end">
                                    {{$etablissement->ville ?? null}}
                                </td>
                                <td class="text-end">
                                    {{$etablissement->pays ?? null}}
                                </td>
                                <td class="text-sm text-foreground text-end">
                                    {{ \Carbon\Carbon::parse($etablissement->createdAt)->format('d-m-Y') ?? null }}
                                </td>
                                <td class="text-start">
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
                                                    <a class="kt-menu-link" href="#" onclick="openModal({{$etablissement->id}})">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-pencil">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Modifier
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <form action="{{ route('admin.reglage.etablissement.delete', $etablissement->id) }}" method="POST" id="delete-form-{{ $etablissement->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="kt-menu-link text-danger" onclick="confirmDelete({{ $etablissement->id }})">
                                                            <span class="kt-menu-icon">
                                                                <i class="ki-filled ki-trash"></i>
                                                            </span>
                                                            <span class="kt-menu-title">Supprimer</span>
                                                        </a>
                                                    </form>
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
            </div>
        </div>
    </div>
    <!-- End of Container -->

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="new_etablissement">
        <div class="kt-modal-content max-w-[400px]">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Nouvel établissement</h3>
                <button type="button" class="kt-modal-close" aria-label="Close modal" data-kt-modal-dismiss="#modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="kt-modal-body">
                <form action="{{ route('admin.reglage.etablissement.save') }}" method="POST" class="kt-form">
                    @csrf
                    <div class="kt-form-item">
                        <label class="kt-form-label">Nom de l'établissement</label>
                        <div class="kt-form-control">
                            <input name="id" type="hidden" />
                            <input class="kt-input" name="nom" placeholder="Entrer un nom" type="text" required />
                        </div>
                    </div>
                    <div class="kt-form-item">
                        <label class="kt-form-label">Ville</label>
                        <div class="kt-form-control">
                            <input class="kt-input" name="ville" placeholder="Entrer la ville" type="text" required />
                        </div>
                    </div>
                    <div class="kt-form-item">
                        <label class="kt-form-label">Pays</label>
                        <div class="grow">
                            @php
                                $countries = [
                                    ['value' => 'France', 'label' => 'France', 'flag' => '🇫🇷'],
                                ];
                                // Définir la configuration en tant que tableau PHP
                                $config = [
                                    'displayTemplate' => '<div class="flex items-center leading-none gap-2">{{flag}}<span class="text-foreground">{{text}}</span></div>',
                                    'optionTemplate' => '<div class="flex items-center leading-none gap-2">{{flag}} <span class="text-foreground">{{text}}</span></div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5 ms-auto hidden text-primary kt-select-option-selected:block"><path d="M20 6 9 17l-5-5"/></svg></div>',
                                ];
                            @endphp
                            <select
                                required
                                name="pays"
                                class="kt-select"
                                data-kt-select="true"
                                data-kt-select-placeholder="Sélectionner un pays..."
                                data-kt-select-config='@json($config)'
                            >
                                @foreach($countries as $country)
                                    <option
                                        value="{{ $country['value'] }}"
                                        selected
                                        data-kt-select-option='@json(["flag" => $country["flag"]])'
                                    >
                                        {{ $country['label'] }}
                                    </option>
                                @endforeach
                            </select>
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
        const modalEl = document.querySelector('#new_etablissement');
        const modal = KTModal.getInstance(modalEl) || new KTModal(modalEl);

        function openModal(entityId = null) {
            const form = modalEl.querySelector('form');
            form.reset();
            form.querySelector('input[name="id"]').value = '';
            const paysSelect = form.querySelector('select[name="pays"]');
            const ktSelect = paysSelect._ktSelect || null;
            if (ktSelect) ktSelect.setValue('');

            if (entityId) {
                fetch(`/admin/reglage/etablissement-${entityId}/json`)
                    .then(res => res.json())
                    .then(data => {
                        form.querySelector('input[name="id"]').value = data.id;
                        form.querySelector('input[name="nom"]').value = data.nom;
                        form.querySelector('input[name="ville"]').value = data.ville;
                        paysSelect.value = data.pays;
                        if (ktSelect) ktSelect.setValue(data.pays);
                    })
                    .catch(err => console.error("Erreur lors du chargement :", err));
            }
            modal.show();
        }

        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet établissement ? Cette action est irréversible.")) {
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
                exportBtn.href = `/admin/export/etablissements/${value}`;

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
