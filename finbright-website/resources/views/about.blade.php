@extends('layouts.app')

@section('title', 'À propos - Fin\'Bright')

@section('content')
<!-- Hero Section avec galerie d'images à hauteurs variables -->
<section class="bg-white py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Titre principal -->
    <div class="text-center mb-16">
      <h1 class="text-4xl md:text-6xl font-bold mb-6 text-gray-900">
        À propos de <span class="text-finbright-purple">Fin'Bright</span>
      </h1>
      <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-gray-600">
        Découvrez qui nous sommes, notre mission et nos valeurs
      </p>
    </div>

    <!-- Galerie style mosaïque -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 place-items-center">
      <!-- Carte 1 -->
      <div class="rounded-xl overflow-hidden h-[280px] md:h-[320px]">
        <img src="{{ asset('images/jeune-femme-avec-sac-de-sport-et-ordinateur-dans-la-rue.jpg') }}"
             alt="Étudiante avec ordinateur"
             class="w-full h-full object-cover rounded-xl shadow-sm" />
      </div>

      <!-- Carte 2 (plus haute) -->
      <div class="rounded-xl overflow-hidden h-[360px] md:h-[400px] md:w-[100%]">
        <img src="{{ asset('images/portrait-etudiant-masculin-avec-des-livres.jpg') }}"
             alt="Étudiant avec livre"
             class="w-full h-full object-cover rounded-xl shadow-sm" />
      </div>

      <!-- Carte 3 (moyenne) -->
      <div class="rounded-xl overflow-hidden h-[300px] md:h-[340px]">
        <img src="{{ asset('images/amis-smiley-posant-avec-des-livres.jpg') }}"
             alt="Étudiants avec livres"
             class="w-full h-full object-cover rounded-xl shadow-sm" />
      </div>

      <!-- Carte 4 (plus basse) -->
      <div class="rounded-xl overflow-hidden h-[260px] md:h-[300px]">
        <img src="{{ asset('images/joyeuse-etudiante-africaine-belle-femme-souriante-tenant-des-livres-a-l-universite-concept-de-l-education.jpg') }}"
             alt="Étudiante souriante"
             class="w-full h-full object-cover rounded-xl shadow-sm" />
      </div>

      <!-- Carte 5 (grande) -->
      <div class="rounded-xl overflow-hidden h-[380px] md:h-[420px]">
        <img src="{{ asset('images/portrait-jeune-etudiant-porter-sac-epaule-et-livres-main-tenir-contre-mur-rouge.jpg') }}"
             alt="Étudiant avec sac"
             class="w-full h-full object-cover rounded-xl shadow-sm" />
      </div>
    </div>
  </div>
</section>



<!-- Qui sommes-nous Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
                    <i class="fas fa-users text-finbright-purple mr-4"></i>
                    Qui sommes-nous ?
                </h2>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-8 md:p-12">
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                    
Fin'Bright est une plateforme de  <strong class="text-finbright-purple"> prêt solidaire entre particuliers, associations et fondations</strong>, qui met en relation des  <strong class="text-finbright-purple"> étudiants brillants en quête de financement</strong> et des <strong class="text-finbright-purple"> investisseurs engagés </strong> souhaitant donner du sens à leur épargne. 
 Nous offrons une alternative aux solutions bancaires classiques, pour permettre à chaque talent d’accéder à des  <strong class="text-finbright-purple">opportunités de financement éthiques, transparentes et durables</strong>.                 </p>
            </div>
        </div>
    </div>
</section>

<!-- Notre Mission Section -->
<section class="py-20 "  style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
                    <i class="fas fa-bullseye text-white mr-4"></i>
                    Notre mission
                </h2>
            </div>
            
            <div class=" rounded-2xl p-8 md:p-12 shadow-lg" style="background: #faf6ee;">
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center mb-8">
                    Nous voulons rendre le financement plus <strong class="text-finbright-purple">accessible, humain et solidaire</strong>.
                </p>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                  Notre objectif est d’encourager l’excellence éducative en facilitant l’accès à l’enseignement supérieur pour les étudiants talentueux, tout en créant un <strong class="text-finbright-cyan">impact social positif et durable</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Nos Valeurs Section -->
<section class="py-20 " style="background: #faf6ee;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
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
<section class="py-20 "  style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
            Rejoignez la communauté Fin'Bright
        </h2>
        <p class="text-xl text-white mb-8 opacity-90 max-w-2xl mx-auto">
Que vous soyez étudiant en quête de financement ou investisseur solidaire, découvrez comment nous pouvons vous accompagner pour construire ensemble un avenir plus équitable. 
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('how-it-works') }}" class="bg-white text-finbright-purple px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                <i class="fas fa-graduation-cap mr-2"></i>
                Je veux emprunter
            </a>
            <a href="{{ route('how-to-invest') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                <i class="fas fa-chart-line mr-2"></i>
                Je veux investir
            </a>
        </div>
    </div>
</section>
@endsection