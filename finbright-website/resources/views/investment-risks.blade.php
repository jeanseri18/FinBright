@extends('layouts.app')

@section('title', 'Information sur les risques d\'investissement | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-cyan py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Information sur les <span class="text-finbright-purple">risques d'investissement</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Informations essentielles à connaître avant d'investir sur notre plateforme.
        </p>
    </div>
</section>

<!-- Section Avertissement -->
<section class="bg-red-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg">
            <div class="flex items-center mb-4">
                <i class="fas fa-exclamation-triangle text-2xl mr-4"></i>
                <h2 class="text-2xl font-bold">Avertissement important</h2>
            </div>
            <p class="text-lg mb-4">
                <strong>Investir dans des projets de financement participatif présente un risque de perte en capital.</strong>
            </p>
            <p>
                Les investissements proposés sur Fin'Bright ne sont pas garantis et peuvent entraîner une perte 
                partielle ou totale du capital investi. Il est essentiel de bien comprendre ces risques avant 
                de prendre toute décision d'investissement.
            </p>
        </div>
    </div>
</section>

<!-- Section Risques principaux -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Risques <span class="text-finbright-purple">principaux</span>
        </h2>
        
        <div class="space-y-8">
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-times text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de perte en capital</h3>
                        <p class="text-gray-600 mb-4">
                            <strong>Risque le plus important :</strong> Vous pouvez perdre tout ou partie de votre investissement 
                            si l'emprunteur ne peut pas rembourser son prêt.
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Défaillance de l'emprunteur (faillite, difficultés financières)</li>
                            <li>Échec du projet financé</li>
                            <li>Détérioration de la situation économique de l'emprunteur</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de liquidité</h3>
                        <p class="text-gray-600 mb-4">
                            Vos investissements ne sont pas liquides et vous ne pourrez pas récupérer votre argent 
                            avant l'échéance prévue du prêt.
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Impossibilité de revendre votre investissement</li>
                            <li>Blocage des fonds pendant toute la durée du prêt</li>
                            <li>Pas de marché secondaire organisé</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-percentage text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de taux</h3>
                        <p class="text-gray-600 mb-4">
                            Les taux d'intérêt sont fixes pour la durée du prêt et ne s'ajustent pas aux 
                            évolutions du marché.
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Pas de réévaluation des taux en cours de prêt</li>
                            <li>Risque d'opportunité si les taux du marché augmentent</li>
                            <li>Rendement réel affecté par l'inflation</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-building text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de plateforme</h3>
                        <p class="text-gray-600 mb-4">
                            Risques liés au fonctionnement de la plateforme Fin'Bright elle-même.
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Défaillance technique de la plateforme</li>
                            <li>Cessation d'activité de Fin'Bright</li>
                            <li>Modifications réglementaires affectant l'activité</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Facteurs de risque -->
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Facteurs influençant le <span class="text-finbright-cyan">niveau de risque</span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-user-tie text-finbright-purple mr-2"></i>
                    Profil de l'emprunteur
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Historique de crédit</li>
                    <li>• Situation financière</li>
                    <li>• Expérience professionnelle</li>
                    <li>• Secteur d'activité</li>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-project-diagram text-finbright-cyan mr-2"></i>
                    Nature du projet
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Viabilité économique</li>
                    <li>• Marché cible</li>
                    <li>• Concurrence</li>
                    <li>• Modèle économique</li>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-euro-sign text-finbright-purple mr-2"></i>
                    Conditions financières
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Montant du prêt</li>
                    <li>• Durée de remboursement</li>
                    <li>• Taux d'intérêt</li>
                    <li>• Garanties éventuelles</li>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-chart-line text-finbright-cyan mr-2"></i>
                    Contexte économique
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Conjoncture économique</li>
                    <li>• Évolution des taux</li>
                    <li>• Réglementation</li>
                    <li>• Conditions de marché</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section Notation des risques -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Notre système de <span class="text-finbright-purple">notation des risques</span>
        </h2>
        
        <div class="bg-gray-50 p-8 rounded-lg">
            <p class="text-gray-600 mb-8 text-center">
                Chaque projet est évalué et reçoit une note de risque de A+ (risque le plus faible) à E (risque le plus élevé).
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="bg-green-100 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-green-800 mb-2">A+</div>
                    <div class="text-sm text-green-700">Risque très faible</div>
                    <div class="text-xs text-green-600 mt-2">Taux indicatif : 3-4%</div>
                </div>
                <div class="bg-green-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-green-700 mb-2">A</div>
                    <div class="text-sm text-green-600">Risque faible</div>
                    <div class="text-xs text-green-500 mt-2">Taux indicatif : 4-6%</div>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-yellow-800 mb-2">B</div>
                    <div class="text-sm text-yellow-700">Risque modéré</div>
                    <div class="text-xs text-yellow-600 mt-2">Taux indicatif : 6-8%</div>
                </div>
                <div class="bg-orange-100 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-orange-800 mb-2">C</div>
                    <div class="text-sm text-orange-700">Risque élevé</div>
                    <div class="text-xs text-orange-600 mt-2">Taux indicatif : 8-12%</div>
                </div>
                <div class="bg-red-100 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-red-800 mb-2">D-E</div>
                    <div class="text-sm text-red-700">Risque très élevé</div>
                    <div class="text-xs text-red-600 mt-2">Taux indicatif : 12%+</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Recommandations -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-white mb-12 text-center">
            Nos <span class="text-finbright-cyan">recommandations</span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-chart-pie text-finbright-purple mr-2"></i>
                    Diversifiez vos investissements
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Ne mettez pas tous vos œufs dans le même panier</li>
                    <li>• Investissez dans plusieurs projets</li>
                    <li>• Variez les secteurs et les profils de risque</li>
                    <li>• Limitez l'exposition par projet (max 5-10%)</li>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-euro-sign text-finbright-cyan mr-2"></i>
                    N'investissez que ce que vous pouvez perdre
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Gardez une épargne de précaution</li>
                    <li>• Ne dépassez pas 10% de votre patrimoine</li>
                    <li>• Privilégiez l'épargne réglementée en priorité</li>
                    <li>• Considérez votre horizon d'investissement</li>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-search text-finbright-purple mr-2"></i>
                    Analysez chaque projet
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Lisez attentivement les informations</li>
                    <li>• Vérifiez la notation de risque</li>
                    <li>• Évaluez la cohérence du business plan</li>
                    <li>• Posez des questions si nécessaire</li>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-graduation-cap text-finbright-cyan mr-2"></i>
                    Formez-vous
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Comprenez les mécanismes du financement participatif</li>
                    <li>• Suivez nos guides et formations</li>
                    <li>• Consultez un conseiller si nécessaire</li>
                    <li>• Restez informé des évolutions réglementaires</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section Informations légales -->
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Informations <span class="text-finbright-purple">légales</span>
        </h2>
        
        <div class="prose prose-lg max-w-none">
            <div class="bg-blue-50 p-6 rounded-lg mb-8">
                <h3 class="text-xl font-bold text-blue-900 mb-4">
                    <i class="fas fa-info-circle mr-2"></i>
                    Statut réglementaire
                </h3>
                <p class="text-blue-800">
                    Fin'Bright est un intermédiaire en financement participatif (IFP) immatriculé auprès de l'ORIAS 
                    sous le numéro 21000000 et contrôlé par l'Autorité de Contrôle Prudentiel et de Résolution (ACPR).
                </p>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 mb-4">Absence de garantie</h3>
            <p class="text-gray-600 mb-6">
                Les investissements proposés sur notre plateforme ne bénéficient d'aucune garantie de l'État, 
                du Fonds de Garantie des Dépôts et de Résolution ou de tout autre mécanisme de protection.
            </p>
            
            <h3 class="text-xl font-bold text-gray-900 mb-4">Droit de rétractation</h3>
            <p class="text-gray-600 mb-6">
                Conformément à la réglementation, vous disposez d'un délai de rétractation de 14 jours 
                calendaires à compter de votre investissement pour annuler votre engagement.
            </p>
            
            <h3 class="text-xl font-bold text-gray-900 mb-4">Information et conseil</h3>
            <p class="text-gray-600 mb-6">
                Fin'Bright fournit un service d'information mais ne donne pas de conseils en investissement. 
                Il vous appartient d'évaluer l'adéquation de chaque investissement à votre situation personnelle.
            </p>
        </div>
    </div>
</section>

<!-- Section Contact -->
<section class="bg-finbright-cyan py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">
            Des questions sur les risques d'investissement ?
        </h2>
        <p class="text-xl text-white mb-8">
            Notre équipe est là pour vous aider à comprendre les risques et à investir en toute connaissance de cause.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-finbright-cyan px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors inline-block">
                <i class="fas fa-envelope mr-2"></i>
                Nous contacter
            </a>
            <a href="{{ route('faq') }}" class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors inline-block">
                <i class="fas fa-question-circle mr-2"></i>
                Consulter la FAQ
            </a>
        </div>
    </div>
</section>
@endsection