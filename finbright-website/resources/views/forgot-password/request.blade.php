<x-guest-layout>
    <div class="kt-card max-w-[370px] w-full">
        <!-- Session Status -->
        <x-auth-session-status id="alert_2" :status="session('status')" />

        <form class="kt-card-content flex flex-col gap-5 p-10" id="reset_password_enter_email_form" method="POST" action="{{ route('password.email') }}">
            <div class="text-center">
                <h3 class="text-lg font-medium text-mono">
                {{ __('Vous avez oublié votre mot de passe ?') }}
                </h3>
                <span class="text-sm text-secondary-foreground block text-center">
                {{ __('Entrez votre adresse e-mail pour réinitialiser votre mot de passe.') }}
                </span>
            </div>
            @csrf

            <!-- Email Address -->
            <div class="flex flex-col gap-1">
                <x-input-label for="email" class="kt-form-label font-normal text-mono" :value="__('Adresse Email')" />
                <x-text-input id="email" class="kt-input" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
                {{ __('Continuer') }}
                <i class="ki-filled ki-black-right"></i>
            </button>
        </form>
    </div>

    @section('javascripts')
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
    @endsection

</x-guest-layout>
