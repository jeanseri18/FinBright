<!DOCTYPE html>
<!--
Author: DIGIT'comm - Moussa Fofana
Product Name: IntraWeb BDU-CI
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
                    <h3 class="kt-modal-title px-5">Simulateur de prêt</h3>
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

                        <div class="flex flex-col px-5 gap-1">
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
                        </div>

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="amount" class="text-mono font-semibold text-sm">
                                    Montant (€)
                                </label>
                            </div>
                            <label class="kt-input">
                                <input type="number" id="amount" name="amount" required min="500">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-1">
                            <div class="flex flex-center">
                                <label for="duration" class="text-mono font-semibold text-sm">
                                    Durée (mois)
                                </label>
                            </div>
                            <label class="kt-input">
                                <input type="number" id="duration" name="duration" required min="6" max="60">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-1 deferred_div">
                            <label for="deferred" class="flex items-center gap-5">
                                <span class="flex items-center gap-1">
                                    Différé partiel (étudiants)
                                    <i class="ki-filled ki-information-2 text-muted-foreground text-sm"></i>
                                </span>
                                <input type="checkbox" id="deferred" name="deferred" value="1" 
                                    class="kt-switch kt-switch-sm ml-2"
                                    onchange="document.querySelector('input[name=deferred_months]').disabled = !this.checked; document.querySelector('input[name=deferred_months]').value = ''">
                            </label>
                        </div>

                        <div class="flex flex-col px-5 gap-1 deferred_div">
                            <div class="flex flex-center">
                                <label for="deferred_months" class="text-mono font-semibold text-sm">
                                    Durée différé (mois)
                                </label>
                            </div>
                            <label class="kt-input">
                                <input type="number" name="deferred_months" min="0" max="36" disabled>
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
                <div class="kt-modal-body space-y-4">
                </div>
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
                            <form action="{{ route('emprunteur.demande') }}" method="post" class="space-y-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="type" value="${data.inputs.type}">
                                <input type="hidden" name="amount" value="${data.inputs.amount}">
                                <input type="hidden" name="duration" value="${data.inputs.duration}">
                                <input type="hidden" name="deferred" value="${data.inputs.deferred}">
                                <input type="hidden" name="" value="${data.inputs.deferred_months}">
                                <div class="rounded-lg bg-muted w-full grow grid md:grid-cols-2 gap-4 p-5">
                                    <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                        <span>Montant :</span> <strong class="text-xl">${data.amount} €</strong>
                                    </div>
                                    <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                        <span>Durée :</span> <strong class="text-xl">${data.duration} mois</strong>
                                    </div>
                                    <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                        <span>Mensualité estimée :</span> <strong class="text-xl">${data.mensualite} €</strong>
                                    </div>
                                    <div class="md:col-span-1 rounded-lg bg-white flex flex-col justify-center gap-1 p-3">
                                        <span>Montant total remboursé :</span> <strong class="text-xl">${data.total} €</strong>
                                    </div>
                                </div>
                                <div class="flex justify-end gap-4 pt-4">
                                    <button type="button" class="kt-btn kt-btn-secondary" data-kt-modal-dismiss="#modal_simulate_result">
                                        Fermer
                                    </button>
                                    <button class="kt-btn" type="submit">Soumettre la demande</button>
                                </div>
                            </form>
                        `;
                        modal.show();
                    } else {
                        alert(data.message || "Une erreur s'est produite.");
                    }
                });
            });
        </script>
    </body>
</html>
