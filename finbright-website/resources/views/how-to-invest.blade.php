@extends('layouts.app')

@section('title', 'Investir - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Investissez dans l'avenir, valorisez votre épargne et gagnez un rendement financier parmi les meilleurs
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-4xl mx-auto">
                Fin'Bright vous offre l'opportunité d'investir directement dans des projets à impact social : financement d'étudiants brillants admis dans les grandes écoles et universités les plus prestigieuses et soutien aux particuliers qui ont besoin d'un mini-prêt court pour leurs besoins urgents. Vous percevez des intérêts compétitifs tout en contribuant à la réussite et au développement de talents prometteurs.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                    Voir les projets à financer
                </button>
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Commencer à investir
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Comment ça marche Section -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Comment ça marche ?</h2>
            <p class="text-xl text-gray-600">Un processus simple et sécurisé en 6 étapes</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Étape 1 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Inscription</h3>
                </div>
                <p class="text-gray-600">
                    Inscrivez-vous et complétez votre profil investisseur en quelques minutes.
                </p>
            </div>
            
            <!-- Étape 2 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Approvisionnement</h3>
                </div>
                <p class="text-gray-600">
                    Approvisionnez votre compte via un transfert sécurisé.
                </p>
            </div>
            
            <!-- Étape 3 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Sélection</h3>
                </div>
                <p class="text-gray-600">
                    Parcourez les projets et choisissez ceux à financer selon vos préférences (durée, profil, montant, etc.). L'investissement se fait soit manuellement, soit en auto-investissement.
                </p>
            </div>
            
            <!-- Étape 4 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Investissement</h3>
                </div>
                <p class="text-gray-600">
                    Investissez à partir de petits montants pour diversifier vos placements.
                </p>
            </div>
            
            <!-- Étape 5 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">5</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Suivi</h3>
                </div>
                <p class="text-gray-600">
                    Suivez vos investissements grâce à votre tableau de bord personnel.
                </p>
            </div>
            
            <!-- Étape 6 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">6</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Remboursements</h3>
                </div>
                <p class="text-gray-600">
                    Percevez des remboursements mensuels (capital et intérêts) directement sur votre compte.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi investir avec Fin'Bright Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pourquoi investir avec Fin'Bright ?</h2>
            <p class="text-xl text-gray-600">Des avantages uniques pour vos investissements</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Avantage 1 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Impact social</h3>
                <p class="text-gray-600">
                    Soutenir la formation et l'éducation des talents d'aujourd'hui.
                </p>
            </div>
            
            <!-- Avantage 2 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Rendements attractifs</h3>
                <p class="text-gray-600">
                    Générer des rendements financiers réguliers et compétitifs.
                </p>
            </div>
            
            <!-- Avantage 3 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sécurité totale</h3>
                <p class="text-gray-600">
                    Plateforme 100% sécurisée et transparente.
                </p>
            </div>
            
            <!-- Avantage 4 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-layer-group text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Diversification simple</h3>
                <p class="text-gray-600">
                    Diversification simple de votre portefeuille.
                </p>
            </div>
            
            <!-- Avantage 5 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-user-tie text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Accompagnement personnalisé</h3>
                <p class="text-gray-600">
                    Accompagnement personnalisé et assistance dédiée.
                </p>
            </div>
        </div>
        
        <!-- Statistiques -->
        <div class="mt-16 grid md:grid-cols-3 gap-8 text-center">
            <div class="p-6">
                <div class="text-4xl font-bold text-finbright-purple mb-2">8.5%</div>
                <div class="text-gray-600">Rendement moyen annuel</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-finbright-cyan mb-2">50€</div>
                <div class="text-gray-600">Investissement minimum</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-finbright-purple mb-2">95%</div>
                <div class="text-gray-600">Taux de remboursement</div>
            </div>
        </div>
    </div>
</section>

<!-- Types d'investissement Section -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Types d'investissement</h2>
            <p class="text-xl text-gray-600">Choisissez le type d'investissement qui vous convient</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Prêts étudiants -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-university text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Prêts étudiants</h3>
                        <p class="text-finbright-purple font-semibold">Rendement : 6-10%</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    Financez les études d'étudiants brillants admis dans les plus prestigieuses grandes écoles et universités. Durée moyenne : 3-5 ans.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Profils vérifiés et sélectionnés</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Remboursement après diplôme</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Impact social fort</li>
                </ul>
            </div>
            
            <!-- Mini-prêts courts -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Mini-prêts courts</h3>
                        <p class="text-finbright-cyan font-semibold">Rendement : 8-12%</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    Soutenez des particuliers pour leurs besoins urgents avec des prêts de courte durée. Durée moyenne : 6-24 mois.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-finbright-cyan mr-2"></i> Remboursement rapide</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-cyan mr-2"></i> Diversification du portefeuille</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-cyan mr-2"></i> Liquidité plus élevée</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Finale Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">
                Commencez à investir dès aujourd'hui
            </h2>
            <p class="text-xl text-white mb-12 max-w-3xl mx-auto">
                Rejoignez des milliers d'investisseurs qui font déjà confiance à Fin'Bright pour faire fructifier leur épargne tout en ayant un impact social positif. Votre investissement peut changer des vies.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Créer mon compte investisseur
                </button>
                <button class="bg-white text-finbright-purple px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                    Découvrir les projets
                </button>
            </div>
        </div>
    </div>
</section>
@endsection