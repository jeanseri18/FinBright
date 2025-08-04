<x-guest-layout>
    <div class="kt-card max-w-[380px] w-full" id="2fa_form">
        <form class="kt-card-content flex flex-col gap-5 p-10" method="POST" action="{{ route('2fa.verify') }}">
            @csrf

            <img alt="image" class="dark:hidden h-20 mb-2" src="{{ asset('assets/media/illustrations/34.svg') }}"/>
            <img alt="image" class="light:hidden h-20 mb-2" src="{{ asset('assets/media/illustrations/34-dark.svg') }}"/>

            <div class="text-center mb-2">
                <h3 class="text-lg font-medium text-mono mb-5">
                    Vérifie ton adresse email
                </h3>
                <div class="flex flex-col">
                    <span class="text-sm text-secondary-foreground mb-1.5">
                        Saisis le code envoyé à l'adresse :
                    </span>
                    <span class="text-sm font-medium text-mono">
                        {{ Str::mask(auth()->user()->email, '*', 3) }}
                    </span>
                </div>
            </div>

            {{-- Code à 6 chiffres --}}
            <div class="flex flex-wrap justify-center gap-2.5">
                @for($i = 0; $i < 6; $i++)
                    <input class="kt-input text-center size-10 px-0 focus:ring-primary/10" maxlength="1" type="text" inputmode="numeric" pattern="[0-9]*" required />
                @endfor
            </div>

            {{-- Champ caché pour concaténer les 6 chiffres --}}
            <input type="hidden" name="code" id="code"/>

            {{-- Résultat d’erreur --}}
            @error('code')
                <p class="text-sm text-red-500 mt-1 text-center">{{ $message }}</p>
            @enderror

            {{-- Message et lien de renvoi --}}
            <div class="flex items-center justify-center text-2sm mt-2">
                <span id="resendMessage" class="text-secondary-foreground me-1.5">
                    Vous pouvez renvoyer le code dans <span id="countdown">60</span>s
                </span>
                <button type="button" id="resendBtn" class="text-2sm kt-link hidden">
                    Renvoyer
                </button>
            </div>

            {{-- Bouton --}}
            <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
                Continuer
            </button>
        </form>
    </div>

    {{-- JS --}}
    @section('javascripts')
    <script src="{{asset('assets/js/core.bundle.js')}}"></script>
    <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
    <script>
        const inputs = document.querySelectorAll('input[type="text"][maxlength="1"]');
        const codeField = document.getElementById('code');

        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                updateCode();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        function updateCode() {
            codeField.value = Array.from(inputs).map(i => i.value).join('');
        }

        // ⏳ Compte à rebours
        let countdown = 60;
        const countdownSpan = document.getElementById('countdown');
        const resendBtn = document.getElementById('resendBtn');
        const resendMsg = document.getElementById('resendMessage');

        const timer = setInterval(() => {
            countdown--;
            countdownSpan.innerText = countdown;

            if (countdown <= 0) {
                clearInterval(timer);
                resendBtn.classList.remove('hidden');
                resendMsg.classList.add('hidden');
            }
        }, 1000);

        document.getElementById('resendBtn').addEventListener('click', function () {
            fetch('{{ route('2fa.resend') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({})
            }).then(() => {
                alert('Code renvoyé.');
                location.reload(); // ou simplement rafraîchir le timer
            });
        });
    </script>
    @endsection
</x-guest-layout>