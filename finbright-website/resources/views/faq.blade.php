@extends('layouts.app')

@section('title', 'FAQ - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class=" text-white py-20">
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
                        Oui. Les transactions sont sécurisées, les dossiers vérifiés, et nous respectons les standards RGPD. De plus, notre statut d'intermédiaire en financement participatif (IFP) est conforme à la réglementation française, sous la supervision de l'ACPR.
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
                <!-- Q1: Qu'est-ce que Fin'Bright? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Qu'est-ce que Fin'Bright ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Fin'Bright est une plateforme de financement participatif (ou crowdfunding) qui met en relation des particuliers (emprunteurs) ayant un besoin de financement avec d'autres particuliers souhaitant investir leur épargne de manière utile et rentable. Notre rôle est celui d'un intermédiaire : nous ne prêtons pas nos propres fonds, mais nous facilitons, sécurisons et administrons les prêts entre les membres de notre communauté.<br><br>Sur le plan réglementaire, Fin'Bright opère sous le statut d'intermédiaire en financement participatif (IFP), un cadre national français spécifiquement conçu pour les plateformes de prêts entre particuliers pour des projets non commerciaux. Ce statut nous impose des obligations strictes en matière d'information, de transparence et de protection des utilisateurs, et nous sommes à ce titre immatriculés au registre de l'ORIAS. Notre activité est également soumise à la supervision de l'ACPR, l'organe de la Banque de France chargé de la surveillance du secteur financier. Notre statut réglementaire est détaillé dans la section 1.3.<br><br>Le choix du statut d'IFP est délibéré. Il correspond à notre mission de nous concentrer exclusivement sur le marché français et aux deux prêts à caractère non commercial, comme le financement d'études ou des besoins de trésorerie ponctuels. Depuis la réglementation de novembre 2023, ce statut est précisément réservé à ce type d'opérations, ce qui nous distingue des plateformes ayant un statut européen de Prestataire de Services de Financement Participatif (PSFP), qui se concentrent sur le financement de projets commerciaux. Cette spécialisation nous permet d'offrir une activité de financement adaptée aux besoins spécifiques de notre communauté d'emprunteurs et de prêteurs en France.
                    </p>
                </div>

                <!-- Q2: En quoi diffère un prêt Fin'Bright d’un crédit bancaire ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        En quoi un prêt entre particuliers via Fin'Bright diffère-t-il d’un crédit bancaire ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La différence fondamentale réside dans l’origine des fonds et le modèle de décision. Contrairement à une banque qui prête ses propres fonds ou des fonds levés sur les marchés financiers, Fin'Bright facilite des prêts financés par une communauté de prêteurs individuels et institutionnels (associations, fondations).<br><br>Cette approche a plusieurs conséquences pour vous, emprunteur :<br><br>- Critères d’analyse : Notre analyse de risque, bien que rigoureuse et conforme aux exigences légales, peut intégrer des critères différents. Pour le Prêt Étudiant, par exemple, nous accordons une importance particulière au potentiel académique et professionnel du candidat, et pas uniquement à sa situation financière immédiate ou à celle de ses parents.<br><br>- Relation directe : Bien que les identités soient protégées, vous savez que votre projet est financé par des personnes qui ont choisi de vous faire confiance. Cela crée un lien et une responsabilité différents.<br><br>- Structure de coûts : Notre structure de coûts est directement liée à notre rôle d’intermédiaire. Les frais que nous percevons servent à couvrir l’analyse des dossiers, la gestion de la plateforme, et surtout les charges nécessaires au maintien de la plateforme.<br><br>Cependant, malgré ces différences, Fin'Bright est soumis à des obligations de protection du consommateur très similaires à celles des établissements de crédit traditionnels. Nous sommes tenus de vous fournir une information précontractuelle complète, de vérifier votre solvabilité pour prévenir le surendettement, et de respecter l’ensemble des droits garantis par le Code de la consommation.
                    </p>
                </div>

                <!-- Q3: Qui est éligible pour un prêt ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Suis-je éligible pour un prêt Fin'Bright ?
                    </h3>
                    <ul class="text-gray-700 leading-relaxed space-y-2 list-disc list-inside">
                        <li>Être majeur(e) au moment de la demande.</li>
                        <li>Être de nationalité française ou ressortissant de l’Union Européenne, ou disposer d’un titre de séjour en cours de validité pour toute la durée du prêt.</li>
                        <li>Résider en France métropolitaine.</li>
                        <li>Détenir un compte bancaire personnel ouvert en France.</li>
                        <li>Fournir un justificatif d’admission définitive dans l’un de nos établissements partenaires (grandes écoles de commerce, d’ingénieurs, universités prestigieuses). La liste de ces établissements est disponible sur notre site.</li>
                        <li>Nous offrons de Prêt Étudiants d’Excellence se distingue par son accessibilité, elle est proposée sans caution personnelle ni garant, car nous croyons au potentiel de nos étudiants.</li>
                    </ul>
                </div>

                <!-- Q4: Quels types de prêts sont disponibles ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels types de prêts sont disponibles ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Ils sont destinés à financer le parcours des étudiants les plus prometteurs, admis dans les grandes écoles ou universités françaises les plus prestigieuses. Ce prêt est accordé sans caution ni garant, pour des montants permettant de couvrir les frais de scolarité et de vie. La durée de remboursement s’étend de 2 à 7 ans et inclut une période de différé partiel, pendant laquelle l’étudiant ne rembourse que les intérêts, lui offrant ainsi la sécurité nécessaire pour se consacrer à ses études.<br><br>Les prêteurs peuvent décider de faire un prêt à taux zéro pour les étudiants qu’ils financent ou les financer par don sans contrepartie. Par ailleurs, Fin’Bright sert de plateforme sécurisée permettant aux fondations et partenaires œuvrant dans l’éducation de financer directement nos étudiants talentueux.<br><br>Pour les prêts sans intérêt, Fin’Bright applique 2 % de frais de gestion supportés par l’étudiant. Pour les dons sans contrepartie, Fin’Bright ponctionne 2 % de frais de gestion sur le montant total à verser à l’étudiant.
                    </p>
                </div>

                <!-- Q5: Quels documents sont nécessaires ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels documents et informations sont nécessaires pour constituer mon dossier ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La constitution de votre dossier est une étape essentielle qui nous permet de répondre à nos obligations légales et d’évaluer votre demande de manière juste et rigoureuse. Nous nous conformons aux directives de l’ACPR en matière de connaissance client (KYC - Know Your Customer) et de lutte contre le blanchiment d’argent et le financement du terrorisme (LCB-FT).<br><br>Voici la liste des pièces et informations requises :<br><br>- Pièces spécifiques au Prêt Étudiants d’Excellence<br>- Une pièce d’identité en cours de validité (carte nationale d’identité, passeport).<br>- Un justificatif de domicile de moins de 3 mois (facture d’électricité, de gaz, d’eau, de téléphone, quittance de loyer).<br>- Un Relevé d’Identité Bancaire (RIB) à votre nom, correspondant au compte sur lequel les fonds seront versés et les échéances prélevées.<br>- Le certificat de scolarité ou la lettre d’admission définitive de votre établissement pour l’année à financer.<br>- Analyse de votre situation financière : Pour évaluer votre capacité de remboursement, nous utilisons une technologie de connexion bancaire sécurisée. Ce processus, conforme à la Directive européenne sur les Services de Paiement (DSP2), nous permet d’obtenir une vue agrégée anonymisée de vos derniers relevés de compte. Il est crucial de comprendre que Fin’Bright n’a jamais accès à vos identifiants bancaires et ne les stocke à aucun moment. Ces informations sont chiffrées et transmises directement à notre partenaire agréé par l’ACPR, qui se charge de la connexion sécurisée avec votre banque. Cette analyse nous permet de remplir notre obligation légale de vérifier votre solvabilité avant l’octroi d’un crédit.
                    </p>
                </div>

                <!-- Q6: Comment se déroule une demande de prêt ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment se déroule une demande de A à Z ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Nous avons conçu un parcours de demande 100 % en ligne, simple et transparent. Voici les grandes étapes :<br><br>1. Simulation en ligne : Utilisez notre simulateur pour définir le montant et la durée de votre prêt. Vous obtiendrez une première estimation de vos mensualités et du coût total du crédit.<br>2. Création de votre espace personnel : Créez votre compte sécurisé sur notre plateforme.<br>3. Dépôt de la demande : Remplissez le formulaire de demande détaillé et téléchargez les pièces justificatives requises.<br>4. Analyse du dossier : Nos équipes analysent votre dossier. Cette étape comprend la vérification de vos pièces et l’évaluation de votre capacité de remboursement grâce à notre modèle de scoring.<br>5. Publication du projet (si accepté) : Si votre demande est validée, votre projet de financement (anonymisé) est présenté à notre communauté de prêteurs.<br>6. Financement du projet : Les prêteurs choisissent de financer votre projet. La collecte peut prendre de quelques heures à quelques jours. Vous pouvez suivre son avancement depuis votre espace personnel.<br>7. Réception de l’offre de contrat : Une fois votre projet financé à 100 %, nous vous envoyons une offre de contrat de prêt formelle et détaillée.<br>8. Signature électronique : Prenez le temps de lire attentivement le contrat. Si vous acceptez, vous pouvez le signer électroniquement de manière sécurisée.<br>9. Versement des fonds : Après la signature et l’expiration du délai légal de rétractation, les fonds sont virés directement sur votre compte bancaire.
                    </p>
                </div>

                <!-- Q7: Quels sont les délais ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels sont les délais pour obtenir une réponse et le versement des fonds ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Nous nous efforçons d’être aussi réactifs que possible, tout en respectant les contraintes légales.<br><br>- Réponse à votre demande : Vous recevrez une réponse de principe (acceptation, refus ou demande d’informations complémentaires), après la soumission de votre dossier complet.<br>- Période de financement : La durée nécessaire pour que votre projet soit financé par la communauté de prêteurs est variable. Pour les Prêts Étudiants, cela peut prendre plusieurs jours.<br>- Versement des fonds : La loi protège le consommateur en lui accordant un droit de rétractation de 14 jours calendaires, après la signature du contrat de prêt. Les fonds ne peuvent donc être débloqués qu’à l’issue de ce délai. Par conséquent, vous recevrez les fonds sur votre compte bancaire environ 15 jours après avoir signé votre contrat.
                    </p>
                </div>

                <!-- Q8: Pourquoi ma demande peut-elle être refusée ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Pourquoi ma demande de prêt pourrait-elle être refusée ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Notre politique de prêt responsable nous amène parfois à refuser des demandes. Un refus n’est pas un jugement de valeur, mais une décision basée sur notre analyse de risque, visant à vous protéger d’une situation de surendettement et à protéger les fonds de nos prêteurs. Les principales raisons de refus peuvent inclure :<br><br>- Capacité de remboursement jugée insuffisante : Le montant de vos charges (y compris le futur prêt) est trop élevé par rapport à vos revenus.<br>- Inéligibilité : Vous ne remplissez pas l’un des critères de base (résidence, etc.).<br>- Informations incohérentes ou non vérifiables : Les informations fournies dans le formulaire ne correspondent pas aux documents justificatifs.<br>- Situation financière instable : L’analyse de vos relevés de compte révèle des incidents de paiement récurrents ou une gestion financière qui présente un risque trop élevé.<br>- Projet hors du champ de Fin’Bright : La finalité de votre demande ne correspond pas à nos deux produits de prêt (par exemple, un besoin à caractère commercial).
                    </p>
                </div>

                <!-- Q9: Comment est déterminé le coût du prêt ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment est déterminé le coût total de mon prêt ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La transparence sur le coût de votre financement est une priorité absolue. Le coût total de votre prêt se compose de deux éléments principaux :<br><br>1. Les Intérêts : C’est la rémunération versée aux prêteurs qui ont financé votre projet. Le taux d’intérêt nominal est fixé pendant toute la durée du prêt.<br>2. Les frais de service Fin’Bright : Ce sont les frais qui nous rémunèrent pour notre travail d’intermédiation, de gestion et de sécurisation.<br><br>Pour vous offrir une vision claire et comparative de nos deux produits, voici un tableau récapitulatif de leurs conditions financières.<br>
                        <br><br>
                        <div class="overflow-x-auto mt-4 mb-6">
                            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                                <thead class="bg-finbright-purple text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-300">Caractéristique</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-300">Prêt Étudiants d'Excellence</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Montant Empruntable</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">Variable, selon les frais de scolarité et le projet</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Durée de Remboursement</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">2 à 7 ans (24 à 84 mois)</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Taux d'intérêt nominal (Rendement brut prêteur)</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">5 % à 6 % (selon le profil de risque)</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Commission de mobilisation (supportée par le prêteur)</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">5 % du montant mobilisé</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Frais de gestion (inclus dans le TAEG de l'emprunteur)</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">0 %</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Frais de fonctionnement (inclus dans le TAEG de l'emprunteur)</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">2 %</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">Total des frais pour l'emprunteur</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">7 % à 8 %</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">TAEG indicatif (fourchette)</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Communiqué dans l'offre de prêt</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>Le Taux Annuel Effectif Global (TAEG) est l’indicateur le plus important pour comprendre le coût réel de votre crédit. La loi impose à tous les prêteurs de le communiquer, car il permet de comparer différentes offres de prêt sur une base identique de transparence.<br><br>Le TAEG est un pourcentage annuel du montant que vous empruntez. Il intègre tous les frais obligatoires pour l’obtention du crédit. Chez Fin’Bright, le TAEG que nous vous présentons dans votre offre de prêt inclut :<br><br>- Le taux d’intérêt nominal qui rémunère les prêteurs.<br>- L’ensemble de nos frais de service (frais de gestion et frais de fonctionnement), qui sont à votre charge.<br>- Les éventuels coûts d’assurance si une assurance était rendue obligatoire (ce qui n’est généralement pas le cas pour nos produits).<br><br>Ainsi, lorsque vous comparez notre offre avec une autre, c’est le TAEG qu’il faut regarder. Un taux d’intérêt nominal bas peut cacher des frais de dossier ou d’autres coûts élevés. Le TAEG, lui, représente le coût total et final de votre crédit.
                    </p>
                </div>

                <!-- Q10: Le taux peut-il dépasser le taux d’usure ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Le taux de mon prêt peut-il dépasser le taux d’usure ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Absolument pas. Le taux d’usure (ou seuil de l’usure) est le Taux Annuel Effectif Global (TAEG) maximum qu’un établissement est légalement autorisé à pratiquer en France. Il est fixé chaque trimestre par la Banque de France pour différentes catégories de prêts (montant, durée) afin de protéger les consommateurs contre des taux abusifs.<br><br>Fin’Bright, comme tout acteur du crédit en France, a l’interdiction formelle de proposer un prêt dont le TAEG dépasserait le taux d’usure en vigueur pour sa catégorie au moment de l’émission de l’offre. Le non-respect de cette règle constitue un délit de dol, sévèrement sanctionné par la loi. Vous avez donc la garantie légale que le coût total de votre prêt chez Fin’Bright sera toujours inférieur à ce plafond protecteur.
                    </p>
                </div>

                <!-- Q11: Quels sont mes droits ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        L’offre de contrat de prêt : mon engagement et celui de Fin’Bright.
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Une fois votre projet intégralement financé (ou à hauteur au moins de 70 % par notre communauté de prêteurs), vous recevez une offre de contrat de crédit. Ce document est fondamental, il formalise les engagements de chaque partie et constitue la base légale de votre prêt.<br><br>Conformément au Code de la consommation, cette offre contiendra de manière claire et détaillée toutes les informations essentielles à votre décision :<br><br>- L’identité et l’adresse des parties (prêteurs, représentés par Fin’Bright, et vous-même).<br>- Le montant total du crédit et ses conditions de mise à disposition.<br>- La durée du contrat et l’échéancier précis des remboursements.<br>- Le Taux Annuel Effectif Global (TAEG) et le détail de tous les frais.<br>- Le montant total que vous aurez à rembourser.<br>- Les conditions de remboursement anticipé.<br>- Les informations relatives à votre droit de rétractation s’il est opté par Fin’Bright.<br><br>La loi nous oblige à maintenir les conditions de cette offre pendant une durée minimale de 15 jours à compter de sa réception par vos soins. Cela vous laisse un temps de réflexion suffisant pour l’étudier en détail, le comparer si vous le souhaitez, et prendre votre décision en toute sérénité. Vous signez ce document d’une acceptation et ce contrat de prêt.
                    </p>
                </div>

                <!-- Q12: Le droit de rétractation -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Le droit de rétractation : comment changer d’avis dans les 14 jours ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Le Code de la consommation vous protège en vous accordant un droit de rétractation. Cela signifie que même après avoir signé votre contrat de prêt, vous avez le droit de changer d’avis et de l’annuler, sans avoir à donner de raison et sans aucune pénalité.<br><br>Voici les modalités précises pour exercer ce droit :<br><br>- Délai : Vous disposez d’un délai de 14 jours calendaires (tous les jours du calendrier comptent, y compris les week-ends et jours fériés) pour vous rétracter. Ce délai commence à courir le lendemain du jour de la signature de votre offre de contrat.<br>- Procédure : Pour vous rétracter, vous devez utiliser le formulaire détachable de rétractation qui est obligatoirement joint à votre offre de contrat de prêt. Il vous suffit de le compléter, de le signer et de l’envoyer à Fin’Bright par lettre recommandée avec accusé de réception avant l’expiration du délai de 14 jours. C’est la date d’envoi qui fait foi.<br>- Conséquences : L’exercice de votre droit de rétractation annule purement et simplement le contrat de prêt. Si les fonds vous avaient déjà été versés (ce qui est peu probable car nous respectons ce délai), vous devriez les rembourser intégralement, ainsi que les intérêts courus sur la très courte période entre le versement et votre rétractation. Tout service accessoire lié au prêt serait également annulé.<br><br>Ce droit est une protection fondamentale, et nous nous engageons à le faciliter et à le respecter sans condition.
                    </p>
                </div>

                <!-- Q13: Le remboursement anticipé -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Le remboursement anticipé : puis-je solder mon prêt avant l’échéance ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Oui, la loi vous garantit le droit de rembourser votre prêt par anticipation, que ce soit en totalité ou en partie, à tout moment et quelle que soit la raison. Les conditions, notamment en ce qui concerne les éventuelles indemnités, dépendent du type de prêt et du montant remboursé.<br><br>Cette distinction est cruciale car la loi (article L312-34 du Code de la consommation et son décret d’application) prévoit que des indemnités ne peuvent être perçues que si le montant du remboursement anticipé dépasse 10 000 euros sur une période de 12 mois.<br><br>Appliquons cette règle à notre produit :<br><br>Le montant de ce prêt peut être supérieur à 100 000 euros. Si vous souhaitiez effectuer un remboursement anticipé (partiel ou total) dont le montant, sur une période de 12 mois, dépassait 10 000 euros, une indemnité de remboursement anticipé (IRA) pourrait vous être demandée. Cependant, cette indemnité est strictement plafonnée par la loi :<br><br>- Elle ne peut pas dépasser 1 % du montant du capital remboursé par anticipation si la durée restante du contrat est supérieure à 1 an.<br>- Elle ne peut pas dépasser 0,5 % du montant du capital remboursé par anticipation si la durée restante du contrat est d’un an ou moins.<br>- Dans tous les cas, l’indemnité ne peut jamais être supérieure au montant total des intérêts que vous auriez payés sur la période restante si vous n’aviez pas remboursé par anticipation.<br><br>Si vous envisagez un remboursement anticipé, il vous suffit de nous contacter. Nous vous fournirons un décompte précis du capital restant dû et, le cas échéant, du montant de l’indemnité applicable, pour que vous puissiez prendre votre décision en toute connaissance de cause.
                    </p>
                </div>

                <!-- Q14: Gérer mes remboursements -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Gérer mes remboursements : échéancier, prélèvements et suivi en ligne
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Une fois votre prêt mis en place, la gestion de vos remboursements est simple et automatisée.<br><br>- Échéancier de remboursement : Dès la signature de votre contrat, un échéancier détaillé est mis à votre disposition dans votre espace personnel sur notre site. Il précise pour chaque mois la date, le montant de la mensualité, la part de capital remboursé et la part d’intérêts.<br>- Prélèvements automatiques : Vos mensualités sont prélevées automatiquement par prélèvement SEPA sur le compte bancaire que vous nous avez fourni (via votre RIB). Le prélèvement s’effectue à la date définie de votre échéancier.<br>- Suivi en ligne : Votre espace personnel vous permet de suivre en temps réel l’état de votre prêt, capital restant dû, prochain prélèvement, historique des paiements, etc.
                    </p>
                </div>

                <!-- Q15: Zoom sur le Prêt Étudiant -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Zoom sur le Prêt Étudiant : le fonctionnement du différé de remboursement
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Le Prêt Étudiant Fin’Bright est conçu pour s’adapter à la réalité de la vie étudiante. C’est pourquoi il inclut une période de différé de remboursement partiel.<br><br>Concrètement, cela signifie que pendant toute la durée de vos études (telle que prévue lors de la souscription) et durant une période de grâce de 3 à 6 mois après l’obtention de votre diplôme, vous ne remboursez pas encore le capital emprunté. Vos mensualités durant cette période sont beaucoup plus faibles et ne couvrent que les intérêts courus et l’éventuelle cotisation d’assurance.<br><br>Exemple simplifié : Pour un prêt de 20 000 euros sur 7 ans (dont 2 ans d’études + 6 mois de différé), pendant les 30 premiers mois, vos mensualités seront très réduites. C’est seulement à partir du 31ème mois, une fois que vous êtes diplômé(e) et que vous avez eu le temps de trouver un premier emploi, que le remboursement du capital commence et que vos mensualités atteignent leur montant « normal » pour les années restantes.<br><br>Ce mécanisme vous offre une tranquillité d’esprit financière essentielle pour vous concentrer sur la réussite de vos études.
                    </p>
                </div>

                <!-- Q16: Changement de situation -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Que faire en cas de changement de situation (déménagement, nouveau compte bancaire) ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Il est de votre responsabilité de maintenir vos informations personnelles à jour. En cas de changement d’adresse postale, d’adresse e-mail, de numéro de téléphone ou de coordonnées bancaires (RIB), vous devez nous en informer au plus vite.<br><br>La plupart de ces informations peuvent être mises à jour directement depuis votre espace personnel sécurisé. Pour un changement de compte bancaire, une procédure de vérification spécifique sera nécessaire pour garantir la sécurité des transactions. Une mise à jour rapide de vos informations est cruciale pour assurer la continuité des communications et des prélèvements, et ainsi éviter tout incident de paiement involontaire.
                    </p>
                </div>

                <!-- Q17: Difficultés de paiement -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        J’anticipe une difficulté : quelles sont les solutions ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La vie comporte des imprévus. Si vous anticipez une difficulté à honorer une prochaine échéance (perte d’emploi, dépenses imprévues majeures, etc.), le plus important est d’agir sans attendre. Nous vous encourageons à contacter notre service client au plus vite.<br><br>Notre approche est avant tout humaine et constructive. En nous prévenant en amont, nous pourrons étudier ensemble les solutions possibles pour vous aider à passer ce cap difficile. Selon votre situation et les termes de votre contrat, nous pourrons envisager un plan d’ajustement temporaire, comme un report d’échéance ou un rééchelonnement momentané. L’objectif est de trouver une solution amiable pour éviter que la situation ne se dégrade et n’entraîne des pénalités et des procédures plus lourdes.
                    </p>
                </div>

                <!-- Q18: Retard de paiement -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        J’ai un retard de paiement : quelles sont les étapes ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Si une échéance n’est pas honorée à la date prévue, un processus de recouvrement amiable se met en place, de manière progressive et encadrée.<br><br>- Étape 1 : La Relance Amiable. Dès le constat de l’impayé, nous vous contacterons par e-mail ou SMS. Il peut s’agir d’un simple oubli ou d’un problème technique avec votre banque. Cette première relance a pour but de vous informer de la situation et de vous inviter à régulariser au plus vite.<br>- Étape 2 : L’Application des Pénalités de Retard. Si la situation n’est pas régularisée rapidement, des indemnités de retard, prévues contractuellement, seront appliquées. Conformément à votre contrat, ces frais s’élèvent à 5 % du montant de l’échéance impayée. Ces pénalités visent à compenser le préjudice subi par les prêteurs et les frais de gestion supplémentaires engendrés par l’incident.<br>- Étape 3 : La Mise en Demeure. En cas d’échec des relances amiables et si l’impayé persiste, nous vous adresserons une mise en demeure de payer par lettre recommandée avec accusé de réception. Il est crucial de comprendre la portée de ce document. Il s’agit du dernier avertissement formel avant l’engagement de poursuites judiciaires.
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
                <!-- Q1: Qu'est-ce que Fin'Bright ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Qu'est-ce que Fin'Bright et quel est son rôle ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Fin’Bright est une plateforme de financement participatif française qui met en relation directe des particuliers souhaitant prêter de l’argent (les prêteurs) avec des particuliers ayant un projet à financer (les emprunteurs).<br><br>Notre mission est de financer l’avenir. À travers notre « Prêt Étudiants d’Excellence », nous permettons à des étudiants brillants, admis dans les plus prestigieuses grandes écoles et universités françaises, de financer leurs études sans avoir besoin de caution ou de garant.<br><br>Il est fondamental de comprendre que Fin’Bright agit en tant qu’intermédiaire. Nous ne sommes ni une banque, ni un établissement de crédit, nous ne prêtons pas nos fonds propres. Notre rôle est de faciliter la rencontre entre prêteurs et emprunteurs sur une site internet sécurisé, en vertu du statut d’Intermédiaire en Financement Participatif (IFP), régi par les articles L. 548-1 et suivants du Code Monétaire et Financier (CMF).<br><br>Ce statut, spécifique au financement de projets non commerciaux, nous distingue des plateformes finançant des entreprises (qui relèvent du statut européen PSPP). En tant qu’IFP, Fin’Bright est immatriculé au Registre unique de l’ORIAS (Organisme pour le Registre des Intermédiaires en Assurance, banque et finance), une obligation légale qui garantit notre conformité aux exigences d’honorabilité, de compétence professionnelle et de souscription à une assurance de responsabilité civile professionnelle. Notre immatriculation est renouvelée annuellement et notre activité est placée sous la supervision de l’ACPR (Autorité de Contrôle Prudentiel et de Résolution), l’organe de surveillance de la Banque de France. Cette structure réglementaire solide est le gage de notre sérieux et de la sécurité de notre plateforme.
                    </p>
                </div>

                <!-- Q2: Comment fonctionne le P2P Lending ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment fonctionne le financement participatif de particulier à particulier (P2P Lending) ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Le prêt de particulier à particulier, ou P2P lending, est un modèle de financement décentralisé. Plutôt que de passer par une banque traditionnelle, les prêteurs (personnes physiques, associations, fondations) financent collectivement les prêts sollicités par les emprunteurs sur la plateforme. Le processus est simple et transparent :<br><br>1. Sélection : Vous parcourez les projets de prêt et sélectionnez ceux qui correspondent à vos critères d’investissement.<br>2. Collecte : Les fonds que vous allouez sont transférés et conservés sur un compte de paiement ségrégué, géré par notre partenaire prestataire de services de paiement (PSP), un établissement agréé par l’ACPR.<br>3. Déblocage : Une fois que le montant total du prêt est atteint, les fonds sont versés à l’emprunteur.<br>4. Remboursement : L’emprunteur effectue des remboursements mensuels, qui incluent une part de capital et les intérêts.<br>5. Distribution : Ces remboursements sont automatiquement crédités sur votre portefeuille Fin’Bright, que vous pouvez ensuite réinvestir ou virer vers votre compte bancaire personnel.
                    </p>
                </div>

                <!-- Q3: Quel type de prêt puis-je financer ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quel type de prêt puis-je financer sur Fin’Bright ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Fin’Bright propose le Prêt Étudiant d’Excellence qui est un produit phare au cœur de notre mission sociale : briser les barrières financières à l’éducation d’excellence.<br><br>- Objectif : Financer les frais de scolarité, le logement, le matériel informatique ou les dépenses de la vie courante pour des étudiants admis dans les meilleures institutions françaises. La caractéristique clé est l’absence de garant, ce qui ouvre l’accès au crédit à des étudiants talentueux qui ne disposent pas d’un soutien familial suffisant, une difficulté majeure du système de prêt étudiant traditionnel.<br>- Conditions : La durée de remboursement s’étend de 2 à 7 ans, ce qui respecte le plafond légal pour les prêts onéreux sous statut IFP. Un différé partiel de remboursement est appliqué pendant toute la durée des études, plus une période de 3 à 6 mois après l’obtention du diplôme, pour permettre à l’étudiant de s’insérer professionnellement avant de commencer à rembourser le capital.<br>- Rendement pour le prêteur : Le rendement annuel brut varie de 5 % à 6 %, en fonction du niveau de risque évalué pour chaque profil d’étudiant.
                    </p>
                </div>

                <!-- Q4: Qui sont les emprunteurs ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Qui sont les emprunteurs que je finance ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La qualité et la rigueur de notre processus de sélection des emprunteurs constituent notre principale stratégie de maîtrise du risque. Tous les emprunteurs sont des personnes physiques agissant à des fins strictement non commerciales, conformément aux exigences de notre statut CIFP.<br><br>Il s’agit d’emprunteurs étudiants. La sélection est particulièrement stricte. Nous vérifions systématiquement l’admission effective dans une de nos écoles et universités partenaires. Nous vérifions également l’existence d’un contrat et d’un fort niveau d’insertion professionnelle. Nous analysons le parcours de l’étudiant, la filière choisie et ses perspectives de carrière pour évaluer la capacité de remboursement future.
                    </p>
                </div>

                <!-- Q5: Comment m’inscrire pour devenir prêteur ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment puis-je m’inscrire pour devenir prêteur ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        L’inscription est ouverte aux personnes physiques majeures résidant en France, ainsi qu’aux personnes morales à but non lucratif (associations, fondations). Le processus est entièrement dématérialisé et se déroule en quelques minutes.<br><br>Conformément à la réglementation française et européenne en matière de Lutte Contre le Blanchiment des capitaux et le Financement du Terrorisme (LCB-FT), chaque prêteur doit compléter une procédure de vérification d’identité, connue sous le nom de Know Your Customer (KYC). Cela implique de nous fournir une copie d’une pièce d’identité en cours de validité (carte nationale d’identité, passeport). Cette étape est une obligation légale pour tout intermédiaire financier et constitue une mesure de sécurité indispensable pour protéger l’intégrité de notre plateforme.
                    </p>
                </div>

                <!-- Q6: Comment approvisionner mon compte ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment approvisionner mon compte Fin’Bright en toute sécurité ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La sécurité de vos fonds est notre priorité absolue. Fin’Bright ne détient jamais directement votre argent ou les flux financiers que génère notre partenaire, un Prestataire de Services de Paiement (PSP) agréé et supervisé par l’ACPR.<br><br>Lorsque vous vous inscrivez, un portefeuille électronique individuel (ou compte de paiement) est créé à votre nom chez notre partenaire PSP. Les fonds que vous déposez par virement bancaire ou carte de crédit sont crédités sur ce compte, qui est ségrégué ; il est totalement distinct des comptes opérationnels de Fin’Bright. Cette architecture a une conséquence majeure pour votre sécurité : dans le cas improbable où Fin’Bright cesserait son activité, vos fonds resteraient protégés et sécurisés par notre partenaire PSP.
                    </p>
                </div>

                <!-- Q7: Comment sélectionner et financer des projets ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment sélectionner et financer des projets ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Une fois votre compte approvisionné, vous pouvez commencer à investir via notre place de marché. Pour chaque demande de prêt, vous avez accès à une fiche projet détaillée qui présente les informations clés : type de prêt, montant, durée, taux d’intérêt brut, et une description du projet de financement. Cette transparence est une exigence réglementaire.<br><br>Vous disposez de deux méthodes pour investir :<br><br>- Investissement Manuel : Vous parcourez les projets et choisissez manuellement ceux que vous souhaitez financer.<br>- Auto-investissement : Pour faciliter la diversification, vous pouvez utiliser notre outil d’autoinvestissement. Vous pouvez sélectionner un projet et décider automatiquement de la fréquence pour les prêts étudiants, durées, montant maximum par prêt et le système allouera automatiquement vos fonds disponibles aux nouveaux projets correspondants.<br><br>Conformément à la réglementation, un même prêteur ne peut pas investir plus de 2000 euros par projet de prêt onéreux. Il n’y a cependant aucune limite au nombre de projets différents que vous pouvez financer. Cette règle est conçue pour vous inciter à diversifier vos investissements, ce qui est une stratégie fondamentale de gestion du risque.
                    </p>
                </div>

                <!-- Q8: Que se passe-t-il après validation ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Que se passe-t-il une fois mon investissement validé ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Dès qu’un projet est financé à au moins 70 % à l’issue de sa période de campagne ou à 100 % à l’issue de sa période de campagne, votre investissement est confirmé. Un contrat de prêt en bonne et due forme est alors généré et signé électroniquement entre vous (et les autres prêteurs du projet). Ce document juridique, qui formalise les droits et obligations de chaque partie, est accessible à tout moment dans votre espace personnel sécurisé.<br><br>Votre tableau de bord personnel vous offre une vue d’ensemble de votre portefeuille, vous permettant de suivre le statut de chaque prêt, de consulter l’échéancier des remboursements à venir et d’analyser la performance globale de vos investissements.
                    </p>
                </div>

                <!-- Q9: Quand vais-je percevoir mes remboursements ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment et quand vais-je percevoir mes remboursements ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Les remboursements sont effectués mensuellement. Chaque mois, notre partenaire PSP prélève l’échéancier des remboursements et les crédite sur votre portefeuille Fin’Bright, que vous pouvez ensuite réinvestir ou virer vers votre compte bancaire personnel.
                    </p>
                </div>

                <!-- Q10: Quels sont les rendements et frais ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels sont les rendements et frais ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La transparence financière est un pilier de notre engagement. Cette section détaille sans ambiguïté les rendements, les frais et la manière de calculer votre performance réelle.<br><br>Les rendements affichés sur la plateforme sont des rendements annuels bruts, c’est-à-dire avant déduction des frais de service et de la fiscalité.<br><br>Pour les Prêts Étudiants d’Excellence : il s’agit de 5 % à 6 % par an.<br><br>Pour les Prêts Étudiants d’Excellence : Des frais d’entrée de 5 % sont ponctionnés en une seule fois sur le montant que vous souhaitez investir, avant le financement des projets qui vous intéressent.<br><br>Il n’y a aucun autre frais caché : ni frais d’inscription, ni frais de tenue de compte, ni frais sur les retraits.
                    </p>
                </div>

                <!-- Q11: Quels sont les risques ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Quels sont les risques inhérents à l’investissement sur Fin’Bright ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Investir sur Fin’Bright, comme toute forme de prêt, comporte des risques qu’il est essentiel de comprendre :<br><br>- Risque de Défaut : C’est le risque principal. L’emprunteur peut se trouver dans l’incapacité de rembourser tout ou partie de son prêt en raison de difficultés financières. Ce risque peut entraîner une perte partielle ou totale du capital que vous avez investi.<br>- Risque d’Illiquidité : Les sommes que vous prêtez sont immobilisées pour toute la durée du prêt. Vous percevez vos échéances mensuellement (capital + intérêt).<br><br><div class="bg-red-50 border-l-4 border-red-400 p-4 mt-4"><p class="text-red-700"><strong>Avertissement :</strong> Prêter de l’argent à des particuliers présente un risque de perte en capital et nécessite une immobilisation de votre épargne. Les performances passées ne préjugent pas des performances futures.</p></div>
                    </p>
                </div>

                <!-- Q12: Comment Fin'Bright limite les risques ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment Fin’Bright sélectionne-t-il les emprunteurs pour limiter ces risques ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Bien que le risque zéro n’existe pas, notre processus de sélection rigoureux est notre principal levier pour le minimiser. Nous avons développé un modèle de notation propriétaire qui analyse des dizaines de points de données pour évaluer la solvabilité de chaque demandeur.<br><br>Pour nos Prêts Étudiants d’Excellence, nous nous concentrons sur des critères prédictifs de succès : excellence du dossier académique, prestige de l’établissement, potentiel d’employabilité et de rémunération de la filière.
                    </p>
                </div>

                <!-- Q13: Que se passe-t-il en cas de retard ou défaut ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Que se passe-t-il concrètement en cas de retard de paiement ou de défaut ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        En cas d’incident de paiement, nous actionnons une procédure de recouvrement structurée et progressive, gérée en interne puis par des professionnels :<br>
                        <br>1. Phase Amiable : Dès le premier jour de retard, des relances automatiques (email, SMS) sont envoyées. Elles sont rapidement suivies d’appels téléphoniques.
                      <br>  <br>2. Mise en Demeure (après 30 jours) : Si la phase amiable échoue, une lettre de mise en demeure est envoyée par courrier recommandé. Cet acte juridique formel somme l'emprunteur de régulariser sa situation et constitue un prérequis à toute action judiciaire. 

<br><br>3.Transfert à un Partenaire de Recouvrement (après 60-90 jours) : Si le paiement n'est toujours pas obtenu, le dossier est transmis à une société de recouvrement spécialisée qui prend le relais des actions. 

<br><br>4.Procédure Judiciaire : En dernier recours, et si la situation le justifie, une action en justice peut être engagée (par exemple, une procédure d'injonction de payer) pour obtenir un titre exécutoire permettant de procéder à des saisies. 
                    </p>
                </div>

                   <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
À quoi sert la "cagnotte de solidarité" ? 
                    </h3>
                    <p class="text-gray-700 leading-relaxed">

                    
Pour mutualiser une partie du risque, Fin'Bright alimente une "cagnotte de solidarité" en y versant 1 % à 2 % de ses propres commissions pris, exclusivement sur le mini prêt court. Ce fonds n'est pas une garantie en capital. Son objectif est de pouvoir indemniser partiellement les prêteurs en cas de perte définitive sur un prêt (c'est-à-dire après l'échec de toutes les procédures de recouvrement). 
L'indemnisation est versée sous conditions et dans la limite des fonds disponibles dans la cagnotte au moment où la perte est constatée. Elle ne peut donc être garantie.               
</p>
                </div>


                   <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
Comment puis-je suivre la performance et le taux de défaut de la plateforme ? 
                    </h3>
                    <p class="text-gray-700 leading-relaxed">

                    
Votre tableau de bord personnel vous donne accès en temps réel aux indicateurs de performance de votre portefeuille. De plus, en tant qu'IFP, Fin'Bright a l'obligation légale de calculer et de publier annuellement ses indicateurs de performance, notamment les taux de défaut, conformément à la position 2017-P-02 de l'ACPR. Ces statistiques seront disponibles publiquement sur notre site.                 </p>
                </div>


                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
Fiscalité des Gains pour les Prêteurs Particuliers 
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
Cette section détaille le régime fiscal applicable aux intérêts que vous percevez en tant que prêteur particulier résident fiscal français. 
          </p>
                </div>
                
                <!-- Q14: Comment mes gains sont-ils imposés ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Comment mes gains (intérêts) sont-ils imposés par défaut ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Par défaut, les intérêts que vous percevez sont soumis au Prélèvement Forfaitaire Unique (PFU), également appelé « flat tax », en vigueur depuis 2018. Ce prélèvement est opéré à la source par notre partenaire de paiement. Vous recevrez donc sur votre portefeuille des intérêts nets de cette imposition. Le taux global du PFU est de 30 %.<br><br>Ce taux unique de 30 % se décompose en deux parties :<br><br>- 17,2 % au titre des prélèvements sociaux (composés de la CSG, de la CRDS et du prélèvement de solidarité).<br>- 12,8 % au titre de l’impôt sur le revenu.<br><br>
                    </p>
                </div>

                  <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                     Comment dois-je déclarer mes revenus Fin'Bright aux impôts ? 
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
Pour simplifier votre déclaration, Fin’Bright vous fournira chaque année un Imprimé Fiscal Unique (IFU), à votre demande. Ce document récapitule tous les montants à connaître : total des intérêts bruts perçus, montant de l’impôt déjà prélevé à la source (le PFU), etc.<br><br>Il vous suffira de vérifier que les montants pré-remplis sur votre déclaration de revenus correspondent à ceux de l’IFU. Si vous avez opté pour le barème progressif, vous devrez reporter les montants de votre IFU sur le barème progressif de la CSG (2T pour les intérêts).
                    </p>
                </div>

                <!-- Q15: Puis-je déduire les pertes ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Est-il possible de déduire les pertes en cas de défaut définitif d’un prêt ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Oui, la réglementation fiscale prévoit un mécanisme spécifique pour le prêt participatif. Si un prêt s’avère définitivement irrécouvrable, vous pouvez imputer les pertes en capital subies sur les intérêts générés par vos autres prêts participatifs au cours de la même année fiscale. Si vos pertes dépassent vos gains, vous pouvez déduire l’excédent pour votre cumul des pertes des cinq années suivantes.
                    </p>
                </div>

                <!-- Q16: Qui gère les flux financiers ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Qui gère les flux financiers et où est mon argent ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Comme expliqué précédemment (voir section 2.2), tous les flux financiers sont gérés par notre partenaire Prestataire de Services de Paiement (PSP), une entité agréée et régulée. Votre argent est déposé sur un compte de paiement ségrégué à votre nom, ce qui le protège et le maintient séparé des actifs de Fin’Bright.
                    </p>
                </div>

                <!-- Q17: Que se passe-t-il si Fin'Bright cesse son activité ? -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        <i class="fas fa-question-circle mr-2"></i>
                        Que se passerait-il si Fin’Bright devait cesser son activité ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        La pérennité de vos investissements est une préoccupation légitime, surtout au vu des défaillances passées d’autres plateformes. Nous avons mis en place un plan de continuité d’activité, aussi appelé « gestion extinctive », pour parer à cette éventualité.<br><br>Des dispositions contractuelles avec notre partenaire PSP garantissent que, même en cas de cessation d’activité de Fin’Bright, la gestion de l’ensemble des prêts en cours se poursuivra jusqu’à leur terme. Les remboursements continueront d’être prélevés auprès des emprunteurs et distribués, etc. Ce dispositif assure la finalisation de toutes les opérations en cours et protège vos investissements sur le long terme.
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
                        Fin'Bright est-elle régulée ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Oui, Fin'Bright opère sous le statut d’Intermédiaire en Financement Participatif (IFP), immatriculée à l’ORIAS et supervisée par l’ACPR. Nous respectons les normes KYC, RGPD, et de gestion des risques.
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
                        Comment puis-je obtenir de l’aide ?
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Consultez notre FAQ, ou contactez-nous via le formulaire en ligne, par e-mail à contact@finbright.fr, ou par téléphone. Pour les réclamations, écrivez à reclamations@finbright.fr.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Vous avez une question ?
        </h2>
        <p class="text-xl text-white mb-8 opacity-90 max-w-2xl mx-auto">
            Contactez-nous ou inscrivez-vous dès aujourd’hui !
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