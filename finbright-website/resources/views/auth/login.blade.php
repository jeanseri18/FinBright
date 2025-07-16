<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="kt-card-content flex flex-col gap-5 p-10" id="sign_in_form" method="POST" action="{{ route('login') }}">
        <div class="text-center mb-2.5">
            <h3 class="text-lg font-medium text-mono leading-none mb-2.5">Connexion</h3>
            <div class="flex items-center justify-center font-medium">
                <span class="text-sm text-secondary-foreground me-1.5">
                    Besoin d'un compte ?
                </span>
                <a class="text-sm link" href="">
                    Inscris toi
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

        <!-- Email Address -->
        <div class="flex flex-col gap-1">
            <x-input-label for="email" class="kt-form-label font-normal text-mono" :value="__('Adresse Email')" />
            <x-text-input id="email" class="kt-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between gap-1">
                <x-input-label for="password" class="kt-form-label font-normal text-mono" :value="__('Mot de passe')" />
                @if (Route::has('password.request'))
                    <a class="text-sm kt-link shrink-0" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>
            <div class="kt-input" data-kt-toggle-password="true">
                <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true" type="button">
                    <span class="kt-toggle-password-active:hidden">
                        <i class="ki-filled ki-eye text-muted-foreground"></i>
                    </span>
                    <span class="hidden kt-toggle-password-active:block">
                        <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                    </span>
                </button>
            </div>
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="kt-label">
            <input id="remember_me" type="checkbox" class="kt-checkbox kt-checkbox-sm" name="remember">
            <span class="kt-checkbox-label">{{ __('Se souvenir de moi') }}</span>
        </label>

        <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
            {{ __('Se connecter') }}
        </button>
    </form>

    @section('javascripts')
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
        <!-- <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script> -->
    @endsection

</x-guest-layout>
