@extends('layouts.app')

@section('title', 'À propos - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-finbright-purple to-finbright-cyan text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">À propos de Fin'Bright</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Découvrez qui nous sommes, notre mission et nos valeurs
        </p>
    </div>
</section>

<!-- Qui sommes-nous Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-users text-finbright-purple mr-4"></i>
                    Qui sommes-nous ?
                </h2>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-8 md:p-12">
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                    Fin'Bright est un <strong class="text-finbright-purple">Peer-2-Peer Lending entre particuliers</strong> qui réunit des étudiants brillants en quête de financement et des particuliers souhaitant donner du sens à leur épargne. Nous offrons une alternative aux solutions bancaires classiques pour permettre à chacun d'accéder à des opportunités de financement éthiques et transparentes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Notre Mission Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-bullseye text-finbright-cyan mr-4"></i>
                    Notre mission
                </h2>
            </div>
            
            <div class="bg-white rounded-2xl p-8 md:p-12 shadow-lg">
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center mb-8">
                    Nous voulons rendre le financement plus <strong class="text-finbright-purple">accessible, humain et solidaire</strong>.
                </p>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                    Notre objectif est d'encourager l'excellence éducative et d'apporter une réponse rapide aux besoins ponctuels des particuliers, tout en créant un <strong class="text-finbright-cyan">impact social positif et durable</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Nos Valeurs Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                <i class="fas fa-heart text-finbright-purple mr-4"></i>
                Nos valeurs
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Transparence -->
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Transparence</h3>
                <p class="text-gray-700">dans chaque transaction</p>
            </div>
            
            <!-- Confiance -->
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Confiance mutuelle</h3>
                <p class="text-gray-700">entre emprunteurs et investisseurs</p>
            </div>
            
            <!-- Innovation -->
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Innovation</h3>
                <p class="text-gray-700">pour améliorer l'expérience utilisateur</p>
            </div>
            
            <!-- Impact social -->
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Impact social</h3>
                <p class="text-gray-700">mesurable</p>
            </div>
            
            <!-- Accessibilité -->
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow md:col-span-2 lg:col-span-1">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-universal-access text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Accessibilité</h3>
                <p class="text-gray-700">pour tous les publics</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-finbright-purple to-finbright-cyan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Rejoignez la communauté Fin'Bright
        </h2>
        <p class="text-xl text-white mb-8 opacity-90 max-w-2xl mx-auto">
            Que vous soyez étudiant ou investisseur, découvrez comment nous pouvons vous accompagner
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('how-it-works') }}" class="bg-white text-finbright-purple px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                <i class="fas fa-graduation-cap mr-2"></i>
                Je suis étudiant
            </a>
            <a href="{{ route('how-to-invest') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                <i class="fas fa-chart-line mr-2"></i>
                Je veux investir
            </a>
        </div>
    </div>
</section>
@endsection