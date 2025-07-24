@extends('layouts.app')

@section('title', 'FAQ - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section  style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class=" text-white py-20">
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
                <i class="fas fa-info-circle text-finbright-cyan mr-4"></i>
                1. Général
            </h2>
            
            <div class="space-y-6">
                <!-- Q1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Est-ce sécurisé ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Oui. Les transactions sont sécurisées, les dossiers vérifiés, et nous respectons les standards RGPD. De plus, notre statut d'intermédiaire en financement participatif (IFP) en cours est conforme à la réglementation.
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
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        <p><strong class="text-finbright-purple">Étudiants :</strong>  Inscrits dans un établissement d’enseignement supérieur français prestigieux.</p>
                        <p><strong class="text-finbright-cyan">Particuliers :</strong> Jeunes débutants en CDI ou CDD, retraités, alternants, intérimaires, chômeurs.</p>
                    </div>
                </div>
                
                <!-- Q2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels types de prêts sont disponibles ?
                    </h3>
                    <ul class="text-gray-700 leading-relaxed space-y-2">
                        <li><i class="fas fa-check text-finbright-cyan mr-2"></i>Prêt étudiant pour financer les frais de scolarité et les frais de subsistance.</li>
                        <li><i class="fas fa-check text-finbright-cyan mr-2"></i>Mini prêt court pour des besoins ponctuels (réparation, achat, dépenses imprévues, trésorerie).</li>
                    </ul>
                </div>
                
                <!-- Q3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        De quels documents ai-je besoin ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Carte d'identité, justificatif d'admission (pour étudiants), preuve de revenus (pour particuliers), RIB et justificatif de domicile, etc.
                    </p>
                </div>
                
                <!-- Q4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Combien puis-je emprunter et à quelles conditions ?
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        <p>Les montants varient selon le type de prêt. Le simulateur en ligne vous donnera des détails précis (durée, taux, mensualités).</p>
                        <p>Le prêt étudiant est assorti d’un différé partiel (durée de
formation +3 à 6 mois après diplomation) pendant lequel l’étudiant ne paye que les intérêts
courus</p>
<p>Le prêt particulier est remboursé dès que les fonds sont
crédités (pas de différé partiel pour les mini prêts d’urgence ou de dépannages) </p>
                    </div>
                </div>
                
                <!-- Q5 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment se passe le remboursement ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Vous remboursez selon l'échéancier fixé : mensualités régulières, avec rappels automatiques et suivi en ligne.
                    </p>
                </div>
                
                <!-- Q6 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Et en cas de retard de paiement ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Un processus d'accompagnement se déclenche (relances, plan d'ajustement) et des frais de retard de 8 % s'appliquent. En cas de défaut persistant, des mesures de recouvrement peuvent être engagées, conformément aux règles de Fin'Bright.
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
                        <li>Inscrivez-vous et complétez votre profil investisseur en quelques minutes</li>
                        <li>Approvisionnez votre compte via un transfert sécurisé</li>
                        <li>Parcourez les projets et choisissez ceux à financer selon vos préférences (durée, profil, montant, etc.). L'investissement se fait soit manuellement, soit en auto-investissement</li>
                        <li>Investissez à partir de 100 euros et diversifiez vos
investissements en finançant plusieurs projets</li>
                        <li>Suivez vos investissements grâce à votre tableau de bord personnel</li>
                        <li>Percevez vos remboursements mensuels (capital et intérêts) directement sur votre compte</li>
                    </ol>
                </div>
                
                <!-- Q2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels rendements puis-je espérer ?
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        <p>Les taux varient selon le profil du projet personnel et le type de prêt (étudiant ou mini prêt). Vous recevrez vos intérêts mensuellement.</p>
                        <p>Pour les prêts étudiants, le rendement est de 5 à 6 % annuels. Pour les mini prêts courts, le rendement est de 10 à 11 %.</p>
                    </div>
                </div>
                
                <!-- Q3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels sont les risques ?
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        <p>Il existe un risque d'impayé et de perte de capital. Nous limitons ce risque par une sélection rigoureuse des dossiers, un suivi des remboursements et une transparence totale.</p>
                        <p>Nous encourageons fortement nos emprunteurs étudiants à souscrire une assurance emprunteur.</p>
                        <p>Une cagnotte de 1 à 2 % prélevée sur nos frais servira à rembourser une partie des pertes potentielles dans la limite des fonds disponibles (sous conditions).</p>
                    </div>
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
                        Fin'Bright est-elle régulée ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
Nous serons supervisé par l’ACPR en tant qu’IFP (Intermédiaire en Financement Participatif) avant de pouvoir opérer légalement. Notre demande est en cours. Nous serons supervisés par l’ACPR (Banque de France). Nous nous conformons aux exigences réglementaires (KYC, gestion des risques, RGPD, etc.).                    </p>
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
<section class="py-20 "  style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
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