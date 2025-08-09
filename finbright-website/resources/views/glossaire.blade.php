@extends('layouts.app')

@section('title', 'Glossaire - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class="text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Glossaire Réglementaire</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Comprendre les termes et concepts du financement participatif
        </p>
    </div>
</section>

<!-- Glossaire Content -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Partie 1 : Les Acteurs et Statuts Fondamentaux -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-users text-finbright-cyan mr-4"></i>
                Partie 1 : Les Acteurs et Statuts Fondamentaux
            </h2>
            
            <div class="space-y-8">
                <!-- 1.1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1.1. Intermédiaire en Financement Participatif (IFP)
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            <span class="font-medium">Définition Formelle :</span> Personne morale qui exerce, à titre habituel, une activité d'intermédiation consistant à mettre en relation, via un site internet, des porteurs de projet et des personnes finançant ces projets. Cette intermédiation concerne des opérations de prêt (onéreux ou gratuit) ou de don, dans le cadre non-commercial défini par l'article L. 548-1 du Code monétaire et financier.
                        </p>
                        <p>
                            <span class="font-medium">Obligations Clés :</span> L'exercice de l'activité d'IFP est subordonné à plusieurs conditions cumulatives. L'intermédiaire doit être une personne morale, être immatriculé sur le registre unique de l'ORIAS, et ses dirigeants doivent satisfaire à des conditions d'honorabilité et de compétence professionnelle (justifiées par un diplôme ou une expérience professionnelle).
                        </p>
                    </div>
                </div>
                
                <!-- 1.2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1.2. Porteur de Projet (Emprunteur)
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            <span class="font-medium">Définition Formelle :</span> Personne physique qui sollicite, par l'intermédiaire de la plateforme de l'IFP, un financement pour un projet déterminé. Pour les produits de Fin'Bright, il s'agit soit d'étudiants cherchant à financer leur formation initiale ou continue, soit de particuliers ayant un besoin de trésorerie pour un projet non professionnel et non commercial.
                        </p>
                        <p>
                            <span class="font-medium">Responsabilité :</span> Le porteur de projet est légalement responsable de l'exactitude et de la véracité des informations communiquées à la plateforme. Toute déclaration erronée ou trompeuse engage sa responsabilité.
                        </p>
                    </div>
                </div>
                
                <!-- 1.3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1.3. Prêteur (Investisseur)
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>
                            <span class="font-medium">Définition Formelle :</span> Personne physique ou morale (telle qu'une association ou une fondation à but non lucratif) qui finance un projet en accordant un prêt. Une condition essentielle est que, pour les prêts consentis à des particuliers (pour formation ou besoins non-professionnels), les prêteurs ne doivent pas agir dans un cadre professionnel ou commercial.
                        </p>
                    </div>
                </div>
                
                <!-- 1.4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1.4. ORIAS (Organisme pour le Registre des Intermédiaires en Assurance, Banque et Finance)
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            <span class="font-medium">Rôle :</span> L'ORIAS est l'organisme qui gère le registre unique des intermédiaires financiers en France. L'immatriculation à ce registre est une condition obligatoire pour pouvoir exercer légalement l'activité d'IFP.
                        </p>
                        <p>
                            <span class="font-medium">Processus :</span> L'inscription s'effectue en ligne et nécessite la fourniture de plusieurs pièces justificatives, notamment un extrait Kbis, un justificatif d'assurance de Responsabilité Civile Professionnelle (RC Pro), et un bulletin n°2 du casier judiciaire des dirigeants. Cette immatriculation doit être renouvelée chaque année avant le 31 janvier, sous peine de radiation.
                        </p>
                    </div>
                </div>
                
                <!-- 1.5 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1.5. ACPR (Autorité de Contrôle Prudentiel et de Résolution)
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            <span class="font-medium">Rôle :</span> Adossée à la Banque de France, l'ACPR est l'autorité de tutelle des IFP. Elle est chargée de veiller au respect par les plateformes des règles de bonne conduite, de la protection de la clientèle, de la gestion des risques et des obligations en matière de Lutte Contre le Blanchiment et le Financement du Terrorisme (LCB-FT).
                        </p>
                        <p>
                            <span class="font-medium">Pouvoirs :</span> L'ACPR dispose d'un pouvoir de contrôle sur pièces et sur place, et peut prononcer des sanctions en cas de manquement.
                        </p>
                    </div>
                </div>
                
                <!-- 1.6 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1.6. Agent de Services de Paiement
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>
                            <span class="font-medium">Rôle :</span> Un IFP n'est pas autorisé à encaisser et détenir directement les fonds des prêteurs pour les remettre aux emprunteurs. Il doit obligatoirement recourir aux services d'un Prestataire de Services de Paiement (PSP) agréé (établissement de paiement, de monnaie électronique ou de crédit). Dans le cas où l'IFP manipule les fonds de ses clients, il doit être agent de PSP, dans ce cas c'est le PSP partenaire qui doit notifier à l'ACPR l'enregistrement de l'IFP comme son agent.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Partie 2 : Le Cadre Réglementaire des Produits de Financement -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-file-contract text-finbright-cyan mr-4"></i>
                Partie 2 : Le Cadre Réglementaire des Produits de Financement
            </h2>
            
            <div class="space-y-8">
                <!-- 2.1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2.1. Prêt Étudiant (en tant que Crédit Onéreux pour Formation)
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            <span class="font-medium">Définition Réglementaire :</span> Prêt avec intérêts (crédit onéreux) consenti à une personne physique dans le but de financer une formation initiale ou continue. Cette catégorie de prêt est explicitement autorisée pour les IFP.
                        </p>
                        <p>
                            <span class="font-medium">Caractéristiques pour Fin'Bright :</span> Le modèle proposé (sans caution, remboursable sur 2 à 7 ans, avec différé partiel) s'aligne sur les pratiques du marché et les besoins des étudiants des grandes écoles. L'absence de garant est un avantage commercial significatif, mais qui transfère l'intégralité du risque de crédit sur les prêteurs, ce qui doit être compensé par un processus de sélection des emprunteurs d'une rigueur exemplaire.
                        </p>
                    </div>
                </div>
                
                <!-- 2.2 -->
                <!-- <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2.2. Mini-Prêt (en tant que Crédit de Trésorerie Non Commercial)
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>
                            <span class="font-medium">Définition Réglementaire :</span> Prêt avec intérêts consenti à une personne physique qui n'agit pas pour des besoins professionnels.
                        </p>
                    </div>
                </div>
                 -->
                <!-- 2.3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2.2. Projet de Financement
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>
                            <span class="font-medium">Définition Réglementaire :</span> Le Code monétaire et financier le définit comme "une opération prédéfinie ou un ensemble d'opérations prédéfinies, un évènement ou le soutien d'une cause pour lequel un porteur de projet cherche un financement".
                        </p>
                    </div>
                </div>
                
                <!-- 2.4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2.3. Différé de Remboursement
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>
                            <span class="font-medium">Définition Opérationnelle :</span> Période contractuelle durant laquelle l'emprunteur est dispensé du remboursement du capital. Dans le cas d'un "différé partiel", il ne s'acquitte que du paiement des intérêts.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Partie 3 : Les Paramètres Financiers et Plafonds Réglementaires -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-chart-line text-finbright-cyan mr-4"></i>
                Partie 3 : Les Paramètres Financiers et Plafonds Réglementaires
            </h2>
            
            <div class="space-y-8">
                <!-- 3.1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        3.1. Plafonds d'Investissement et d'Emprunt
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            La réglementation IFP impose des limites quantitatives strictes pour les opérations de prêt onéreux :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><span class="font-medium">Plafond par Prêteur :</span> Un même prêteur ne peut pas prêter plus de 2 000 € pour un même projet de financement.</li>
                            <li><span class="font-medium">Plafond par Projet :</span> Un même porteur de projet ne peut pas emprunter un montant total supérieur à 1 000 000 € pour un même projet.</li>
                            <li><span class="font-medium">Durée Maximale :</span> La durée de remboursement d'un crédit onéreux ne peut pas excéder 7 ans.</li>
                        </ul>
                        <p>
                            Le plafond de 2 000 € par prêteur a une conséquence structurelle majeure. Pour financer un prêt étudiant de 40 000 €, Fin'Bright devra agréger les contributions d'au moins 20 prêteurs différents. Ce mécanisme confirme que le modèle économique de la plateforme doit être orienté vers la construction et l'animation d'une large communauté d'investisseurs particuliers, et non vers la recherche de quelques grands investisseurs.
                        </p>
                    </div>
                </div>
                
                <!-- 3.2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        3.2. Taux d'Intérêt, Rendement, TAEG et Taux d'Usure
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            C'est sur ce point que le modèle économique de Fin'Bright rencontre son défi réglementaire le plus critique.
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><span class="font-medium">Taux d'Intérêt Conventionnel :</span> Il s'agit du taux nominal du prêt, librement fixé entre les parties. Il constitue la base du rendement brut pour le prêteur.</li>
                            <li><span class="font-medium">TAEG (Taux Annuel Effectif Global) :</span> C'est le coût total du crédit pour l'emprunteur. Il est exprimé en pourcentage annuel et doit obligatoirement inclure, en plus du taux d'intérêt, tous les frais conditionnant l'octroi du prêt : frais de dossier, commissions de la plateforme, frais de gestion, etc.</li>
                            <li><span class="font-medium">Taux d'Usure :</span> C'est le TAEG maximum légal qu'un prêteur est autorisé à pratiquer. Fixé chaque trimestre par la Banque de France pour différentes catégories de prêts, il a pour but de protéger les emprunteurs contre des taux abusifs. Le fait de proposer un prêt dont le TAEG dépasse le taux d'usure constitue un délit.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection