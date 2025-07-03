@extends('layouts.app')

@section('title', 'Politique de confidentialité | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"class=" py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Politique de <span class="text-finbright-cyan">Confidentialité</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Comment nous collectons, utilisons et protégeons vos données personnelles.
        </p>
    </div>
</section>

<!-- Section Politique de confidentialité -->
<section class=" py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Introduction -->
            <div class="mb-12">
                <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"class=" text-white rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-white">Dernière mise à jour : 15 décembre 2024</h2>
                    <p class="text-white">
                        Fin'Bright SAS s'engage à protéger la confidentialité de vos données personnelles. Cette politique explique comment nous collectons, utilisons, stockons et protégeons vos informations conformément au Règlement Général sur la Protection des Données (RGPD).
                    </p>
                </div>
            </div>

            <!-- Responsable du traitement -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Responsable</span> du traitement
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="mb-4"><strong>Fin'Bright SAS</strong></p>
                    <p class="mb-4">123 Avenue des Champs-Élysées, 75008 Paris, France</p>
                    <p class="mb-4">Email : dpo@finbright.fr</p>
                    <p class="mb-4">Téléphone : +33 1 23 45 67 89</p>
                    <p>SIRET : 123 456 789 00012</p>
                </div>
            </div>

            <!-- Données collectées -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Données <span class="text-finbright-cyan">collectées</span>
                </h2>
                <div class="space-y-6">
                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Données d'identification</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Nom, prénom</li>
                            <li>Date et lieu de naissance</li>
                            <li>Adresse postale</li>
                            <li>Numéro de téléphone</li>
                            <li>Adresse email</li>
                            <li>Pièce d'identité (pour la vérification KYC)</li>
                        </ul>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Données financières</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Informations bancaires (IBAN, BIC)</li>
                            <li>Revenus et situation professionnelle</li>
                            <li>Historique des transactions</li>
                            <li>Données de solvabilité</li>
                        </ul>
                    </div>
                    
                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Données de navigation</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Adresse IP</li>
                            <li>Type de navigateur</li>
                            <li>Pages visitées</li>
                            <li>Durée de visite</li>
                            <li>Cookies et traceurs</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Finalités du traitement -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Finalités</span> du traitement
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-user-check text-finbright-purple mr-2"></i>
                            Gestion des comptes
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Création et gestion de votre compte</li>
                            <li>Authentification et sécurité</li>
                            <li>Vérification d'identité (KYC)</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-handshake text-finbright-cyan mr-2"></i>
                            Services financiers
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Traitement des investissements</li>
                            <li>Gestion des prêts</li>
                            <li>Calcul des intérêts et commissions</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-shield-alt text-finbright-purple mr-2"></i>
                            Conformité réglementaire
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Lutte contre le blanchiment (LCB-FT)</li>
                            <li>Respect des obligations ACPR</li>
                            <li>Archivage légal</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-chart-line text-finbright-cyan mr-2"></i>
                            Amélioration des services
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Analyse statistique</li>
                            <li>Personnalisation de l'expérience</li>
                            <li>Support client</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Base légale -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Base <span class="text-finbright-cyan">légale</span>
                </h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="wstyle="background: linear-gradient( #B803C9FF 20%, #790384 100%);"-8 h-8  rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-file-contract text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Exécution du contrat</h3>
                            <p class="text-gray-600">Pour la fourniture de nos services de financement participatif</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-balance-scale text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Obligation légale</h3>
                            <p class="text-gray-600">Pour respecter nos obligations réglementaires (KYC, LCB-FT)</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="wstyle="background: linear-gradient( #B803C9FF 20%, #790384 100%);"-8 h-8  rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-thumbs-up text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Consentement</h3>
                            <p class="text-gray-600">Pour les communications marketing et l'utilisation de cookies</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-cog text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Intérêt légitime</h3>
                            <p class="text-gray-600">Pour l'amélioration de nos services et la sécurité de la plateforme</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partage des données -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Partage des <span class="text-finbright-purple">données</span>
                </h2>
                <div class="space-y-6">
                    <p class="text-gray-600">
                        Vos données personnelles peuvent être partagées avec :
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-building text-finbright-purple mr-2"></i>
                                Partenaires financiers
                            </h3>
                            <p class="text-gray-600">Établissements de paiement (Stripe), banques partenaires pour le traitement des transactions</p>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-gavel text-finbright-cyan mr-2"></i>
                                Autorités compétentes
                            </h3>
                            <p class="text-gray-600">ACPR, TRACFIN, autorités judiciaires dans le cadre de nos obligations légales</p>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-tools text-finbright-purple mr-2"></i>
                                Prestataires techniques
                            </h3>
                            <p class="text-gray-600">Hébergeurs, services de maintenance, outils d'analyse sous contrat de sous-traitance</p>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-user-tie text-finbright-cyan mr-2"></i>
                                Conseillers externes
                            </h3>
                            <p class="text-gray-600">Avocats, experts-comptables, auditeurs dans le cadre de leurs missions</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Durée de conservation -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Durée de <span class="text-finbright-cyan">conservation</span>
                </h2>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="w-1style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"6 h-16  rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-user text-white text-xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Données d'identification</h3>
                                <p class="text-gray-600">5 ans après la fin de la relation contractuelle</p>
                            </div>
                            
                            <div class="text-center">
                                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-euro-sign text-white text-xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Données financières</h3>
                                <p class="text-gray-600">10 ans conformément aux obligations comptables</p>
                            </div>
                            
                            <div class="text-center">
                                <div class="w-1style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"6 h-16  rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-mouse-pointer text-white text-xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Données de navigation</h3>
                                <p class="text-gray-600">13 mois maximum pour les cookies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vos droits -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Vos <span class="text-finbright-purple">droits</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"class=" text-white rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-3">
                            <i class="fas fa-eye mr-2"></i>
                            Droit d'accès
                        </h3>
                        <p>Obtenir une copie de vos données personnelles</p>
                    </div>
                    
                    <div class="bg-finbright-cyan text-white rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-3">
                            <i class="fas fa-edit mr-2"></i>
                            Droit de rectification
                        </h3>
                        <p>Corriger ou mettre à jour vos informations</p>
                    </div>
                    
                    <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"class=" text-white rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-3">
                            <i class="fas fa-trash mr-2"></i>
                            Droit à l'effacement
                        </h3>
                        <p>Demander la suppression de vos données</p>
                    </div>
                    
                    <div class="bg-finbright-cyan text-white rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-3">
                            <i class="fas fa-pause mr-2"></i>
                            Droit à la limitation
                        </h3>
                        <p>Limiter le traitement de vos données</p>
                    </div>
                    
                    <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"class=" text-white rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-3">
                            <i class="fas fa-download mr-2"></i>
                            Droit à la portabilité
                        </h3>
                        <p>Récupérer vos données dans un format structuré</p>
                    </div>
                    
                    <div class="bg-finbright-cyan text-white rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-3">
                            <i class="fas fa-ban mr-2"></i>
                            Droit d'opposition
                        </h3>
                        <p>Vous opposer au traitement de vos données</p>
                    </div>
                </div>
                
                <div class="mt-8 bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Comment exercer vos droits ?</h3>
                    <p class="text-gray-600 mb-4">
                        Pour exercer vos droits, contactez notre Délégué à la Protection des Données :
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li><strong>Email :</strong> dpo@finbright.fr</li>
                        <li><strong>Courrier :</strong> Fin'Bright SAS - DPO, 123 Avenue des Champs-Élysées, 75008 Paris</li>
                        <li><strong>Délai de réponse :</strong> 1 mois maximum</li>
                    </ul>
                </div>
            </div>

            <!-- Sécurité -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-cyan">Sécurité</span> des données
                </h2>
                <div class="space-y-6">
                    <p class="text-gray-600">
                        Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données :
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start">
                            <div class="wstyle="background: linear-gradient( #B803C9FF 20%, #790384 100%);"-8 h-8  rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-lock text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Chiffrement</h3>
                                <p class="text-gray-600">Toutes les données sont chiffrées en transit et au repos</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-server text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hébergement sécurisé</h3>
                                <p class="text-gray-600">Serveurs certifiés ISO 27001 en France</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="wstyle="background: linear-gradient( #B803C9FF 20%, #790384 100%);"-8 h-8  rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-user-shield text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Accès contrôlé</h3>
                                <p class="text-gray-600">Authentification forte et gestion des habilitations</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-eye text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Surveillance</h3>
                                <p class="text-gray-600">Monitoring 24h/24 et détection d'intrusion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact DPO -->
            <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);"class=" rounded-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Contact - Délégué à la Protection des Données</h2>
                <p class="mb-4">
                    Pour toute question relative à la protection de vos données personnelles :
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Coordonnées</h3>
                        <ul class="space-y-2">
                            <li><strong>Email :</strong> dpo@finbright.fr</li>
                            <li><strong>Téléphone :</strong> +33 1 23 45 67 89</li>
                            <li><strong>Courrier :</strong> Fin'Bright SAS - DPO<br>
                                123 Avenue des Champs-Élysées<br>
                                75008 Paris, France</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Réclamation</h3>
                        <p class="mb-2">
                            Vous avez également le droit de déposer une réclamation auprès de la CNIL :
                        </p>
                        <p>
                            <strong>CNIL</strong><br>
                            3 Place de Fontenoy<br>
                            75007 Paris<br>
                            <a href="https://www.cnil.fr" class="text-finbright-cyan hover:underline">www.cnil.fr</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection