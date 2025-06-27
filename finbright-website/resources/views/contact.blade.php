@extends('layouts.app')

@section('title', 'Contact | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Contactez <span class="text-finbright-cyan">Fin'Bright</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Notre équipe est à votre disposition pour répondre à toutes vos questions.
        </p>
    </div>
</section>

<!-- Section Contact -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Formulaire de contact -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">
                    Envoyez-nous un <span class="text-finbright-purple">message</span>
                </h2>
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Sujet *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent" placeholder="Sujet de votre message">
                        </div>
                    </div>
                    
                    <div>
                        <label for="user_type" class="block text-sm font-medium text-gray-700 mb-2">Vous êtes *</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="flex items-center">
                                <input type="radio" name="user_type" value="investor" {{ old('user_type') == 'investor' ? 'checked' : '' }} class="text-finbright-purple focus:ring-finbright-purple">
                                <span class="ml-2">Investisseur</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="user_type" value="borrower" {{ old('user_type') == 'borrower' ? 'checked' : '' }} class="text-finbright-purple focus:ring-finbright-purple">
                                <span class="ml-2">Emprunteur</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="user_type" value="other" {{ old('user_type') == 'other' ? 'checked' : '' }} class="text-finbright-purple focus:ring-finbright-purple">
                                <span class="ml-2">Autre</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                        <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent" placeholder="Décrivez votre demande en détail...">{{ old('message') }}</textarea>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="privacy" name="privacy" required class="text-finbright-purple focus:ring-finbright-purple">
                        <label for="privacy" class="ml-2 text-sm text-gray-600">
                            J'accepte la <a href="{{ route('privacy-policy') }}" class="text-finbright-purple hover:underline">politique de confidentialité</a> *
                        </label>
                    </div>
                    
                    <button type="submit" class="w-full bg-finbright-purple text-white py-4 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Envoyer le message
                    </button>
                </form>
            </div>
            
            <!-- Informations de contact -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">
                    Nos <span class="text-finbright-cyan">coordonnées</span>
                </h2>
                
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Adresse</h3>
                            <p class="text-gray-600">
                                15 Rue de la Banque<br>
                                75002 Paris, France<br>
                                <span class="text-sm text-gray-500">Métro : Bourse (ligne 3) ou Sentier (ligne 3)</span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Téléphone</h3>
                            <p class="text-gray-600">
                                <a href="tel:+33142975800" class="hover:text-finbright-purple transition-colors">+33 1 42 97 58 00</a><br>
                                <span class="text-sm text-gray-500">Service client : +33 1 42 97 58 01</span><br>
                                <span class="text-sm text-gray-500">Lundi - Vendredi : 9h - 18h</span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                            <p class="text-gray-600">
                                <a href="mailto:contact@finbright.fr" class="hover:text-finbright-purple transition-colors">contact@finbright.fr</a><br>
                                <a href="mailto:support@finbright.fr" class="hover:text-finbright-purple transition-colors">support@finbright.fr</a><br>
                                <a href="mailto:investisseurs@finbright.fr" class="hover:text-finbright-purple transition-colors">investisseurs@finbright.fr</a><br>
                                <a href="mailto:emprunteurs@finbright.fr" class="hover:text-finbright-purple transition-colors">emprunteurs@finbright.fr</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Horaires d'ouverture</h3>
                            <p class="text-gray-600">
                                Lundi - Vendredi : 9h00 - 18h00<br>
                                Samedi : 10h00 - 16h00<br>
                                Dimanche : Fermé
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Réseaux sociaux -->
                <div class="mt-12">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center text-white hover:bg-finbright-dark-purple transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center text-white hover:bg-finbright-dark-cyan transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center text-white hover:bg-finbright-dark-purple transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center text-white hover:bg-finbright-dark-cyan transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Carte -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Venez nous <span class="text-finbright-purple">rencontrer</span>
            </h2>
            <p class="text-xl text-gray-600">
                Nos bureaux sont situés au cœur de Paris, facilement accessibles en transport en commun.
            </p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="h-96 bg-gray-200 flex items-center justify-center">
                <div class="text-center text-gray-500">
                    <i class="fas fa-map text-6xl mb-4"></i>
                    <p class="text-lg">Carte interactive</p>
                    <p class="text-sm">123 Avenue des Champs-Élysées, 75008 Paris</p>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-subway text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Métro</h3>
                <p class="text-gray-600">Ligne 1, 9, 13 - Station Champs-Élysées</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bus text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Bus</h3>
                <p class="text-gray-600">Lignes 28, 42, 73, 80 - Arrêt Champs-Élysées</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-car text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Parking</h3>
                <p class="text-gray-600">Parking Champs-Élysées à 2 minutes à pied</p>
            </div>
        </div>
    </div>
</section>

<!-- Section FAQ Rapide -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">
            Questions <span class="text-finbright-cyan">fréquentes</span>
        </h2>
        <p class="text-xl text-gray-600 mb-12">
            Consultez notre FAQ pour obtenir des réponses immédiates à vos questions.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-xl p-6">
                <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-question text-white"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Questions générales</h3>
                <p class="text-gray-600 mb-4">Fonctionnement de la plateforme, réglementation, sécurité</p>
                <a href="/faq" class="text-finbright-purple hover:underline font-semibold">
                    Voir les réponses <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-headset text-white"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Support technique</h3>
                <p class="text-gray-600 mb-4">Problèmes de connexion, utilisation de la plateforme</p>
                <a href="/faq" class="text-finbright-cyan hover:underline font-semibold">
                    Obtenir de l'aide <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection