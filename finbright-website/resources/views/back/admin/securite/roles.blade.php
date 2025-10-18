@extends('back.admin.layouts')

@section('title', 'Rôles')

@section('stylesheet')
    <style type="text/css">
        #new_role .kt-select-dropdown.open {
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
                    Rôles
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
                        Rôles
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                    href="{{ route('admin.export.csv', ['entity' => 'roles', 'month' => $months->first()['value'] ?? '']) }}">
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
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5">
            @foreach ($roles as $role)
            @php $color = collect([
                ['stroke' => 'primary/10', 'fill' => 'primary/5', 'text' => 'primary'], 
                ['stroke' => 'green-200', 'fill' => 'green-50', 'text' => 'green-500'], 
                ['stroke' => 'violet-100', 'fill' => 'violet-50', 'text' => 'violet-500'], 
                ['stroke' => 'input', 'fill' => 'muted/30', 'text' => 'muted-foreground'], 
                ['stroke' => 'destructive/10', 'fill' => 'destructive/5', 'text' => 'destructive']
            ])->random() 
            @endphp
            
            <div class="kt-card flex flex-col gap-5 p-5 lg:p-7.5">
                <div class="flex items-center flex-wrap justify-between gap-1">
                    <div class="flex items-center gap-2.5">
                        <div class="relative size-[44px] shrink-0">
                            <svg class="w-full h-full stroke-{{ $color['stroke'] }} fill-{{ $color['fill'] }}" fill="none" height="48"
                                viewbox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
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
                                <i class="ki-filled {{ $role->icon ? $role->icon : "ki-setting" }} text-xl text-{{ $color['text'] }}">
                                </i>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <a class="text-base font-medium text-mono hover:text-primary mb-px"
                                href="#" onclick="openModal({{ $role->id }})">
                                {{ $role->name }}
                            </a>
                            <span class="text-sm text-secondary-foreground">
                                {{ $role->default_role ? "Rôle système" : null }}
                            </span>
                        </div>
                    </div>
                    <div class="kt-menu inline-flex" data-kt-menu="true">
                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                            data-kt-menu-item-placement="bottom-end" data-kt-menu-item-placement-rtl="bottom-start"
                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                <i class="ki-filled ki-dots-vertical text-lg">
                                </i>
                            </button>
                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                data-kt-menu-dismiss="true">
                                <div class="kt-menu-item">
                                    <a class="kt-menu-link" href="#" onclick="openModal({{ $role->id }})">
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
                                        action="{{ route('admin.securite.role.delete', $role->id) }}"
                                        method="POST" id="delete-form-{{ $role->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="kt-menu-link text-danger"
                                            onclick="confirmDelete({{ $role->id }})">
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
                </div>
                <p class="text-sm text-secondary-foreground">
                    {{ $role->description }}
                </p>
                <span class="text-sm text-foreground">
                    {{ count($role->admins) < 10 ? "0". count($role->admins) : count($role->admins) }} utilisateur(s)
                </span>
            </div>
            @endforeach
            <style>
                .add-new-bg {
                    background-image: url({{asset('assets/media/images/2600x1200/bg-4.png')}});
                }

                .dark .add-new-bg {
                    background-image: url({{asset('assets/media/images/2600x1200/bg-4-dark.png')}});
                }
            </style>
            <a class="kt-card border-2 border-dashed border-primary/10 bg-center bg-[length:600px] bg-no-repeat add-new-bg"
                href="#" onclick="openModal()">
                <div class="kt-card-content grid items-center">
                    <div class="flex flex-col gap-3">
                        <div class="flex justify-center pt-5">
                            <div class="relative size-[60px] shrink-0">
                                <svg class="w-full h-full stroke-primary/10 fill-primary/5" fill="none" height="48"
                                    viewbox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
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
                                    <i class="ki-filled ki-rocket text-2xl text-primary">
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col text-center">
                            <span class="text-lg font-medium text-mono hover:text-primary mb-px">
                                Ajouter un nouveau rôle
                            </span>
                            <span class="text-sm text-secondary-foreground">
                                Ignite Professional Adventures
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- End of Container -->

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="new_role">
        <div class="kt-modal-content max-w-3xl">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Nouveau rôle</h3>
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
                <form action="{{ route('admin.securite.roles.save') }}" method="POST" class="kt-form">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Nom<span class="text-destructive">*</span>
                        </label>
                        <div class="flex flex-1 justify-between gap-1.5">
                            @php
                                // Définir la configuration en tant que tableau PHP
                                $config = [
                                    'displayTemplate' => '<div class="flex items-center gap-2">{{icon}}<span class="text-foreground">{{text}}</span></div>',
                                    'optionTemplate' => '<div class="flex items-center gap-2">{{icon}} <span class="text-foreground">{{text}}</span></div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5 ms-auto hidden text-primary kt-select-option-selected:block"><path d="M20 6 9 17l-5-5"/></svg></div>',
                                ];
                            @endphp
                            <select
                                name="icon"
                                class="kt-select max-w-[75px] flex-none"
                                data-kt-select="true"
                                data-kt-select-placeholder="Icône"
                                data-kt-select-config='@json($config)'
                                >
                                @foreach($icons as $icon)
                                    <option
                                        value="{{ $icon['value'] }}"
                                        selected
                                        data-kt-select-option='@json(["icon" => $icon["img"]])'
                                    >
                                    </option>
                                @endforeach
                            </select>
                            <input class="kt-input flex-1" type="text" name="name" placeholder="Nom du rôle" required />
                        </div>
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Description
                        </label>
                        <textarea name="description" rows="4" class="kt-textarea" placeholder="Entrer une description pour le rôle"></textarea>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="kt-form-label max-w-56" for="default_role">Rôle par défaut</label>
                        <input class="kt-switch" type="checkbox" id="default_role" value="1" name="default_role" onclick="document.getElementById('switch-label').textContent = this.checked ? 'Oui' : 'Non';" />
                        <label id="switch-label" class="kt-label">Non</label>
                    </div>
                    <div class="space-y-2.5">
                        <button class="kt-btn kt-btn-dim px-0" data-kt-collapse="#collapse_content" aria-expanded="false" aria-controls="collapse_content" id="collapse_toggle">
                            <label class="kt-label text-lg cursor-pointer">Permissions du rôle</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down kt-collapse-active:hidden size-4" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-up kt-collapse-active:block hidden size-4" aria-hidden="true"><path d="m18 15-6-6-6 6"></path></svg>
                        </button>
                        <div class="transition-[height] duration-300 hidden" id="collapse_content" aria-labelledby="collapse_toggle">
                            <div class="kt-card-content grid grid-cols-1 lg:grid-cols-2 gap-5 p-0 max-h-[300px] overflow-y-auto">
                                @foreach($permissions as $index => $permission)
                                <div class="rounded-xl border border-border p-4 flex items-center justify-between gap-2.5">
                                    <div class="flex items-center gap-3.5">
                                        <div class="relative size-[45px] shrink-0">
                                            <svg class="w-full h-full stroke-border fill-muted/30" fill="none" height="48" viewBox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
                                                18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
                                                39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill="">
                                                </path>
                                                <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
                                                18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
                                                39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke="">
                                                </path>
                                            </svg>
                                            <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                <i class="ki-filled {{ $permission->icon ? $permission->icon : "ki-category" }} text-lg text-muted-foreground"></i>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label for="permission-{{ $index }}" class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono">
                                            {{ $permission->name }}
                                            </label>
                                            <span class="text-sm text-secondary-foreground">
                                            {{ $permission->description }}
                                            </span>
                                        </div>
                                    </div>
                                    <input id="permission-{{ $index }}" {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }} class="kt-switch kt-switch-sm" name="permissions[{{ $role->id }}][]" type="checkbox" value="{{ $permission->id }}">
                                </div>
                                @endforeach
                            </div>
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
        const modalEl = document.querySelector('#new_role');
        const modal = KTModal.getInstance(modalEl) || new KTModal(modalEl);
        const form = modalEl.querySelector('form');
        const permissionContent = form.querySelector('.kt-card-content');
        const iconsSelect = form.querySelector('select[name="icon"]');

        // On injecte les permissions PHP dans une variable JS
        const availableIcons = @json($icons);
        const availablePermissions = @json($permissions);

        function populateIcons(selectedIcon = null) {
            iconsSelect.innerHTML = '';
            availableIcons.forEach(icon => {
                const isSelected = selectedIcon == icon.value ? 'selected' : ''; 
                iconsSelect.innerHTML += `
                    <option value="${icon.value}" ${isSelected}
                        data-kt-select-option='{"icon": "${icon.img ?? ''}"}'>
                    </option>`;
            });
            KTSelect.createInstances(iconsSelect);
            const w = iconsSelect.closest('div'); 
            w?.querySelector('.kt-select-dropdown')?.classList.add('!w-[200px]'); 
            w?.querySelector('ul.kt-select-options')?.classList.add('grid','grid-cols-4','gap-4','p-2');
        }

        function populatePermissions(selectedPermissions = []) {
            permissionContent.innerHTML = '';

            availablePermissions.forEach((permission, index) => {
                const isChecked = selectedPermissions.includes(permission.id) ? 'checked' : '';

                permissionContent.innerHTML += `
                    <div class="rounded-xl border border-border p-4 flex items-center justify-between gap-2.5">
                        <div class="flex items-center gap-3.5">
                            <div class="relative size-[45px] shrink-0">
                                <svg class="w-full h-full stroke-border fill-muted/30" fill="none" height="48" viewBox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
                                    18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
                                    39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                    <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
                                    18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
                                    39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                </svg>
                                <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                    <i class="ki-filled ${permission.icon ? permission.icon : 'ki-category'} text-lg text-muted-foreground"></i>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="permission-${index}" class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono">
                                    ${permission.name}
                                </label>
                                <span class="text-sm text-secondary-foreground">
                                    ${permission.description ?? ''}
                                </span>
                            </div>
                        </div>
                        <input id="permission-${index}" ${isChecked} class="kt-switch kt-switch-sm"
                            name="permissions[]" type="checkbox" value="${permission.id}">
                    </div>`;
            });
        }

        function openModal(entityId = null) {
            form.reset();
            form.querySelector('input[name="id"]').value = '';

            if (entityId) {
                fetch(`/admin/securite/role-${entityId}/json`)
                    .then(res => res.json())
                    .then(data => {
                        form.querySelector('input[name="id"]').value = data.id;
                        form.querySelector('input[name="name"]').value = data.name;
                        form.querySelector('textarea[name="description"]').value = data.description ?? '';
                        form.querySelector('input[name="default_role"]').checked = data.default_role;
                        form.querySelector('#switch-label').innerText = data.default_role ? "Oui" : "Non";

                        const permissions = Array.isArray(data.permissions)
                            ? data.permissions.map(p => p.id)
                            : [];

                        populatePermissions(permissions);
                        populateIcons(data.icon);
                    })
                    .catch(err => console.error("Erreur lors du chargement :", err));
            } else {
                populatePermissions();
                populateIcons();
            }

            modal.show();
        }

        const exportBtn = document.getElementById('exportBtn');

        document.querySelectorAll('.kt-menu-link[data-value]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const value = this.dataset.value;
                const label = this.dataset.label;
                const shortLabel = this.dataset.short;

                // Mettre à jour le bouton Exporter (href dynamique)
                exportBtn.href = `/admin/export/roles/${value}`;

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
