@extends('layouts.app')

@section('title', 'Comment investir | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Comment investir sur <span class="text-finbright-cyan">Fin'Bright</span> ?
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Découvrez notre processus simple pour investir dans des projets porteurs et générer des revenus attractifs.
        </p>
    </div>
</section>

<!-- Section Inscription -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">1.</span> Créez votre compte
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Inscrivez-vous gratuitement en quelques minutes. Vérifiez votre identité pour accéder à tous nos services d'investissement.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-user-plus text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Inscription gratuite et rapide</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-id-card text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Vérification d'identité sécurisée</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Données protégées et cryptées</span>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="mt-8 bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors inline-block">
                    <i class="fas fa-envelope mr-2"></i>
                    Nous contacter
                </a>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-user-circle text-6xl mb-4"></i>
                        <p class="text-lg">Interface d'inscription</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Exploration -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex justify-center order-2 lg:order-1">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-search text-6xl mb-4"></i>
                        <p class="text-lg">Catalogue de projets</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">2.</span> Explorez les projets
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Parcourez notre sélection de projets vérifiés. Analysez les détails, les rendements et les profils de risque pour faire votre choix.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-filter text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Filtres avancés par secteur et risque</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-pie text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Analyse détaillée des rendements</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-file-alt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Documentation complète de chaque projet</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Investissement -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">3.</span> Investissez en toute sécurité
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Choisissez le montant à investir et validez votre transaction. Vos fonds sont sécurisés et votre investissement est immédiatement actif.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-euro-sign text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Investissement à partir de 20€</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-credit-card text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Paiement sécurisé via Stripe</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bolt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Activation immédiate de l'investissement</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-hand-holding-usd text-6xl mb-4"></i>
                        <p class="text-lg">Interface d'investissement</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Suivi -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex justify-center order-2 lg:order-1">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-chart-line text-6xl mb-4"></i>
                        <p class="text-lg">Tableau de bord</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">4.</span> Suivez vos investissements
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Accédez à votre tableau de bord personnalisé pour suivre la performance de vos investissements en temps réel.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-tachometer-alt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Tableau de bord en temps réel</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-bar text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Statistiques détaillées de performance</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bell text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Notifications automatiques</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Revenus -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">5.</span> Percevez vos revenus
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Recevez automatiquement vos intérêts selon l'échéancier défini. Réinvestissez ou retirez vos gains à tout moment.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-check text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Versements automatiques programmés</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-redo text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Option de réinvestissement automatique</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-university text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Retrait vers votre compte bancaire</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-coins text-6xl mb-4"></i>
                        <p class="text-lg">Gestion des revenus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Avantages -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-6">
                Pourquoi investir avec <span class="text-finbright-cyan">Fin'Bright</span> ?
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-percentage text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Rendements attractifs</h3>
                <p class="text-white">Jusqu'à 12% de rendement annuel selon les projets sélectionnés</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Sécurité maximale</h3>
                <p class="text-white">Projets vérifiés et analysés par notre équipe d'experts</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-pie text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Diversification</h3>
                <p class="text-white">Large choix de secteurs et de profils de risque</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="bg-finbright-cyan py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-white mb-6">
            Commencez à investir dès aujourd'hui
        </h2>
        <p class="text-xl text-white mb-8">
            Rejoignez des milliers d'investisseurs qui font fructifier leur épargne avec Fin'Bright.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-finbright-cyan px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors text-center">
                <i class="fas fa-user-plus mr-2"></i>
                Devenir investisseur
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-finbright-cyan transition-colors text-center">
                <i class="fas fa-envelope mr-2"></i>
                Nous contacter
            </a>
        </div>
    </div>
</section>
@endsection