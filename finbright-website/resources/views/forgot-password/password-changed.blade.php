<x-guest-layout>
    <div class="kt-card max-w-[440px] w-full">
        <div class="kt-card-content p-10">
            <div class="flex justify-center mb-5">
                <img alt="image" class="dark:hidden max-h-[180px]" src="{{asset('assets/media/illustrations/32.svg')}}" />
                <img alt="image" class="light:hidden max-h-[180px]" src="{{asset('assets/media/illustrations/32-dark.svg')}}" />
            </div>
            <h3 class="text-lg font-medium text-mono text-center mb-4">
                Votre mot de passe a été modifié.
            </h3>
            <div class="text-sm text-center text-secondary-foreground mb-7.5">
                Votre mot de passe a été mis à jour avec succès.
                <br />
                Vous pouvez à présent vous réconnecter.
            </div>
            <div class="flex justify-center">
                <a class="kt-btn kt-btn-primary" href="{{ route('login') }}">
                    Connexion
                </a>
            </div>
        </div>
    </div>

    @section('javascripts')
        <script src="{{ asset('assets/js/core.bundle.js') }}"></script>
        <script src="{{ asset('assets/vendors/ktui/ktui.min.js') }}"></script>
    @endsection

</x-guest-layout>
