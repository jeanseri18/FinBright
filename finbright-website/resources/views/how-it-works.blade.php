@extends('layouts.app')

@section('title', 'Comment ça marche | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Comment ça <span class="text-finbright-cyan">marche</span> ?
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto mb-8">
            Découvrez comment obtenir un financement pour votre projet d'impact sur Fin'Bright
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#process" class="bg-finbright-cyan text-white px-8 py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                Voir le processus
            </a>
            <a href="#eligibility" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                Critères d'éligibilité
            </a>
        </div>
    </div>
</section>

<!-- Section Processus -->
<section id="process" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                Le processus en <span class="text-finbright-purple">5 étapes</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                De la soumission de votre projet au financement, découvrez chaque étape de votre parcours
            </p>
        </div>

        <div class="space-y-16">
            <!-- Étape 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mr-6">
                            <span class="text-2xl font-bold text-white">1</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Soumission du projet</h3>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Présentez votre projet d'impact environnemental ou social en remplissant notre formulaire détaillé. Décrivez vos objectifs, votre modèle économique et l'impact attendu.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Description détaillée du projet
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Business plan et prévisions financières
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Mesure d'impact ESG
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2">
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500">[Image: Formulaire de soumission]</span>
                    </div>
                </div>
            </div>

            <!-- Étape 2 -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mr-6">
                            <span class="text-2xl font-bold text-white">2</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Évaluation et due diligence</h3>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Notre équipe d'experts analyse votre projet selon nos critères stricts : viabilité financière, impact ESG, équipe dirigeante et conformité réglementaire.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-purple mr-3"></i>
                            Analyse financière approfondie
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-purple mr-3"></i>
                            Évaluation de l'impact ESG
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-purple mr-3"></i>
                            Vérification réglementaire
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2">
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500">[Image: Équipe d'analyse]</span>
                    </div>
                </div>
            </div>

            <!-- Étape 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mr-6">
                            <span class="text-2xl font-bold text-white">3</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Validation et mise en ligne</h3>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Une fois validé, votre projet est publié sur notre plateforme avec une page dédiée présentant tous les détails aux investisseurs potentiels.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Page projet personnalisée
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Documentation complète
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Promotion auprès des investisseurs
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2">
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500">[Image: Page projet en ligne]</span>
                    </div>
                </div>
            </div>

            <!-- Étape 4 -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mr-6">
                            <span class="text-2xl font-bold text-white">4</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Collecte de fonds</h3>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Les investisseurs découvrent et financent votre projet. Vous pouvez suivre l'avancement en temps réel et communiquer avec vos futurs partenaires financiers.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-purple mr-3"></i>
                            Suivi en temps réel
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-purple mr-3"></i>
                            Communication avec investisseurs
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-purple mr-3"></i>
                            Support de notre équipe
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2">
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500">[Image: Collecte de fonds]</span>
                    </div>
                </div>
            </div>

            <!-- Étape 5 -->
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mr-6">
                            <span class="text-2xl font-bold text-white">5</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Financement et suivi</h3>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Une fois l'objectif atteint, les fonds sont débloqués et votre projet peut démarrer. Nous vous accompagnons dans le suivi et le reporting régulier.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Déblocage sécurisé des fonds
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Accompagnement personnalisé
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check text-finbright-cyan mr-3"></i>
                            Reporting d'impact régulier
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2">
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500">[Image: Projet financé]</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Critères d'éligibilité -->
<section id="eligibility" class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                Critères <span class="text-finbright-cyan">d'éligibilité</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Votre projet doit répondre à nos critères stricts pour être éligible au financement
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Impact ESG -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Impact ESG mesurable</h3>
                <p class="text-gray-600 mb-4">
                    Votre projet doit avoir un impact positif démontrable sur l'environnement, la société ou la gouvernance.
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Objectifs de développement durable
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Indicateurs de performance ESG
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Reporting d'impact régulier
                    </li>
                </ul>
            </div>

            <!-- Viabilité financière -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Viabilité financière</h3>
                <p class="text-gray-600 mb-4">
                    Votre projet doit présenter un modèle économique solide et des perspectives de rentabilité.
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Business plan détaillé
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Prévisions financières réalistes
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Capacité de remboursement
                    </li>
                </ul>
            </div>

            <!-- Équipe expérimentée -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Équipe expérimentée</h3>
                <p class="text-gray-600 mb-4">
                    L'équipe dirigeante doit avoir l'expérience et les compétences nécessaires pour mener le projet.
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Expérience sectorielle
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Compétences complémentaires
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Engagement à long terme
                    </li>
                </ul>
            </div>

            <!-- Montant de financement -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-euro-sign text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Montant adapté</h3>
                <p class="text-gray-600 mb-4">
                    Le montant demandé doit être compris entre 50 000€ et 5 000 000€ selon le type de projet.
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Minimum 50 000€
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Maximum 5 000 000€
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Justification détaillée
                    </li>
                </ul>
            </div>

            <!-- Conformité réglementaire -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Conformité réglementaire</h3>
                <p class="text-gray-600 mb-4">
                    Votre projet doit respecter toutes les réglementations applicables dans votre secteur d'activité.
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Autorisations nécessaires
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Respect des normes
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-cyan mr-2"></i>
                        Transparence totale
                    </li>
                </ul>
            </div>

            <!-- Localisation -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Zone géographique</h3>
                <p class="text-gray-600 mb-4">
                    Nous finançons principalement des projets en France et dans l'Union Européenne.
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        France métropolitaine
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Union Européenne
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-finbright-purple mr-2"></i>
                        Projets internationaux (cas par cas)
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section Types de projets -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                Types de <span class="text-finbright-purple">projets</span> financés
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Découvrez les secteurs et types de projets que nous accompagnons
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-solar-panel text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Énergies renouvelables</h3>
                <p class="text-gray-600 text-sm">Solaire, éolien, biomasse, géothermie</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-recycle text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Économie circulaire</h3>
                <p class="text-gray-600 text-sm">Recyclage, réutilisation, réduction des déchets</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-seedling text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Agriculture durable</h3>
                <p class="text-gray-600 text-sm">Bio, permaculture, agroécologie</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Impact social</h3>
                <p class="text-gray-600 text-sm">Inclusion, éducation, santé, logement</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6">
            Prêt à <span class="text-finbright-cyan">financer</span> votre projet ?
        </h2>
        <p class="text-xl text-white mb-8 max-w-3xl mx-auto">
            Rejoignez les entrepreneurs qui transforment le monde avec Fin'Bright
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact" class="bg-finbright-cyan text-white px-8 py-4 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                Soumettre mon projet
            </a>
            <a href="/faq" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                Questions fréquentes
            </a>
        </div>
    </div>
</section>
@endsection