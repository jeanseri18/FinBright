<x-guest-layout>
    <div class="kt-card max-w-[370px] w-full">
        <form method="POST" action="{{ route('password.store') }}" class="kt-card-content flex flex-col gap-5 p-10" id="reset_password_change_password_form">
            @csrf
            <div class="text-center">
                <h3 class="text-lg font-medium text-mono">Réinitialiser le mot de passe</h3>
                <span class="text-sm text-secondary-foreground">Entrez votre nouveau mot de passe</span>
            </div>
            
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <x-text-input type="hidden" name="email" :value="old('email', $request->email)" required="username" />

            <!-- Password -->
            <div class="flex flex-col gap-1">
                <x-input-label for="password" :value="__('Nouveau mot de passe')" class="kt-form-label text-mono" />
                <label class="kt-input" data-kt-toggle-password="true">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true">
                        <span class="kt-toggle-password-active:hidden">
                            <i class="ki-filled ki-eye text-muted-foreground"></i>
                        </span>
                        <span class="hidden kt-toggle-password-active:block">
                            <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                        </span>
                    </div>
                </label>
            </div>
            <!-- Confirm Password -->
            <div class="flex flex-col gap-1">
                <x-input-label for="password_confirmation" :value="__('Confirmer le nouveau mot de passe')" class="kt-form-label font-normal text-mono" />
                <label class="kt-input" data-kt-toggle-password="true">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <div class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true">
                        <span class="kt-toggle-password-active:hidden">
                            <i class="ki-filled ki-eye text-muted-foreground"></i>
                        </span>
                        <span class="hidden kt-toggle-password-active:block">
                            <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                        </span>
                    </div>
                </label>
            </div>
            <x-primary-button class="kt-btn kt-btn-primary flex justify-center grow">
                {{ __('Réinitialiser') }}
            </x-primary-button>
        </form>
    </div>

    @section('javascripts')
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
    @endsection

</x-guest-layout>
