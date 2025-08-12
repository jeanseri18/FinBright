<!DOCTYPE html>
<!--
Author: DIGIT'comm - Moussa Fofana
Product Name: Fin'Bright
Website: https://digitcommunication.ci/
Email: 
Contact: 
-->
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="DIGIT'comm : Moussa Fofana" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description"/>

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
        <title>@yield('title', ' | Emprunteur Backoffice')</title>

        <!-- Favicons -->
        <link href="{{asset('assets/media/app/apple-touch-icon.png')}}" rel="apple-touch-icon" sizes="180x180"/>
        <link href="{{asset('assets/media/app/favicon-32x32.png')}}" rel="icon" sizes="32x32" type="image/png"/>
        <link href="{{asset('assets/media/app/favicon-16x16.png')}}" rel="icon" sizes="16x16" type="image/png"/>
        <link href="{{asset('assets/media/app/favicon.ico')}}" rel="shortcut icon"/>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
        
        <link href="{{asset('assets/vendors/apexcharts/apexcharts.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/vendors/keenicons/styles.bundle.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased flex h-full text-base text-foreground bg-background [--header-height-default:100px] data-kt-[sticky-header=on]:[--header-height:60px] [--header-height:var(--header-height-default)]">
        <!-- Theme Mode -->
        <script>
            const defaultThemeMode = 'light'; // light|dark|system
			let themeMode;

			if (document.documentElement) {
				if (localStorage.getItem('kt-theme')) {
					themeMode = localStorage.getItem('kt-theme');
				} else if (
					document.documentElement.hasAttribute('data-kt-theme-mode')
				) {
					themeMode =
						document.documentElement.getAttribute('data-kt-theme-mode');
				} else {
					themeMode = defaultThemeMode;
				}

				if (themeMode === 'system') {
					themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches
						? 'dark'
						: 'light';
				}

				document.documentElement.classList.add(themeMode);
			}
        </script>
        <!-- End of Theme Mode -->
        <!-- Page -->
        <!-- Main -->
        <div class="flex grow flex-col in-data-kt-[sticky-header=on]:pt-(--header-height-default)">
            <!-- Header -->
            @include('back.emprunteur._navigation')

            <!-- Content -->
            <main class="grow" id="content" role="content">
                @yield('content')
            </main>
            <!-- End of Content -->

            <!-- Footer -->
            @include('back.emprunteur._footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Main -->
        
        <div class="kt-modal" data-kt-modal="true" id="modal_simulate">
            <div class="kt-modal-content max-w-xl top-[10%]">
                <div class="kt-modal-header">
                    <div class="px-5">
                        <h3 class="kt-modal-title">Simulateur de prêt</h3>
                        <span class="kt-form-description">
                            <i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>
                            Cette simulation ne vaut pas contrat de prêt.
                        </span>
                    </div>
                    <button
                    type="button"
                    class="kt-modal-close"
                    aria-label="Close modal"
                    data-kt-modal-dismiss="#modal_one"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-x"
                        aria-hidden="true"
                    >
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    </button>
                </div>
                <div class="kt-modal-body">
                    <form id="modal_simulate_form" class="space-y-4">
                        @csrf

                        {{-- <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="type" class="text-mono font-semibold text-sm">
                                    Type de prêt
                                </label>
                            </div>
                            <select name="type" id="type"
                                class="kt-select"
                                data-kt-select="true"
                                data-kt-select-placeholder="Sélectionner un type..."
                                data-kt-select-config='{
                                    "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                }'
                                onchange="document.querySelectorAll('.deferred_div').forEach(el => el.style.display = (this.value === 'student') ? 'flex' : 'none')"
                                >
                                <option value="student" checked="">Prêt étudiant</option>
                                <option value="mini">Mini-prêt</option>
                            </select>
                        </div> --}}

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="type" class="text-mono font-semibold text-sm">
                                    Date de début
                                </label>
                            </div>
                            <div class="flex flex-wrap md:flex-nowrap justify-between gap-2.5">
                                <select name="date_mois" id="mois"
                                    class="kt-select"
                                    data-kt-select="true"
                                    data-kt-select-placeholder="Sélectionner un mois"
                                    data-kt-select-config='{
                                        "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                    }'
                                    >
                                    <option>Janvier</option>
                                    <option>Février</option>
                                    <option>Mars</option>
                                    <option>Avril</option>
                                    <option>Mai</option>
                                    <option>Juin</option>
                                    <option>Juillet</option>
                                    <option>Aout</option>
                                    <option>Septembre</option>
                                    <option>Octobre</option>
                                    <option>Novembre</option>
                                    <option>Décembre</option>
                                </select>
                                <select name="date_annee" id="annee"
                                    class="kt-select"
                                    data-kt-select="true"
                                    data-kt-select-placeholder="Sélectionner une année"
                                    data-kt-select-config='{
                                        "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                    }'
                                    >
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                    <option>2032</option>
                                    <option>2033</option>
                                    <option>2034</option>
                                    <option>2035</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="amount" class="text-mono font-semibold text-sm">
                                    Montant du prêt (€) :
                                </label>
                            </div>
                            <label class="kt-input">
                                <input type="number" id="amount" name="amount" required min="500" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="duration" class="text-mono font-semibold text-sm">
                                    Durée (mois)
                                </label>
                            </div>
                            <label class="kt-input">
                                <input type="number" id="duration" name="duration" required min="19" max="60" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="taux_interet" class="text-mono font-semibold text-sm">
                                    Taux d'intérêt
                                </label>
                            </div>
                            <select name="taux_interet" id="taux_interet"
                                class="kt-select"
                                data-kt-select="true"
                                data-kt-select-placeholder="Sélectionner un taux"
                                data-kt-select-config='{
                                    "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                }'
                                >
                                <option value="3">3%</option>
                                <option value="4">4%</option>
                            </select>
                        </div>

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="taux_assurance" class="text-mono font-semibold text-sm">
                                    Taux d'assurance
                                </label>
                            </div>
                            <select name="taux_assurance" id="taux_assurance"
                                class="kt-select"
                                data-kt-select="true"
                                data-kt-select-placeholder="Sélectionner un taux"
                                data-kt-select-config='{
                                    "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                }'
                                >
                                <option value="1">1%</option>
                            </select>
                        </div>

                        <div class="flex flex-col px-5 gap-1 deferred_div">
                            <label for="deferred" class="flex items-center gap-5">
                                <span class="flex items-center gap-1" data-kt-tooltip="true" data-kt-tooltip-placement="top-end">
                                    Différé partiel (étudiants)
                                    <i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>
                                    <span data-kt-tooltip-content="true" class="kt-tooltip">
                                        <span class="flex items-center gap-1.5"><i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>Avec paiement des intérêts</span>
                                    </span>
                                </span>
                                <input type="checkbox" id="deferred" name="deferred" value="1" 
                                    class="kt-switch kt-switch-sm ml-2"
                                    onchange="document.querySelector('input[name=deferred_months]').disabled = !this.checked; document.querySelector('input[name=deferred_months]').value = ''">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-1 deferred_div">
                            <div class="flex flex-center">
                                <label for="deferred_months" class="text-mono font-semibold text-sm">
                                    Durée du différé (mois) :
                                </label>
                            </div>
                            <label class="kt-input">
                                <input type="number" name="deferred_months" min="0" max="36" disabled onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-4 pt-4">
                            <button type="submit" class="kt-btn">
                                Lancer la simulation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="kt-modal kt-modal-center" data-kt-modal="true" id="modal_simulate_result">
            <div class="kt-modal-content max-w-xl">
                <div class="kt-modal-header">
                    <h3 class="kt-modal-title">Résultat de la simulation</h3>
                    <button
                    type="button"
                    class="kt-modal-close"
                    aria-label="Close modal"
                    data-kt-modal-dismiss="#modal_two"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    </button>
                </div>
                <div class="kt-modal-body space-y-4">
                </div>
            </div>
        </div>
        <div class="kt-modal kt-modal-center" data-kt-modal="true" id="modal_debt_check">
            <div class="kt-modal-content max-w-xl">
                <div class="kt-modal-header">
                    <h3 class="kt-modal-title">Évaluation du taux d’endettement</h3>
                    <button type="button" class="kt-modal-close" aria-label="Close modal" data-kt-modal-dismiss="#modal_debt_check">
                        <!-- Icône close -->
                    </button>
                </div>
                <form action="{{ route('emprunteur.create.demande') }}" method="POST" id="form_debt_check" class="kt-modal-body space-y-4">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <label class="kt-label grid md:grid-cols-2">
                            <span class="">Revenus actuels mensuels (€)</span>
                            <input type="number" name="revenus_actuels" class="kt-input" value="0" required onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                        </label>

                        <label class="kt-label grid md:grid-cols-2">
                            <span class="">Revenus potentiel après diplôme (€)</span>
                            <input type="number" name="revenus_futurs" class="kt-input" value="0" required onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                        </label>

                        <label class="kt-label grid md:grid-cols-2">
                            <span class="">Soutien ou garant ? (Montant mensuel d’aide éventuelle)</span>
                            <input type="number" name="garant" class="kt-input" value="0" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                        </label>

                        <label class="kt-label grid md:grid-cols-2">
                            <span class="">Autres dettes en cours (€ / mois)</span>
                            <input type="number" name="dettes" class="kt-input" value="0" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                        </label>

                        <label class="kt-label grid md:grid-cols-2">
                            <span class="">Autres charges (€ / mois)</span>
                            <input type="number" name="charges" class="kt-input" value="0" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57">
                        </label>
                    </div>

                    <div class="flex justify-end gap-4 pt-4">
                        <button type="button" class="kt-btn kt-btn-secondary" data-kt-modal-dismiss="#modal_debt_check">
                            Annuler
                        </button>
                        <button id="check_debt" class="kt-btn" type="button">Vérifier</button>
                        <button id="submit_demand" class="kt-btn hidden" type="submit">Soumettre la demande</button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('assets/js/core.bundle.js') }}"></script>
        <script src="{{ asset('assets/vendors/ktui/ktui.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>

        @yield('javascripts')
        <!-- End of Scripts -->

        <script>
            document.getElementById('modal_simulate_form').addEventListener('submit', function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                fetch("{{ route('emprunteur.simuler') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        const modalSimulate = document.querySelector('#modal_simulate_result');
                        const modal = KTModal.getInstance(modalSimulate);
                        
                        modalSimulate.querySelector('.kt-modal-body').innerHTML = `
                            <div class="rounded-lg bg-muted w-full grow grid md:grid-cols-2 gap-4 p-5">
                                <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                    <span>Montant :</span> <strong class="text-xl">${data.amount} €</strong>
                                </div>
                                <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                    <span>Durée :</span> <strong class="text-xl">${data.duration} mois</strong>
                                </div>
                                <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                    <span>Coût des intérêts :</span> <strong class="text-xl text-warning">${data.interets} €</strong>
                                </div>
                                <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                    <span>Coût de l'assurance :</span> <strong class="text-xl text-warning">${data.assurances} €</strong>
                                </div>
                                <div class="md:col-span-2 rounded-lg bg-white flex flex-col justify-center items-center gap-1 p-3">
                                    <span>Coût total du prêt :</span> <strong class="text-2xl text-primary">${(data.total + data.amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} €</strong>
                                </div>
                            </div>

                            <div class="flex justify-end gap-4 pt-4">
                                <button type="button" class="kt-btn kt-btn-secondary" data-kt-modal-dismiss="#modal_simulate_result">
                                    Fermer
                                </button>
                                <button class="kt-btn" id="btn_show_debt_check" type="button">Évaluer votre taux d'endettement</button>
                            </div>
                        `;
                        modal.show();

                        document.getElementById('btn_show_debt_check').addEventListener('click', function () {
                        const formDebt = document.getElementById('form_debt_check');

                        // Nettoyage des anciens champs cachés
                        // formDebt.querySelectorAll('input[type=hidden]').forEach(el => el.remove());

                        // const fields = {
                        //     '_token': document.querySelector('input[name=_token]').value,
                        //     'amount': data.inputs.amount,
                        //     'duration': data.inputs.duration,
                        //     'interets': data.interets,
                        //     'assurances': data.assurances,
                        //     'deferred': data.inputs.deferred ?? 0,
                        //     'deferred_months': data.inputs.deferred_months ?? 0,
                        // };

                        // for (const [name, value] of Object.entries(fields)) {
                        //     const input = document.createElement('input');
                        //     input.type = 'hidden';
                        //     input.name = name;
                        //     input.value = value;
                        //     formDebt.appendChild(input);
                        // }

                        // Afficher le modal
                        KTModal.getInstance(document.querySelector('#modal_debt_check')).show();
                    });
                    } else {
                        alert(data.message || "Une erreur s'est produite.");
                    }
                });
            });

            document.getElementById('check_debt').addEventListener('click', function (e) {
                const form = document.getElementById('form_debt_check');
                const revenusActuels = parseFloat(form.revenus_actuels.value || 0);
                const revenusFuturs = parseFloat(form.revenus_futurs.value || 0);
                const garant = parseFloat(form.garant.value || 0);
                const dettes = parseFloat(form.dettes.value || 0);
                const charges = parseFloat(form.charges.value || 0);
                const submitBtn = document.getElementById('submit_demand');

                const revenusTotaux = revenusActuels + revenusFuturs + garant;
                const depensesTotaux = dettes + charges;
                const tauxEndettement = revenusTotaux > 0 ? (depensesTotaux / revenusTotaux) * 100 : 100;

                // Supprimer une ancienne alerte
                const oldAlert = form.querySelector('.kt-alert');
                if (oldAlert) oldAlert.remove();

                // Créer une nouvelle alerte
                const alertContainer = document.createElement('div');
                alertContainer.className = `kt-alert kt-alert-light ${tauxEndettement > 33 ? 'kt-alert-danger' : 'kt-alert-success'} mt-2`;
                alertContainer.innerHTML = `
                    <div class="kt-alert-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="lucide lucide-info" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16v-4"></path>
                            <path d="M12 8h.01"></path>
                        </svg>
                    </div>
                    <div class="kt-alert-title">
                        ${tauxEndettement > 33
                            ? `⚠️ Taux d’endettement trop élevé : ${tauxEndettement.toFixed(2)} %. Vous ne pouvez donc pas soumettre une demande de prêt.`
                            : `✅ Taux d’endettement acceptable : ${tauxEndettement.toFixed(2)} %.`}
                    </div>
                `;

                // Insérer au-dessus du bouton
                form.querySelector('.flex.justify-end').before(alertContainer);

                // Gérer le bouton de soumission conditionnel
                if (tauxEndettement <= 33) {
                    submitBtn.classList.remove('hidden');

                    // Ajouter taux_endettement dans un input hidden si pas déjà là
                    let tauxInput = form.querySelector('input[name="taux_endettement"]');
                    if (!tauxInput) {
                        tauxInput = document.createElement('input');
                        tauxInput.type = 'hidden';
                        tauxInput.name = 'taux_endettement';
                        form.appendChild(tauxInput);
                    }
                    tauxInput.value = tauxEndettement.toFixed(2);
                    tauxAcceptable = true;
                } else {
                    submitBtn.classList.add('hidden');

                    // Supprimer le champ caché s’il existe
                    const hidden = form.querySelector('input[name="taux_endettement"]');
                    if (hidden) hidden.remove();
                }
            });
            document.querySelector('[data-kt-modal-dismiss="#modal_debt_check"]').addEventListener('click', () => {
                const form = document.getElementById('form_debt_check');
                form.reset();
                form.querySelectorAll('.kt-alert').forEach(alert => alert.remove());
                document.getElementById('submit_demand').classList.add('hidden');
            });
        </script>
    </body>
</html>
