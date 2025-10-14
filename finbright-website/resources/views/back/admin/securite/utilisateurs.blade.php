@extends('back.admin.layouts')

@section('title', 'Liste des utilisateurs')

@section('stylesheet')
    <style type="text/css">
        #new_admin .kt-select-dropdown.open {
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
                        Sécurité
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
                                                    src="{{ $admin->profilePicture ? Storage::url($admin->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}" />
                                            </div>
                                            <div class="flex flex-col gap-0.5">
                                                <a class="leading-none font-medium text-sm text-mono hover:text-primary"
                                                    href="#" onclick="openModal({{ $admin->id }})">
                                                    {{ $admin->fullname }}
                                                </a>
                                                <span class="text-xs text-secondary-foreground font-normal">
                                                    {{ $admin->email }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if (count($admin->roles) != 0)
                                        <div class="flex flex-wrap gap-2.5 mb-2">
                                            @foreach ($admin->roles as $role)
                                            <span class="kt-badge kt-badge-outline">
                                                {{ $role->name }}
                                            </span>
                                            @endforeach
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $admin->phone_number }}
                                    </td>
                                    <td>
                                        <span class="kt-badge kt-badge-outline kt-badge-{{ $admin->status == "Activation en cours" ? "warning" : ($admin->status == "Actif" ? "success" : "destructive") }}">
                                            {{ $admin->status }}
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

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="new_admin">
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
                <form action="{{ route('admin.securite.utilisateurs.save') }}" method="POST" class="kt-form" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Photo
                        </label>
                        <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                            <span class="text-sm">
                                150x150px JPEG, PNG Image
                            </span>
                            <div class="group relative size-18 rounded-full border border-gray-300 bg-gray-50 overflow-hidden cursor-pointer" id="avatar-container">
                                <input accept=".png, .jpg, .jpeg" name="avatar" type="file" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" id="avatar-input" />
                                
                                <div id="avatar-preview" class="w-full h-full bg-cover bg-center rounded-full" style="background-image: url('{{ Auth::user()->profilePicture ? Storage::url(Auth::user()->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}');"></div>
                                
                                <div class="absolute bottom-0 left-0 right-0 h-1/3 flex items-center justify-center bg-gray-300 bg-opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.867-1.442A2 2 0 0110.437 3h3.125a2 2 0 011.664.89l.867 1.442A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                
                                <button type="button" id="avatar-remove-btn" class="absolute -top-2 -right-2 size-6 rounded-full bg-red-500 text-white flex items-center justify-center cursor-pointer opacity-0 transition-opacity">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id">
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Nom & prénoms
                        </label>
                        <input class="kt-input" type="text" name="fullname" placeholder="Nom et prénoms" required />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Numéro de téléphone
                        </label>
                        <input class="kt-input" placeholder="Phone number" type="text" name="phone_number" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Email
                        </label>
                        <input class="kt-input" type="email" name="email" placeholder="Adresse email" required />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Rôle(s)
                        </label>
                        <div class="grow">
                            @php
                                // Définir la configuration en tant que tableau PHP
                                $config = [
                                    'optionTemplate' => '<div class="flex items-center grow gap-2"><div class="flex flex-col gap-0.5"><span class="font-semibold text-foreground">{{text}}</span><span class="text-xs text-muted-foreground">{{desc}}</span></div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5 ms-auto hidden text-primary kt-select-option-selected:block"><path d="M20 6 9 17l-5-5"/></svg></div>',
                                    "displaySeparator" => " | "
                                ];
                            @endphp
                            <select
                                name="roles[]"
                                class="kt-select"
                                multiple
                                required
                                data-kt-select-multiple="true"
                                data-kt-select="true"
                                data-kt-select-placeholder="Sélectionner un rôle..."
                                data-kt-select-config='@json($config)'
                                >
                                @foreach($roles as $role)
                                    <option
                                        value="{{ $role->id }}"
                                        data-kt-select-option='{"desc": "{{$role->description}}"}'
                                    >
                                        {{ $role->name }}
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
        const avatarContainer = document.getElementById('avatar-container');
        const avatarInput = document.getElementById('avatar-input');
        const avatarPreview = document.getElementById('avatar-preview');
        const avatarRemoveBtn = document.getElementById('avatar-remove-btn');
        const defaultAvatarUrl = '{{ asset('assets/media/avatars/blank.png') }}';

        // Fonction pour mettre à jour l'état visuel
        function updateAvatarState(imageUrl) {
            if (imageUrl && imageUrl !== defaultAvatarUrl) {
                avatarPreview.style.backgroundImage = `url('${imageUrl}')`;
                avatarContainer.classList.add('has-avatar');
            } else {
                avatarPreview.style.backgroundImage = `url('${defaultAvatarUrl}')`;
                avatarContainer.classList.remove('has-avatar');
            }
        }

        // Appliquer l'état initial
        updateAvatarState(avatarPreview.style.backgroundImage.slice(5, -2)); // Extrait l'URL de l'attribut style

        // Gérer le changement de fichier
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    updateAvatarState(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Gérer la suppression de l'image
        avatarRemoveBtn.addEventListener('click', function(event) {
            event.stopPropagation(); // Empêche le clic de se propager à l'input
            avatarInput.value = ''; // Réinitialise l'input de fichier
            updateAvatarState('');
        });

        const modalEl = document.querySelector('#new_admin');
        const modal = KTModal.getInstance(modalEl) || new KTModal(modalEl);
        const form = modalEl.querySelector('form');
        const roleSelect = form.querySelector('select[name="roles[]"]');

        // On injecte les rôles PHP dans une variable JS
        const availableRoles = @json($roles);

        function populateRoles(selectedRoleIds = []) {
            roleSelect.innerHTML = '';
            availableRoles.forEach(role => {
                const isSelected = selectedRoleIds.includes(role.id) ? 'selected' : ''; 
                roleSelect.innerHTML += `
                    <option value="${role.id}" ${isSelected}
                        data-kt-select-option='{"desc": "${role.description ?? ''}"}'>
                        ${role.name}
                    </option>`;
            });
            KTSelect.createInstances(roleSelect);
        }

        function openModal(entityId = null) {
            form.reset();
            form.querySelector('input[name="id"]').value = '';

            if (entityId) {
                fetch(`/admin/securite/utilisateur-${entityId}/json`)
                    .then(res => res.json())
                    .then(data => {
                        form.querySelector('input[name="id"]').value = data.id;
                        form.querySelector('input[name="fullname"]').value = data.fullname;
                        form.querySelector('input[name="phone_number"]').value = data.phone_number;
                        form.querySelector('input[name="email"]').value = data.email;
                        // Avatar si présent
                        if (data.profile_picture_id && data.profile_picture) {
                            avatarPreview.style.backgroundImage = `url('/storage/${data.profile_picture.filename}')`;
                        }
                        // Rôles multiples
                        const roleIds = Array.isArray(data.roles) ? data.roles.map(r => r.id) : [];
                        populateRoles(roleIds);
                    })
                    .catch(err => console.error("Erreur lors du chargement :", err));
            } else {
                populateRoles();
                avatarPreview.style.backgroundImage = `url({{asset('assets/media/avatars/blank.png')}})`;
            }

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
