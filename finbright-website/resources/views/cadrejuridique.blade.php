@extends('layouts.app')

@section('title', 'Cadre Juridique - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class="text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Cadre Juridique</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Notice d'information à destination des intermédiaires en financement participatif
        </p>
        <p class="text-lg opacity-80">Version modifiée ACPR du 2 novembre 2023</p>
    </div>
</section>

<!-- Cadre Juridique Content -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <p class="text-gray-700 mb-6">
                Vous venez de déposer une demande d'immatriculation en tant qu'intermédiaire en financement participatif (IFP). Vous trouverez ci-après un rappel de la réglementation applicable à l'exercice de votre activité.
            </p>
        </div>
        
        <!-- Partie 1 -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-balance-scale text-finbright-cyan mr-4"></i>
                I. Les conditions d'exercice de l'activité d'intermédiaire en financement participatif
            </h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            En tant qu'intermédiaire en financement participatif, votre activité consistera à mettre en relation, au moyen d'un site internet, les porteurs d'un projet déterminé et les personnes finançant ce projet sous certaines conditions. Cette activité, supervisée par l'Autorité de contrôle prudentiel et de résolution (ACPR), peut consister en un financement sous forme de dons (avec ou sans contrepartie), de prêts à titre gratuit ou de certains types de crédits à titre onéreux (sous réserve de respecter certaines conditions tenant à la nature non professionnelle ou non commerciale des activités financées).
                        </p>
                        
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 my-6">
                            <p class="font-bold mb-2">ATTENTION :</p>
                            <p class="mb-3">
                                Avec l'entrée en vigueur du Règlement européen 2020/1503 du 7 octobre 2020 sur le Financement Participatif, si vous souhaitez financer des projets d'entrepreneurs ou des activités commerciales au moyen de prêts onéreux ou de titres financiers, il est nécessaire de déposer une demande d'agrément en tant que prestataire européen de services de financement participatif (PSFP) auprès de l'Autorité des Marchés Financiers (AMF). Le statut de PSFP est un statut européen, distinct du régime national des IFP mais qui peut se cumuler avec celui-ci. Le cadre européen du financement participatif prévoit que l'autorité compétente pour la France est l'AMF, en charge de l'agrément et de la supervision des PSFP. L'ACPR participe à l'agrément lorsque le PSFP fournit le service de financement participatif sous forme de prêts onéreux.
                            </p>
                            <p>
                                La demande d'agrément est à déposer auprès des services de l'AMF plusieurs mois avant la date prévue pour le démarrage de l'activité. L'activité d'une plateforme internet PSFP consiste à proposer une offre de financement participatif sous la forme de crédits onéreux et/ou d'offres de titres de capital et titres de créances pour le financement d'activités commerciales, entrepreneuriales ou professionnelles et générant un avantage économique pour leurs bénéficiaires finaux.
                            </p>
                        </div>
                        
                        <p class="text-sm text-gray-500">
                            Pour toute information sur les modalités d'obtention de l'agrément PSFP, vous pouvez contacter les services de l'AMF à l'adresse : psfp@amf-france.org.
                        </p>
                        <p>
                            L'activité d'IFP peut être cumulée avec celle de PSFP et avec un nombre limité d'activités relevant du domaine financier. Un IFP peut exercer d'autres activités, dans le secteur financier, sous certaines conditions.
                        </p>
                    </div>
                </div>
                
                <!-- 1.1 Immatriculation -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1/ Immatriculation en qualité d'Intermédiaire en Financement Participatif (IFP)
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            L'activité d'intermédiaire en financement participatif nécessite une immatriculation auprès de l'ORIAS sous peine de sanctions pénales.
                        </p>
                        <p>
                            Cette immatriculation en tant qu'IFP vous permet de mettre en place une plate-forme qui propose de financer des projets par :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>des prêts à titre gratuit</li>
                            <li>des prêts onéreux (dans certains cas limités, notamment le financement de projets non commerciaux)</li>
                            <li>et des dons, sous forme de collecte fermée ou ouverte au public.</li>
                        </ul>
                        <p>
                            À ce titre, vous devez justifier, auprès de l'ORIAS des conditions suivantes :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Condition d'honorabilité</li>
                            <li>Condition de capacité professionnelle</li>
                            <li>Condition d'assurance de responsabilité civile professionnelle.</li>
                        </ul>
                        <p>
                            L'immatriculation à l'ORIAS doit être renouvelée chaque année au 31 janvier.
                        </p>
                        <p>
                            Par ailleurs, il vous revient d'informer l'ORIAS de toute modification pouvant avoir des conséquences sur votre immatriculation dans un délai d'un mois.
                        </p>
                    </div>
                </div>
                
                <!-- 1.2 Les parties -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2/ Les parties à l'intermédiation en financement participatif sous le statut IFP
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2"></th>
                                        <th class="border border-gray-300 px-4 py-2">Porteur de projet d'activités non commerciales</th>
                                        <th class="border border-gray-300 px-4 py-2">Prêteur/Donateur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 font-medium">Crédits à titre onéreux</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            PM et PP agissant à des fins professionnelles (activités non régies par le Règlement UE sur le financement participatif)<br>
                                            PP souhaitant financer une formation initiale ou continue
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            PM et PP agissant à des fins non professionnelles ou commerciales
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 font-medium">Prêts à titre gratuit</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            PM et PP agissant à des fins professionnelles (activités non régies par le Règlement UE sur le financement participatif)<br>
                                            PP souhaitant financer une formation initiale ou continue<br>
                                            Organismes mentionnés à l'article L. 511-6, 5
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            PM et PP n'agissant pas dans un cadre professionnel ou commercial
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 font-medium">Dons</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            PM et PP agissant à des fins professionnelles (activités non régies par le Règlement UE sur le financement participatif)<br>
                                            PP souhaitant financer une formation initiale ou continue<br>
                                            PP n'agissant pas pour des besoins professionnels<br>
                                            Organismes mentionnés à l'article L. 511-6, 5
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            PM et PP
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-sm text-gray-500">
                            (*) C'est-à-dire activités autres que les activités commerciales, entrepreneuriales ou professionnelles et générant un avantage économique pour leurs bénéficiaires finaux financées par des crédits onéreux ou d'offres de titres de capital ou de créances.<br>
                            (**) Sous réserve que les prêteurs n'agissent pas dans un cadre professionnel ou commercial.<br>
                            (***) Associations sans but lucratif et fondations reconnues d'utilité publique accordant sur ressources propres et sur ressources empruntées des prêts pour la création, le développement et la reprise d'entreprises dont l'effectif salarié ne dépasse pas un seuil fixé par décret ou pour la réalisation de projets d'insertion par des personnes physiques.
                        </p>
                    </div>
                </div>
                
                <!-- 1.3 Caractéristiques -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        3/ Les caractéristiques de l'opération
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            La définition du financement participatif exige un projet déterminé, une mise en relation des parties ainsi qu'un site internet :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>
                                <span class="font-medium">Un projet déterminé :</span> le projet doit consister en « une opération prédéfinie ou en un ensemble d'opérations prédéfinies, un évènement ou le soutien d'une cause pour lequel un porteur de projet cherche un financement total ou partiel ». Les opérations permettant la réalisation du projet financé doivent, en conséquence, être prédéfinies et strictement énumérées. Les prêteurs doivent être suffisamment informés à propos du projet auquel ils souhaitent contribuer, selon les règles de bonne conduite édictées à l'article L. 548-6 du CMF.
                            </li>
                            <li>
                                <span class="font-medium">Une mise en relation :</span> la mise en relation doit être réalisée au moyen d'un site internet. Elle doit créer une relation entre, d'un côté, le porteur de projet et, de l'autre, les personnes qui financent le projet.
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- 1.4 Réception de fonds -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        4/ Réception de fonds de la part des prêteurs ou donateurs
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Attention, vous ne pouvez encaisser des fonds de la part de tiers (prêteurs ou donateurs) que si vous êtes agréé comme établissement de paiement (EP), comme établissement de monnaie électronique (EME) ou enregistré comme agent d'un établissement de paiement existant. En effet, toute personne, et notamment un IFP qui s'interpose dans les flux de paiement entre des payeurs et des bénéficiaires d'un paiement est susceptible d'exercer une activité d'encaissement de fonds pour compte de tiers s'analysant comme la fourniture de services de paiement.
                        </p>
                        <p>
                            Selon l'article L. 521-2 du CMF, la fourniture de services de paiement à titre de profession habituelle est réservée aux prestataires de services de paiement (PSP) habilités à intervenir en France. Cette habilitation suppose a minima la délivrance par l'ACPR d'un agrément en qualité d'établissement de paiement (EP) en application de l'article L. 522-6 ou la réalisation de formalités du passeport européen prévues aux articles L. 522-12 et suivants du même code.
                        </p>
                        <p>
                            Si un IFP ne souhaite pas se faire agréer en qualité d'établissement de paiement, il lui est possible de prendre l'attache d'un PSP afin d'être mandaté comme agent de services de paiement, statut régi par les articles L. 523-1 et suivants du CMF. Dans cette hypothèse, la fourniture des services de paiement serait effectuée sous la responsabilité du PSP et les fonds collectés seraient encaissés dans des comptes cantonnés ouverts auprès de l'établissement de paiement. C'est l'établissement de paiement partenaire de l'IFP qui devra alors déposer, auprès des services de l'ACPR, une demande d'enregistrement de son partenaire IFP, comme Agent de services de paiement.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Partie 2 -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-gavel text-finbright-cyan mr-4"></i>
                II. La réglementation applicable en matière de pratiques commerciales
            </h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Les IFP doivent respecter, sous le contrôle de l'Autorité de contrôle prudentiel et de résolution (ACPR), des règles de bonne conduite et d'organisation définies dans le code monétaire et financier. Ils doivent notamment mettre en place un dispositif traitant des conflits d'intérêts pouvant se poser dans le cadre de leur activité.
                        </p>
                    </div>
                </div>
                
                <!-- 2.1 Informations -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1/ Informations à fournir au public
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            En premier lieu, vous devez fournir au public, sur votre site internet, d'une manière facilement accessible depuis la première page, les informations suivantes relatives à votre société et à son activité :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Nom, dénomination sociale, adresse du siège social, adresse de courrier électronique, immatriculation à l'ORIAS;</li>
                            <li>Mention de votre agrément en tant qu'établissement de paiement ou de votre enregistrement en qualité d'agent d'établissement de paiement si vous recevez des fonds de la part de prêteurs/donateurs;</li>
                            <li>Modalités de calcul et montant de votre rémunération et des frais susceptibles d'être prélevés (en euros et en % du financement).</li>
                        </ul>
                        <p>
                            Pour les sites proposant des prêts, des informations complémentaires doivent être publiées :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Un historique des taux de défaillance trimestriels des projets mis en ligne depuis le démarrage de votre activité ou sur les 36 derniers mois en distinguant parmi ceux-ci les projets de plus de 12 mois;</li>
                            <li>Une mise en garde des prêteurs sur le fonctionnement spécifique du financement participatif (risque de non remboursement, absence de garantie et indisponibilité des sommes prêtées);</li>
                            <li>Une mise en garde des porteurs de projet sur les risques d'un endettement excessif;</li>
                            <li>Information sur le dispositif prévu en matière de gestion extinctive (un IFP doit disposer en permanence d'un contrat conclu avec un prestataire habilité à mener les opérations en cours jusqu'à leur terme en cas de cessation d'activité de la plateforme), comme un prestataire de services de paiement ou un agent de prestataire de service de paiement;</li>
                            <li>Une présentation des rôles et responsabilités respectifs de l'IFP, du prêteur, du porteur de projet et des éventuels autres partenaires en cas de défaillance du porteur de projet.</li>
                        </ul>
                    </div>
                </div>
                
                <!-- 2.2 Rapport annuel -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2/ Rapport annuel d'activité
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Chaque année, en tant qu'IFP, vous devez publier avant le 30 juin un rapport annuel d'activité portant sur l'année civile précédente. Ce rapport doit présenter le dispositif de gouvernance de la société et donner les informations suivantes :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Nombre et montant total des projets reçus dans l'année;</li>
                            <li>Nombre et montant total des projets retenus dans l'année;</li>
                            <li>Nombre de projets effectivement financés;</li>
                            <li>Montant total des financements sous forme de crédits, prêts à titre gratuit et dons;</li>
                            <li>Nombre total des prêteurs/donateurs;</li>
                            <li>Nombre moyen de prêteurs/donateurs par projet;</li>
                            <li>Montant moyen des crédits, prêts à titre gratuit et dons par prêteur;</li>
                            <li>Taux de défaillance dont les modalités de calcul figurent dans la position de l'ACPR précitée (pour les sites proposant des prêts).</li>
                        </ul>
                    </div>
                </div>
                
                <!-- 2.3 Informations sur les projets -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        3/ Informations sur les projets
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Pour les projets présentés sur votre site internet, vous devez :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>être en mesure :
                                <ul class="list-circle pl-6 space-y-1 mt-2">
                                    <li>d'identifier précisément le prêteur/donateur et le porteur de projet (s'il s'agit d'une personne physique : nom, prénom, date et lieu de naissance, adresse postale et adresse email et, s'il s'agit d'une personne morale : nom ou dénomination sociale, adresse du siège social et numéro SIREN);</li>
                                    <li>et de certifier qu'ils ont pris connaissance et accepté expressément les conditions générales d'utilisation (CGU) du site internet et les conditions générales de vente.</li>
                                </ul>
                            </li>
                            <li>mettre en ligne, à disposition des internautes, les informations générales suivantes :
                                <ul class="list-circle pl-6 space-y-1 mt-2">
                                    <li>les conditions d'éligibilité et les critères d'analyse et de sélection des projets et des porteurs de projets;</li>
                                    <li>une notice de présentation de chaque projet (caractéristiques du projet et du porteur de projet);</li>
                                    <li>les conditions de déblocage et de mise à disposition des fonds;</li>
                                    <li>une procédure de résiliation d'inscription sur le site de tout prêteur ou porteur de projet qui n'est pas engagé dans une opération de financement participatif;</li>
                                    <li>un contrat-type entre le prêteur et le porteur de projet emprunteur ou, lorsqu'il s'agit de collectes ouvertes, entre le donateur et le porteur de projet donataire et permettant de formaliser les conditions du financement.</li>
                                </ul>
                            </li>
                        </ul>
                        <p>
                            Pour les sites présentant des collectes de dons ouvertes au public ou des prêts, le projet doit être décrit en termes d'objet, de montant cible de financement, de calendrier, de description chiffrée de l'utilisation prévue des fonds levés et de résultat attendu.
                        </p>
                        <p>
                            Pour les sites proposant des prêts, vous devez, en outre :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>mentionner les caractéristiques principales du prêt (taux d'intérêt, montant total, durée, modalités de remboursement, garanties, sûretés, faculté de rétractation du prêteur, existence de subventions…), présenter le plan de financement des projets et mettre en mesure les prêteurs d'évaluer la viabilité économique du projet, notamment le plan d'affaires et le plan de trésorerie;</li>
                            <li>mettre à disposition les outils permettant aux prêteurs d'évaluer leur capacité de financement (en fonction du montant déclaré de leurs ressources et de leurs charges annuelles ainsi que de leur épargne disponible).</li>
                        </ul>
                    </div>
                </div>
                
                <!-- 2.4 Gestion extinctive -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        4/ Gestion extinctive
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>
                            Vous avez l'obligation de prévoir une procédure de gestion extinctive de vos activités de financement participatif, dans l'hypothèse où vous ne seriez plus en mesure de continuer à les exercer. Cette procédure, pour l'application de laquelle vous devez conclure un contrat avec un prestataire de services de paiement ou un agent de services de paiement, définit et organise les modalités de suivi des opérations de financement et la gestion des opérations jusqu'à leur terme.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Partie 3 -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-shield-alt text-finbright-cyan mr-4"></i>
                III. La réglementation applicable aux IFP en matière de LCB-FT et de gel des avoirs
            </h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Les IFP sont assujettis aux obligations de lutte contre le blanchiment des capitaux et le financement du terrorisme (LCB-FT), sauf pour les projets portés par une même personne dont SEX dont le financement total correspond à des montants inférieurs au seuil de 150 euros. Ainsi, vous devez mettre en œuvre, selon une approche par les risques, des mesures de vigilance à l'égard de votre clientèle et satisfaire à vos obligations déclaratives à l'égard de TRACFIN. À cette fin, vous devez disposer d'une organisation, des procédures et d'un dispositif de contrôle interne adapté en matière de LCB-FT. Vous devez, par ailleurs, mettre en œuvre les mesures de gel des avoirs et disposer, pour ce faire, d'un dispositif de filtrage et de procédures afin de détecter sans délai toute personne faisant l'objet d'une mesure de gel avoirs et d'en informer immédiatement la Direction générale du Trésor.
                        </p>
                    </div>
                </div>
                
                <!-- 3.1 Mesures de vigilance -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        1/ Mesures de vigilance et obligations déclaratives
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Vous devez définir et mettre en place un dispositif d'évaluation des risques de blanchiment des capitaux et de financement du terrorisme (BC-FT) auxquels vous êtes exposés et une politique adaptée à ces risques. Vous devez élaborer, en particulier, une classification des risques en fonction de la nature des produits ou services offerts, des conditions de transactions proposées, des canaux de distribution utilisés, des caractéristiques des clients, du pays ou du territoire d'origine et de destination des fonds.
                        </p>
                        <p>
                            Avant toute entrée en relation d'affaires, vous devez notamment :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>identifier et vérifier l'identité de « votre client » (c'est-à-dire tout prêteur, donateur et porteur de projet avec lequel vous êtes en relation d'affaires) et, le cas échéant, du bénéficiaire effectif (BE);</li>
                            <li>pour la vérification de l'identité de votre client, vous devez mettre en œuvre une mesure prévue à l'article R.561-5-1 ou, à défaut, deux mesures prévues à l'article R. 561-5-2.</li>
                            <li>recueillir et analyser les éléments d'information nécessaires à la connaissance de l'objet et de la nature de la relation d'affaires et actualiser ces éléments d'information pendant toute la durée de la relation d'affaires.</li>
                        </ul>
                        <p>
                            Vous devez établir un profil de risque (i.e. un « scoring », une note de risque) de chaque relation d'affaires en tenant compte notamment de la classification des risques et des informations recueillies au titre de la connaissance de la relation d'affaires.
                        </p>
                        <p>
                            Vous devez exercer une vigilance constante des opérations réalisées selon une approche par les risques (i.e. vous adaptez l'intensité de la vigilance au profil de risque de la relation d'affaires). En particulier, vous devez mettre en œuvre des mesures de vigilances renforcées lorsque le risque de BC-FT présenté par une relation d'affaires, un produit ou une opération paraît élevé.
                        </p>
                        <p>
                            Outre les obligations d'identification prévues au paragraphe II ci-dessus, vous êtes notamment obligés de vérifier l'identité de vos clients occasionnels en cas de soupçon de BC-FT ou lorsque les opérations dépassent un certain montant.
                        </p>
                        <p>
                            De même, vous devez accomplir un examen renforcé de toute opération « particulièrement complexe ou d'un montant inhabituellement élevé ou ne paraissant pas avoir de justification économique ou d'objet licite ». Vous devez vous renseigner, dans ce cas, sur l'origine et la destination des fonds, sur l'objet de l'opération et sur l'identité du bénéficiaire des sommes. Les IFP sont également tenus de réaliser auprès de TRACFIN des déclarations en cas de soupçon de BC-FT.
                        </p>
                        <p>
                            Enfin, vous avez l'obligation de conserver pendant 5 ans les documents et informations relatifs à votre clientèle et aux opérations réalisées.
                        </p>
                    </div>
                </div>
                
                <!-- 3.2 Organisation et contrôle -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        2/ Organisation et contrôle interne
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            En tant qu'IFP, vous devez mettre en place une organisation et des procédures internes, pour lutter contre le BC-FT, qui tiennent compte de votre évaluation des risques. Vous devez disposer à cet effet d'un dispositif de surveillance des opérations efficace.
                        </p>
                        <p>
                            Vous devez également mettre en place un dispositif de contrôle interne adapté à votre taille, à la nature, à la complexité et au volume de votre activité et vous doter de moyens humains suffisants. Ce dispositif de contrôle interne comprend :
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>des procédures définissant les activités de contrôle interne accomplies par l'IFP pour s'assurer du respect des obligations LCB-FT;</li>
                            <li>un contrôle interne permanent réalisé par des personnes exerçant des activités opérationnelles et, le cas échéant, par des personnes dédiées à la seule fonction de contrôle des opérations;</li>
                            <li>un contrôle interne périodique réalisé par des personnes dédiées, de manière indépendante à l'égard des personnes, entités et services qu'elles contrôlent lorsque cela est approprié eu égard à la taille et à la nature des activités.</li>
                        </ul>
                        <p>
                            Enfin, vous devez désigner un responsable du dispositif de LCB-FT, un déclarant et un correspondant TRACFIN parmi vos dirigeants ou préposés. Il vous appartient d'informer les services de Tracfin et de l'ACPR de la désignation des déclarants et correspondants.
                        </p>
                    </div>
                </div>
                
                <!-- 3.3 Gel des avoirs -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-finbright-purple mb-3">
                        3/ Gel des avoirs
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Les IFP sont pleinement soumis aux obligations de gel des avoirs et d'interdiction de mise à disposition de fonds depuis l'entrée en vigueur de l'ordonnance n° 2020-1342 du 4 novembre 2020 renforçant le dispositif de gel des avoirs et d'interdiction de mise à disposition.
                        </p>
                        <p>
                            En tant qu'IFP, vous devez donc mettre en œuvre les mesures de gel des avoirs. Ces mesures couvrent l'ensemble des intervenant à une opération de financement, à savoir le prêteur/donateur, le porteur de projet ainsi que son bénéficiaire effectif et le bénéficiaire du projet. Les mesures de gel sont mises en œuvre dès leur entrée en vigueur et génèrent à votre charge une obligation de résultat.
                        </p>
                        <p>
                            Pour ce faire, vous devez mettre en place un dispositif de détection (incluant notamment le traitement des alertes) permettant l'application sans délai des mesures de gel et d'interdiction de mise à disposition. Ce dispositif est adapté à la taille et à la nature de l'activité ; il est doté de moyens matériels et humains suffisants. Vous devez également mettre en place des procédures internes précisant notamment les modalités d'information immédiate de la direction générale du Trésor lors de la mise en œuvre des mesures.
                        </p>
                        <p>
                            Le dispositif de contrôle interne couvre les obligations en matière de gel des avoirs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection