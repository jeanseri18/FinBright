@extends('back.admin.layouts')

@section('title', 'Liste des utilisateurs')

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
                    Liste des utilisateurs
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
                        Liste des utilisateurs
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                    href="{{ route('admin.export.csv', ['entity' => 'users', 'month' => $months->first()['value'] ?? '']) }}">
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
                        Affichage de
                        {{ count($utilisateurs) >= 10 ? '10 sur ' . count($utilisateurs) : count($utilisateurs) }}
                        utilisateur(s)
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
                                <input id="search_input" placeholder="Rechercher un utilisateur" type="text"
                                    value="" />
                            </label>
                        </div>
                        <button class="kt-btn kt-btn-primary" onclick="openModal()">
                            <i class="ki-filled ki-plus"></i>
                            Ajouter un utilisateur
                        </button>
                    </div>
                </div>
                <div class="kt-card-table kt-scrollable-x-auto">
                    <table class="kt-table kt-table-border" data-kt-datatable-table="true" id="members_table">
                        <thead>
                            <tr>
                                <th class="min-w-[300px]">
                                    <span class="kt-table-col">
                                        <span class="kt-table-col-label">
                                            Utilisateur
                                        </span>
                                        <span class="kt-table-col-sort">
                                        </span>
                                    </span>
                                </th>
                                <th class="text-secondary-foreground font-normal min-w-[220px]">
                                    Roles
                                </th>
                                <th class="min-w-[165px]">
                                    <span class="kt-table-col">
                                        <span class="kt-table-col-label">
                                            Téléphone
                                        </span>
                                        <span class="kt-table-col-sort">
                                        </span>
                                    </span>
                                </th>
                                <th class="min-w-[165px]">
                                    <span class="kt-table-col">
                                        <span class="kt-table-col-label">
                                            Statut
                                        </span>
                                        <span class="kt-table-col-sort">
                                        </span>
                                    </span>
                                </th>
                                <th class="min-w-[165px]">
                                    <span class="kt-table-col">
                                        <span class="kt-table-col-label">
                                            Date
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
                            @forelse ($utilisateurs as $admin)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-2.5">
                                            <div class="">
                                                <img class="h-9 rounded-full"
                                                    src="{{ $admin->user->profilePicture ? Storage::url($admin->user->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                            </div>
                                            <div class="flex flex-col gap-0.5">
                                                <a class="leading-none font-medium text-sm text-mono hover:text-primary"
                                                    href="#" onclick="openModal({{ $admin->id }})">
                                                    {{ $admin->user->first_name . ' ' . $admin->user->last_name }}
                                                </a>
                                                <span class="text-xs text-secondary-foreground font-normal">
                                                    {{ $admin->user->email }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- @if (count($admin->roles) != 0) --}}
                                        {{-- <div class="flex flex-wrap gap-2.5 mb-2">
                                        @foreach ($admin->roles as $role)
                                        <span class="kt-badge kt-badge-outline">
                                            {{ $role->label }}
                                        </span>
                                        @endforeach
                                    </div> --}}
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-1.5">
                                            <img alt="flag" class="h-4 rounded-full"
                                                src="/static/metronic/tailwind/dist/assets/media/flags/estonia.svg">
                                            <span class="leading-none text-foreground font-normal">
                                                Estonia
                                            </span>
                                            </img>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="kt-badge kt-badge-outline kt-badge-success">
                                            Active
                                        </span>
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ \Carbon\Carbon::parse($admin->createdAt)->format('d-m-Y') ?? null }}
                                    </td>
                                    <td class="w-[60px]">
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
                                                        <a class="kt-menu-link" href="#"
                                                            onclick="openModal({{ $admin->id }})">
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
                                                        <form
                                                            action="{{ route('admin.securite.utilisateur.delete', $admin->id) }}"
                                                            method="POST" id="delete-form-{{ $admin->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#" class="kt-menu-link text-danger"
                                                                onclick="confirmDelete({{ $admin->id }})">
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
        <div class="kt-modal-content max-w-xl">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Nouvel utilisateur</h3>
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
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Photo
                        </label>
                        <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                            <span class="text-sm">
                                150x150px JPEG, PNG Image
                            </span>
                            <div class="kt-image-input size-16" data-kt-image-input="true">
                                <input accept=".png, .jpg, .jpeg" name="avatar" type="file">
                                <input name="avatar_remove" type="hidden" />
                                <button class="kt-image-input-remove" data-kt-image-input-remove="true"
                                    data-kt-tooltip="true" data-kt-tooltip-placement="right"
                                    data-kt-tooltip-trigger="hover" type="button">
                                    <i class="ki-filled ki-cross">
                                    </i>
                                    <span class="kt-tooltip" data-kt-tooltip-content="true">
                                        Clicquer ici pour supprimer
                                    </span>
                                </button>
                                <div class="kt-image-input-placeholder border-2 border-green-500 kt-image-input-empty:border-input"
                                    data-kt-image-input-placeholder="true"
                                    style="background-image:url(/static/metronic/tailwind/dist/assets/media/avatars/blank.png)">
                                    <div class="kt-image-input-preview" data-kt-image-input-preview="true"
                                        style="background-image:url('/media/avatars/300-2.png')">
                                    </div>
                                    <div
                                        class="flex items-center justify-center cursor-pointer h-5 left-0 right-0 bottom-0 bg-black/25 absolute">
                                        <svg class="fill-border opacity-80" height="12" viewbox="0 0 14 12"
                                            width="14" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6665 2.64585H11.2232C11.0873 2.64749 10.9538 2.61053 10.8382 2.53928C10.7225 2.46803 10.6295 2.36541 10.5698 2.24335L10.0448 1.19918C9.91266 0.931853 9.70808 0.707007 9.45438 0.550249C9.20068 0.393491 8.90806 0.311121 8.60984 0.312517H5.38984C5.09162 0.311121 4.799 0.393491 4.5453 0.550249C4.2916 0.707007 4.08701 0.931853 3.95484 1.19918L3.42984 2.24335C3.37021 2.36541 3.27716 2.46803 3.1615 2.53928C3.04584 2.61053 2.91234 2.64749 2.7765 2.64585H2.33317C1.90772 2.64585 1.49969 2.81486 1.19885 3.1157C0.898014 3.41654 0.729004 3.82457 0.729004 4.25002V10.0834C0.729004 10.5088 0.898014 10.9168 1.19885 11.2177C1.49969 11.5185 1.90772 11.6875 2.33317 11.6875H11.6665C12.092 11.6875 12.5 11.5185 12.8008 11.2177C13.1017 10.9168 13.2707 10.5088 13.2707 10.0834V4.25002C13.2707 3.82457 13.1017 3.41654 12.8008 3.1157C12.5 2.81486 12.092 2.64585 11.6665 2.64585ZM6.99984 9.64585C6.39413 9.64585 5.80203 9.46624 5.2984 9.12973C4.79478 8.79321 4.40225 8.31492 4.17046 7.75532C3.93866 7.19572 3.87802 6.57995 3.99618 5.98589C4.11435 5.39182 4.40602 4.84613 4.83432 4.41784C5.26262 3.98954 5.80831 3.69786 6.40237 3.5797C6.99644 3.46153 7.61221 3.52218 8.1718 3.75397C8.7314 3.98576 9.2097 4.37829 9.54621 4.88192C9.88272 5.38554 10.0623 5.97765 10.0623 6.58335C10.0608 7.3951 9.73765 8.17317 9.16365 8.74716C8.58965 9.32116 7.81159 9.64431 7 9.64585Z">
                                            </path>
                                            <path
                                                d="M7 8.77087C8.20812 8.77087 9.1875 7.7915 9.1875 6.58337C9.1875 5.37525 8.20812 4.39587 7 4.39587C5.79188 4.39587 4.8125 5.37525 4.8125 6.58337C4.8125 7.7915 5.79188 8.77087 7 8.77087Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Nom & prenoms
                        </label>
                        <input class="kt-input" type="text" value="Jason Tatum" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Numéro de téléphone
                        </label>
                        <input class="kt-input" placeholder="Phone number" type="text" value="" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Email
                        </label>
                        <input class="kt-input" type="text" value="jason@studio.io" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Rôle(s)
                        </label>
                        <div class="grow">
                            @php
                                // Définir la configuration en tant que tableau PHP
                                $config = [
                                    'displayTemplate' => '<div class="flex items-center gap-2">{{icon}}<span class="text-foreground">{{text}}</span></div>',
                                    'optionTemplate' => '<div class="flex items-center grow gap-2"><div class="flex flex-col gap-0.5"><span class="font-semibold text-foreground">{{text}}</span><span class="text-xs text-muted-foreground">{{desc}}</span></div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5 ms-auto hidden text-primary kt-select-option-selected:block"><path d="M20 6 9 17l-5-5"/></svg></div>',
                                ];
                            @endphp
                            <select
                                class="kt-select"
                                data-kt-select="true"
                                data-kt-select-placeholder="Select an option..."
                                data-kt-select-config='@json($config)'
                                >
                                @foreach($roles as $role)
                                    <option
                                        value="{{ $role->id }}"
                                        selected
                                        data-kt-select-option='{"desc": "Can modify and delete", "icon" => "<i class="ki-filled ki-user"></i>"}'
                                    >
                                        {{ $role->label }}
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
            // const form = modalEl.querySelector('form');
            // form.reset();
            // form.querySelector('input[name="id"]').value = '';
            // const paysSelect = form.querySelector('select[name="pays"]');
            // const ktSelect = paysSelect._ktSelect || null;
            // if (ktSelect) ktSelect.setValue('');

            // if (entityId) {
            //     fetch(`/admin/reglage/etablissement-${entityId}/json`)
            //         .then(res => res.json())
            //         .then(data => {
            //             form.querySelector('input[name="id"]').value = data.id;
            //             form.querySelector('input[name="nom"]').value = data.nom;
            //             form.querySelector('input[name="ville"]').value = data.ville;
            //             paysSelect.value = data.pays;
            //             if (ktSelect) ktSelect.setValue(data.pays);
            //         })
            //         .catch(err => console.error("Erreur lors du chargement :", err));
            // }
            modal.show();
        }

        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.")) {
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
