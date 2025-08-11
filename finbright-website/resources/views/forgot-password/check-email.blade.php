<x-guest-layout>
    <div class="kt-card max-w-[440px] w-full">
        <div class="kt-card-content p-10" id="check_email_form">
            <div class="flex justify-center py-10">
                <img alt="image" class="dark:hidden max-h-[130px]" src="{{asset('assets/media/illustrations/30.svg')}}" />
                <img alt="image" class="light:hidden max-h-[130px]" src="{{asset('assets/media/illustrations/30-dark.svg')}}" />
            </div>
            <h3 class="text-lg font-medium text-mono text-center mb-3">
                Vérifiez votre messagerie email.
            </h3>
            <div class="text-sm text-center text-secondary-foreground mb-7.5">
                Veuillez cliquer sur le lien envoyé à votre adresse e-mail.
                <a class="text-sm text-mono font-medium hover:text-primary" href="#">
                    {{ session('email') }}
                </a>
                <br />
                pour réinitialiser votre mot de passe. Merci.
            </div>
            <div class="flex justify-center mb-5">
                <a class="kt-btn kt-btn-primary flex justify-center" href="{{ route('login') }}">
                    Retour à l'accueil
                </a>
            </div>
            <div class="flex items-center justify-center gap-1 text-2sm">
                <span class="text-secondary-foreground">
                    Vous n'avez pas reçu d'e-mail ?
                </span>
                <form id="resendForm" method="POST" action="{{ route('password.email') }}" class="">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('email') }}">
                    <button type="submit" class="font-medium kt-link">
                        Renvoyer
                    </button>
                </form>
            </div>
        </div>
    </div>

    @section('javascripts')
        <script src="{{ asset('assets/js/core.bundle.js') }}"></script>
        <script src="{{ asset('assets/vendors/ktui/ktui.min.js') }}"></script>
    @endsection

</x-guest-layout>
