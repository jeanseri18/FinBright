@extends('layouts.app')

@section('title', 'Risques d\'investissement | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class=" py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Risques d'<span class="text-finbright-cyan">investissement</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Comprendre les risques associés aux investissements sur notre plateforme pour prendre des décisions éclairées.
        </p>
    </div>
</section>

<!-- Section Avertissement -->
<section class="bg-yellow-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6 rounded-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-bold text-yellow-800 mb-4">
                        <i class="fas fa-warning mr-2"></i>
                        Avertissement important
                    </h3>
                    <p class="text-yellow-700 mb-4">
                        Investir sur Fin'Bright présente des risques de perte en capital. Les performances passées ne préjugent pas des performances futures. Il est essentiel de diversifier vos investissements et de ne jamais investir plus que ce que vous pouvez vous permettre de perdre.
                    </p>
                    <p class="text-yellow-700 font-semibold">
                        Nous vous recommandons fortement de lire attentivement cette page avant tout investissement.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Types de risques -->
<section class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Types de <span class="text-finbright-purple">risques</span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Risque de défaut -->
            <div class="bg-red-50 p-6 rounded-lg shadow-lg border-l-4 border-red-500">
                <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user-times text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de défaut</h3>
                <p class="text-gray-600 mb-4">
                    L'emprunteur peut ne pas être en mesure de rembourser son prêt, partiellement ou totalement.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Perte d'emploi de l'emprunteur</li>
                    <li>• Difficultés financières personnelles</li>
                    <li>• Changement de situation professionnelle</li>
                </ul>
            </div>

            <!-- Risque de liquidité -->
            <div class="bg-orange-50 p-6 rounded-lg shadow-lg border-l-4 border-orange-500">
                <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-clock text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de liquidité</h3>
                <p class="text-gray-600 mb-4">
                    Vos investissements sont bloqués pendant toute la durée du prêt.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Impossibilité de récupérer votre capital avant l'échéance</li>
                    <li>• Pas de marché secondaire</li>
                    <li>• Durée d'engagement variable selon les projets</li>
                </ul>
            </div>

            <!-- Risque de plateforme -->
            <div class="bg-blue-50 p-6 rounded-lg shadow-lg border-l-4 border-blue-500">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-building text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de plateforme</h3>
                <p class="text-gray-600 mb-4">
                    Risques liés au fonctionnement et à la pérennité de Fin'Bright.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Défaillance technique de la plateforme</li>
                    <li>• Changements réglementaires</li>
                    <li>• Risque de cessation d'activité</li>
                </ul>
            </div>

            <!-- Risque de taux -->
            <div class="bg-purple-50 p-6 rounded-lg shadow-lg border-l-4 border-purple-500">
                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-percentage text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de taux</h3>
                <p class="text-gray-600 mb-4">
                    Évolution des taux d'intérêt pouvant affecter la rentabilité relative de vos investissements.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Hausse des taux du marché</li>
                    <li>• Opportunité manquée sur d'autres placements</li>
                    <li>• Inflation supérieure aux rendements</li>
                </ul>
            </div>

            <!-- Risque de concentration -->
            <div class="bg-green-50 p-6 rounded-lg shadow-lg border-l-4 border-green-500">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-chart-pie text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de concentration</h3>
                <p class="text-gray-600 mb-4">
                    Risque lié à un manque de diversification de votre portefeuille d'investissements.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Investissement sur un seul emprunteur</li>
                    <li>• Concentration sectorielle ou géographique</li>
                    <li>• Dépendance à un type de profil d'emprunteur</li>
                </ul>
            </div>

            <!-- Risque réglementaire -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-lg border-l-4 border-gray-500">
                <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-gavel text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque réglementaire</h3>
                <p class="text-gray-600 mb-4">
                    Évolution de la réglementation pouvant impacter l'activité de financement participatif.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Nouvelles contraintes réglementaires</li>
                    <li>• Modification des conditions d'exercice</li>
                    <li>• Impact sur la fiscalité des investissements</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section Mesures de protection -->
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Nos <span class="text-finbright-purple">mesures de protection</span>
        </h2>
        
        <div class="space-y-8">
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">1</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Analyse rigoureuse des dossiers</h3>
                    <p class="text-gray-600">
                        Chaque demande de financement fait l'objet d'une analyse approfondie incluant la vérification de l'identité, l'évaluation de la solvabilité et l'analyse du projet d'études ou du besoin de financement.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">2</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Diversification encouragée</h3>
                    <p class="text-gray-600">
                        Nous encourageons fortement nos investisseurs à diversifier leurs investissements en répartissant leurs fonds sur plusieurs emprunteurs et différents types de projets.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">3</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Suivi et accompagnement</h3>
                    <p class="text-gray-600">
                        Nous assurons un suivi régulier des emprunteurs et proposons un accompagnement en cas de difficultés temporaires de remboursement.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">4</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Transparence totale</h3>
                    <p class="text-gray-600">
                        Nous fournissons toutes les informations nécessaires sur les emprunteurs, les projets financés et les performances de la plateforme pour vous permettre de prendre des décisions éclairées.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Recommandations -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-8">
            Nos <span class="text-finbright-cyan">recommandations</span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg">
                <i class="fas fa-chart-line text-finbright-purple text-3xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Diversifiez vos investissements</h3>
                <p class="text-gray-600">
                    Ne mettez jamais tous vos œufs dans le même panier. Répartissez vos investissements sur plusieurs emprunteurs et différents profils de risque.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                <i class="fas fa-calculator text-finbright-purple text-3xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Investissez raisonnablement</h3>
                <p class="text-gray-600">
                    N'investissez que l'argent dont vous n'avez pas besoin à court terme et que vous pouvez vous permettre de perdre sans compromettre votre situation financière.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                <i class="fas fa-book text-finbright-purple text-3xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Informez-vous</h3>
                <p class="text-gray-600">
                    Prenez le temps de comprendre le fonctionnement de la plateforme, les profils des emprunteurs et les risques associés à chaque investissement.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                <i class="fas fa-clock text-finbright-purple text-3xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Pensez long terme</h3>
                <p class="text-gray-600">
                    Le financement participatif est un investissement à moyen/long terme. Assurez-vous de pouvoir immobiliser vos fonds pendant la durée des prêts.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Contact -->
<section class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">
            Des questions sur les <span class="text-finbright-purple">risques</span> ?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Notre équipe est à votre disposition pour répondre à toutes vos questions concernant les risques d'investissement.
        </p>
        <a href="{{ route('contact') }}" class="bg-finbright-purple text-white px-8 py-3 rounded-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
            Nous contacter
        </a>
    </div>
</section>
@endsection