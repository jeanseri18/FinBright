@extends('layouts.app')

@section('title', 'Conditions d\'utilisation | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Conditions <span class="text-finbright-cyan">d'utilisation</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Les règles et conditions qui régissent l'utilisation de notre plateforme.
        </p>
    </div>
</section>

<!-- Section Conditions d'utilisation -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Introduction -->
            <div class="mb-12">
                <div class="bg-finbright-purple text-white rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-white">Dernière mise à jour : 15 décembre 2025</h2>
                    <p class="text-white">
                        Les présentes conditions générales d'utilisation (CGU) régissent l'accès et l'utilisation de la plateforme Fin'Bright. En utilisant nos services, vous acceptez ces conditions dans leur intégralité.
                    </p>
                </div>
            </div>

            <!-- Définitions -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Définitions</span>
                </h2>
                <div class="space-y-4">
                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Plateforme</h3>
                        <p class="text-gray-600">Le site web et l'application mobile Fin'Bright accessible à l'adresse www.finbright.fr</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Utilisateur</h3>
                        <p class="text-gray-600">Toute personne physique ou morale utilisant la plateforme</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Investisseur</h3>
                        <p class="text-gray-600">Utilisateur qui finance des projets via la plateforme</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Emprunteur</h3>
                        <p class="text-gray-600">Utilisateur qui sollicite un financement via la plateforme</p>
                    </div>
                </div>
            </div>

            <!-- Objet et champ d'application -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Objet et <span class="text-finbright-cyan">champ d'application</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="text-gray-600 mb-4">
                        Fin'Bright est une plateforme de financement participatif agréée par l'ACPR qui met en relation des investisseurs et des emprunteurs pour des projets d'impact environnemental et social.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Les présentes CGU s'appliquent à tous les utilisateurs de la plateforme, sans exception.
                    </p>
                    <div class="bg-finbright-purple text-white rounded-lg p-4">
                        <p class="font-semibold">⚠️ Important :</p>
                        <p>L'utilisation de la plateforme implique l'acceptation pleine et entière des présentes conditions.</p>
                    </div>
                </div>
            </div>

            <!-- Conditions d'accès -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Conditions <span class="text-finbright-purple">d'accès</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-user text-finbright-purple mr-2"></i>
                            Personnes physiques
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Être majeur (18 ans minimum)</li>
                            <li>Avoir la capacité juridique</li>
                            <li>Résider dans l'Union Européenne</li>
                            <li>Fournir des documents d'identité valides</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-building text-finbright-cyan mr-2"></i>
                            Personnes morales
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Être immatriculée en UE</li>
                            <li>Justifier de l'identité du représentant légal</li>
                            <li>Fournir les statuts et K-bis</li>
                            <li>Respecter l'objet social</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Inscription et compte utilisateur -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Inscription et <span class="text-finbright-cyan">compte utilisateur</span>
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white font-bold text-sm">1</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Création du compte</h3>
                            <p class="text-gray-600">L'inscription est gratuite et nécessite la fourniture d'informations exactes et à jour. Toute information erronée peut entraîner la suspension du compte.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white font-bold text-sm">2</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Vérification d'identité</h3>
                            <p class="text-gray-600">Conformément à la réglementation, nous procédons à une vérification d'identité (KYC) avant l'activation complète du compte.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white font-bold text-sm">3</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Sécurité du compte</h3>
                            <p class="text-gray-600">L'utilisateur est responsable de la confidentialité de ses identifiants et de toutes les activités effectuées depuis son compte.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services proposés -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Services <span class="text-finbright-purple">proposés</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                            <i class="fas fa-seedling text-finbright-purple mr-2"></i>
                            Pour les investisseurs
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Accès aux projets de financement</li>
                            <li>Outils d'analyse et de suivi</li>
                            <li>Diversification automatique</li>
                            <li>Reporting détaillé</li>
                            <li>Support client dédié</li>
                        </ul>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                            <i class="fas fa-handshake text-finbright-cyan mr-2"></i>
                            Pour les emprunteurs
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Évaluation de projet personnel</li>
                            <li>Mise en relation avec investisseurs</li>
                            <li>Gestion des remboursements</li>
                            <li>Accompagnement personnalisé</li>
                            <li>Outils de communication</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Obligations des utilisateurs -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Obligations des <span class="text-finbright-cyan">utilisateurs</span>
                </h2>
                <div class="space-y-6">
                    <div class="bg-red-50 border-l-4 border-red-500 p-6">
                        <h3 class="text-lg font-semibold text-red-800 mb-3">Interdictions</h3>
                        <ul class="list-disc list-inside text-red-700 space-y-1">
                            <li>Utiliser la plateforme à des fins illégales</li>
                            <li>Créer plusieurs comptes</li>
                            <li>Transmettre des informations fausses</li>
                            <li>Tenter de contourner les mesures de sécurité</li>
                            <li>Utiliser des robots ou scripts automatisés</li>
                        </ul>
                    </div>
                    
                    <div class="bg-green-50 border-l-4 border-green-500 p-6">
                        <h3 class="text-lg font-semibold text-green-800 mb-3">Obligations</h3>
                        <ul class="list-disc list-inside text-green-700 space-y-1">
                            <li>Fournir des informations exactes et à jour</li>
                            <li>Respecter les autres utilisateurs</li>
                            <li>Signaler tout dysfonctionnement</li>
                            <li>Respecter la confidentialité des données</li>
                            <li>Se conformer à la réglementation applicable</li>
                        </ul>
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

            <!-- Résiliation -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Résiliation</span>
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Par l'utilisateur</h3>
                            <p class="text-gray-600">Résiliation libre à tout moment, sous réserve du respect des engagements en cours. Préavis de 30 jours pour les comptes avec investissements actifs.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-building text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Par Fin'Bright</h3>
                            <p class="text-gray-600">En cas de manquement aux CGU, d'activité suspecte ou pour des raisons réglementaires. Préavis de 30 jours sauf urgence.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Droit applicable -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Droit applicable et <span class="text-finbright-cyan">litiges</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Droit applicable</h3>
                            <p class="text-gray-600">
                                Les présentes CGU sont régies par le droit français. En cas de conflit entre les versions linguistiques, la version française prévaut.
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Résolution des litiges</h3>
                            <p class="text-gray-600">
                                Tentative de résolution amiable obligatoire. À défaut, compétence exclusive des tribunaux de Paris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="bg-finbright-purple rounded-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Contact et support</h2>
                <p class="mb-4">
                    Pour toute question relative aux présentes conditions d'utilisation :
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Support client</h3>
                        <ul class="space-y-2">
                            <li><strong>Email :</strong> support@finbright.fr</li>
                            <li><strong>Téléphone :</strong> +33 1 23 45 67 89</li>
                            <li><strong>Horaires :</strong> Lun-Ven 9h-18h</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Adresse postale</h3>
                        <p>
                            Fin'Bright SAS<br>
                            123 Avenue des Champs-Élysées<br>
                            75008 Paris, France
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection