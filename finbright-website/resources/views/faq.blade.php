@extends('layouts.app')

@section('title', 'FAQ - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-finbright-purple to-finbright-cyan text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Questions Fréquentes</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Trouvez toutes les réponses à vos questions sur Fin'Bright
        </p>
    </div>
</section>

<!-- FAQ Content -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- 1. Général -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-info-circle text-finbright-purple mr-4"></i>
                1. Général
            </h2>
            
            <div class="space-y-6">
                <!-- Q1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Qu'est-ce que Fin'Bright ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Fin'Bright est une plateforme de financement participatif entre particuliers, dédiée aux prêts étudiants (étudiants brillants admis dans des grandes écoles les plus prestigieuses) et aux mini-prêts courts (pour particuliers), permettant à chacun d'emprunter ou d'investir de façon responsable.
                    </p>
                </div>
                
                <!-- Q2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Est-ce sécurisé ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Oui. Les transactions sont sécurisées, les dossiers vérifiés, et nous respectons les standards RGPD. De plus, notre statut d'intermédiaire en financement participatif (IFP) est conforme à la réglementation.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- 2. Emprunteurs -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-graduation-cap text-finbright-cyan mr-4"></i>
                2. Emprunteurs
            </h2>
            
            <div class="space-y-6">
                <!-- Q1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Qui peut emprunter ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Étudiants admis dans une grande école ou université prestigieuse (France/Europe)
                    </p>
                </div>
                
                <!-- Q2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels types de prêts sont disponibles ?
                    </h3>
                    <ul class="text-gray-700 leading-relaxed space-y-2">
                        <li><i class="fas fa-check text-finbright-cyan mr-2"></i>Prêt étudiant pour financer frais de scolarité, logement, ou mobilité</li>
                        <li><i class="fas fa-check text-finbright-cyan mr-2"></i>Mini-prêt court pour des besoins ponctuels (réparation, achat, dépenses imprévues)</li>
                    </ul>
                </div>
                
                <!-- Q3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        De quels documents ai-je besoin ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Carte d'identité, justificatif d'admission (pour étudiants), preuve de revenus (pour particuliers), RIB, et justificatif de domicile si nécessaire.
                    </p>
                </div>
                
                <!-- Q4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Combien puis-je emprunter et à quelles conditions ?
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        <p>Les montants varient selon le type de prêt : le simulateur en ligne vous donnera des détails précis (durée, taux, mensualités).</p>
                        <p>Le prêt étudiant est assorti d'un différé partiel de 3 mois à 6 mois, pendant lequel l'étudiant ne paie que les intérêts courus.</p>
                    </div>
                </div>
                
                <!-- Q5 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment se passe le remboursement ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Vous remboursez selon l'échéancier fixé : mensualités régulières (semblables à un crédit classique), avec rappels automatiques et suivi en ligne.
                    </p>
                </div>
                
                <!-- Q6 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Et en cas de retard de paiement ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Un processus d'accompagnement se déclenche (relances, plan d'ajustement), et des frais de retards de 8 % s'appliquent. En cas de défaut persistant, des mesures de recouvrement peuvent être engagées, conformément aux règles du P2P.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- 3. Investisseurs -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-chart-line text-finbright-purple mr-4"></i>
                3. Investisseurs
            </h2>
            
            <div class="space-y-6">
                <!-- Q1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment investir ?
                    </h3>
                    <ol class="text-gray-700 leading-relaxed space-y-2 list-decimal list-inside">
                        <li>Inscrivez-vous et complétez votre profil</li>
                        <li>Approvisionnez votre compte</li>
                        <li>Sélectionnez les projets (étudiants ou particuliers)</li>
                        <li>Investissez à partir de petits montants</li>
                    </ol>
                </div>
                
                <!-- Q2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels rendements puis-je espérer ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Les taux varient selon le profil du projet personnel et le type de prêt (étudiant ou mini-prêt). Vous recevrez vos intérêts mensuellement. Les performances passées sont accessibles sur votre tableau de bord. Un rendement de <strong class="text-finbright-purple">10 à 14 % annuels</strong>, mensualisés, selon le niveau de risque du projet personnel.
                    </p>
                </div>
                
                <!-- Q3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels sont les risques ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Il existe un risque d'impayé et de perte de capital. Nous limitons ce risque par une sélection rigoureuse des dossiers, un suivi des remboursements, et une transparence totale. Nous encourageons fortement nos emprunteurs étudiants à souscrire à une assurance emprunteur pour réduire le risque de non remboursement.
                    </p>
                </div>
                
                <!-- Q4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment récupérer mon argent ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Vous recevez capital et intérêts via virements mensuels. Vous pouvez réinvestir ou retirer vos fonds à tout moment selon les conditions indiquées.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- 4. Technique & Réglementaire -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-cogs text-finbright-cyan mr-4"></i>
                4. Technique & Réglementaire
            </h2>
            
            <div class="space-y-6">
                <!-- Q1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels sont les coûts et frais ?
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <div>
                            <h4 class="font-semibold text-finbright-purple mb-2">Pour les emprunteurs :</h4>
                            <ul class="space-y-2 ml-4">
                                <li><strong>Prêt étudiant :</strong> commission unique de 10 % sur chaque prêt mobilisé avec succès (supporté par l'investisseur), ponction mensuelle de 4 % de frais de fonctionnement et de 4 % de frais de gestion des prêts calculés sur le capital restant</li>
                                <li><strong>Mini prêt court :</strong> pas de commission sur les prêts mobilisés avec succès, ponction mensuelle de 6 % de frais de fonctionnement et de 6 % de frais de gestion des prêts calculés sur le capital restant dû.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-finbright-cyan mb-2">Pour les investisseurs :</h4>
                            <ul class="space-y-2 ml-4">
                                <li><strong>Prêt étudiant :</strong> pas de frais d'entrée, pas de frais de sortie. Une ponction unique de 10% sur chaque montant prêté par projet personnel.</li>
                                <li><strong>Mini prêt court :</strong> pas de frais d'entrée, pas de frais de sortie, pas de ponction unique sur les montants mobilisés avec succès.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Q2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Fin'Bright est-elle régulée ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Nous devons être immatriculés auprès de l'ORIAS en tant qu'IFP (Intermédiaire en Financement Participatif) avant d'opérer nos activités en toute légalité. Notre demande d'immatriculation est en cours. Une fois immatriculée, nous serons supervisés par l'ACPR (Banque de France). Nous nous conformons à toutes les exigences réglementaires (KYC, protection des données, gestion des risques, etc.).
                    </p>
                </div>
            </div>
        </div>
        
        <!-- 5. Support & Contact -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-headset text-finbright-purple mr-4"></i>
                5. Support & Contact
            </h2>
            
            <div class="space-y-6">
                <!-- Q1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment puis-je obtenir de l'aide ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Vous pouvez consulter notre FAQ complète, ou nous contacter via le formulaire en ligne, par e-mail ou par téléphone. Notre équipe est là pour vous accompagner.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-finbright-purple to-finbright-cyan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Vous avez une question ?
        </h2>
        <p class="text-xl text-white mb-8 opacity-90 max-w-2xl mx-auto">
            Contactez-nous ou inscrivez-vous dès aujourd'hui !
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}#simulator" class="bg-white text-finbright-purple px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                <i class="fas fa-calculator mr-2"></i>
                Voir les projets / Simuler un prêt
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                <i class="fas fa-envelope mr-2"></i>
                Nous contacter
            </a>
        </div>
    </div>
</section>
@endsection