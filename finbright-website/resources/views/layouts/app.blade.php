<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fin\'Bright - Plateforme de Financement Participatif')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'finbright-purple': '#B803C9FF',
                        'finbright-cyan': '#018bff',
                        'finbright-dark-purple': '#9D03ABFF',
                        'finbright-light-cyan': '#018bff'
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="" style="background: #fcfaf6;">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/FinBright_Bleu_digital.png') }}" style="height: 120px;" alt="Fin'Bright Logo" class="h-20">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-finbright-purple font-semibold border-b-2 border-finbright-purple' : 'text-gray-700 hover:text-finbright-purple' }} transition-colors pb-1">Accueil</a>
                    <a href="{{ route('how-it-works') }}" class="{{ request()->routeIs('how-it-works') ? 'text-finbright-purple font-semibold border-b-2 border-finbright-purple' : 'text-gray-700 hover:text-finbright-purple' }} transition-colors pb-1">Emprunter</a>
                    <a href="{{ route('how-to-invest') }}" class="{{ request()->routeIs('how-to-invest') ? 'text-finbright-purple font-semibold border-b-2 border-finbright-purple' : 'text-gray-700 hover:text-finbright-purple' }} transition-colors pb-1">Investir</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-finbright-purple font-semibold border-b-2 border-finbright-purple' : 'text-gray-700 hover:text-finbright-purple' }} transition-colors pb-1">À propos</a>
                    <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'text-finbright-purple font-semibold border-b-2 border-finbright-purple' : 'text-gray-700 hover:text-finbright-purple' }} transition-colors pb-1">FAQ</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-finbright-purple font-semibold border-b-2 border-finbright-purple' : 'text-gray-700 hover:text-finbright-purple' }} transition-colors pb-1">Contact</a>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="bg-finbright-cyan text-white px-4 py-2 rounded-lg hover:bg-finbright-light-cyan transition-colors">
                        Connexion
                    </button>
                    <button class="bg-finbright-purple text-white px-4 py-2 rounded-lg hover:bg-finbright-dark-purple transition-colors">
                        S'inscrire
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-finbright-purple">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 {{ request()->routeIs('home') ? 'text-finbright-purple font-semibold bg-purple-50' : 'text-gray-700 hover:text-finbright-purple' }}">Accueil</a>
                <a href="{{ route('how-it-works') }}" class="block px-3 py-2 {{ request()->routeIs('how-it-works') ? 'text-finbright-purple font-semibold bg-purple-50' : 'text-gray-700 hover:text-finbright-purple' }}">Emprunter</a>
                <a href="{{ route('how-to-invest') }}" class="block px-3 py-2 {{ request()->routeIs('how-to-invest') ? 'text-finbright-purple font-semibold bg-purple-50' : 'text-gray-700 hover:text-finbright-purple' }}">Investir</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 {{ request()->routeIs('about') ? 'text-finbright-purple font-semibold bg-purple-50' : 'text-gray-700 hover:text-finbright-purple' }}">À propos</a>
                <a href="{{ route('faq') }}" class="block px-3 py-2 {{ request()->routeIs('faq') ? 'text-finbright-purple font-semibold bg-purple-50' : 'text-gray-700 hover:text-finbright-purple' }}">FAQ</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 {{ request()->routeIs('contact') ? 'text-finbright-purple font-semibold bg-purple-50' : 'text-gray-700 hover:text-finbright-purple' }}">Contact</a>
                <div class="flex flex-col space-y-2 px-3 py-2">
                    <button class="bg-finbright-cyan text-white px-4 py-2 rounded-lg hover:bg-finbright-light-cyan transition-colors">
                        Connexion
                    </button>
                    <button class="bg-finbright-purple text-white px-4 py-2 rounded-lg hover:bg-finbright-dark-purple transition-colors">
                        S'inscrire
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo et description -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-finbright-purple rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">F</span>
                        </div>
                        <span class="text-2xl font-bold text-white">Fin'Bright</span>
                    </div>
                    <p class="text-gray-300 mb-4">
 Nous connectons des étudiants brillants et des investisseurs solidaires pour bâtir un avenir plus équitable par l’accès à l’enseignement supérieur.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-finbright-cyan transition-colors">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-finbright-cyan transition-colors">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-finbright-cyan transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Liens rapides -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('how-it-works') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Comment emprunter</a></li>
                        <li><a href="{{ route('how-to-invest') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Comment investir</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">À propos</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <!-- Légal -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Légal</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('legal-mentions') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Mentions légales</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Politique de confidentialité</a></li>
                        <li><a href="{{ route('terms-of-use') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">CGU</a></li>
                        <li><a href="{{ route('extinctive-management') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Gestion Extinctive</a></li>
                        <li><a href="{{ route('risk-levels') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Niveau des risques des projets</a></li>
                        <li><a href="{{ route('risk-management') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Politique de gestion des risques</a></li>
                        <li><a href="{{ route('glossary') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Glossaire</a></li>
                        <!-- <li><a href="{{ route('legal-framework') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Cadre juridique de l'activité</a></li> -->
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-finbright-cyan transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-300">&copy; 2025 Fin'Bright. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    <!-- Simulateur de financement -->
    <script src="{{ asset('js/simulator.js') }}"></script>
</body>
</html>