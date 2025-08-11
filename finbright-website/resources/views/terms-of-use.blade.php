@extends('layouts.app')

@section('title', 'Conditions Générales d\'Utilisation | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Conditions Générales <span class="text-finbright-cyan">d'Utilisation</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Les règles et conditions qui régissent l'accès et l'utilisation de la plateforme Fin'Bright.
        </p>
    </div>
</section>

<!-- Section CGU -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Introduction -->
            <div class="mb-12">
                <div class="bg-finbright-purple text-white rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-white">Date de dernière mise à jour : 18/17/2025</h2>
                    <p class="text-white">
                        Les présentes Conditions Générales d'Utilisation (CGU) régissent l'accès et l'utilisation de la plateforme de financement participatif exploitée par la société Fin'Bright.
                    </p>
                </div>
            </div>

            <!-- Préambule -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">PRÉAMBULE</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <p class="text-gray-600 mb-4">
                        La société Fin'Bright est une Société par Actions Simplifiée (SAS) au capital social de 2000 euros, dont le siège social est situé au 542 Rue Daniel Blervaque, 78955, Carrières-sous-Poissy, immatriculée au Registre du Commerce et des Sociétés de [à venir] sous le numéro. Son numéro de TVA intracommunautaire est [à venir].
                    </p>
                    <p class="text-gray-600 mb-4">
                        Fin'Bright est joignable par courrier électronique à l'adresse <a href="mailto:contact@finbright.fr" class="text-finbright-purple hover:text-finbright-cyan">contact@finbright.fr</a>. Le Directeur de la publication est Kouadio Benjamin SANOU, en sa qualité de Président de Fin'Bright.
                    </p>
                    <div class="bg-finbright-cyan text-white rounded-lg p-4 mb-4">
                        <p class="font-semibold mb-2">Statut réglementaire :</p>
                        <p>Fin'Bright exerce l'activité d'Intermédiaire en Financement Participatif (IFP), conformément aux dispositions de l'article L. 548-1 du Code monétaire et financier.</p>
                    </div>
                    <p class="text-gray-600 mb-4">
                        À ce titre, Fin'Bright est immatriculée auprès de l'Organisme pour le Registre Unique des Intermédiaires en Assurance, Banque et Finance (ORIAS), situé au 1, rue Jules Lefebvre, 75331 Paris Cedex 09, sous le numéro d'immatriculation ****. Cette immatriculation est vérifiable sur le site internet de l'ORIAS (<a href="http://www.orias.fr" class="text-finbright-purple hover:text-finbright-cyan">www.orias.fr</a>).
                    </p>
                    <p class="text-gray-600 mb-4">
                        L'activité de Fin'Bright est exercée sous le contrôle de l'Autorité de Contrôle Prudentiel et de Résolution (ACPR), dont le siège est situé au 4 Place de Budapest, 75436 Paris.
                    </p>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <p class="text-yellow-800 font-semibold mb-2">⚠️ Avertissement important :</p>
                        <p class="text-yellow-700">
                            Il est expressément précisé que Fin'Bright agit en qualité de strict intermédiaire. En conséquence, Fin'Bright n'est pas partie aux Contrats de Prêt conclus entre les Emprunteurs et les Prêteurs par l'intermédiaire de la Plateforme. Fin'Bright ne fournit aucun conseil en investissement, en financement ou de nature juridique ou fiscale. La Plateforme ne garantit en aucune manière le remboursement des prêts consentis, le risque de perte en capital étant supporté intégralement par les Prêteurs.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Article 1 : Définitions -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 1 : <span class="text-finbright-purple">DÉFINITIONS</span>
                </h2>
                <p class="text-gray-600 mb-6">
                    Au sens des présentes CGU, les termes ci-dessous, lorsqu'ils sont utilisés avec une majuscule, auront la signification suivante, qu'ils soient employés au singulier ou au pluriel :
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">ACPR</h3>
                        <p class="text-gray-600">Désigne l'Autorité de Contrôle Prudentiel et de Résolution.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">CGU</h3>
                        <p class="text-gray-600">Désigne les présentes Conditions Générales d'Utilisation, qui constituent le contrat liant Fin'Bright et chaque Utilisateur.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Contrat de Prêt</h3>
                        <p class="text-gray-600">Désigne le contrat conclu entre un Emprunteur et un ou plusieurs Prêteurs via la Plateforme, formalisant les conditions du prêt (montant, durée, taux, échéancier de remboursement). Fin'Bright est un tiers à ce contrat.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Demande de Prêt</h3>
                        <p class="text-gray-600">Désigne la sollicitation de financement soumise par un Emprunteur sur la Plateforme en vue de la réalisation d'un Projet déterminé.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Différé Partiel</h3>
                        <p class="text-gray-600">Désigne, pour le Prêt Étudiant, la période initiale du prêt durant laquelle l'Emprunteur ne rembourse que les intérêts et les frais applicables, le remboursement du capital étant reporté à l'issue de cette période.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Données Personnelles</h3>
                        <p class="text-gray-600">Désigne toute information se rapportant à une personne physique identifiée ou identifiable au sens du Règlement (UE) 2016/679 du 27 avril 2016 (RGPD).</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Emprunteur</h3>
                        <p class="text-gray-600">Désigne la personne physique, répondant aux critères d'éligibilité définis à l'Article 3, qui sollicite un financement pour un Projet via la Plateforme.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Espace Personnel</h3>
                        <p class="text-gray-600">Désigne le compte individuel, personnel et sécurisé de chaque Utilisateur, accessible sur la Plateforme au moyen d'un identifiant et d'un mot de passe.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Fin'Bright</h3>
                        <p class="text-gray-600">Désigne la société Fin'Bright SAS, telle qu'identifiée dans le Préambule.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Frais d'Entrée</h3>
                        <p class="text-gray-600">Désigne les frais de 5% du montant prêté, supportés par le Prêteur et perçus par Fin'Bright au moment du financement d'un Prêt Étudiant.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Frais de Fonctionnement / de Gestion</h3>
                        <p class="text-gray-600">Désigne les frais perçus par Fin'Bright en contrepartie de ses services, supportés par l'Emprunteur et dont les modalités sont détaillées à l'Article 6.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">IFP</h3>
                        <p class="text-gray-600">Désigne le statut d'Intermédiaire en Financement Participatif.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mini-Prêt</h3>
                        <p class="text-gray-600">Désigne le produit de prêt à court terme proposé sur la Plateforme, dont les caractéristiques sont décrites à l'Article 4.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">ORIAS</h3>
                        <p class="text-gray-600">Désigne l'Organisme pour le registre unique des intermédiaires en assurance, banque et finance.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Partenaire de Services de Paiement (PSP)</h3>
                        <p class="text-gray-600">Désigne l'établissement de paiement ou l'établissement de monnaie électronique agréé, mandaté par Fin'Bright pour assurer l'encaissement des fonds pour le compte des Utilisateurs, la gestion des comptes de paiement et l'exécution des opérations de paiement (virements, prélèvements).</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Plateforme</h3>
                        <p class="text-gray-600">Désigne le site internet accessible à l'adresse www.finbright.fr, ainsi que toute application mobile éventuelle exploitée par Fin'Bright pour fournir le Service.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Prêt Étudiant</h3>
                        <p class="text-gray-600">Désigne le produit de prêt à moyen ou long terme destiné au financement des études, proposé sur la Plateforme et dont les caractéristiques sont décrites à l'Article 4.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Prêteur</h3>
                        <p class="text-gray-600">Désigne la personne physique ou la personne morale à but non lucratif (association ou fondation), répondant aux critères d'éligibilité définis à l'Article 3, qui finance un ou plusieurs Projets via la Plateforme en consentant un prêt onéreux.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Projet</h3>
                        <p class="text-gray-600">Désigne l'opération pour laquelle un Emprunteur recherche un financement, qui doit consister, conformément à l'article L. 548-1 du Code monétaire et financier, en une opération prédéfinie ou un ensemble d'opérations prédéfinies, un événement ou le soutien d'une cause.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Service</h3>
                        <p class="text-gray-600">Désigne l'ensemble des prestations d'intermédiation fournies par Fin'Bright via la Plateforme, incluant la mise en relation, la mise à disposition d'outils de suivi et la gestion des opérations de financement.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Utilisateur</h3>
                        <p class="text-gray-600">Désigne toute personne physique ou morale, Prêteur ou Emprunteur, qui a créé un Espace Personnel sur la Plateforme.</p>
                    </div>
                </div>
            </div>

            <!-- Article 2 : Objet, acceptation et modification des CGU -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 2 : <span class="text-finbright-cyan">OBJET, ACCEPTATION ET MODIFICATION DES CGU</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">2.1 Objet des CGU</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            Les présentes CGU ont pour objet de définir les conditions et modalités d'accès et d'utilisation du Service fourni par Fin'Bright, ainsi que de définir les droits et obligations respectifs de Fin'Bright et des Utilisateurs dans ce cadre. Elles constituent le socle de la relation contractuelle entre les parties.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">2.2 Acceptation des CGU</h3>
                    <div class="bg-finbright-purple text-white rounded-lg p-6">
                        <p class="mb-4">
                            L'accès à la Plateforme et l'utilisation du Service sont strictement subordonnés à l'acceptation préalable, pleine et entière des présentes CGU. L'Utilisateur matérialise son acceptation lors de la création de son Espace Personnel en cochant la case prévue à cet effet, stipulant : « Je reconnais avoir lu et accepté sans réserve les Conditions Générales d'Utilisation de Fin'Bright et les Conditions Générales d'Utilisation de notre Partenaire de Services de Paiement ».
                        </p>
                        <p class="font-semibold">
                            ⚠️ L'Utilisateur qui n'accepte pas d'être lié par les présentes CGU ne doit pas accéder à la Plateforme ni utiliser le Service.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">2.3 Modification des CGU</h3>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6">
                        <p class="text-yellow-800 mb-4">
                            Fin'Bright se réserve le droit de modifier les présentes CGU à tout moment afin de les adapter aux évolutions de la Plateforme, du Service ou de la réglementation applicable.
                        </p>
                        <p class="text-yellow-700 mb-4">
                            Toute modification fera l'objet d'une notification aux Utilisateurs par courrier électronique ou par une notification visible depuis leur Espace Personnel, dans un délai de préavis raisonnable d'au moins quinze (15) jours avant leur entrée en vigueur.
                        </p>
                        <p class="text-yellow-700">
                            Durant ce préavis, l'Utilisateur pourra notifier son refus des nouvelles CGU, ce qui entraînera la clôture de son Espace Personnel selon les modalités prévues à l'Article 13. À défaut d'opposition dans ce délai, les nouvelles CGU seront réputées acceptées par l'Utilisateur.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Article 3 : Inscription et accès aux services -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 3 : <span class="text-finbright-purple">INSCRIPTION ET ACCÈS AUX SERVICES</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">3.1 Conditions d'Éligibilité des Utilisateurs</h3>
                    <p class="text-gray-600 mb-6">L'accès au Service est réservé aux Utilisateurs remplissant les conditions cumulatives suivantes :</p>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">3.1.1 Conditions communes à tous les Utilisateurs</h4>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <ul class="list-disc list-inside text-gray-600 space-y-2">
                                <li>Être titulaire d'une adresse de courrier électronique valide</li>
                                <li>Être titulaire d'un compte bancaire ouvert auprès d'un établissement de crédit situé dans un pays de l'espace unique de paiement en euros (SEPA)</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">3.1.2 Conditions spécifiques aux Emprunteurs</h4>
                        <div class="bg-finbright-purple text-white rounded-lg p-6">
                            <p class="mb-3 font-semibold">L'Emprunteur doit être une personne physique remplissant les conditions suivantes :</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Être âgé d'au moins 18 ans et jouir de sa pleine capacité juridique</li>
                                <li>Résider fiscalement en France métropolitaine</li>
                                <li>Ne pas être inscrit sur le Fichier national des Incidents de remboursement des Crédits aux Particuliers (FICP) et ne pas faire l'objet d'une procédure de surendettement</li>
                                <li>Pour le Prêt Étudiant, être admis ou inscrit dans un établissement d'enseignement supérieur partenaire ou reconnu par Fin'Bright</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">3.1.3 Conditions spécifiques aux Prêteurs</h4>
                        <div class="bg-finbright-cyan text-white rounded-lg p-6">
                            <p class="mb-3 font-semibold">Le Prêteur peut être :</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Une personne physique majeure, jouissant de sa pleine capacité juridique et agissant à des fins non professionnelles ou commerciales. Elle doit être résidente fiscale en France ou dans un pays de l'Union Européenne autorisé par la Plateforme</li>
                                <li>Une personne morale à but non lucratif (association régie par la loi de 1901 ou fondation reconnue d'utilité publique) dûment constituée et immatriculée en France</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">3.2 Processus de Création de l'Espace Personnel</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">La création d'un Espace Personnel est un prérequis indispensable pour utiliser le Service. L'Utilisateur doit suivre les étapes suivantes :</p>
                        <ol class="list-decimal list-inside text-gray-600 space-y-2">
                            <li>Remplir le formulaire d'inscription en ligne en fournissant des informations exactes, complètes et à jour (état civil, coordonnées, etc.)</li>
                            <li>Choisir un identifiant (son adresse e-mail) et un mot de passe personnel et confidentiel. Le mot de passe doit respecter les normes de sécurité indiquées par la Plateforme</li>
                            <li>Valider son inscription en cliquant sur le lien d'activation envoyé à son adresse e-mail</li>
                        </ol>
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-4">
                            <p class="text-yellow-800 font-semibold">⚠️ Responsabilité de l'Utilisateur :</p>
                            <p class="text-yellow-700">L'Utilisateur est seul et unique responsable de la préservation de la confidentialité de son mot de passe et de toutes les actions effectuées depuis son Espace Personnel. Il s'engage à informer Fin'Bright sans délai en cas d'utilisation non autorisée de son compte.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">3.3 Vérification d'Identité (Procédure KYC)</h3>
                    <div class="bg-red-50 border-l-4 border-red-400 p-6">
                        <p class="text-red-800 mb-4">
                            Conformément à ses obligations légales en matière de Lutte Contre le Blanchiment de Capitaux et le Financement du Terrorisme (LCB-FT), Fin'Bright, en collaboration avec son PSP, est tenue de vérifier l'identité de ses Utilisateurs.
                        </p>
                        <p class="text-red-700 mb-4">
                            Cette procédure de vérification ("Know Your Customer" ou KYC) est obligatoire et conditionne l'accès complet au Service. La rapidité de l'inscription initiale ne préjuge pas de la durée de cette vérification, qui peut prendre plusieurs jours.
                        </p>
                        <p class="text-red-700">
                            Tant que la procédure KYC n'est pas finalisée et validée, l'Utilisateur pourra voir son accès au Service limité, notamment en ce qui concerne le déblocage des fonds pour un Emprunteur ou le retrait des remboursements pour un Prêteur.
                        </p>
                    </div>
                    
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Documents requis</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h5 class="text-lg font-semibold text-gray-900 mb-3">
                                    <i class="fas fa-user text-finbright-purple mr-2"></i>
                                    Personnes physiques
                                </h5>
                                <ul class="list-disc list-inside text-gray-600 space-y-1">
                                    <li>Une copie d'une pièce d'identité officielle (carte nationale d'identité, passeport)</li>
                                    <li>Un justificatif de domicile de moins de 3 mois</li>
                                    <li>Un Relevé d'Identité Bancaire (RIB) à son nom</li>
                                    <li>Pour l'Emprunteur d'un Prêt Étudiant : un justificatif de scolarité ou d'admission</li>
                                </ul>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h5 class="text-lg font-semibold text-gray-900 mb-3">
                                    <i class="fas fa-building text-finbright-cyan mr-2"></i>
                                    Personnes morales
                                </h5>
                                <ul class="list-disc list-inside text-gray-600 space-y-1">
                                    <li>Statuts de l'association ou fondation</li>
                                    <li>Récépissé de déclaration en préfecture ou décret de reconnaissance d'utilité publique</li>
                                    <li>Justificatif d'adresse du siège social de moins de 3 mois</li>
                                    <li>Pièce d'identité du représentant légal</li>
                                    <li>Pouvoir du représentant légal</li>
                                    <li>RIB au nom de la personne morale</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 4 : Description des services -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 4 : <span class="text-finbright-purple">DESCRIPTION DES SERVICES</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">4.1 Nature du Service</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            Fin'Bright exploite une plateforme de financement participatif permettant la mise en relation d'Emprunteurs et de Prêteurs en vue de la conclusion de Contrats de Prêt. Le Service comprend notamment :
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>La mise à disposition d'une interface web permettant aux Emprunteurs de présenter leurs Demandes de Prêt</li>
                            <li>La mise à disposition d'outils permettant aux Prêteurs d'analyser les Demandes de Prêt et de prendre leurs décisions d'investissement</li>
                            <li>La facilitation de la conclusion des Contrats de Prêt entre Emprunteurs et Prêteurs</li>
                            <li>La gestion administrative et technique des prêts (collecte des fonds, versement aux Emprunteurs, suivi des remboursements)</li>
                            <li>La fourniture d'outils de suivi et de reporting pour les Utilisateurs</li>
                        </ul>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">4.2 Produits de Financement Proposés</h3>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">4.2.1 Prêt Étudiant</h4>
                        <div class="bg-finbright-purple text-white rounded-lg p-6">
                            <p class="mb-3 font-semibold">Caractéristiques principales :</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li><strong>Objet :</strong> Financement des frais de scolarité, frais de vie étudiante, matériel pédagogique, logement étudiant</li>
                                <li><strong>Montant :</strong> De 1 000 € à 50 000 € par Emprunteur</li>
                                <li><strong>Durée :</strong> De 2 à 10 ans, incluant une période de Différé Partiel optionnelle</li>
                                <li><strong>Taux d'intérêt :</strong> Taux fixe déterminé en fonction du profil de l'Emprunteur et des conditions de marché</li>
                                <li><strong>Remboursement :</strong> Mensuel, avec possibilité de Différé Partiel pendant les études</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">4.2.2 Mini-Prêt</h4>
                        <div class="bg-finbright-cyan text-white rounded-lg p-6">
                            <p class="mb-3 font-semibold">Caractéristiques principales :</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li><strong>Objet :</strong> Financement de besoins ponctuels de trésorerie (urgences, opportunités, projets personnels)</li>
                                <li><strong>Montant :</strong> De 100 € à 5 000 € par Emprunteur</li>
                                <li><strong>Durée :</strong> De 1 à 24 mois</li>
                                <li><strong>Taux d'intérêt :</strong> Taux fixe déterminé en fonction du profil de l'Emprunteur et de la durée</li>
                                <li><strong>Remboursement :</strong> Mensuel, sans différé</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">4.3 Processus de Financement</h3>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6">
                        <p class="text-yellow-800 mb-4">
                            Le processus de financement suit les étapes suivantes :
                        </p>
                        <ol class="list-decimal list-inside text-yellow-700 space-y-2">
                            <li>Soumission et évaluation de la Demande de Prêt par l'Emprunteur</li>
                            <li>Publication de la Demande de Prêt sur la Plateforme (si éligible)</li>
                            <li>Période de financement durant laquelle les Prêteurs peuvent contribuer</li>
                            <li>Finalisation du financement et signature électronique du Contrat de Prêt</li>
                            <li>Versement des fonds à l'Emprunteur</li>
                            <li>Début de la période de remboursement selon l'échéancier convenu</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Article 5 : Obligations et responsabilités des parties -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 5 : <span class="text-finbright-cyan">OBLIGATIONS ET RESPONSABILITÉS DES PARTIES</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">5.1 Obligations de Fin'Bright</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">Fin'Bright s'engage à :</p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Fournir le Service avec diligence et selon les règles de l'art</li>
                            <li>Respecter ses obligations réglementaires en tant qu'IFP</li>
                            <li>Mettre en œuvre les mesures techniques et organisationnelles appropriées pour assurer la sécurité de la Plateforme</li>
                            <li>Vérifier l'identité des Utilisateurs conformément à la réglementation LCB-FT</li>
                            <li>Informer les Utilisateurs des risques liés au financement participatif</li>
                            <li>Assurer la gestion administrative des prêts (collecte, versement, suivi des remboursements)</li>
                        </ul>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">5.2 Obligations des Utilisateurs</h3>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">5.2.1 Obligations communes</h4>
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-6">
                            <p class="text-blue-800 mb-3">Tous les Utilisateurs s'engagent à :</p>
                            <ul class="list-disc list-inside text-blue-700 space-y-2">
                                <li>Fournir des informations exactes, complètes et à jour</li>
                                <li>Respecter les présentes CGU et la réglementation applicable</li>
                                <li>Utiliser la Plateforme de manière loyale et conforme à sa destination</li>
                                <li>Ne pas porter atteinte à l'image, à la réputation ou aux intérêts de Fin'Bright</li>
                                <li>Informer Fin'Bright de tout changement dans leur situation</li>
                                <li>Préserver la confidentialité de leurs identifiants de connexion</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">5.2.2 Obligations spécifiques des Emprunteurs</h4>
                        <div class="bg-red-50 border-l-4 border-red-400 p-6">
                            <p class="text-red-800 mb-3">Les Emprunteurs s'engagent en outre à :</p>
                            <ul class="list-disc list-inside text-red-700 space-y-2">
                                <li>Utiliser les fonds exclusivement pour le Projet décrit dans leur Demande de Prêt</li>
                                <li>Respecter scrupuleusement les échéances de remboursement</li>
                                <li>Informer Fin'Bright de toute difficulté de remboursement dès qu'elle survient</li>
                                <li>Fournir tous justificatifs demandés concernant l'utilisation des fonds</li>
                                <li>Ne pas contracter d'autres emprunts susceptibles de compromettre leur capacité de remboursement sans en informer Fin'Bright</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">5.2.3 Obligations spécifiques des Prêteurs</h4>
                        <div class="bg-green-50 border-l-4 border-green-400 p-6">
                            <p class="text-green-800 mb-3">Les Prêteurs s'engagent en outre à :</p>
                            <ul class="list-disc list-inside text-green-700 space-y-2">
                                <li>Évaluer leur capacité financière avant tout investissement</li>
                                <li>Prendre connaissance des risques liés au financement participatif</li>
                                <li>Diversifier leurs investissements pour limiter les risques</li>
                                <li>Ne pas dépasser les plafonds réglementaires d'investissement</li>
                                <li>Agir en tant que prêteur non professionnel (pour les personnes physiques)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">5.3 Limitation de Responsabilité</h3>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6">
                        <p class="text-yellow-800 mb-4 font-semibold">
                            ⚠️ AVERTISSEMENT IMPORTANT SUR LES RISQUES :
                        </p>
                        <p class="text-yellow-700 mb-4">
                            Fin'Bright agit exclusivement en qualité d'intermédiaire. Elle n'est pas partie aux Contrats de Prêt et ne garantit en aucune manière :
                        </p>
                        <ul class="list-disc list-inside text-yellow-700 space-y-2">
                            <li>Le remboursement des sommes prêtées</li>
                            <li>Le paiement des intérêts</li>
                            <li>La solvabilité des Emprunteurs</li>
                            <li>La réalisation effective des Projets financés</li>
                        </ul>
                        <p class="text-yellow-700 mt-4">
                            Le risque de perte en capital est intégralement supporté par les Prêteurs. Fin'Bright ne saurait être tenue responsable des pertes subies par les Prêteurs du fait du défaut de remboursement des Emprunteurs.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Article 6 : Tarification et frais -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 6 : <span class="text-finbright-purple">TARIFICATION ET FRAIS</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">6.1 Principe de Tarification</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            L'utilisation du Service donne lieu à la perception de frais par Fin'Bright, selon les modalités détaillées ci-après. Ces frais rémunèrent les prestations d'intermédiation, de gestion administrative et technique fournies par Fin'Bright.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">6.2 Frais pour les Emprunteurs</h3>
                    <div class="bg-finbright-purple text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-3">6.2.1 Frais de Fonctionnement / de Gestion</h4>
                        <p class="mb-3">Ces frais sont prélevés mensuellement avec chaque échéance de remboursement :</p>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Prêt Étudiant :</strong> 1% du montant de l'échéance mensuelle (capital + intérêts)</li>
                            <li><strong>Mini-Prêt :</strong> 2% du montant de l'échéance mensuelle (capital + intérêts)</li>
                        </ul>
                        <p class="mt-3 text-sm">
                            Ces frais sont automatiquement prélevés lors de chaque échéance et sont dus même en cas de remboursement anticipé.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">6.3 Frais pour les Prêteurs</h3>
                    <div class="bg-finbright-cyan text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-3">6.3.1 Frais d'Entrée</h4>
                        <p class="mb-3">Pour le Prêt Étudiant uniquement :</p>
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Taux :</strong> 5% du montant prêté</li>
                            <li><strong>Prélèvement :</strong> Au moment du financement du prêt</li>
                            <li><strong>Exemple :</strong> Pour un prêt de 1 000 €, les frais d'entrée s'élèvent à 50 €</li>
                        </ul>
                        <p class="mt-3 text-sm">
                            Aucun frais d'entrée n'est appliqué pour les Mini-Prêts.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">6.4 Autres Frais</h3>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6">
                        <p class="text-yellow-800 mb-4">
                            Des frais supplémentaires peuvent s'appliquer dans les cas suivants :
                        </p>
                        <ul class="list-disc list-inside text-yellow-700 space-y-2">
                            <li><strong>Frais de recouvrement :</strong> En cas de retard de paiement, des frais de recouvrement pourront être facturés à l'Emprunteur selon le barème en vigueur</li>
                            <li><strong>Frais de virement :</strong> Les frais bancaires liés aux virements sont à la charge de l'Utilisateur bénéficiaire</li>
                            <li><strong>Frais de change :</strong> Pour les virements internationaux, les frais de change sont à la charge de l'Utilisateur</li>
                        </ul>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">6.5 Modalités de Paiement</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            Tous les frais sont prélevés automatiquement par le PSP selon les modalités convenues. Les frais sont exprimés toutes taxes comprises (TTC) et incluent la TVA au taux en vigueur.
                        </p>
                        <p class="text-gray-600">
                            Fin'Bright se réserve le droit de modifier sa grille tarifaire moyennant un préavis de trente (30) jours notifié aux Utilisateurs. Les nouveaux tarifs ne s'appliqueront qu'aux nouveaux prêts conclus après l'entrée en vigueur de la modification.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Risques et avertissements -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Risques et <span class="text-finbright-purple">avertissements</span>
                </h2>
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl mr-4 mt-1"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Avertissement sur les risques</h3>
                            <p class="text-yellow-700 mb-4">
                                Le financement participatif présente des risques de perte en capital. Les performances passées ne préjugent pas des performances futures.
                            </p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-yellow-800 mb-2">Risques principaux :</h4>
                            <ul class="list-disc list-inside text-yellow-700 space-y-1">
                                <li>Risque de défaut de l'emprunteur</li>
                                <li>Absence de garantie de capital</li>
                                <li>Liquidité limitée</li>
                                <li>Risque de change (projets internationaux)</li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="font-semibold text-yellow-800 mb-2">Recommandations :</h4>
                            <ul class="list-disc list-inside text-yellow-700 space-y-1">
                                <li>Diversifiez vos investissements</li>
                                <li>N'investissez que ce que vous pouvez perdre</li>
                                <li>Lisez attentivement les documents</li>
                                <li>Consultez un conseiller si nécessaire</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarification -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-cyan">Tarification</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-coins text-finbright-purple mr-2"></i>
                            Frais investisseurs
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Inscription : Gratuite</li>
                            <li>Investissement : 1% du montant investi</li>
                            <li>Gestion de portefeuille : 0,5% annuel</li>
                            <li>Retrait : Gratuit (1 par mois)</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-percentage text-finbright-cyan mr-2"></i>
                            Frais emprunteurs
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Dossier : Gratuit</li>
                            <li>Succès de financement : 3% du montant levé</li>
                            <li>Gestion des remboursements : 0,5% par échéance</li>
                            <li>Services additionnels : Sur devis</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Responsabilité -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Responsabilité</span>
                </h2>
                <div class="space-y-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Limitation de responsabilité</h3>
                        <p class="text-gray-600 mb-4">
                            Fin'Bright agit en qualité d'intermédiaire et ne peut être tenue responsable :
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Des défauts de paiement des emprunteurs</li>
                            <li>Des pertes financières des investisseurs</li>
                            <li>Des interruptions temporaires de service</li>
                            <li>Des actes de tiers (piratage, virus, etc.)</li>
                        </ul>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Engagements de Fin'Bright</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Vérification diligente des projets</li>
                            <li>Sécurisation des données et transactions</li>
                            <li>Transparence sur les risques</li>
                            <li>Support client de qualité</li>
                            <li>Respect de la réglementation</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Propriété intellectuelle -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Propriété <span class="text-finbright-cyan">intellectuelle</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="text-gray-600 mb-4">
                        Tous les éléments de la plateforme (textes, images, logos, codes, etc.) sont protégés par les droits de propriété intellectuelle et appartiennent à Fin'Bright ou à ses partenaires.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Droits accordés</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-1">
                                <li>Utilisation personnelle de la plateforme</li>
                                <li>Consultation des contenus</li>
                                <li>Téléchargement des documents personnels</li>
                            </ul>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Interdictions</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-1">
                                <li>Reproduction sans autorisation</li>
                                <li>Modification des contenus</li>
                                <li>Utilisation commerciale</li>
                                <li>Ingénierie inverse</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 7 : Protection des données personnelles -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 7 : <span class="text-finbright-cyan">PROTECTION DES DONNÉES PERSONNELLES</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">7.1 Engagement de Protection</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            Fin'Bright s'engage à protéger les données personnelles de ses Utilisateurs conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés.
                        </p>
                        <p class="text-gray-600">
                            Les modalités détaillées de traitement des données personnelles sont décrites dans notre Politique de Confidentialité, accessible sur la Plateforme et faisant partie intégrante des présentes CGU.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">7.2 Droits des Utilisateurs</h3>
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6">
                        <p class="text-blue-800 mb-4">Conformément à la réglementation, les Utilisateurs disposent des droits suivants :</p>
                        <ul class="list-disc list-inside text-blue-700 space-y-2">
                            <li>Droit d'accès à leurs données personnelles</li>
                            <li>Droit de rectification des données inexactes</li>
                            <li>Droit à l'effacement (sous certaines conditions)</li>
                            <li>Droit à la limitation du traitement</li>
                            <li>Droit à la portabilité des données</li>
                            <li>Droit d'opposition au traitement</li>
                        </ul>
                        <p class="text-blue-700 mt-4">
                            Ces droits peuvent être exercés en contactant notre Délégué à la Protection des Données à l'adresse : dpo@finbright.fr
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Article 8 : Durée et résiliation -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 8 : <span class="text-finbright-purple">DURÉE ET RÉSILIATION</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">8.1 Durée du Contrat</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600">
                            Les présentes CGU entrent en vigueur dès leur acceptation par l'Utilisateur et demeurent applicables tant que l'Utilisateur accède au Service ou utilise la Plateforme.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">8.2 Résiliation par l'Utilisateur</h3>
                    <div class="bg-green-50 border-l-4 border-green-400 p-6">
                        <p class="text-green-800 mb-4">
                            L'Utilisateur peut résilier son compte à tout moment en :
                        </p>
                        <ul class="list-disc list-inside text-green-700 space-y-2">
                            <li>Adressant une demande de résiliation via son espace personnel</li>
                            <li>Envoyant un email à support@finbright.fr</li>
                        </ul>
                        <p class="text-green-700 mt-4">
                            La résiliation prend effet immédiatement, sous réserve de l'exécution des obligations en cours (prêts en cours de remboursement).
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">8.3 Résiliation par Fin'Bright</h3>
                    <div class="bg-red-50 border-l-4 border-red-400 p-6">
                        <p class="text-red-800 mb-4">
                            Fin'Bright peut suspendre ou résilier l'accès d'un Utilisateur dans les cas suivants :
                        </p>
                        <ul class="list-disc list-inside text-red-700 space-y-2">
                            <li>Non-respect des présentes CGU</li>
                            <li>Fourniture d'informations fausses ou trompeuses</li>
                            <li>Utilisation frauduleuse de la Plateforme</li>
                            <li>Défaut de paiement récurrent</li>
                            <li>Comportement nuisant à l'image ou au fonctionnement de la Plateforme</li>
                        </ul>
                        <p class="text-red-700 mt-4">
                            La résiliation sera notifiée par email avec un préavis de 15 jours, sauf en cas d'urgence ou de faute grave.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Article 9 : Modification des CGU -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 9 : <span class="text-finbright-cyan">MODIFICATION DES CGU</span>
                </h2>
                
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6">
                    <p class="text-yellow-800 mb-4">
                        Fin'Bright se réserve le droit de modifier les présentes CGU à tout moment, notamment pour :
                    </p>
                    <ul class="list-disc list-inside text-yellow-700 space-y-2">
                        <li>S'adapter aux évolutions réglementaires</li>
                        <li>Améliorer le Service</li>
                        <li>Corriger des erreurs ou imprécisions</li>
                    </ul>
                    <p class="text-yellow-700 mt-4">
                        Les Utilisateurs seront informés de toute modification par email au moins 30 jours avant leur entrée en vigueur. L'utilisation continue de la Plateforme après cette date vaut acceptation des nouvelles CGU.
                    </p>
                    <p class="text-yellow-700 mt-4">
                        En cas de désaccord avec les modifications, l'Utilisateur peut résilier son compte selon les modalités prévues à l'Article 8.
                    </p>
                </div>
            </div>
            
            <!-- Article 10 : Droit applicable et juridictions -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 10 : <span class="text-finbright-purple">DROIT APPLICABLE ET JURIDICTIONS</span>
                </h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">10.1 Droit Applicable</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600">
                            Les présentes CGU sont soumises au droit français. Toute question relative à leur interprétation ou à leur exécution sera régie par le droit français.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">10.2 Résolution Amiable des Litiges</h3>
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6">
                        <p class="text-blue-800 mb-4">
                            En cas de litige, les parties s'engagent à rechercher une solution amiable avant toute action judiciaire.
                        </p>
                        <p class="text-blue-700">
                            Les Utilisateurs consommateurs peuvent également recourir à la médiation en contactant le médiateur de l'AMF (Autorité des Marchés Financiers) ou tout autre médiateur compétent.
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">10.3 Juridiction Compétente</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600">
                            À défaut de résolution amiable, tout litige sera porté devant les tribunaux compétents de Paris, sous réserve des règles impératives de compétence territoriale.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Article 11 : Contact et support -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    ARTICLE 11 : <span class="text-finbright-cyan">CONTACT ET SUPPORT</span>
                </h2>
                <div class="bg-gradient-to-r from-finbright-purple to-finbright-cyan rounded-lg p-8 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Coordonnées de Fin'Bright</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-building mr-3"></i>
                                    <span>Fin'Bright SAS</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-3"></i>
                                    <span>123 Avenue de l'Innovation<br>75001 Paris, France</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope mr-3"></i>
                                    <span>contact@finbright.fr</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone mr-3"></i>
                                    <span>+33 1 23 45 67 89</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Support Client</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-headset mr-3"></i>
                                    <span>support@finbright.fr</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-shield-alt mr-3"></i>
                                    <span>dpo@finbright.fr (Protection des données)</span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-sm opacity-90">
                                        Horaires d'ouverture :<br>
                                        Lundi - Vendredi : 9h00 - 18h00<br>
                                        Samedi : 10h00 - 16h00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-white border-opacity-30">
                        <p class="text-center text-sm opacity-90">
                            Fin'Bright SAS - Capital social : 100 000 € - RCS Paris 123 456 789<br>
                            Immatriculée à l'ORIAS sous le numéro 12345678 en qualité d'Intermédiaire en Financement Participatif (IFP)<br>
                            Dernière mise à jour des CGU : {{ date('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection