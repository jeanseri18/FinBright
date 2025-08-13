@extends('back.investisseur.layouts')

@section('title', 'Mon profil')

@section('content')
    <div class="mb-5 lg:mb-7.5">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-5">
            <div class="flex flex-col justify-center items-start flex-wrap gap-1 lg:gap-2">
                <h1 class="font-medium text-lg text-mono">
                    Paramètres du compte
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="/metronic/tailwind/demo9/">
                        Tableau de bord
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-secondary-foreground">
                        Mon compte
                    </span>
                </div>
            </div>
        </div>
        <!-- End of Container -->
    </div>
    <!-- End of Toolbar -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="flex grow gap-5 lg:gap-7.5">
            <div class="hidden lg:block w-[230px] shrink-0">
                <div class="w-[230px]" data-kt-sticky="true" data-kt-sticky-animation="true"
                    data-kt-sticky-class="fixed z-4 left-auto top-[calc(var(--header-height)+1rem)]"
                    data-kt-sticky-name="scrollspy" data-kt-sticky-offset="200" data-kt-sticky-target="body">
                    <div class="flex flex-col grow relative before:absolute before:left-[11px] before:top-0 before:bottom-0 before:border-l before:border-border"
                        data-kt-scrollspy="true" data-kt-scrollspy-offset="110px" data-kt-scrollspy-target="body">
                        <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 active border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                            data-kt-scrollspy-anchor="true" href="#basic_settings">
                            <span
                                class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                            </span>
                            Informations Personnelles
                        </a>
                        <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                            data-kt-scrollspy-anchor="true" href="#advanced_settings_address">
                            <span
                                class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                            </span>
                            KYC
                        </a>
                        <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                            data-kt-scrollspy-anchor="true" href="#advanced_settings_preferences">
                            <span
                                class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                            </span>
                            Déclarer IBAN
                        </a>
                        <div class="flex flex-col">
                            <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                Paramètres avancés
                            </div>
                            <div class="flex flex-col">
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#advanced_settings_notifications">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Notifications
                                </a>
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#external_services_manage_api">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Parrainage
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                Authentication
                            </div>
                            <div class="flex flex-col">
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#auth_email">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Email
                                </a>
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#auth_social_sign_in">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Connexion via réseaux sociaux
                                </a>
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#auth_two_factor">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Authentification à deux facteurs (2FA)
                                </a>
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#auth_password">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Mot de passe
                                </a>
                            </div>
                        </div>
                        <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                            data-kt-scrollspy-anchor="true" href="#delete_account">
                            <span
                                class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                            </span>
                            Supprimer le compte
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                @if (!Auth::user()->kyc_status !== 'Validé')
                <div class="kt-alert kt-alert-light kt-alert-destructive" id="alert_4">
                    <div class="kt-alert-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16v-4"></path>
                            <path d="M12 8h.01"></path>
                        </svg>
                    </div>
                    <div class="kt-alert-title">Veuillez compléter et faire valider votre KYC avant de continuer la navigation</div>
                    <div class="kt-alert-toolbar">
                        <div class="kt-alert-actions">
                            <button class="kt-link kt-link-xs kt-link-underlined text-mono" data-kt-dismiss="#alert_4">
                            C'est compris</button
                            ><button class="kt-alert-close" data-kt-dismiss="#alert_4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="kt-card pb-2.5">
                    <div class="kt-card-header" id="basic_settings">
                        <h3 class="kt-card-title">
                            Informations Personnelles
                        </h3>
                    </div>
                    <form action="{{ route('emprunteur.profil.general.update') }}" method="post" enctype="multipart/form-data" class="kt-card-content grid gap-5">
                        @csrf
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Photo <span class="text-destructive">*</span>
                            </label>
                            <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                                <span class="text-sm">
                                    150x150px JPEG, PNG Image
                                </span>
                                <div class="group relative size-18 rounded-full border border-gray-300 bg-gray-50 overflow-hidden cursor-pointer" id="avatar-container">
                                    <input accept=".png, .jpg, .jpeg" name="avatar" type="file" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" id="avatar-input" />
                                    
                                    <div id="avatar-preview" class="w-full h-full bg-cover bg-center rounded-full" style="background-image: url('{{ Auth::user()->profilePicture ? Storage::url(Auth::user()->profilePicture->filename) : asset('assets/media/avatars/blank.png') }}');"></div>
                                    
                                    <div class="absolute bottom-0 left-0 right-0 h-1/3 flex items-center justify-center bg-gray-300 bg-opacity-70">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.867-1.442A2 2 0 0110.437 3h3.125a2 2 0 011.664.89l.867 1.442A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    
                                    <button type="button" id="avatar-remove-btn" class="absolute -top-2 -right-2 size-6 rounded-full bg-red-500 text-white flex items-center justify-center cursor-pointer opacity-0 transition-opacity">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Civilité <span class="text-destructive">*</span>
                            </label>
                            <div class="flex items-center gap-5">
                                <label class="kt-label">
                                    <input {{ (Auth::user()->civility == 'M.' or Auth::user()->civility == '') ? 'checked' : null }} class="kt-radio" name="civilite" type="radio" value="M.">
                                    Monsieur
                                </label>
                                <label class="kt-label">
                                    <input {{ Auth::user()->civility == 'Mme.' ? 'checked' : null }} class="kt-radio" name="civilite" type="radio" value="Mme.">
                                    Madame
                                </label>
                                <label class="kt-label">
                                    <input {{ Auth::user()->civility == 'Mx.' ? 'checked' : null }} class="kt-radio" name="civilite" type="radio" value="Mx.">
                                    Neutre
                                </label>
                            </div>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Nom & Prénoms <span class="text-destructive">*</span>
                            </label>
                            <div class="grid md:grid-cols-2 w-full gap-5">
                                <input class="kt-input" name="firstname" type="text" placeholder="Vos prénoms" value="{{ Auth::user()->first_name ?? null }}" />
                                <input class="kt-input" name="lastname" type="text" placeholder="Votre nom" value="{{ Auth::user()->last_name ?? null }}" />
                            </div>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Pays de résidence <span class="text-destructive">*</span>
                            </label>
                            <div class="grow">
                                <select name="birth_place" class="kt-select" name="pays" data-kt-select="true">
                                    <option {{ Auth::user()->birth_place == 'Belgique' ? 'selected' : '' }}>Belgique</option>
                                    <option {{ Auth::user()->birth_place == 'Congo' ? 'selected' : '' }}>Congo</option>
                                    <option {{ Auth::user()->birth_place == 'Côte d\'Ivoire' ? 'selected' : '' }}>Côte d'Ivoire</option>
                                    <option {{ Auth::user()->birth_place == 'Cameroun' ? 'selected' : '' }}>Cameroun</option>
                                    <option {{ Auth::user()->birth_place == 'Canada' ? 'selected' : '' }}>Canada</option>
                                    <option {{ Auth::user()->birth_place == 'Espagne' ? 'selected' : '' }}>Espagne</option>
                                    <option {{ Auth::user()->birth_place == 'France' ? 'selected' : '' }}>France</option>
                                    <option {{ Auth::user()->birth_place == 'Italie' ? 'selected' : '' }}>Italie</option>
                                    <option {{ Auth::user()->birth_place == 'Guinnée' ? 'selected' : '' }}>Guinnée</option>
                                    <option {{ Auth::user()->birth_place == 'Mali' ? 'selected' : '' }}>Mali</option>
                                    <option {{ Auth::user()->birth_place == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                    <option {{ Auth::user()->birth_place == 'Mali' ? 'selected' : '' }}>Mali</option>
                                </select>

                                {{-- <select class="kt-select {class if class else ''}" data-kt-select="true"
                                    data-kt-select-config='{
                                        "optionsClass": "kt-scrollable overflow-auto max-h-[250px]",
                                        "displayTemplate": "&lt;div class=\"flex items-center leading-none gap-2\"&gt;@{{ flag }}&lt;span class=\"text-foreground\"&gt;@{{ text }}&lt;/span&gt;&lt;/div&gt;",
                                        "optionTemplate": "&lt;div class=\"flex items-center leading-none gap-2\"&gt;@{{ flag }} &lt;span class=\"text-foreground\"&gt;@{{ text }}&lt;/span&gt;&lt;/div&gt;&lt;svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"size-3.5 ms-auto hidden text-primary kt-select-option-selected:block\"&gt;&lt;path d=\"M20 6 9 17l-5-5\"/&gt;&lt;/svg&gt;&lt;/div&gt;"
                                    }'
                                    data-kt-select-enable-search="true" data-kt-select-placeholder="Select a country..."
                                    data-kt-select-search-placeholder="Search...">
                                    <option data-kt-select-option='{"flag": "🇦🇫"}' value="Afghanistan">
                                        Afghanistan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇱"}' value="Albania">
                                        Albania
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇩🇿"}' value="Algeria">
                                        Algeria
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇩"}' value="Andorra">
                                        Andorra
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇴"}' value="Angola">
                                        Angola
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇬"}' value="Antigua and Barbuda">
                                        Antigua and Barbuda
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇷"}' value="Argentina">
                                        Argentina
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇲"}' value="Armenia">
                                        Armenia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇺"}' value="Australia">
                                        Australia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇹"}' value="Austria">
                                        Austria
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇿"}' value="Azerbaijan">
                                        Azerbaijan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇸"}' value="Bahamas">
                                        Bahamas
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇭"}' value="Bahrain">
                                        Bahrain
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇩"}' value="Bangladesh">
                                        Bangladesh
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇧"}' value="Barbados">
                                        Barbados
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇾"}' value="Belarus">
                                        Belarus
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇪"}' value="Belgium">
                                        Belgium
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇿"}' value="Belize">
                                        Belize
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇯"}' value="Benin">
                                        Benin
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇹"}' value="Bhutan">
                                        Bhutan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇴"}' value="Bolivia">
                                        Bolivia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇦"}' value="Bosnia and Herzegovina">
                                        Bosnia and Herzegovina
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇼"}' value="Botswana">
                                        Botswana
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇷"}' value="Brazil">
                                        Brazil
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇳"}' value="Brunei">
                                        Brunei
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇬"}' value="Bulgaria">
                                        Bulgaria
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇫"}' value="Burkina Faso">
                                        Burkina Faso
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇧🇮"}' value="Burundi">
                                        Burundi
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇻"}' value="Cabo Verde">
                                        Cabo Verde
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇭"}' value="Cambodia">
                                        Cambodia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇲"}' value="Cameroon">
                                        Cameroon
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇦"}' value="Canada">
                                        Canada
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇫"}' value="Central African Republic">
                                        Central African Republic
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇩"}' value="Chad">
                                        Chad
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇱"}' value="Chile">
                                        Chile
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇳"}' value="China">
                                        China
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇴"}' value="Colombia">
                                        Colombia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇲"}' value="Comoros">
                                        Comoros
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇬"}' value="Congo (Congo-Brazzaville)">
                                        Congo (Congo-Brazzaville)
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇷"}' value="Costa Rica">
                                        Costa Rica
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇭🇷"}' value="Croatia">
                                        Croatia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇺"}' value="Cuba">
                                        Cuba
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇾"}' value="Cyprus">
                                        Cyprus
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇿"}' value="Czechia">
                                        Czechia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇩"}' value="Democratic Republic of the Congo">
                                        Democratic Republic of the Congo
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇩🇰"}' value="Denmark">
                                        Denmark
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇩🇯"}' value="Djibouti">
                                        Djibouti
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇩🇲"}' value="Dominica">
                                        Dominica
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇩🇴"}' value="Dominican Republic">
                                        Dominican Republic
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇪🇨"}' value="Ecuador">
                                        Ecuador
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇪🇬"}' value="Egypt">
                                        Egypt
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇻"}' value="El Salvador">
                                        El Salvador
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇶"}' value="Equatorial Guinea">
                                        Equatorial Guinea
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇪🇷"}' value="Eritrea">
                                        Eritrea
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇪🇪"}' value="Estonia">
                                        Estonia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇿"}' value="Eswatini">
                                        Eswatini
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇪🇹"}' value="Ethiopia">
                                        Ethiopia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇫🇯"}' value="Fiji">
                                        Fiji
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇫🇮"}' value="Finland">
                                        Finland
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇫🇷"}' value="France">
                                        France
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇦"}' value="Gabon">
                                        Gabon
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇲"}' value="Gambia">
                                        Gambia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇪"}' value="Georgia">
                                        Georgia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇩🇪"}' value="Germany">
                                        Germany
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇭"}' value="Ghana">
                                        Ghana
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇷"}' value="Greece">
                                        Greece
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇩"}' value="Grenada">
                                        Grenada
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇹"}' value="Guatemala">
                                        Guatemala
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇳"}' value="Guinea">
                                        Guinea
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇼"}' value="Guinea-Bissau">
                                        Guinea-Bissau
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇾"}' value="Guyana">
                                        Guyana
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇭🇹"}' value="Haiti">
                                        Haiti
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇭🇳"}' value="Honduras">
                                        Honduras
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇭🇺"}' value="Hungary">
                                        Hungary
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇸"}' value="Iceland">
                                        Iceland
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇳"}' value="India">
                                        India
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇩"}' value="Indonesia">
                                        Indonesia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇷"}' value="Iran">
                                        Iran
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇶"}' value="Iraq">
                                        Iraq
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇪"}' value="Ireland">
                                        Ireland
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇱"}' value="Israel">
                                        Israel
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇮🇹"}' value="Italy">
                                        Italy
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇯🇲"}' value="Jamaica">
                                        Jamaica
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇯🇵"}' value="Japan">
                                        Japan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇯🇴"}' value="Jordan">
                                        Jordan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇿"}' value="Kazakhstan">
                                        Kazakhstan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇪"}' value="Kenya">
                                        Kenya
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇮"}' value="Kiribati">
                                        Kiribati
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇼"}' value="Kuwait">
                                        Kuwait
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇬"}' value="Kyrgyzstan">
                                        Kyrgyzstan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇦"}' value="Laos">
                                        Laos
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇻"}' value="Latvia">
                                        Latvia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇧"}' value="Lebanon">
                                        Lebanon
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇸"}' value="Lesotho">
                                        Lesotho
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇷"}' value="Liberia">
                                        Liberia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇾"}' value="Libya">
                                        Libya
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇮"}' value="Liechtenstein">
                                        Liechtenstein
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇹"}' value="Lithuania">
                                        Lithuania
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇺"}' value="Luxembourg">
                                        Luxembourg
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇬"}' value="Madagascar">
                                        Madagascar
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇼"}' value="Malawi">
                                        Malawi
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇾"}' value="Malaysia">
                                        Malaysia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇻"}' value="Maldives">
                                        Maldives
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇱"}' value="Mali">
                                        Mali
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇹"}' value="Malta">
                                        Malta
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇭"}' value="Marshall Islands">
                                        Marshall Islands
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇷"}' value="Mauritania">
                                        Mauritania
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇺"}' value="Mauritius">
                                        Mauritius
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇽"}' value="Mexico">
                                        Mexico
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇫🇲"}' value="Micronesia">
                                        Micronesia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇩"}' value="Moldova">
                                        Moldova
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇨"}' value="Monaco">
                                        Monaco
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇳"}' value="Mongolia">
                                        Mongolia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇪"}' value="Montenegro">
                                        Montenegro
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇦"}' value="Morocco">
                                        Morocco
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇿"}' value="Mozambique">
                                        Mozambique
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇲"}' value="Myanmar">
                                        Myanmar
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇦"}' value="Namibia">
                                        Namibia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇷"}' value="Nauru">
                                        Nauru
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇵"}' value="Nepal">
                                        Nepal
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇱"}' value="Netherlands">
                                        Netherlands
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇿"}' value="New Zealand">
                                        New Zealand
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇮"}' value="Nicaragua">
                                        Nicaragua
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇪"}' value="Niger">
                                        Niger
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇬"}' value="Nigeria">
                                        Nigeria
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇵"}' value="North Korea">
                                        North Korea
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇲🇰"}' value="North Macedonia">
                                        North Macedonia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇳🇴"}' value="Norway">
                                        Norway
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇴🇲"}' value="Oman">
                                        Oman
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇰"}' value="Pakistan">
                                        Pakistan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇼"}' value="Palau">
                                        Palau
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇸"}' value="Palestine">
                                        Palestine
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇦"}' value="Panama">
                                        Panama
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇬"}' value="Papua New Guinea">
                                        Papua New Guinea
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇾"}' value="Paraguay">
                                        Paraguay
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇪"}' value="Peru">
                                        Peru
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇭"}' value="Philippines">
                                        Philippines
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇱"}' value="Poland">
                                        Poland
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇵🇹"}' value="Portugal">
                                        Portugal
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇶🇦"}' value="Qatar">
                                        Qatar
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇷🇴"}' value="Romania">
                                        Romania
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇷🇺"}' value="Russia">
                                        Russia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇷🇼"}' value="Rwanda">
                                        Rwanda
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇳"}' value="Saint Kitts and Nevis">
                                        Saint Kitts and Nevis
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇨"}' value="Saint Lucia">
                                        Saint Lucia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇻🇨"}' value="Saint Vincent and the Grenadines">
                                        Saint Vincent and the Grenadines
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇼🇸"}' value="Samoa">
                                        Samoa
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇲"}' value="San Marino">
                                        San Marino
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇹"}' value="Sao Tome and Principe">
                                        Sao Tome and Principe
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇦"}' value="Saudi Arabia">
                                        Saudi Arabia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇳"}' value="Senegal">
                                        Senegal
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇷🇸"}' value="Serbia">
                                        Serbia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇨"}' value="Seychelles">
                                        Seychelles
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇱"}' value="Sierra Leone">
                                        Sierra Leone
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇬"}' value="Singapore">
                                        Singapore
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇰"}' value="Slovakia">
                                        Slovakia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇮"}' value="Slovenia">
                                        Slovenia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇧"}' value="Solomon Islands">
                                        Solomon Islands
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇴"}' value="Somalia">
                                        Somalia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇿🇦"}' value="South Africa">
                                        South Africa
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇰🇷"}' value="South Korea">
                                        South Korea
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇸"}' value="South Sudan">
                                        South Sudan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇪🇸"}' value="Spain">
                                        Spain
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇱🇰"}' value="Sri Lanka">
                                        Sri Lanka
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇩"}' value="Sudan">
                                        Sudan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇷"}' value="Suriname">
                                        Suriname
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇪"}' value="Sweden">
                                        Sweden
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇨🇭"}' value="Switzerland">
                                        Switzerland
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇸🇾"}' value="Syria">
                                        Syria
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇼"}' value="Taiwan">
                                        Taiwan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇯"}' value="Tajikistan">
                                        Tajikistan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇿"}' value="Tanzania">
                                        Tanzania
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇭"}' value="Thailand">
                                        Thailand
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇱"}' value="Timor-Leste">
                                        Timor-Leste
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇬"}' value="Togo">
                                        Togo
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇴"}' value="Tonga">
                                        Tonga
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇹"}' value="Trinidad and Tobago">
                                        Trinidad and Tobago
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇳"}' value="Tunisia">
                                        Tunisia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇷"}' value="Turkey">
                                        Turkey
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇲"}' value="Turkmenistan">
                                        Turkmenistan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇹🇻"}' value="Tuvalu">
                                        Tuvalu
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇺🇬"}' value="Uganda">
                                        Uganda
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇺🇦"}' value="Ukraine">
                                        Ukraine
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇦🇪"}' value="United Arab Emirates">
                                        United Arab Emirates
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇬🇧"}' value="United Kingdom">
                                        United Kingdom
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇺🇸"}' value="United States">
                                        United States
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇺🇾"}' value="Uruguay">
                                        Uruguay
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇺🇿"}' value="Uzbekistan">
                                        Uzbekistan
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇻🇺"}' value="Vanuatu">
                                        Vanuatu
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇻🇦"}' value="Vatican City">
                                        Vatican City
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇻🇪"}' value="Venezuela">
                                        Venezuela
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇻🇳"}' value="Vietnam">
                                        Vietnam
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇾🇪"}' value="Yemen">
                                        Yemen
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇿🇲"}' value="Zambia">
                                        Zambia
                                    </option>
                                    <option data-kt-select-option='{"flag": "🇿🇼"}' value="Zimbabwe">
                                        Zimbabwe
                                    </option>
                                </select> --}}
                            </div>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Nationalité <span class="text-destructive">*</span>
                            </label>
                            <input class="kt-input" name="nationality" placeholder="" type="text" value="{{ Auth::user()->nationality ?? null }}" />
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Profession <span class="text-destructive">*</span>
                            </label>
                            <input class="kt-input" name="profession" placeholder="" type="text" value="{{ Auth::user()->profession ?? null }}" />
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Numéro de téléphone <span class="text-destructive">*</span>
                            </label>
                            <input class="kt-input" name="phone_number" placeholder="Numéro de téléphone mobile" type="tel" value="{{ Auth::user()->phone_number ?? null }}" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57" />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header" id="advanced_settings_address">
                        <h3 class="kt-card-title">
                            KYC
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('investisseur.kyc.store') }}" enctype="multipart/form-data" class="kt-card-content grid gap-5 lg:py-7.5">
                        @csrf
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label flex items-center gap-1 max-w-56">
                                Pièce d’identité
                            </label>
                            <input type="file" name="identity_doc" class="kt-input" required>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                Justificatif de domicile
                            </label>
                            <input type="file" name="proof_address" class="kt-input" required>
                        </div>
                        <div class="flex justify-end pt-2.5">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header" id="advanced_settings_preferences">
                        <h3 class="kt-card-title">
                            Déclarer IBAN
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('investisseur.iban.store') }}" class="kt-card-content grid gap-5 lg:py-7.5">
                        @csrf
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56">
                                IBAN
                            </label>
                            <input type="text" name="iban" class="kt-input" placeholder="FR76..." required value="{{ Auth::user()->iban ?? null }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header" id="advanced_settings_notifications">
                        <h3 class="kt-card-title">
                            Notifications
                        </h3>
                    </div>
                    <form action="{{ route('emprunteur.profil.notifications.preferences') }}" method="post" class="kt-card-content lg:py-7.5">
                        @csrf
                        @php
                            $notif = Auth::user()->notificationPreference ?? null;
                        @endphp

                        <div class="flex flex-wrap items-center gap-5 mb-5 lg:mb-7">
                            <div
                                class="flex items-center justify-between flex-wrap grow border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-border fill-muted/30" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-sms text-xl text-muted-foreground">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                            href="#">
                                            Email
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            Personnalisez vos préférences d'e-mail.
                                        </span>
                                    </div>
                                </div>
                                <label class="kt-label">
                                    <input {{ $notif && $notif->email_notifications ? 'checked' : '' }} class="kt-switch kt-switch-sm" name="notification_types"
                                        onchange="this.checked ? document.getElementById('email_preferences').classList.remove('hidden') : document.getElementById('email_preferences').classList.add('hidden');"
                                        type="checkbox" value="email_notifications" />
                                </label>
                            </div>
                            <div
                                class="bg-muted cursor-not-allowed flex items-center justify-between flex-wrap grow border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-border fill-muted/30" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-message-notify text-xl text-muted-foreground"></i>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <a class="text-sm font-medium text-mono hover:text-primary mb-px">
                                            SMS
                                        </a>
                                        <span class="text-sm text-secondary-foreground">
                                            Rester informé par SMS.
                                        </span>
                                    </div>
                                </div>
                                <label class="kt-label">
                                    <input disabled class="kt-switch kt-switch-sm" name="notification_types"
                                        type="checkbox" value="sms_notifications" />
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3.5 mb-7">
                            <span class="text-base font-medium text-mono pb-0.5">
                                Notifications sur la plateforme
                            </span>
                            <div class="flex flex-col items-start gap-4">
                                <label class="kt-label">
                                    <input {{ (!$notif || ($notif && $notif->desktop_notification === 'new_messages')) ? 'checked' : '' }} class="kt-radio" name="desktop_notification" type="radio"
                                        value="new_messages">
                                    Tous les nouveaux messages (Recommandé)
                                </label>
                                <label class="kt-label">
                                    <input {{ $notif && $notif->desktop_notification === 'direct' ? 'checked' : '' }} class="kt-radio" name="desktop_notification"
                                        type="radio" value="direct">
                                    Direct @mentions
                                </label>
                                <label class="kt-label">
                                    <input {{ $notif && $notif->desktop_notification === 'disabled' ? 'checked' : '' }} class="kt-radio" name="desktop_notification"
                                        type="radio" value="disabled">
                                    Désactiver
                                </label>
                            </div>
                        </div>
                        <div id="email_preferences" class="flex flex-col gap-3.5 mb-7">
                            <span class="text-base font-medium text-mono pb-0.5">
                                Notifications par Email
                            </span>
                            <div class="flex flex-col items-start gap-4">
                                <label class="kt-label">
                                    <input {{ (!$notif || ($notif && $notif->email_notification === 'new_messages_statuses')) ? 'checked' : '' }} class="kt-radio" name="email_notification" type="radio"
                                        value="new_messages_statuses">
                                    Tous les nouveaux messages et statuts
                                </label>
                                <label class="kt-label">
                                    <input {{ $notif && $notif->email_notification === 'messages_statuses' ? 'checked' : '' }} class="kt-radio" name="email_notification"
                                        type="radio" value="messages_statuses">
                                    Messages et statuts non lus
                                </label>
                                <label class="kt-label">
                                    <input {{ $notif && $notif->email_notification === 'disabled' ? 'checked' : '' }} class="kt-radio" name="email_notification"
                                        type="radio" value="disabled">
                                    Désactiver
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header mb-5" id="external_services_manage_api">
                        <h3 class="kt-card-title">
                            Parrainage
                        </h3>
                    </div>
                    <div class="kt-card-content lg:py-7.5 grid gap-5 lg:gap-7.5">
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="kt-form-label max-w-56 text-foreground font-normal">
                                API Key
                            </label>
                            <label class="kt-input">
                                <input placeholder="Right icon" type="text" value="abc123xyz456sample789key000" />
                                <button class="kt-btn kt-btn-icon kt-btn-dim -me-2">
                                    <i class="ki-filled ki-copy">
                                    </i>
                                </button>
                            </label>
                        </div>
                        <div
                            class="flex items-center flex-wrap sm:flex-nowrap justify-between grow border border-border rounded-xl gap-2 p-5 rtl:[background-position:-195px_-85px] [background-position:195px_-85px] bg-no-repeat bg-[length:650px] user-access-bg">
                            <div class="flex items-center gap-4">
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                        height="48" viewbox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill="">
                                        </path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke="">
                                        </path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-security-user text-xl text-primary">
                                        </i>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <div class="flex items-center flex-wrap gap-2.5">
                                        <a class="text-base font-medium text-mono hover:text-primary" href="#">
                                            User Access
                                        </a>
                                        <span class="kt-badge kt-badge-sm kt-badge-outline shrink-0">
                                            16 days left
                                        </span>
                                    </div>
                                    <div class="kt-form-description text-2sm">
                                        This API key can only access
                                        <a class="kt-link" href="https://keenthemes.com/">
                                            @keenthemes
                                        </a>
                                        <br />
                                        Secure access with a unique API key for enhanced functionality.
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <button class="kt-btn kt-btn-mono">
                                    Renew Plan
                                </button>
                                <a class="kt-btn kt-btn-ghost" href="#">
                                    Docs
                                </a>
                            </div>
                        </div>
                        <p class="text-sm text-foreground">
                            Unlock the full potential of your application with our API, a secure gateway facilitating
                            seamless integration, empowering developers
                            to create innovative and dynamic experiences effortlessly.
                        </p>
                    </div>
                </div>
                <div class="kt-card pb-2.5">
                    <div class="kt-card-header" id="auth_email">
                        <h3 class="kt-card-title">
                            Email
                        </h3>
                    </div>
                    <form action="{{ route('emprunteur.profil.email.update') }}" method="post" class="kt-card-content grid gap-5 pt-7.5">
                        @csrf
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Email
                                </label>
                                <div class="flex flex-col tems-start grow gap-3 w-full">
                                    <input class="kt-input" name="email" type="text" value="{{ Auth::user()->email ?? null }}">
                                    
                                    <div class="kt-alert kt-alert-light kt-alert-warning" id="alert_5">
                                        <div class="kt-alert-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" aria-hidden="true">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M12 16v-4"></path>
                                                <path d="M12 8h.01"></path>
                                            </svg>
                                        </div>
                                        <div class="kt-alert-content">
                                            <h3 class="kt-alert-title">À votre attention !</h3>
                                            <p class="kt-alert-description">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem velit repellat id dolores.
                                                <br />Vero consequuntur.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header" id="auth_social_sign_in">
                        <h3 class="kt-card-title">
                            Connexion réseaux sociaux
                        </h3>
                    </div>
                    <form action="" method="post" class="kt-card-content">
                        @csrf
                        <div class="grid gap-5 mb-7">
                            <div
                                class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <img alt="" class="size-6 shrink-0"
                                        src="{{asset('assets/media/brand-logos/google.svg')}}" />
                                    <div class="flex flex-col gap-0.5">
                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                            href="#">
                                            Google
                                        </a>
                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                            href="#">
                                            emprunteur@gmail.com
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5">
                                    <label class="kt-label">
                                        <input checked="" class="kt-switch kt-switch-sm" name="check"
                                            type="checkbox" value="1" />
                                    </label>
                                    <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-trash">
                                        </i>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <img alt="" class="size-6 shrink-0"
                                        src="{{asset('assets/media/brand-logos/facebook.svg')}}" />
                                    <div class="flex flex-col gap-0.5">
                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                            href="#">
                                            Facebook
                                        </a>
                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                            href="#">
                                            jasontt@keenthemes.com
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5">
                                    <label class="kt-label">
                                        <input class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                            value="1" />
                                    </label>
                                    <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-trash">
                                        </i>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <img alt="" class="size-6 shrink-0"
                                        src="{{asset('assets/media/brand-logos/linkedin.svg')}}" />
                                    <div class="flex flex-col gap-0.5">
                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                            href="#">
                                            Linkedin
                                        </a>
                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                            href="#">
                                            jasontt@keenthemes.com
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5">
                                    <label class="kt-label">
                                        <input class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                            value="1" />
                                    </label>
                                    <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-trash">
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header" id="auth_two_factor">
                        <h3 class="kt-card-title">
                            Authentification à deux facteurs (2FA)
                        </h3>
                    </div>
                    <form action="{{ route('emprunteur.profil.2fa.setup') }}" method="post" class="kt-card-content">
                        @csrf
                        <div class="grid gap-5 mb-7">
                            <div
                                class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <div class="flex items-center">
                                        <div class="relative size-[50px] shrink-0">
                                            <svg class="w-full h-full stroke-border fill-muted/30"
                                                fill="none" height="48" viewbox="0 0 44 48"
                                                width="44" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                    fill="">
                                                </path>
                                                <path
                                                    d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                    stroke="">
                                                </path>
                                            </svg>
                                            <div
                                                class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                <i
                                                    class="ki-filled ki-sms text-xl text-muted-foreground">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-px">
                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                            href="#">
                                            Message Email
                                        </a>
                                        <span class="text-sm font-medium text-secondary-foreground">
                                            Codes instantanés via Email pour une vérification sécurisée du compte.
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 lg:gap-6">
                                    <label class="kt-label">
                                        Activer sur le profil
                                        <input {{ Auth::user()->twoFactor ? 'checked' : '' }} class="kt-switch kt-switch-sm" name="twoFactor_email"
                                            type="checkbox" value="1" />
                                    </label>
                                </div>
                            </div>
                            <div
                                class="bg-muted cursor-not-allowed flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                <div class="flex items-center flex-wrap gap-3.5">
                                    <div class="flex items-center">
                                        <div class="relative size-[50px] shrink-0">
                                            <svg class="w-full h-full stroke-border fill-muted/30"
                                                fill="none" height="48" viewbox="0 0 44 48"
                                                width="44" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                            18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                            39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                    fill="">
                                                </path>
                                                <path
                                                    d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                            18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                            39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                    stroke="">
                                                </path>
                                            </svg>
                                            <div
                                                class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                <i
                                                    class="ki-filled ki-message-text-2 text-xl text-muted-foreground">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-px">
                                        <a class="text-sm font-medium text-mono hover:text-primary">
                                            Message texte (SMS)
                                        </a>
                                        <span class="text-sm font-medium text-secondary-foreground">
                                            Instant codes for secure account verification.
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 lg:gap-6">
                                    <label class="kt-label">
                                        Activer sur le profil
                                        <input disabled class="kt-switch kt-switch-sm" name="check"
                                            type="checkbox" value="1" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-7">
                                <label class="kt-form-label max-w-56">
                                    Mot de passe
                                </label>
                                <div class="flex flex-col tems-start grow gap-3 w-full">
                                    <input name="password" class="kt-input" placeholder="Entrer votre mot de passe" type="password" required>
                                    <span class="kt-form-description text-2sm">
                                        Entrez votre mot de passe pour configurer l'authentification à deux facteurs.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-2.5">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="kt-card">
                    <div class="kt-card-header" id="auth_password">
                        <h3 class="kt-card-title">
                            Mot de passe
                        </h3>
                    </div>
                    <form action="{{ route('emprunteur.profil.password.update') }}" method="post" class="kt-card-content grid gap-5">
                        @csrf
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Mot de passe actuel
                                </label>
                                <input name="current_password" class="kt-input" placeholder="Votre mot de passe actuel" type="password" value="">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Nouveau mot de passe
                                </label>
                                <input name="new_password" class="kt-input" placeholder="Nouveau mot de passe" type="password" value="">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Confirmer le nouveau mot de passe
                                </label>
                                <input name="new_password_confirmation" class="kt-input" placeholder="Confirmer le nouveau mot de passe" type="password" value="">
                            </div>
                        </div>
                        <div class="flex justify-end pt-2.5">
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Réinitialiser le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
                <style>
                    .user-access-bg {
                        background-image: url({{asset('assets/media/images/2600x1200/bg-5.png')}});
                    }

                    .dark .user-access-bg {
                        background-image: url({{asset('assets/media/images/2600x1200/bg-5-dark.png')}});
                    }
                </style>
                <div class="kt-card">
                    <div class="kt-card-header" id="delete_account">
                        <h3 class="kt-card-title">
                            Supprimer le compte
                        </h3>
                    </div>
                    <form action="{{ route('emprunteur.profil.delete') }}" method="POST" class="kt-card-content flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
                        <div class="flex flex-col gap-5">
                            <div class="text-sm text-foreground">
                                Nous regrettons votre départ. Confirmez la suppression de votre compte ci-dessous. 
                                Vos données seront définitivement supprimées. Nous vous remercions d'avoir fait partie de notre communauté. 
                                Veuillez consulter 
                                <a class="kt-link" href="#">
                                    nos directives d'installation 
                                </a>
                                si vous souhaitez continuer.
                            </div>
                            <label class="kt-label">
                                <input class="kt-checkbox kt-checkbox-sm" name="delete" type="checkbox" value="1" required>
                                Confirmer la suppression du compte
                            </label>
                        </div>
                        <div class="flex justify-end gap-2.5">
                            <a href="{{ route('emprunteur.profil.deactivate') }}" class="kt-btn kt-btn-outline">
                                Désactiver plutôt
                            </a>
                            <button type="submit" class="kt-btn kt-btn-destructive">
                                Supprimer le compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
    @php
        $type = session('success') ? 'success' : (session('error') || $errors->any() ? 'error' : null);
        $message = session('success') ?? session('error') ?? ($errors->any() ? $errors->first() : null);
    @endphp

    @if ($type && $message)
    <div id="floating-alert"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-6 z-100 px-6 py-4 rounded shadow-lg flex items-center gap-3
                transition-all duration-500 ease-in-out opacity-0 scale-95
                {{ $type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' }}">
        @if ($type === 'success')
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-green-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-red-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        @endif

        <span>{{ $message }}</span>
    </div>
    @endif
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.onload = () => {
            const alert = document.getElementById('floating-alert');
            if (alert) {
                // Affiche avec animation (scale + fade)
                setTimeout(() => {
                    alert.classList.remove('opacity-0', 'scale-95');
                    alert.classList.add('opacity-100', 'scale-100');
                }, 100); // petit délai pour trigger l'animation CSS

                // Masquer après 5 secondes
                setTimeout(() => {
                    alert.classList.remove('opacity-100', 'scale-100');
                    alert.classList.add('opacity-0', 'scale-95');

                    // Supprimer du DOM après disparition
                    setTimeout(() => {
                        alert.remove();
                    }, 500); // correspond à la durée de transition
                }, 5000);
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
            const avatarContainer = document.getElementById('avatar-container');
            const avatarInput = document.getElementById('avatar-input');
            const avatarPreview = document.getElementById('avatar-preview');
            const avatarRemoveBtn = document.getElementById('avatar-remove-btn');
            const defaultAvatarUrl = '{{ asset('assets/media/avatars/blank.png') }}';

            // Fonction pour mettre à jour l'état visuel
            function updateAvatarState(imageUrl) {
                if (imageUrl && imageUrl !== defaultAvatarUrl) {
                    avatarPreview.style.backgroundImage = `url('${imageUrl}')`;
                    avatarContainer.classList.add('has-avatar');
                } else {
                    avatarPreview.style.backgroundImage = `url('${defaultAvatarUrl}')`;
                    avatarContainer.classList.remove('has-avatar');
                }
            }

            // Appliquer l'état initial
            updateAvatarState(avatarPreview.style.backgroundImage.slice(5, -2)); // Extrait l'URL de l'attribut style

            // Gérer le changement de fichier
            avatarInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        updateAvatarState(event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Gérer la suppression de l'image
            avatarRemoveBtn.addEventListener('click', function(event) {
                event.stopPropagation(); // Empêche le clic de se propager à l'input
                avatarInput.value = ''; // Réinitialise l'input de fichier
                updateAvatarState('');
            });

            // JavaScript pour gérer le switch du formulaire des documents
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    let container = this.closest('div.flex.items-center.justify-between');
                    console.log(container);
                    container.querySelectorAll('.file-view').forEach((view, i) => { view.classList.add('hidden') });
                    container.querySelector('.file-edit').classList.remove('hidden');
                });
            });

            document.querySelectorAll('.cancel-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    let container = this.closest('div.flex.items-center.justify-between');
                    container.querySelector('.file-edit').classList.add('hidden');
                    container.querySelectorAll('.file-view').forEach((view, i) => { view.classList.remove('hidden') });
                });
            });
        });

    </script>
@endsection
