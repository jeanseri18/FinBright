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
                    <img alt="" class="size-3.5 shrink-0" src="{{asset('assets/media/brand-logos/google.svg')}}"/>
                    Google
                </a>
                <a class="kt-btn kt-btn-outline justify-center" href="#">
                    <img alt="" class="size-3.5 shrink-0 dark:hidden" src="{{asset('assets/media/brand-logos/apple-black.svg')}}"/>
                    <img alt="" class="size-3.5 shrink-0 light:hidden" src="{{asset('assets/media/brand-logos/apple-white.svg')}}"/>
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

            <!-- Name -->
            <div class="grid md:grid-cols-2 gap-5">
                <div class="flex flex-col gap-1">
                    <x-input-label for="prenoms" :value="__('Prénoms')" class="kt-form-label text-mono" />
                    <x-text-input id="prenoms" class="kt-input" type="text" name="nom" :value="old('prenoms')" required autofocus autocomplete="prenoms" />
                    <x-input-error :messages="$errors->get('prenoms')" class="mt-2" />
                </div>
                <div class="flex flex-col gap-1">
                    <x-input-label for="nom" :value="__('Nom')" class="kt-form-label text-mono" />
                    <x-text-input id="nom" class="kt-input" type="text" name="prenoms" :value="old('nom')" required autofocus autocomplete="nom" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
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
                <input class="kt-checkbox kt-checkbox-sm" name="check" type="checkbox" value="1"/>
                <span class="kt-checkbox-label">
                    J'ai lu et j'accepte les 
                    <a class="text-sm link" href="#">
                        Termes &amp; Conditions générales
                    </a>
                </span>
            </label>
            <x-primary-button class="kt-btn kt-btn-primary flex justify-center grow">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </form>
    </div>

    @section('javascripts')
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
        <!-- <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script> -->
    @endsection

</x-guest-layout>
