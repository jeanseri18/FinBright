<!DOCTYPE html>
<!--
Author: DIGIT'comm - Moussa Fofana
Product Name: Fin'Bright
Website: https://digitcommunication.ci/
Email: 
Contact: 
-->
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="DIGIT'comm : Moussa Fofana" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Sign in page using Tailwind CSS" name="description"/>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicons -->
        <link href="{{asset('assets/media/app/apple-touch-icon.png')}}" rel="apple-touch-icon" sizes="180x180"/>
        <link href="{{asset('assets/media/app/favicon-32x32.png')}}" rel="icon" sizes="32x32" type="image/png"/>
        <link href="{{asset('assets/media/app/favicon-16x16.png')}}" rel="icon" sizes="16x16" type="image/png"/>
        <link href="{{asset('assets/media/app/favicon.ico')}}" rel="shortcut icon"/>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
        <!-- <link href="/static/metronic/tailwind/dist/assets/vendors/apexcharts/apexcharts.css" rel="stylesheet"/> -->

        <link href="{{asset('assets/vendors/keenicons/styles.bundle.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased flex h-full text-base text-foreground bg-background">
        <!-- Theme Mode -->
        <script>
            const defaultThemeMode = 'light'; // light|dark|system
            let themeMode;

            if (document.documentElement) {
                if (localStorage.getItem('kt-theme')) {
                    themeMode = localStorage.getItem('kt-theme');
                } else if (
                    document.documentElement.hasAttribute('data-kt-theme-mode')
                ) {
                    themeMode =
                        document.documentElement.getAttribute('data-kt-theme-mode');
                } else {
                    themeMode = defaultThemeMode;
                }

                if (themeMode === 'system') {
                    themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                        'dark' :
                        'light';
                }

                document.documentElement.classList.add(themeMode);
            }
        </script>
        <!-- End of Theme Mode -->
        <!-- Page -->
        <style>
            .branded-bg {
                background-image: url({{asset('assets/media/images/2600x1600/1.png')}});
            }

            .dark .branded-bg {
                background-image: url({{asset('assets/media/images/2600x1600/1-dark.png')}});
            }
        </style>
        <div class="grid lg:grid-cols-2 grow">
            <div class="flex justify-center items-center p-8 lg:p-10 order-2 lg:order-1">
                <div class="kt-card max-w-[370px] w-full">
                    <form action="{{ route('login') }}" method="POST" class="kt-card-content flex flex-col gap-5 p-10" id="sign_in_form">
                        <div class="text-center mb-2.5">
                            <h3 class="text-lg font-medium text-mono leading-none mb-2.5">
                                Connexion
                            </h3>
                            <div class="flex items-center justify-center font-medium">
                                <span class="text-sm text-secondary-foreground me-1.5">
                                    Portail d'accès sécurisé
                                </span>
                            </div>
                        </div>
                        <!-- Email Address -->
                        <div class="flex flex-col gap-1">
                            <label for="email" class="kt-form-label font-normal text-mono">Adresse Email</label>
                            <x-text-input id="email" class="kt-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center justify-between gap-1">
                                <label for="password" class="kt-form-label font-normal text-mono">Mot de passe</label>
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

                        <!-- Remember Me -->
                        <label for="remember_me" class="kt-label">
                            <input id="remember_me" type="checkbox" class="kt-checkbox kt-checkbox-sm" name="remember">
                            <span class="kt-checkbox-label">{{ __('Se souvenir de moi') }}</span>
                        </label>

                        <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
                            {{ __('Se connecter') }}
                        </button>
                    </form>
                </div>
            </div>
            <div
                class="lg:rounded-xl lg:border lg:border-border lg:m-5 order-1 lg:order-2 bg-top xxl:bg-center xl:bg-cover bg-no-repeat branded-bg">
                <div class="flex flex-col p-8 lg:p-16 gap-4">
                    <a href="/metronic/tailwind/demo10/">
                        <img class="h-[28px] max-w-none"
                            src="{{asset('assets/media/app/mini-logo.svg')}}" />
                    </a>
                    <div class="flex flex-col gap-3">
                        <h3 class="text-2xl font-semibold text-mono">
                            Portail d'accès sécurisé
                        </h3>
                        <div class="text-base font-medium text-secondary-foreground">
                            Une passerelle d'authentification robuste 
                            <br />
                            garantissant 
                            <span class="text-mono font-semibold">
                                un accès sécurisé et efficace des utilisateurs 
                            </span>
                            <br>
                            à l'interface AdminDashboard.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Page -->
        <!-- Scripts -->
        <script src="{{asset('assets/js/core.bundle.js')}}"></script>
        <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
        <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
        <!-- End of Scripts -->
    </body>
</html>
