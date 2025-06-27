@extends('layouts.app')

@section('title', 'Comment ça marche - Emprunteurs | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Comment emprunter sur <span class="text-finbright-cyan">Fin'Bright</span> ?
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Découvrez notre processus simple et transparent pour financer vos projets grâce au prêt participatif.
        </p>
    </div>
</section>

<!-- Section Simulateur -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">1.</span> Simulez votre besoin
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Utilisez notre simulateur pour estimer votre capacité d'emprunt selon le montant souhaité, la durée et vos possibilités de remboursement.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-calculator text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Simulation instantanée et gratuite</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-bar text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Estimation personnalisée</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Résultat en moins de 2 minutes</span>
                    </div>
                </div>
                <button class="mt-8 bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                    <i class="fas fa-calculator mr-2"></i>
                    Faire une simulation
                </button>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-calculator text-6xl mb-4"></i>
                        <p class="text-lg">Simulateur de prêt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Dossier -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex justify-center order-2 lg:order-1">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-folder-open text-6xl mb-4"></i>
                        <p class="text-lg">Interface de création</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">2.</span> Créez votre dossier
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Complétez votre profil, téléversez les pièces justificatives et présentez clairement votre projet. Notre équipe étudie chaque demande pour s'assurer de sa viabilité.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-user-edit text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Profil complet et sécurisé</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-upload text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Upload de documents simplifié</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Validation par notre équipe d'experts</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Collecte -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">3.</span> Collectez les fonds
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Une fois validé, votre projet est mis en ligne. Vous pouvez suivre en temps réel les investissements et atteindre votre objectif.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-globe text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Projet visible par tous les investisseurs</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-line text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Suivi en temps réel des investissements</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bullhorn text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Outils de promotion intégrés</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-users text-6xl mb-4"></i>
                        <p class="text-lg">Collecte de fonds</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Réception -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex justify-center order-2 lg:order-1">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-hand-holding-usd text-6xl mb-4"></i>
                        <p class="text-lg">Réception des fonds</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">4.</span> Recevez et utilisez les fonds
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Les fonds sont débloqués lorsque 100% du financement est atteint. Vous pouvez alors déployer votre projet.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Transfert sécurisé via Stripe</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bolt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Déblocage rapide des fonds</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-rocket text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Lancement immédiat de votre projet</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Remboursement -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">5.</span> Remboursez sereinement
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Respectez l'échéancier défini. Vous bénéficiez de rappels automatiques et de notre accompagnement.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Échéancier personnalisé</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bell text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Rappels automatiques</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-headset text-finbright-cyan text-xl mr-4"></i>
                        <span class="text-gray-700">Accompagnement personnalisé</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-calendar-check text-6xl mb-4"></i>
                        <p class="text-lg">Suivi des remboursements</p>
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
            Prêt à financer votre projet ?
        </h2>
        <p class="text-xl text-white mb-8">
            Commencez dès maintenant avec notre simulateur gratuit et découvrez vos possibilités de financement.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-finbright-cyan px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                <i class="fas fa-calculator mr-2"></i>
                Simuler mon financement
            </button>
            <button class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-finbright-cyan transition-colors">
                <i class="fas fa-phone mr-2"></i>
                Nous contacter
            </button>
        </div>
    </div>
</section>
@endsection