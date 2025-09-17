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
        <meta content="" name="description"/>

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
        <title>@yield('title', ' | Investisseur Backoffice')</title>

        <!-- Favicons -->
        <link href="{{asset('assets/media/app/apple-touch-icon.png')}}" rel="apple-touch-icon" sizes="180x180"/>
        <link href="{{asset('assets/media/app/favicon-32x32.png')}}" rel="icon" sizes="32x32" type="image/png"/>
        <link href="{{asset('assets/media/app/favicon-16x16.png')}}" rel="icon" sizes="16x16" type="image/png"/>
        <link href="{{asset('assets/media/app/favicon.ico')}}" rel="shortcut icon"/>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
        
        <link href="{{asset('assets/vendors/apexcharts/apexcharts.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/vendors/keenicons/styles.bundle.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('stylesheet')
    </head>
    <body class="antialiased flex h-full text-base text-foreground bg-background [--header-height-default:100px] data-kt-[sticky-header=on]:[--header-height:60px] [--header-height:var(--header-height-default)]">
        <!-- Theme Mode -->
        <script>
            const defaultThemeMode = 'system'; // light|dark|system
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
					themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches
						? 'dark'
						: 'light';
				}

				document.documentElement.classList.add(themeMode);
			}
        </script>
        <!-- End of Theme Mode -->
        <!-- Page -->
        <!-- Main -->
        <div class="flex grow flex-col in-data-kt-[sticky-header=on]:pt-(--header-height)">
            <!-- Header -->
            @include('back.investisseur._navigation')

            <!-- Wrapper Container -->
            <div class="container-fixed w-full flex px-0">
                <!-- Content -->
                <main class="grow" id="content" role="content">
                    <!-- Container -->
                    @yield('content')
                    <!-- End of Container -->

                    <!-- Footer -->
                    @include('back.investisseur._footer')
                    <!-- End of Footer -->
                </main>
                <!-- End of Content -->
            </div>
            <!-- End of Wrapper Container -->
        </div>
        <!-- End of Main -->
        
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

        <!-- Scripts -->
        <script src="{{ asset('assets/js/core.bundle.js') }}"></script>
        <script src="{{ asset('assets/vendors/ktui/ktui.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>

        @yield('javascripts')
        <!-- End of Scripts -->

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
        </script>
    </body>
</html>
