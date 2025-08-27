<x-guest-layout>
    <div class="kt-card max-w-xl w-full">
        <form class="kt-card-content flex flex-col gap-5 p-10" id="sign_up_form" method="POST" action="{{ route('register.emprunteur.submit') }}">
            <div class="text-center mb-2.5">
                <h3 class="text-lg font-medium text-mono leading-none mb-2.5">Inscription Emprunteur</h3>
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

            <!-- Step 1: Eligibility Questions -->
            <div id="eligibility-step" class="flex flex-col gap-5">
                <div class="flex flex-col gap-3">
                    <x-input-label :value="__('1. Êtes-vous actuellement étudiant(e) et inscrit(e) dans un établissement d\'enseignement supérieur en France (Grande École, Université)?')" class="kt-form-label text-mono" />
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_student" value="yes" class="form-radio text-primary-600 eligibility-question">
                            <span class="ml-2 text-sm text-gray-700">Oui</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_student" value="no" class="form-radio text-primary-600 eligibility-question">
                            <span class="ml-2 text-sm text-gray-700">Non</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <x-input-label :value="__('2. Êtes-vous majeur(e) (18 ans ou plus)?')" class="kt-form-label text-mono" />
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_adult" value="yes" class="form-radio text-primary-600 eligibility-question">
                            <span class="ml-2 text-sm text-gray-700">Oui</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_adult" value="no" class="form-radio text-primary-600 eligibility-question">
                            <span class="ml-2 text-sm text-gray-700">Non</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <x-input-label :value="__('3. Résidez-vous fiscalement en France?')" class="kt-form-label text-mono" />
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_resident" value="yes" class="form-radio text-primary-600 eligibility-question">
                            <span class="ml-2 text-sm text-gray-700">Oui</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_resident" value="no" class="form-radio text-primary-600 eligibility-question">
                            <span class="ml-2 text-sm text-gray-700">Non</span>
                        </label>
                    </div>
                </div>

                <!-- Eligibility Message -->
                <div id="eligibility-message" class="hidden p-4 rounded-md text-sm" style="background-color: #ffe0b2; color: #e65100;">
                    <p class="font-semibold">Critères non remplis.</p>
                    <p>Le prêt étudiant Fin'Bright est actuellement réservé aux étudiants majeurs inscrits dans un établissement d'enseignement supérieur en France et résidant fiscalement en France.</p>
                </div>
            </div>

            <!-- Step 2: Registration Fields (Initially hidden) -->
            <div id="registration-step" class="flex flex-col gap-5 hidden">
                <!-- Name -->
                <div class="grid md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-1">
                        <x-input-label for="first_name" :value="__('Prénoms')" class="kt-form-label text-mono" />
                        <x-text-input id="first_name" class="kt-input" type="text" name="first_name" :value="old('first_name')" required autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <x-input-label for="last_name" :value="__('Nom')" class="kt-form-label text-mono" />
                        <x-text-input id="last_name" class="kt-input" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
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
                    {{ __("S'inscrire") }}
                </x-primary-button>
            </div>
        </form>
    </div>

    @section('javascripts')
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const eligibilityStep = document.getElementById('eligibility-step');
                const registrationStep = document.getElementById('registration-step');
                const eligibilityMessage = document.getElementById('eligibility-message');
                const eligibilityQuestions = document.querySelectorAll('.eligibility-question');
                const passwordInput = document.getElementById('password');
                const strengthLength = document.getElementById('strength-length');
                const strengthUppercase = document.getElementById('strength-uppercase');
                const strengthNumber = document.getElementById('strength-number');
                const strengthSymbol = document.getElementById('strength-symbol');

                registrationStep.classList.add('hidden');
                eligibilityMessage.classList.add('hidden');

                function checkEligibility() {
                    const answers = Array.from(eligibilityQuestions)
                        .filter(q => q.checked)
                        .map(q => q.value);

                    const allYes = answers.length === 3 && answers.every(val => val === 'yes');
                    const anyNo = answers.includes('no');

                    if (allYes) {
                        eligibilityStep.classList.add('hidden');
                        eligibilityMessage.classList.add('hidden');
                        registrationStep.classList.remove('hidden');
                    } else {
                        registrationStep.classList.add('hidden');
                        eligibilityStep.classList.remove('hidden');

                        // Affiche seulement si au moins un "Non" est coché
                        if (anyNo) {
                            eligibilityMessage.classList.remove('hidden');
                        } else {
                            eligibilityMessage.classList.add('hidden');
                        }
                    }
                }

                eligibilityQuestions.forEach(question => {
                    question.addEventListener('change', checkEligibility);
                });

                function updatePasswordStrength() {
                    const password = passwordInput.value;
                    const hasLength = password.length >= 8;
                    const hasUppercase = /[A-Z]/.test(password);
                    const hasNumber = /[0-9]/.test(password);
                    const hasSymbol = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

                    const indicators = [
                        { condition: hasLength, element: strengthLength },
                        { condition: hasUppercase, element: strengthUppercase },
                        { condition: hasNumber, element: strengthNumber },
                        { condition: hasSymbol, element: strengthSymbol }
                    ];

                    indicators.forEach(({ condition, element }) => {
                        element.classList.toggle('bg-green-500', condition);
                        element.classList.toggle('bg-gray-200', !condition);
                    });
                }

                if (passwordInput) {
                    passwordInput.addEventListener('input', updatePasswordStrength);
                }

                checkEligibility();
            });
        </script>
    @endsection
</x-guest-layout>
