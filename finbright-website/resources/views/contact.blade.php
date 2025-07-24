@extends('layouts.app')

@section('title', 'Contact - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class=" text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Contactez-nous</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Notre équipe est à votre disposition pour répondre à toutes vos questions
        </p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Informations de contact -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Nos coordonnées</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Email</h3>
                                <p class="text-gray-600">contact@finbright.fr</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Téléphone</h3>
                                <p class="text-gray-600">07 66 01 96 69</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Adresse</h3>
                                <p class="text-gray-600">542 Rue Daniel Blervaque<br>Carrières-sous-Poissy, 78955</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Suivez-nous</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center text-white hover:bg-finbright-cyan transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center text-white hover:bg-finbright-cyan transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center text-white hover:bg-finbright-cyan transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-finbright-purple rounded-full flex items-center justify-center text-white hover:bg-finbright-cyan transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Formulaire de contact -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Envoyez-nous un message</h2>
                    
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="user_type" class="block text-sm font-medium text-gray-700 mb-1">Vous êtes*</label>
                            <select id="user_type" name="user_type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-finbright-purple focus:border-finbright-purple @error('user_type') border-red-500 @enderror">
                                <option value="">Sélectionnez une option</option>
                                <option value="investor" {{ old('user_type') == 'investor' ? 'selected' : '' }}>Investisseur</option>
                                <option value="borrower" {{ old('user_type') == 'borrower' ? 'selected' : '' }}>Emprunteur</option>
                                <option value="other" {{ old('user_type') == 'other' ? 'selected' : '' }}>Autre</option>
                            </select>
                            @error('user_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet*</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-finbright-purple focus:border-finbright-purple @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-finbright-purple focus:border-finbright-purple @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-finbright-purple focus:border-finbright-purple @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Sujet*</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-finbright-purple focus:border-finbright-purple @error('subject') border-red-500 @enderror">
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message*</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-finbright-purple focus:border-finbright-purple @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center">
                            <input id="privacy_policy" name="privacy_policy" type="checkbox" class="h-4 w-4 text-finbright-purple focus:ring-finbright-purple border-gray-300 rounded @error('privacy_policy') border-red-500 @enderror">
                            <label for="privacy_policy" class="ml-2 block text-sm text-gray-700">
                                J'accepte la <a href="{{ route('privacy-policy') }}" class="text-finbright-purple hover:underline">politique de confidentialité</a>*
                            </label>
                        </div>
                        @error('privacy_policy')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        
                        <div>
                            <button type="submit" class="w-full bg-finbright-purple text-white py-3 px-6 rounded-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Call to Action Section -->
<section class="py-20" style="background: linear-gradient(#B803C9FF 20%, #790384 100%);">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Prêt à rejoindre l'aventure Fin'Bright ?</h2>
        <p class="text-xl text-white mb-8 max-w-3xl mx-auto">
            Que vous soyez investisseur ou emprunteur, nous sommes là pour vous accompagner dans votre parcours financier.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="#" class="bg-white text-finbright-purple px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                S'inscrire maintenant
            </a>
            <a href="{{ route('faq') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                En savoir plus
            </a>
        </div>
    </div>
</section>


@endsection