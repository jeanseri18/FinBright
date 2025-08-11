@extends('layouts.app')

@section('title', 'Mentions légales | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class=" py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Mentions <span class="text-finbright-cyan">Légales</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Informations légales et réglementaires concernant Fin'Bright.
        </p>
    </div>
</section>

<!-- Section Mentions Légales -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Éditeur du site -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Éditeur</span> du site
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="mb-4">Le site internet <strong>www.finbright.fr</strong> (ci-après le "Site") est édité par la société <strong>Fin'Bright</strong>, société par actions simplifiée (SAS) au capital social de <em>[Montant à compléter]</em> euros.</p>
                    <p class="mb-4"><strong>Siège social :</strong> 542 Rue Daniel Blervaque, 78955, Carrières-sous-Poissy</p>
                    <p class="mb-4"><strong>Immatriculation au RCS :</strong> <em>[Ville] sous le numéro SIREN (à venir)</em></p>
                    <p class="mb-4"><strong>Numéro de TVA intracommunautaire :</strong> <em>(à venir)</em></p>
                    <p class="mb-4"><strong>Email :</strong> contact@finbright.fr</p>
                </div>
            </div>

            <!-- Directeur de publication -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-cyan">Directeur</span> de publication
                </h2>
                <p class="text-gray-600 mb-4">
                    Le directeur de la publication est <strong>Kouadio Benjamin SANOU</strong>, en sa qualité de Président de la société Fin'Bright.
                </p>
                <p class="text-gray-600">
                    Pour toute question ou demande d'information, vous pouvez nous contacter par courrier électronique : <strong>contact@finbright.fr</strong>
                </p>
            </div>

            <!-- Hébergement -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Hébergement</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="mb-4"><strong>Hébergeur :</strong> OVH</p>
                    <p class="mb-4"><em>[Adresse complète de l'hébergeur]</em></p>
                    <p class="mb-4"><em>[Contact de l'hébergeur (téléphone, e-mail ou formulaire de contact)]</em></p>
                </div>
            </div>

            <!-- Statut Réglementaire et Cadre d'Activité -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Statut <span class="text-finbright-cyan">Réglementaire</span> et Cadre d'Activité
                </h2>
                
                <!-- Statut Réglementaire -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Statut Réglementaire</h3>
                    <div class="space-y-4">
                        <p class="text-gray-600">
                            Fin'Bright est une personne morale exerçant l'activité d'<strong>Intermédiaire en Financement Participatif (IFP)</strong>, conformément aux dispositions des articles L. 548-1 et suivants du Code monétaire et financier.
                        </p>
                        <p class="text-gray-600">
                            À ce titre, Fin'Bright est immatriculée au <strong>Registre Unique des Intermédiaires en Assurance, Banque et Finance (ORIAS)</strong> sous le numéro <em>(à venir)</em>. Ce registre est public et peut être consulté à l'adresse suivante : <a href="https://www.orias.fr" class="text-finbright-purple hover:underline">www.orias.fr</a>.
                        </p>
                        <p class="text-gray-600">
                            L'activité de Fin'Bright est exercée sous le contrôle de l'<strong>Autorité de Contrôle Prudentiel et de Résolution (ACPR)</strong>, autorité administrative indépendante adossée à la Banque de France, dont le siège est situé 4 Place de Budapest, CS 92459, 75436 Paris Cedex 09.
                        </p>
                    </div>
                </div>

                <!-- Avertissement Important -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Avertissement Important sur le Périmètre d'Activité</h3>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <p class="text-gray-700">
                            Fin'Bright opère sous le statut national d'IFP et n'est pas un Prestataire de Services de Financement Participatif (PSFP) au sens du règlement (UE) 2020/1503 du Parlement européen et du Conseil du 7 octobre 2020. En conséquence, l'activité de Fin'Bright se limite exclusivement à la mise en relation de particuliers pour des opérations de prêt à des fins non professionnelles ou commerciales, tel que défini par l'article L. 548-1 du Code monétaire et financier. <strong>Fin'Bright n'est pas habilitée à proposer des financements participatifs pour des projets d'entreprise ou à des fins commerciales.</strong>
                        </p>
                    </div>
                </div>

                <!-- Rôle d'Intermédiaire -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Rôle d'Intermédiaire</h3>
                    <p class="text-gray-600">
                        Fin'Bright agit uniquement en qualité d'intermédiaire en mettant à disposition sa plateforme technologique pour faciliter la mise en relation entre des prêteurs et des porteurs de projets (emprunteurs). La souscription d'un prêt via la plateforme donne lieu à la conclusion d'un contrat de prêt qui établit une relation juridique directe et exclusive entre le prêteur et l'emprunteur. <strong>Fin'Bright demeure tiers à ce contrat et n'est pas partie à l'opération de crédit elle-même.</strong>
                    </p>
                </div>

                <!-- Partenaire de Services de Paiement -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Partenaire de Services de Paiement</h3>
                    <p class="text-gray-600">
                        Pour assurer la sécurité et la conformité de la gestion des flux financiers (collecte des fonds auprès des prêteurs et versement aux emprunteurs, gestion des remboursements), Fin'Bright a recours aux services d'un prestataire de services de paiement (PSP) agréé. Fin'Bright agit en qualité d'agent de services de paiement, établissement de paiement agréé et supervisé par l'ACPR. L'ensemble des opérations de paiement réalisées via la plateforme est régi par les conditions générales d'utilisation du PSP, que les utilisateurs doivent accepter lors de leur inscription.
                    </p>
                </div>
            </div>

            <!-- Avertissements sur les Risques -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Avertissements sur les <span class="text-finbright-purple">Risques</span> et Indicateurs de Performance
                </h2>
                
                <!-- Avertissement aux Prêteurs -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-red-600 mb-4">⚠️ AVERTISSEMENT AUX PRÊTEURS</h3>
                    <div class="bg-red-50 border-l-4 border-red-500 p-6">
                        <p class="text-gray-700 mb-4">
                            L'investissement sous forme de prêt participatif via la plateforme Fin'Bright comporte des risques spécifiques dont vous devez avoir pleinement conscience avant de vous engager :
                        </p>
                        <ul class="space-y-3 text-gray-700">
                            <li><strong>Risque de Perte en Capital :</strong> Vous pouvez perdre tout ou partie du capital que vous prêtez. Le remboursement des prêts n'est pas garanti par Fin'Bright ni par aucun autre organisme. En cas de défaut de paiement de l'emprunteur, vous pourriez ne pas récupérer les sommes prêtées.</li>
                            <li><strong>Risque d'Illiquidité :</strong> Les sommes que vous prêtez sont immobilisées pour toute la durée du prêt. Vous ne pourrez pas récupérer votre capital de manière anticipée.</li>
                            <li><strong>Risque de Rendement Inférieur aux Attentes :</strong> Le rendement affiché est un rendement brut potentiel. Il ne préjuge pas des rendements futurs et peut être affecté par les défauts de paiement.</li>
                        </ul>
                        <p class="text-gray-700 mt-4 font-semibold">
                            Nous vous recommandons vivement de diversifier vos prêts sur un grand nombre de projets afin de mutualiser votre risque. N'investissez que des sommes que vous pouvez vous permettre de perdre sans que cela n'affecte votre situation financière.
                        </p>
                    </div>
                </div>

                <!-- Avertissement aux Emprunteurs -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-orange-600 mb-4">⚠️ AVERTISSEMENT AUX EMPRUNTEURS</h3>
                    <div class="bg-orange-50 border-l-4 border-orange-500 p-6">
                        <p class="text-gray-700 mb-4 font-semibold">
                            Un crédit vous engage et doit être remboursé. Vérifiez vos capacités de remboursement avant de vous engager.
                        </p>
                        <p class="text-gray-700 mb-4">
                            Le non-remboursement des échéances d'un prêt peut avoir de graves conséquences, notamment :
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li>• L'application de pénalités de retard</li>
                            <li>• L'exigibilité immédiate de la totalité du capital restant dû</li>
                            <li>• Des poursuites judiciaires à votre encontre</li>
                            <li>• Votre inscription sur les fichiers d'incidents de paiement gérés par la Banque de France (FICP), ce qui peut vous interdire l'accès au crédit pour plusieurs années</li>
                        </ul>
                    </div>
                </div>

                <!-- Indicateurs de Performance -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Publication des Indicateurs de Performance et Taux de Défaillance</h3>
                    <p class="text-gray-600">
                        En application de l'article R. 548-5 du Code monétaire et financier et de la position 2017-P-02 de l'ACPR, Fin'Bright s'engage à une transparence totale sur la performance des prêts financés via sa plateforme. Fin'Bright publie sur son site, sur une base trimestrielle, les indicateurs de performance et les taux de défaillance de l'ensemble des projets. Ces statistiques, calculées selon la méthodologie préconisée par le régulateur, sont accessibles à tous.
                    </p>
                </div>
            </div>

            <!-- Propriété intellectuelle -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Propriété <span class="text-finbright-purple">intellectuelle</span> et Limitation de Responsabilité
                </h2>
                
                <!-- Propriété Intellectuelle -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Propriété Intellectuelle</h3>
                    <div class="space-y-4">
                        <p class="text-gray-600">
                            Le Site et chacun des éléments qui le composent, notamment mais non limitativement, les textes, images, vidéos, logos, marques, bases de données, sont la propriété exclusive de la société Fin'Bright ou font l'objet d'une autorisation d'utilisation. Ils sont protégés par le Code de la propriété intellectuelle.
                        </p>
                        <p class="text-gray-600">
                            Toute reproduction, représentation, diffusion ou rediffusion, totale ou partielle, du contenu de ce Site sur quelque support ou par tout procédé que ce soit, sans l'autorisation expresse et préalable de Fin'Bright, est interdite et constituerait une contrefaçon sanctionnée par les articles L. 335-2 et suivants du Code de la propriété intellectuelle.
                        </p>
                    </div>
                </div>

                <!-- Limitation de Responsabilité -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Limitation de Responsabilité</h3>
                    <div class="space-y-4">
                        <p class="text-gray-600">
                            Fin'Bright est soumise à une obligation de moyens dans le cadre de la fourniture de ses services. Sa responsabilité ne saurait être engagée pour un dommage résultant de l'utilisation du réseau Internet tel que la perte de données, une intrusion, un virus, une rupture du service, ou d'autres problèmes involontaires.
                        </p>
                        <p class="text-gray-600">
                            Fin'Bright n'est pas responsable de l'exactitude, de l'exhaustivité ou de la véracité des informations fournies par les utilisateurs (emprunteurs ou prêteurs) sur la plateforme. Chaque utilisateur est seul responsable des informations qu'il communique.
                        </p>
                        <p class="text-gray-600">
                            En sa qualité d'intermédiaire, et comme rappelé plus haut, <strong>Fin'Bright ne garantit en aucun cas le remboursement des prêts consentis via sa plateforme</strong>. La responsabilité de Fin'Bright ne pourra être recherchée en cas de défaut de paiement total ou partiel d'un emprunteur.
                        </p>
                    </div>
                </div>
            </div>



            <!-- Droit applicable et juridiction compétente -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Droit <span class="text-finbright-cyan">applicable</span> et Juridiction Compétente
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        Les présentes mentions légales sont régies par le droit français. En cas de litige, et après échec de toute tentative de recherche d'une solution amiable, les tribunaux français seront seuls compétents pour connaître de ce litige.
                    </p>
                    <p class="text-gray-600">
                        Pour toute question relative à ces mentions légales, vous pouvez nous contacter à l'adresse suivante : <strong>contact@finbright.fr</strong>
                    </p>
                </div>
            </div>

            <!-- Médiation -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Médiation</span> et Réclamations
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        En cas de litige avec Fin'Bright, vous pouvez recourir gratuitement au service de médiation de l'<strong>Association Française des Sociétés Financières (ASF)</strong>, dont les coordonnées sont les suivantes :
                    </p>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="mb-2"><strong>Médiateur de l'ASF</strong></p>
                        <p class="mb-2">75 rue de Richelieu</p>
                        <p class="mb-2">75002 Paris</p>
                        <p class="mb-2"><strong>Site web :</strong> <a href="https://www.asf-france.com" class="text-finbright-purple hover:underline">www.asf-france.com</a></p>
                    </div>
                    <p class="text-gray-600 mt-4">
                        Le recours au médiateur n'est possible qu'après avoir épuisé les voies de recours internes auprès de Fin'Bright. Le médiateur devra être saisi dans un délai d'un an maximum à compter de votre réclamation écrite auprès de Fin'Bright.
                    </p>
                </div>
            </div>

            <!-- Liens hypertextes -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Liens <span class="text-finbright-cyan">hypertextes</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        Les liens hypertextes mis en place dans le cadre du présent site web en direction d'autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de Fin'Bright.
                    </p>
                    <p class="text-gray-600">
                        Tout site public ou privé est autorisé à établir, sans autorisation préalable, un lien vers les informations diffusées par Fin'Bright.
                    </p>
                </div>
            </div>

            <!-- Contact -->
            <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class=" rounded-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Contact</h2>
                <p class="mb-4">
                    Pour toute question relative aux présentes mentions légales, vous pouvez nous contacter :
                </p>
                <ul class="space-y-2">
                    <li><strong>Par email :</strong> legal@finbright.fr</li>
                    <li><strong>Par téléphone :</strong> +33 1 23 45 67 89</li>
                    <li><strong>Par courrier :</strong> Fin'Bright SAS - Service Juridique<br>
                        123 Avenue des Champs-Élysées<br>
                        75008 Paris, France</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection