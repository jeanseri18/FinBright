@extends('layouts.app')

@section('title', 'À propos | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            À propos de <span class="text-finbright-cyan">Fin'Bright</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Découvrez notre mission, nos valeurs et l'équipe qui révolutionne le financement participatif.
        </p>
    </div>
</section>

<!-- Section Mission -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Notre <span class="text-finbright-purple">Mission</span>
                </h2>
                <p class="text-xl text-gray-600 mb-6">
                    Fin'Bright révolutionne l'accès au financement en connectant directement les porteurs de projets avec les investisseurs. Notre plateforme de fintech démocratise l'investissement et offre des opportunités de financement alternatives.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Nous croyons que chaque projet mérite sa chance et que chaque épargnant devrait pouvoir diversifier ses investissements tout en soutenant l'économie réelle.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-handshake text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Connecter projets et investisseurs</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-line text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Démocratiser l'investissement</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-seedling text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Soutenir l'économie réelle</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-bullseye text-6xl mb-4"></i>
                        <p class="text-lg">Notre mission</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Valeurs -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Nos <span class="text-finbright-purple">Valeurs</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Les principes qui guident chacune de nos actions et décisions.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Transparence</h3>
                <p class="text-gray-600">Information claire et accessible sur tous nos projets et processus</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sécurité</h3>
                <p class="text-gray-600">Protection maximale des données et des investissements de nos utilisateurs</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Accessibilité</h3>
                <p class="text-gray-600">Plateforme simple et intuitive, ouverte à tous les profils d'utilisateurs</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Innovation</h3>
                <p class="text-gray-600">Technologies de pointe pour une expérience utilisateur optimale</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Histoire -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex justify-center order-2 lg:order-1">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-history text-6xl mb-4"></i>
                        <p class="text-lg">Notre histoire</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Notre <span class="text-finbright-purple">Histoire</span>
                </h2>
                <div class="space-y-6">
                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">2023 - Création</h3>
                        <p class="text-gray-600">Lancement de Fin'Bright avec une vision claire : démocratiser l'accès au financement participatif.</p>
                    </div>
                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">2024 - Croissance</h3>
                        <p class="text-gray-600">Développement de notre plateforme technologique et premiers projets financés avec succès.</p>
                    </div>
                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Aujourd'hui</h3>
                        <p class="text-gray-600">Une communauté grandissante d'investisseurs et de porteurs de projets qui nous font confiance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Équipe -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Notre <span class="text-finbright-purple">Équipe</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Des experts passionnés qui travaillent chaque jour pour faire de Fin'Bright la référence du financement participatif.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden">
                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#8B5CF6"/>
                        <circle cx="50" cy="35" r="12" fill="white"/>
                        <path d="M25 75 Q25 60 50 60 Q75 60 75 75 L75 100 L25 100 Z" fill="white"/>
                        <text x="50" y="85" text-anchor="middle" fill="#8B5CF6" font-size="8" font-weight="bold">MD</text>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Marie Dubois-Leclerc</h3>
                <p class="text-finbright-purple font-semibold mb-4">CEO & Fondatrice</p>
                <p class="text-gray-600">Diplômée HEC Paris, 15 ans d'expérience chez BNP Paribas et Crédit Agricole. Spécialiste en fintech et finance participative.</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-finbright-purple hover:text-finbright-dark-purple">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="text-finbright-purple hover:text-finbright-dark-purple">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden">
                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#06B6D4"/>
                        <circle cx="50" cy="35" r="12" fill="white"/>
                        <path d="M25 75 Q25 60 50 60 Q75 60 75 75 L75 100 L25 100 Z" fill="white"/>
                        <text x="50" y="85" text-anchor="middle" fill="#06B6D4" font-size="8" font-weight="bold">TM</text>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Thomas Martin-Rousseau</h3>
                <p class="text-finbright-cyan font-semibold mb-4">CTO & Co-fondateur</p>
                <p class="text-gray-600">Ingénieur Polytechnique, ancien Lead Developer chez Lydia et Qonto. Expert en architecture de plateformes financières sécurisées.</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-finbright-cyan hover:text-finbright-light-cyan">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="text-finbright-cyan hover:text-finbright-light-cyan">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden">
                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#8B5CF6"/>
                        <circle cx="50" cy="35" r="12" fill="white"/>
                        <path d="M25 75 Q25 60 50 60 Q75 60 75 75 L75 100 L25 100 Z" fill="white"/>
                        <text x="50" y="85" text-anchor="middle" fill="#8B5CF6" font-size="8" font-weight="bold">SL</text>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Sophie Laurent-Moreau</h3>
                <p class="text-finbright-purple font-semibold mb-4">Directrice Risques & Conformité</p>
                <p class="text-gray-600">Diplômée Sciences Po, 12 ans chez Société Générale. Spécialiste en analyse de risques, conformité réglementaire et ACPR.</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-finbright-purple hover:text-finbright-dark-purple">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden">
                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#06B6D4"/>
                        <circle cx="50" cy="35" r="12" fill="white"/>
                        <path d="M25 75 Q25 60 50 60 Q75 60 75 75 L75 100 L25 100 Z" fill="white"/>
                        <text x="50" y="85" text-anchor="middle" fill="#06B6D4" font-size="8" font-weight="bold">AL</text>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Antoine Lefebvre</h3>
                <p class="text-finbright-cyan font-semibold mb-4">Directeur Commercial</p>
                <p class="text-gray-600">MBA ESSEC, 10 ans d'expérience chez October et Lendix. Expert en développement commercial et relation client B2B.</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-finbright-cyan hover:text-finbright-light-cyan">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden">
                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#8B5CF6"/>
                        <circle cx="50" cy="35" r="12" fill="white"/>
                        <path d="M25 75 Q25 60 50 60 Q75 60 75 75 L75 100 L25 100 Z" fill="white"/>
                        <text x="50" y="85" text-anchor="middle" fill="#8B5CF6" font-size="8" font-weight="bold">CD</text>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Camille Durand</h3>
                <p class="text-finbright-purple font-semibold mb-4">Directrice Marketing</p>
                <p class="text-gray-600">Master Marketing Digital Dauphine, 8 ans chez Boursorama et N26. Spécialiste en acquisition digitale et growth hacking.</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-finbright-purple hover:text-finbright-dark-purple">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                <div class="w-24 h-24 rounded-full mx-auto mb-6 overflow-hidden">
                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#06B6D4"/>
                        <circle cx="50" cy="35" r="12" fill="white"/>
                        <path d="M25 75 Q25 60 50 60 Q75 60 75 75 L75 100 L25 100 Z" fill="white"/>
                        <text x="50" y="85" text-anchor="middle" fill="#06B6D4" font-size="8" font-weight="bold">JB</text>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Julien Bernard</h3>
                <p class="text-finbright-cyan font-semibold mb-4">Directeur Produit</p>
                <p class="text-gray-600">Ingénieur Centrale Paris, 9 ans chez Klarna et PayPal. Expert en UX/UI et développement produit fintech.</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-finbright-cyan hover:text-finbright-light-cyan">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Chiffres -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-6">
                Fin'Bright en <span class="text-finbright-cyan">Chiffres</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-finbright-cyan mb-2">2M€</div>
                <p class="text-white">Montant total financé</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-finbright-cyan mb-2">150+</div>
                <p class="text-white">Projets financés</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-finbright-cyan mb-2">1,200+</div>
                <p class="text-white">Investisseurs actifs</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-finbright-cyan mb-2">9.5%</div>
                <p class="text-white">Rendement moyen</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Réglementation -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Conformité</span> & Réglementation
                </h2>
                <p class="text-xl text-gray-600 mb-6">
                    Fin'Bright respecte scrupuleusement la réglementation française et européenne en matière de financement participatif.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-certificate text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Agréé par l'ACPR (Autorité de Contrôle Prudentiel)</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-balance-scale text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Conforme aux directives européennes MiFID II</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Protection des données selon RGPD</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-file-contract text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Membre de l'association Financement Participatif France</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-award text-6xl mb-4"></i>
                        <p class="text-lg">Certifications</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="bg-finbright-cyan py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-white mb-6">
            Rejoignez l'aventure Fin'Bright
        </h2>
        <p class="text-xl text-white mb-8">
            Que vous soyez investisseur ou porteur de projet, découvrez comment Fin'Bright peut vous accompagner.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-finbright-cyan px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                <i class="fas fa-user-plus mr-2"></i>
                Devenir investisseur
            </button>
            <button class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-finbright-cyan transition-colors">
                <i class="fas fa-lightbulb mr-2"></i>
                Proposer un projet
            </button>
        </div>
    </div>
</section>
@endsection