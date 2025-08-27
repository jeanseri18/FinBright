<x-guest-layout>
    <div class="kt-card max-w-xl w-full">
        <form class="kt-card-content flex flex-col gap-5 p-10" id="sign_up_form" method="POST" action="{{ route('register.investisseur.submit') }}">
            <div class="text-center mb-2.5">
                <h3 class="text-lg font-medium text-mono leading-none mb-2.5">Inscription Investisseur</h3>
                <div class="flex flex-wrap items-center justify-center font-medium">
                    <span class="text-sm text-secondary-foreground me-1.5">
                        Tu as déjà un compte ?
                    </span>
                    <a class="text-sm link" href="{{ route('login') }}">
                        Connecte-toi
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2.5">
                <a class="kt-btn kt-btn-outline justify-center" href="#">
                    <img alt="Google logo" class="size-3.5 shrink-0" src="{{asset('assets/media/brand-logos/google.svg')}}"/>
                    Google
                </a>
                <a class="kt-btn kt-btn-outline justify-center" href="#">
                    <img alt="Apple logo black" class="size-3.5 shrink-0 dark:hidden" src="{{asset('assets/media/brand-logos/apple-black.svg')}}"/>
                    <img alt="Apple logo white" class="size-3.5 shrink-0 light:hidden" src="{{asset('assets/media/brand-logos/apple-white.svg')}}"/>
                    Apple
                </a>
            </div>
            <div class="flex items-center gap-2">
                <span class="border-t border-border w-full"></span>
                <span class="text-xs text-muted-foreground font-medium uppercase">
                    Ou
                </span>
                <span class="border-t border-border w-full"></span>
            </div>
            @csrf

            <div id="registration-step" class="flex flex-col gap-5">
                <!-- Type de prêteur -->
                <div class="flex flex-col gap-1">
                    <div class="flex flex-center">
                        <label for="type" class="text-mono font-semibold text-sm">
                            Type de prêteur
                        </label>
                    </div>
                    <select name="type_of_lender" id="type" class="kt-select"
                        data-kt-select="true"
                        data-kt-select-placeholder="Sélectionner votre type..."
                        data-kt-select-config='{
                            "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                        }'
                    >
                        <option value="Personne physique" selected>Particulier</option>
                        <option value="Personne morale">Association ou Fondation</option>
                    </select>
                </div>

                <!-- Noms et prénoms -->
                <div class="grid md:grid-cols-2 gap-5 section-physique">
                    <div class="flex flex-col gap-1">
                        <x-input-label for="first_name" :value="__('Prénoms')" class="kt-form-label text-mono" />
                        <x-text-input id="first_name" class="kt-input" type="text" name="first_name" :value="old('first_name')" autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <x-input-label for="last_name" :value="__('Nom')" class="kt-form-label text-mono" />
                        <x-text-input id="last_name" class="kt-input" type="text" name="last_name" :value="old('last_name')" autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>

                <!-- Dénomination sociale -->
                <div class="flex flex-col gap-1 section-morale" style="display: none;">
                    <x-input-label for="denomination_sociale" :value="__('Dénomination sociale')" class="kt-form-label text-mono" />
                    <x-text-input id="denomination_sociale" class="kt-input" type="text" name="denomination_sociale" :value="old('denomination_sociale')" autocomplete="" />
                    <x-input-error :messages="$errors->get('denomination_sociale')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="flex flex-col gap-1">
                    <x-input-label for="email" :value="__('Email')" class="kt-form-label text-mono" />
                    <x-text-input id="email" class="kt-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-1">
                    <x-input-label for="password" :value="__('Mot de passe')" class="kt-form-label font-normal text-mono" />
                    <div class="kt-input" data-kt-toggle-password="true">
                        <x-text-input id="password" class="kt-input"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                        <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true" type="button">
                            <span class="kt-toggle-password-active:hidden">
                                <i class="ki-filled ki-eye text-muted-foreground"></i>
                            </span>
                            <span class="hidden kt-toggle-password-active:block">
                                <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                            </span>
                        </button>
                    </div>
                    <!-- Password Strength Indicator -->
                    <div id="password-strength-indicator" class="flex items-center my-1">
                        <span id="strength-length" class="flex-grow bg-gray-200 rounded h-1 me-2"></span>
                        <span id="strength-uppercase" class="flex-grow bg-gray-200 rounded h-1 me-2"></span>
                        <span id="strength-number" class="flex-grow bg-gray-200 rounded h-1 me-2"></span>
                        <span id="strength-symbol" class="flex-grow bg-gray-200 rounded h-1 me-2"></span>
                    </div>
                    <p class="text-xs text-gray-500">Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.</p>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="flex flex-col gap-1">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="kt-form-label font-normal text-mono" />
                    <div class="kt-input" data-kt-toggle-password="true">
                        <x-text-input id="password_confirmation" class="kt-input"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                        <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true" type="button">
                            <span class="kt-toggle-password-active:hidden">
                                <i class="ki-filled ki-eye text-muted-foreground"></i>
                            </span>
                            <span class="hidden kt-toggle-password-active:block">
                                <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                            </span>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <label class="kt-checkbox-group flex items-center gap-3">
                    <input class="kt-checkbox kt-checkbox-sm" name="check" type="checkbox" value="1" required/>
                    <span class="kt-checkbox-label">
                        J'ai lu et j'accepte les 
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="{{route('terms-of-use')}}" target="_blank">
                            Termes &amp; Conditions générales
                        </a>
                    </span>
                </label>
                <x-primary-button class="kt-btn kt-btn-primary flex justify-center grow">
                    {{ __("Créer mon compte") }}
                </x-primary-button>
            </div>
        </form>
    </div>

    @section('javascripts')
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const strengthLength = document.getElementById('strength-length');
                const strengthUppercase = document.getElementById('strength-uppercase');
                const strengthNumber = document.getElementById('strength-number');
                const strengthSymbol = document.getElementById('strength-symbol');

                // Function to update password strength indicator
                function updatePasswordStrength() {
                    const password = passwordInput.value;
                    const hasLength = password.length >= 8;
                    const hasUppercase = /[A-Z]/.test(password);
                    const hasNumber = /[0-9]/.test(password);
                    const hasSymbol = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

                    // Update length indicator
                    if (hasLength) {
                        strengthLength.classList.remove('bg-gray-200');
                        strengthLength.classList.add('bg-green-500');
                    } else {
                        strengthLength.classList.remove('bg-green-500');
                        strengthLength.classList.add('bg-gray-200');
                    }

                    // Update uppercase indicator
                    if (hasUppercase) {
                        strengthUppercase.classList.remove('bg-gray-200');
                        strengthUppercase.classList.add('bg-green-500');
                    } else {
                        strengthUppercase.classList.remove('bg-green-500');
                        strengthUppercase.classList.add('bg-gray-200');
                    }

                    // Update number indicator
                    if (hasNumber) {
                        strengthNumber.classList.remove('bg-gray-200');
                        strengthNumber.classList.add('bg-green-500');
                    } else {
                        strengthNumber.classList.remove('bg-green-500');
                        strengthNumber.classList.add('bg-gray-200');
                    }

                    // Update symbol indicator
                    if (hasSymbol) {
                        strengthSymbol.classList.remove('bg-gray-200');
                        strengthSymbol.classList.add('bg-green-500');
                    } else {
                        strengthSymbol.classList.remove('bg-green-500');
                        strengthSymbol.classList.add('bg-gray-200');
                    }
                }

                // Add event listener to password input
                if (passwordInput) {
                    passwordInput.addEventListener('input', updatePasswordStrength);
                }

                const select = document.getElementById('type');
                const physique = document.querySelector('.section-physique');
                const morale = document.querySelector('.section-morale');

                function toggleSections() {
                    if (select.value === 'Personne physique') {
                        physique.style.display = 'grid';
                        morale.style.display = 'none';
                    } else {
                        physique.style.display = 'none';
                        morale.style.display = 'flex';
                    }
                }

                // État initial
                toggleSections();

                // Sur changement
                select.addEventListener('change', toggleSections);
            });
        </script>
    @endsection
</x-guest-layout>
