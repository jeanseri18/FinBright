@extends('layouts.app')

@section('title', 'Politique de gestion des risques | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Politique de <span class="text-finbright-cyan">gestion des risques</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Notre approche rigoureuse pour identifier, évaluer et gérer les risques liés aux investissements.
        </p>
    </div>
</section>

<!-- Section Introduction -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Introduction</h2>
            <p class="text-gray-600 mb-8">
                Fin'Bright s'engage à maintenir les plus hauts standards en matière de gestion des risques. 
                Cette politique définit notre approche systématique pour identifier, évaluer, surveiller et 
                gérer les risques inhérents à notre activité de financement participatif.
            </p>
            
            <div class="bg-finbright-purple bg-opacity-10 p-6 rounded-lg mb-8">
                <h3 class="text-xl font-bold text-finbright-purple mb-4">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Notre engagement
                </h3>
                <p class="text-gray-700">
                    Protéger les intérêts de nos investisseurs et emprunteurs en appliquant une politique 
                    de gestion des risques robuste et transparente, conforme aux réglementations en vigueur.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Types de risques -->
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Types de <span class="text-finbright-purple">risques identifiés</span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de crédit</h3>
                <p class="text-gray-600">
                    Risque de défaillance de l'emprunteur dans le remboursement de son prêt. 
                    Nous évaluons chaque dossier selon des critères stricts d'analyse financière.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-chart-line text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de marché</h3>
                <p class="text-gray-600">
                    Fluctuations des conditions économiques pouvant affecter la capacité de remboursement 
                    des emprunteurs et la demande d'investissement.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-lock text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque opérationnel</h3>
                <p class="text-gray-600">
                    Risques liés aux processus internes, aux systèmes informatiques, aux erreurs humaines 
                    ou aux événements externes.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-gavel text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Risque de conformité</h3>
                <p class="text-gray-600">
                    Risque de non-conformité aux réglementations applicables, notamment celles de l'ACPR 
                    et de l'AMF.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Processus de gestion -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Processus de <span class="text-finbright-cyan">gestion des risques</span>
        </h2>
        
        <div class="space-y-8">
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">1</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Identification des risques</h3>
                    <p class="text-gray-600">
                        Cartographie exhaustive des risques potentiels à travers une analyse systématique 
                        de tous les aspects de notre activité.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">2</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Évaluation et mesure</h3>
                    <p class="text-gray-600">
                        Quantification des risques identifiés selon leur probabilité d'occurrence et 
                        leur impact potentiel sur notre activité.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">3</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mise en place de contrôles</h3>
                    <p class="text-gray-600">
                        Implémentation de mesures préventives et correctives pour atténuer les risques 
                        identifiés et surveiller leur évolution.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">4</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Surveillance continue</h3>
                    <p class="text-gray-600">
                        Monitoring permanent des indicateurs de risque et révision régulière de notre 
                        politique pour s'adapter aux évolutions du marché.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Mesures spécifiques -->
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Mesures de <span class="text-finbright-purple">protection</span>
        </h2>
        
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Analyse des dossiers d'emprunt</h3>
            <ul class="space-y-4 text-gray-600">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-purple mr-3 mt-1"></i>
                    <span>Vérification approfondie de l'identité et de la solvabilité des emprunteurs</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-purple mr-3 mt-1"></i>
                    <span>Analyse des documents financiers et comptables</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-purple mr-3 mt-1"></i>
                    <span>Évaluation du business plan et de la viabilité du projet</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-purple mr-3 mt-1"></i>
                    <span>Attribution d'une note de risque basée sur des critères objectifs</span>
                </li>
            </ul>
        </div>
        
        <div class="bg-white p-8 rounded-lg shadow-lg mt-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Diversification et limites</h3>
            <ul class="space-y-4 text-gray-600">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-cyan mr-3 mt-1"></i>
                    <span>Limitation du montant maximum par projet pour réduire la concentration des risques</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-cyan mr-3 mt-1"></i>
                    <span>Encouragement à la diversification des portefeuilles d'investissement</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-cyan mr-3 mt-1"></i>
                    <span>Répartition géographique et sectorielle des projets financés</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-finbright-cyan mr-3 mt-1"></i>
                    <span>Suivi régulier de l'évolution des portefeuilles</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Section Gouvernance -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
            Gouvernance et <span class="text-finbright-cyan">responsabilités</span>
        </h2>
        
        <div class="prose prose-lg max-w-none">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Comité des risques</h3>
            <p class="text-gray-600 mb-6">
                Un comité des risques, composé de membres indépendants et d'experts internes, 
                se réunit mensuellement pour examiner l'évolution des risques et valider les 
                mesures correctives nécessaires.
            </p>
            
            <h3 class="text-xl font-bold text-gray-900 mb-4">Responsable des risques</h3>
            <p class="text-gray-600 mb-6">
                Sophie Laurent-Moreau, notre Directrice Risques & Conformité, supervise 
                l'application de cette politique et rapporte directement au conseil d'administration.
            </p>
            
            <h3 class="text-xl font-bold text-gray-900 mb-4">Formation et sensibilisation</h3>
            <p class="text-gray-600 mb-6">
                Tous les collaborateurs reçoivent une formation régulière sur la gestion des risques 
                et les procédures de contrôle interne.
            </p>
        </div>
    </div>
</section>

<!-- Section Contact -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">
            Questions sur notre politique de gestion des risques ?
        </h2>
        <p class="text-xl text-white mb-8">
            Notre équipe est à votre disposition pour toute question concernant notre approche des risques.
        </p>
        <a href="{{ route('contact') }}" class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors inline-block">
            <i class="fas fa-envelope mr-2"></i>
            Nous contacter
        </a>
    </div>
</section>
@endsection