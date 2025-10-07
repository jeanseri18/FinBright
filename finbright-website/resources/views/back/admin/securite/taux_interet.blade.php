@extends('back.admin.layouts')

@section('title', 'Les taux d\'intérêts')

@section('stylesheet')
    <style type="text/css">
        #new_taux .kt-select-dropdown.open {
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
                    Les taux d'intérêts
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
                        Les taux d'intérêts
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-2.5">
                <!-- Bouton Exporter -->
                <a id="exportBtn" class="kt-btn kt-btn-outline"
                    href="{{ route('admin.export.csv', ['entity' => 'taux_interets', 'month' => $months->first()['value'] ?? '']) }}">
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
                        Affichage de {{ count($taux) >= 10 ? '10 sur ' . count($taux) : count($taux) }}
                        taux
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
                                <input id="search_input" placeholder="Rechercher un taux" type="text"
                                    value="" />
                            </label>
                        </div>
                        <button class="kt-btn kt-btn-primary" onclick="openModal()">
                            <i class="ki-filled ki-plus"></i>
                            Ajouter un taux
                        </button>
                    </div>
                </div>
                <div class="kt-card-table kt-scrollable-x-auto">
                    <table class="kt-table table-fixed" data-kt-datatable-table="true">
                        <thead>
                            <tr>
                                <th class="text-start w-[150px]">
                                    Profil
                                </th>
                                <th class="text-end w-[100px]">
                                    Caractéristiques
                                </th>
                                <th class="text-end w-[100px]">
                                    Score
                                </th>
                                <th class="text-end w-[110px]">
                                    Rendement
                                </th>
                                <th class="text-end w-[110px]">
                                    Date
                                </th>
                                <th class="w-[30px]">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($taux as $item)
                            <tr>
                                <td class="text-start">
                                    <a class="text-sm font-medium text-mono hover:text-primary" href="#" onclick="openModal({{$item->id}})">
                                        {{ $item->profile ?? null}} ({{ $item->profile == "A" ? "Risque Faible" : ($item->profile == "B" ? "Risque Moyen" : "Risque fort") }})
                                    </a>
                                </td>
                                <td class="text-sm text-foreground text-end">
                                    -
                                </td>
                                <td class="text-end">
                                    {{$item->score_range ?? null}}
                                </td>
                                <td class="text-end">
                                    {{$item->yield ?? null}}
                                </td>
                                <td class="text-sm text-foreground text-end">
                                    {{ \Carbon\Carbon::parse($item->createdAt)->format('d-m-Y') ?? null }}
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
                                                    <a class="kt-menu-link" href="#" onclick="openModal({{$item->id}})">
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
                                                    <form action="{{ route('admin.reglage.taux.delete', $item->id) }}" method="POST" id="delete-form-{{ $item->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="kt-menu-link text-danger" onclick="confirmDelete({{ $item->id }})">
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

    <div class="kt-modal kt-modal-center" data-kt-modal="true" id="new_taux">
        <div class="kt-modal-content max-w-xl">
            <div class="kt-modal-header">
                <h3 class="kt-modal-title">Nouveau taux</h3>
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
                <form action="{{ route('admin.reglage.taux.save') }}" method="POST" class="kt-form">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="kt-form-item">
                        <div class="flex flex-col md:flex-row md:justify-center gap-2.5">
                            <div class="flex items-center gap-2.5">
                                <input type="radio" class="kt-radio" id="risque_1" name="level" value="A"/>
                                <label class="kt-label" for="risque_1">A (Risque Faible)</label>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <input type="radio" class="kt-radio" id="risque_2" name="level" checked="" value="B"/>
                                <label class="kt-label" for="risque_2">B (Risque Moyen)</label>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <input type="radio" class="kt-radio" id="risque_3" name="level" value="C"/>
                                <label class="kt-label" for="risque_3">C (Risque Fort)</label>
                            </div>
                        </div>
                    </div>
                    <div class="kt-form-item mb-2">
                        <label class="kt-form-label">Score</label>
                        <div class="kt-form-control flex flex-wrap md:flex-nowrap gap-2.5">
                            <input class="kt-input" name="score_mini" placeholder="Score minimum" type="text" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57" required />
                            <input class="kt-input" name="score_maxi" placeholder="Score maximum" type="text" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57" required />
                        </div>
                    </div>
                    <div class="kt-form-item">
                        <label class="kt-form-label">Rendement</label>
                        <div class="kt-input-group" for="yield">
                            <input class="kt-input" type="text" id="yield" name="yield" required min="0" max="100" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                            <span class="kt-input-addon">%</span>
                        </div>
                    </div>
                    <div class="kt-form-item">
                        <label class="kt-form-label">Caractéristiques (vous pouvez en sélectionner plusieurs)</label>
                        <div id="caract_div" class="kt-input-control flex flex-col gap-2.5">
                            <select
                                name="characteristics[diplomas_years][]"
                                class="kt-select"
                                multiple
                                data-kt-select="true"
                                data-kt-select-multiple="true"
                                data-kt-select-placeholder="Sélectionner les années..."
                                data-kt-select-config='{
                                        "displaySeparator": ", "
                                    }'
                                >
                                <option value="master:1">Master (Première année)</option>
                                <option value="master:2">Master (Deuxième année)</option>
                                <option value="master:3">Master (Troisième année)</option>
                                <option value="ingenieur:1">Ingénieur (Première année)</option>
                                <option value="ingenieur:2">Ingénieur (Deuxième année)</option>
                                <option value="mba:1">MBA (Première année)</option>
                                <option value="mba:2">MBA (Deuxième année)</option>
                            </select>
                            <select
                                name="characteristics[specializations][]"
                                class="kt-select"
                                multiple
                                data-kt-select="true"
                                data-kt-select-multiple="true"
                                data-kt-select-enable-search="true"
                                data-kt-select-search-placeholder="Rechercher une filière..."
                                data-kt-select-placeholder="Sélectionner les filières..."
                                data-kt-select-config='{
                                        "displaySeparator": ", "
                                    }'
                                >
                                <option value="Finance d'entreprise">Finance d'entreprise</option>
                                <option value="Management Stratégique">Management Stratégique</option>
                                <option value="Sécurité des systèmes d'information">Sécurité des systèmes d'information</option>
                                <option value="Cyberdéfense">Cyberdéfense</option>
                                <option value="Énergies durables">Énergies durables</option>
                                <option value="Ingénierie nucléaire">Ingénierie nucléaire</option>
                                <option value="Systèmes aérospatiaux">Systèmes aérospatiaux</option>
                                <option value="Finance de marché">Finance de marché</option>
                                <option value="Banque d'investissement">Banque d'investissement</option>
                                <option value="Conseil en organisation">Conseil en organisation</option>
                                <option value="Ingénierie Financière">Ingénierie Financière</option>
                                <option value="Business Analytics">Business Analytics</option>
                                <option value="Data Science for Business">Data Science for Business</option>
                                <option value="Stratégie IA">Stratégie IA</option>
                                <option value="Machine Learning">Machine Learning</option>
                                <option value="Systèmes aérospatiaux">Systèmes aérospatiaux</option>
                                <option value="International Business">International Business</option>
                                <option value="Entrepreneurship & Innovation">Entrepreneurship & Innovation</option>
                                <option value="Marketing Management">Marketing Management</option>
                                <option value="Human Resources Management">Human Resources Management</option>
                                <option value="Supply Chain Management">Supply Chain Management</option>
                                <option value="Autre spécialisation">Autre spécialisation</option>
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
        const modalEl = document.querySelector('#new_taux');
        const modal = KTModal.getInstance(modalEl) || new KTModal(modalEl);

        function openModal(entityId = null) {
            const form = modalEl.querySelector('form');

            // 🔹 Réinitialiser le formulaire
            form.reset();
            form.querySelector('input[name="id"]').value = '';
            const caractDiv = form.querySelector('#caract_div');

            // 🔹 Si un ID est fourni, charger les données
            if (entityId) {
                fetch(`/admin/reglage/taux-${entityId}/json`)
                    .then(res => res.json())
                    .then(data => {
                        const scores = data.score_range.split("-");
                        form.querySelector('input[name="id"]').value = data.id;
                        form.querySelector('input[name="yield"]').value = data.yield;
                        form.querySelector('input[name="score_mini"]').value = scores[0];
                        form.querySelector('input[name="score_maxi"]').value = scores[1];

                        // 🔹 Sélectionner le niveau de risque (A, B ou C)
                        const radios = form.querySelectorAll('input[name="level"]');
                        radios.forEach(radio => {
                            radio.checked = (radio.value === data.profile);
                            console.log(radio.value === data.level);
                        });

                        const diplomasYears = data.characteristics['diplomas_years'] || [];
                        const specializations = data.characteristics['specializations'] || [];

                        // 🔹 Générer le select dynamique avec les options sélectionnées
                        caractDiv.innerHTML = `
                            <select
                                name="characteristics[diplomas_years][]"
                                class="kt-select"
                                multiple
                                data-kt-select="true"
                                data-kt-select-multiple="true"
                                data-kt-select-placeholder="Sélectionner les années..."
                                data-kt-select-config='{
                                        "displaySeparator": ", "
                                    }'
                                >
                                <option value="master:1" ${ diplomasYears.includes('master:1') ? 'selected' : '' }>Master (Première année)</option>
                                <option value="master:2" ${ diplomasYears.includes('master:2') ? 'selected' : '' }>Master (Deuxième année)</option>
                                <option value="master:3" ${ diplomasYears.includes('master:3') ? 'selected' : '' }>Master (Troisième année)</option>
                                <option value="ingenieur:1" ${ diplomasYears.includes('ingenieur:1') ? 'selected' : '' }>Ingénieur (Première année)</option>
                                <option value="ingenieur:2" ${ diplomasYears.includes('ingenieur:2') ? 'selected' : '' }>Ingénieur (Deuxième année)</option>
                                <option value="mba:1" ${ diplomasYears.includes('mba:1') ? 'selected' : '' }>MBA (Première année)</option>
                                <option value="mba:2" ${ diplomasYears.includes('mba:2') ? 'selected' : '' }>MBA (Deuxième année)</option>
                            </select>
                            <select
                                name="characteristics[specializations][]"
                                class="kt-select"
                                multiple
                                data-kt-select="true"
                                data-kt-select-multiple="true"
                                data-kt-select-enable-search="true"
                                data-kt-select-search-placeholder="Rechercher une filière..."
                                data-kt-select-placeholder="Sélectionner les filières..."
                                data-kt-select-config='{
                                        "displaySeparator": ", "
                                    }'
                                >
                                <option ${ specializations.includes('Finance d\'entreprise') ? 'selected' : '' } value="Finance d'entreprise">Finance d'entreprise</option>
                                <option ${ specializations.includes('Management Stratégique') ? 'selected' : '' } value="Management Stratégique">Management Stratégique</option>
                                <option ${ specializations.includes('Sécurité des systèmes d\'information') ? 'selected' : '' } value="Sécurité des systèmes d'information">Sécurité des systèmes d'information</option>
                                <option ${ specializations.includes('Cyberdéfense') ? 'selected' : '' } value="Cyberdéfense">Cyberdéfense</option>
                                <option ${ specializations.includes('Énergies durables') ? 'selected' : '' } value="Énergies durables">Énergies durables</option>
                                <option ${ specializations.includes('Ingénierie nucléaire') ? 'selected' : '' } value="Ingénierie nucléaire">Ingénierie nucléaire</option>
                                <option ${ specializations.includes('Systèmes aérospatiaux') ? 'selected' : '' } value="Systèmes aérospatiaux">Systèmes aérospatiaux</option>
                                <option ${ specializations.includes('Finance de marché') ? 'selected' : '' } value="Finance de marché">Finance de marché</option>
                                <option ${ specializations.includes('Banque d\'investissement') ? 'selected' : '' } value="Banque d'investissement">Banque d'investissement</option>
                                <option ${ specializations.includes('Conseil en organisation') ? 'selected' : '' } value="Conseil en organisation">Conseil en organisation</option>
                                <option ${ specializations.includes('Ingénierie Financière') ? 'selected' : '' } value="Ingénierie Financière">Ingénierie Financière</option>
                                <option ${ specializations.includes('Business Analytics') ? 'selected' : '' } value="Business Analytics">Business Analytics</option>
                                <option ${ specializations.includes('Data Science for Business') ? 'selected' : '' } value="Data Science for Business">Data Science for Business</option>
                                <option ${ specializations.includes('Stratégie IA') ? 'selected' : '' } value="Stratégie IA">Stratégie IA</option>
                                <option ${ specializations.includes('Machine Learning') ? 'selected' : '' } value="Machine Learning">Machine Learning</option>
                                <option ${ specializations.includes('Systèmes aérospatiaux') ? 'selected' : '' } value="Systèmes aérospatiaux">Systèmes aérospatiaux</option>
                                <option ${ specializations.includes('International Business') ? 'selected' : '' } value="International Business">International Business</option>
                                <option ${ specializations.includes('Entrepreneurship & Innovation') ? 'selected' : '' } value="Entrepreneurship & Innovation">Entrepreneurship & Innovation</option>
                                <option ${ specializations.includes('Marketing Management') ? 'selected' : '' } value="Marketing Management">Marketing Management</option>
                                <option ${ specializations.includes('Human Resources Management') ? 'selected' : '' } value="Human Resources Management">Human Resources Management</option>
                                <option ${ specializations.includes('Supply Chain Management') ? 'selected' : '' } value="Supply Chain Management">Supply Chain Management</option>
                                <option ${ specializations.includes('Autre spécialisation') ? 'selected' : '' } value="Autre spécialisation">Autre spécialisation</option>
                            </select>
                        `;

                        // 🔹 Initialiser KTSelect pour le nouveau select
                        const selectEl = caractDiv.querySelector('[data-kt-select="true"]');
                        KTSelect.createInstances(selectEl);
                    })
                    .catch(err => console.error("Erreur lors du chargement :", err));
            } else {
                // 🔹 Si pas d’ID, réinitialiser le sélecteur et le niveau de risque
                const radios = form.querySelectorAll('input[name="level"]');
                radios.forEach(radio => (radio.checked = radio.value === "B")); // valeur par défaut = B

                // 🔹 Si pas d'ID, vider le select
                caractDiv.innerHTML = `
                    <select
                        name="characteristics[diplomas_years][]"
                        class="kt-select"
                        multiple
                        data-kt-select="true"
                        data-kt-select-multiple="true"
                        data-kt-select-placeholder="Sélectionner les années..."
                        data-kt-select-config='{
                                "displaySeparator": ", "
                            }'
                        >
                        <option value="master:1">Master (Première année)</option>
                        <option value="master:2">Master (Deuxième année)</option>
                        <option value="master:3">Master (Troisième année)</option>
                        <option value="ingenieur:1">Ingénieur (Première année)</option>
                        <option value="ingenieur:2">Ingénieur (Deuxième année)</option>
                        <option value="mba:1">MBA (Première année)</option>
                        <option value="mba:2">MBA (Deuxième année)</option>
                    </select>
                    <select
                        name="characteristics[specializations][]"
                        class="kt-select"
                        multiple
                        data-kt-select="true"
                        data-kt-select-multiple="true"
                        data-kt-select-enable-search="true"
                        data-kt-select-search-placeholder="Rechercher une filière..."
                        data-kt-select-placeholder="Sélectionner les filières..."
                        data-kt-select-config='{
                                "displaySeparator": ", "
                            }'
                        >
                        <option value="Finance d'entreprise">Finance d'entreprise</option>
                        <option value="Management Stratégique">Management Stratégique</option>
                        <option value="Sécurité des systèmes d'information">Sécurité des systèmes d'information</option>
                        <option value="Cyberdéfense">Cyberdéfense</option>
                        <option value="Énergies durables">Énergies durables</option>
                        <option value="Ingénierie nucléaire">Ingénierie nucléaire</option>
                        <option value="Systèmes aérospatiaux">Systèmes aérospatiaux</option>
                        <option value="Finance de marché">Finance de marché</option>
                        <option value="Banque d'investissement">Banque d'investissement</option>
                        <option value="Conseil en organisation">Conseil en organisation</option>
                        <option value="Ingénierie Financière">Ingénierie Financière</option>
                        <option value="Business Analytics">Business Analytics</option>
                        <option value="Data Science for Business">Data Science for Business</option>
                        <option value="Stratégie IA">Stratégie IA</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Systèmes aérospatiaux">Systèmes aérospatiaux</option>
                        <option value="International Business">International Business</option>
                        <option value="Entrepreneurship & Innovation">Entrepreneurship & Innovation</option>
                        <option value="Marketing Management">Marketing Management</option>
                        <option value="Human Resources Management">Human Resources Management</option>
                        <option value="Supply Chain Management">Supply Chain Management</option>
                        <option value="Autre spécialisation">Autre spécialisation</option>
                    </select>
                `;
                const selectEl = caractDiv.querySelector('[data-kt-select="true"]');
                KTSelect.createInstances(selectEl);
            }

            // 🔹 Afficher le modal
            modal.show();
        }

        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.")) {
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
                exportBtn.href = `/admin/export/taux_interets/${value}`;

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
