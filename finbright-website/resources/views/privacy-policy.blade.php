@extends('layouts.app')

@section('title', 'Politique de confidentialité | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class="py-20">
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
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Introduction -->
            <div class="mb-12">
                <div style="background: linear-gradient( #B803C9FF 20%, #790384 100%);" class="text-white rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-white">Dernière mise à jour : 15 décembre 2025</h2>
                    <p class="text-white">
                        Fin'Bright SAS s'engage à protéger la confidentialité de vos données personnelles. Cette politique explique comment nous collectons, utilisons, stockons et protégeons vos informations conformément au Règlement Général sur la Protection des Données (RGPD).
                    </p>
                </div>
            </div>

            <!-- Article 1 : Introduction et Contextualisation Réglementaire -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-info-circle text-finbright-purple mr-3"></i>
                    <span class="text-finbright-purple">Article 1 :</span> Introduction et Contextualisation Réglementaire
                </h2>
                
                <div class="bg-blue-50 border-l-4 border-blue-400 p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">1.1. Contexte Réglementaire</h3>
                    <p class="text-gray-700 mb-4">
                        Fin'Bright SAS est un Intermédiaire en Financement Participatif (IFP) agréé par l'Autorité de Contrôle Prudentiel et de Résolution (ACPR) sous le numéro IFP-XXX. À ce titre, nous sommes soumis à un cadre réglementaire strict qui encadre nos activités et la protection de vos données.
                    </p>
                    <p class="text-gray-700">
                        En tant qu'IFP, nous devons respecter les obligations issues du Code monétaire et financier, notamment en matière de Lutte Contre le Blanchiment et le Financement du Terrorisme (LCB-FT). Parallèlement, en tant qu'entreprise traitant des données personnelles, nous sommes soumis au Règlement Général sur la Protection des Données (RGPD) et à la loi "Informatique et Libertés".
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">1.2. Périmètre d'Application</h3>
                    <p class="text-gray-700 mb-4">
                        Cette Politique de Confidentialité s'applique à l'ensemble des traitements de données personnelles effectués par Fin'Bright dans le cadre de ses activités d'IFP, notamment :
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        <li>Le produit "Prêt Étudiant" destiné aux étudiants en formation supérieure</li>
                        <li>La plateforme de mise en relation entre emprunteurs et prêteurs particuliers</li>
                        <li>Tous les services connexes (support client, gestion des comptes, etc.)</li>
                    </ul>
                </div>

                <div class="bg-finbright-purple text-white rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3">1.3. Identité et Coordonnées du Responsable de Traitement</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="mb-2"><strong>Raison sociale :</strong> Fin'Bright SAS</p>
                            <p class="mb-2"><strong>Siège social :</strong> [Adresse complète]</p>
                            <p class="mb-2"><strong>SIRET :</strong> [Numéro SIRET]</p>
                        </div>
                        <div>
                            <p class="mb-2"><strong>Statut réglementaire :</strong> IFP agréé ACPR</p>
                            <p class="mb-2"><strong>Numéro d'agrément :</strong> IFP-XXX</p>
                            <p class="mb-2"><strong>DPO :</strong> dpo@finbright.fr</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 2 : Catégories de Données Personnelles Collectées -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-database text-finbright-cyan mr-3"></i>
                    <span class="text-finbright-cyan">Article 2 :</span> Catégories de Données Personnelles Collectées
                </h2>

                <div class="space-y-6">
                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2.1. Données de Connexion et de Navigation</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Adresse IP, type de navigateur, système d'exploitation</li>
                            <li>Pages visitées, durée de visite, parcours de navigation</li>
                            <li>Données de géolocalisation approximative (pays, région)</li>
                            <li>Cookies et autres traceurs (détaillés à l'Article 9)</li>
                        </ul>
                    </div>

                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2.2. Données d'Identification et de Contact</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Nom, prénom, date et lieu de naissance</li>
                            <li>Adresse postale complète</li>
                            <li>Numéro de téléphone (fixe et/ou mobile)</li>
                            <li>Adresse e-mail</li>
                            <li>Pièce d'identité (carte nationale d'identité, passeport, titre de séjour)</li>
                        </ul>
                    </div>

                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2.3. Données relatives à votre Situation Personnelle et Professionnelle</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Situation familiale (célibataire, marié, pacsé, etc.)</li>
                            <li>Nombre de personnes à charge</li>
                            <li>Profession, employeur, ancienneté professionnelle</li>
                            <li>Type de contrat de travail (CDI, CDD, freelance, etc.)</li>
                        </ul>
                    </div>

                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2.4. Données Spécifiques au "Prêt Étudiant"</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Établissement d'enseignement supérieur</li>
                            <li>Formation suivie (niveau, spécialité, durée)</li>
                            <li>Année d'études en cours</li>
                            <li>Diplômes obtenus antérieurement</li>
                            <li>Projet professionnel et perspectives d'emploi</li>
                        </ul>
                    </div>

                    <div class="border-l-4 border-finbright-purple pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2.5. Données Économiques et Financières (Emprunteurs)</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Revenus (salaires, bourses, aides familiales, etc.)</li>
                            <li>Charges et dépenses courantes</li>
                            <li>Patrimoine (biens immobiliers, épargne, investissements)</li>
                            <li>Endettement existant (crédits en cours, découverts autorisés)</li>
                            <li>Coordonnées bancaires (IBAN, BIC)</li>
                            <li>Historique bancaire (relevés de compte, justificatifs de revenus)</li>
                        </ul>
                    </div>

                    <div class="border-l-4 border-finbright-cyan pl-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2.6. Données d'Identification, Bancaires et d'Investissement (Prêteurs)</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Données d'identification (identiques aux emprunteurs)</li>
                            <li>Coordonnées bancaires pour les virements</li>
                            <li>Capacité d'investissement et profil de risque</li>
                            <li>Historique des investissements sur la plateforme</li>
                            <li>Préférences d'investissement (montants, durées, profils d'emprunteurs)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Article 3 : Finalités des Traitements et Bases Légales -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-gavel text-finbright-purple mr-3"></i>
                    <span class="text-finbright-purple">Article 3 :</span> Finalités des Traitements et Bases Légales
                </h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-finbright-purple text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Finalité</th>
                                <th class="px-4 py-3 text-left">Base Légale</th>
                                <th class="px-4 py-3 text-left">Données Concernées</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3">Fourniture de nos services de financement participatif</td>
                                <td class="px-4 py-3">Exécution du contrat</td>
                                <td class="px-4 py-3">Toutes les données nécessaires à la gestion du prêt</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">Analyse de solvabilité et scoring de crédit</td>
                                <td class="px-4 py-3">Intérêt légitime</td>
                                <td class="px-4 py-3">Données financières, professionnelles, bancaires</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Décision automatisée d'octroi de prêt</td>
                                <td class="px-4 py-3">Exécution du contrat</td>
                                <td class="px-4 py-3">Ensemble des données du dossier de demande</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">Obligations LCB-FT</td>
                                <td class="px-4 py-3">Obligation légale</td>
                                <td class="px-4 py-3">Données d'identification, justificatifs, transactions</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Gestion des transactions et paiements</td>
                                <td class="px-4 py-3">Exécution du contrat</td>
                                <td class="px-4 py-3">Coordonnées bancaires, montants, échéances</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">Recouvrement des créances</td>
                                <td class="px-4 py-3">Intérêt légitime</td>
                                <td class="px-4 py-3">Données contractuelles, financières, de contact</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Prospection commerciale</td>
                                <td class="px-4 py-3">Consentement / Intérêt légitime</td>
                                <td class="px-4 py-3">Données de contact, préférences</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">Amélioration de nos services</td>
                                <td class="px-4 py-3">Intérêt légitime</td>
                                <td class="px-4 py-3">Données de navigation, d'usage, statistiques anonymisées</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Article 4 : Destinataires de vos Données -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-users text-finbright-cyan mr-3"></i>
                    <span class="text-finbright-cyan">Article 4 :</span> Destinataires de vos Données
                </h2>

                <div class="space-y-6">
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">4.1. Personnel de Fin'Bright</h3>
                        <p class="text-gray-700">
                            Seuls les collaborateurs de Fin'Bright ayant besoin d'accéder à vos données dans le cadre de leurs fonctions (service client, analyse de crédit, conformité, direction) peuvent y accéder, selon le principe du "besoin d'en connaître".
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">4.2. Sous-traitants et Partenaires</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-finbright-purple pl-4">
                                <h4 class="font-semibold text-gray-900">Prestataire de Services de Paiement (PSP)</h4>
                                <p class="text-gray-700">Gestion sécurisée des fonds et des transactions financières (ex: Mangopay, Lemon Way).</p>
                            </div>
                            <div class="border-l-4 border-finbright-cyan pl-4">
                                <h4 class="font-semibold text-gray-900">Agrégateur de Données Bancaires</h4>
                                <p class="text-gray-700">Collecte des informations bancaires via partenaire agréé ACPR (ex: Powens, Bridge).</p>
                            </div>
                            <div class="border-l-4 border-finbright-purple pl-4">
                                <h4 class="font-semibold text-gray-900">Fournisseur KYC</h4>
                                <p class="text-gray-700">Vérification d'identité à distance (ex: Veriff, Namirial, Persona).</p>
                            </div>
                            <div class="border-l-4 border-finbright-cyan pl-4">
                                <h4 class="font-semibold text-gray-900">Hébergeur de Données</h4>
                                <p class="text-gray-700">Serveurs sécurisés situés dans l'Union Européenne.</p>
                            </div>
                            <div class="border-l-4 border-finbright-purple pl-4">
                                <h4 class="font-semibold text-gray-900">Partenaires de Recouvrement</h4>
                                <p class="text-gray-700">En cas de défaut de paiement (sociétés de recouvrement, huissiers, avocats).</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-red-50 border-l-4 border-red-400 p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">4.3. Autorités Publiques</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>ACPR dans le cadre de ses missions de contrôle</li>
                            <li>TRACFIN en cas de déclaration de soupçon (LCB-FT)</li>
                            <li>Autorités judiciaires (police, gendarmerie, tribunaux)</li>
                            <li>Administration fiscale et organismes de sécurité sociale</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">4.4. Autres Tiers</h3>
                        <p class="text-gray-700">
                            Nos auditeurs externes ou internes dans le cadre de leurs missions légales de certification et de contrôle de nos comptes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Article 5 : Durées de Conservation -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-clock text-finbright-purple mr-3"></i>
                    <span class="text-finbright-purple">Article 5 :</span> Durées de Conservation des Données
                </h2>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 mb-6">
                    <p class="text-gray-700">
                        <strong>Important :</strong> Certaines obligations légales (Code monétaire et financier, LCB-FT) priment sur le droit général à l'effacement prévu par le RGPD. Même en cas de demande de suppression, nous sommes légalement tenus de conserver certaines informations.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-finbright-cyan text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Catégorie de Données</th>
                                <th class="px-4 py-3 text-left">Base Active</th>
                                <th class="px-4 py-3 text-left">Archivage</th>
                                <th class="px-4 py-3 text-left">Justification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3">Données LCB-FT</td>
                                <td class="px-4 py-3">Durée de la relation</td>
                                <td class="px-4 py-3">5 ans après fin de relation</td>
                                <td class="px-4 py-3">Art. L. 561-12 Code monétaire</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">Contrat de prêt</td>
                                <td class="px-4 py-3">Durée de la relation</td>
                                <td class="px-4 py-3">5 ans après fin de relation</td>
                                <td class="px-4 py-3">Prescription civile (Art. 2224 Code civil)</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Demande refusée</td>
                                <td class="px-4 py-3">6 mois</td>
                                <td class="px-4 py-3">1 an supplémentaire</td>
                                <td class="px-4 py-3">Gestion des contestations</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">Données prospects</td>
                                <td class="px-4 py-3">3 ans</td>
                                <td class="px-4 py-3">N/A</td>
                                <td class="px-4 py-3">Recommandation CNIL</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Cookies</td>
                                <td class="px-4 py-3">Maximum 13 mois</td>
                                <td class="px-4 py-3">N/A</td>
                                <td class="px-4 py-3">Durée maximale CNIL</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Article 6 : Sécurité des Données -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-shield-alt text-finbright-cyan mr-3"></i>
                    <span class="text-finbright-cyan">Article 6 :</span> Sécurité de Vos Données
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-lock text-finbright-purple mr-2"></i>
                            Mesures Techniques
                        </h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>Chiffrement TLS (HTTPS) pour toutes les communications</li>
                            <li>Hachage et salage des mots de passe</li>
                            <li>Hébergement sécurisé dans l'UE</li>
                            <li>Pare-feux et systèmes de détection d'intrusion</li>
                            <li>Cloisonnement des environnements</li>
                        </ul>
                    </div>

                    <div class="bg-green-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-users-cog text-finbright-cyan mr-2"></i>
                            Mesures Organisationnelles
                        </h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>Contrôle d'accès strict (principe du moindre privilège)</li>
                            <li>Formation régulière du personnel</li>
                            <li>Sélection rigoureuse des partenaires</li>
                            <li>Procédure de gestion des incidents</li>
                            <li>Audits de sécurité réguliers</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Article 7 : Transferts Hors UE -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-globe text-finbright-purple mr-3"></i>
                    <span class="text-finbright-purple">Article 7 :</span> Transferts de Données Hors de l'Union Européenne
                </h2>

                <div class="bg-blue-50 border-l-4 border-blue-400 p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Principe</h3>
                    <p class="text-gray-700 mb-4">
                        Fin'Bright privilégie le traitement et l'hébergement de vos données au sein de l'UE ou dans des pays reconnus comme "adéquats" par la Commission Européenne.
                    </p>
                    
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Exceptions et Garanties</h3>
                    <p class="text-gray-700">
                        Si nous devions faire appel à un sous-traitant hors UE, le transfert serait encadré par des garanties appropriées (Clauses Contractuelles Types, Règles d'Entreprise Contraignantes). Vous seriez informé de ces transferts.
                    </p>
                </div>
            </div>

            <!-- Article 8 : Vos Droits -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-user-shield text-finbright-cyan mr-3"></i>
                    <span class="text-finbright-cyan">Article 8 :</span> Vos Droits sur Vos Données Personnelles
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-eye text-finbright-purple mr-2"></i>
                            Droit d'accès
                        </h3>
                        <p class="text-gray-700">Obtenir confirmation du traitement de vos données et accès à celles-ci.</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-edit text-finbright-cyan mr-2"></i>
                            Droit de rectification
                        </h3>
                        <p class="text-gray-700">Corriger les données inexactes ou incomplètes vous concernant.</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-trash text-finbright-purple mr-2"></i>
                            Droit à l'effacement
                        </h3>
                        <p class="text-gray-700">Demander la suppression de vos données (sous réserve des obligations légales).</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-pause text-finbright-cyan mr-2"></i>
                            Droit à la limitation
                        </h3>
                        <p class="text-gray-700">Demander le "gel" temporaire de l'utilisation de vos données.</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-download text-finbright-purple mr-2"></i>
                            Droit à la portabilité
                        </h3>
                        <p class="text-gray-700">Recevoir vos données dans un format structuré et les transmettre.</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-ban text-finbright-cyan mr-2"></i>
                            Droit d'opposition
                        </h3>
                        <p class="text-gray-700">Vous opposer au traitement fondé sur l'intérêt légitime.</p>
                    </div>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 mt-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Droits spécifiques - Décision automatisée</h3>
                    <p class="text-gray-700 mb-4">
                        Notre processus d'octroi de prêt repose en partie sur une décision automatisée. Vous avez le droit de :
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        <li>Obtenir une intervention humaine pour un réexamen</li>
                        <li>Exprimer votre point de vue sur votre situation</li>
                        <li>Contester la décision de refus</li>
                    </ul>
                </div>

                <div class="bg-finbright-purple text-white rounded-lg p-6 mt-6">
                    <h3 class="text-xl font-semibold mb-3">Comment exercer vos droits ?</h3>
                    <p class="mb-4">
                        Contactez notre DPO à : <strong>dpo@finbright.fr</strong> en justifiant de votre identité.
                    </p>
                    <p>
                        <strong>Délai de réponse :</strong> Maximum 1 mois
                    </p>
                </div>
            </div>

            <!-- Article 9 : Cookies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-cookie-bite text-finbright-purple mr-3"></i>
                    <span class="text-finbright-purple">Article 9 :</span> Gestion des Cookies et Autres Traceurs
                </h2>

                <div class="space-y-6">
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Qu'est-ce qu'un cookie ?</h3>
                        <p class="text-gray-700">
                            Un cookie est un petit fichier texte enregistré par votre navigateur qui permet de conserver des informations et de vous "reconnaître" lors de vos visites ultérieures.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-green-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-cog text-finbright-purple mr-2"></i>
                                Cookies Fonctionnels
                            </h3>
                            <p class="text-gray-700 text-sm">
                                Indispensables au fonctionnement (session, sécurité). Pas de consentement requis.
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-chart-bar text-finbright-cyan mr-2"></i>
                                Cookies Analytiques
                            </h3>
                            <p class="text-gray-700 text-sm">
                                Statistiques anonymes de fréquentation pour améliorer le site.
                            </p>
                        </div>

                        <div class="bg-purple-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                <i class="fas fa-bullhorn text-finbright-purple mr-2"></i>
                                Cookies Marketing
                            </h3>
                            <p class="text-gray-700 text-sm">
                                Publicités personnalisées selon vos centres d'intérêt.
                            </p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Gestion de votre consentement</h3>
                        <p class="text-gray-700 mb-4">
                            Votre consentement est requis pour les cookies non-fonctionnels. Vous pouvez modifier vos préférences à tout moment via l'outil de gestion accessible sur toutes les pages.
                        </p>
                        <p class="text-gray-700">
                            Vous pouvez également configurer votre navigateur pour accepter ou refuser les cookies.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Article 10 : Modifications -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-sync-alt text-finbright-cyan mr-3"></i>
                    <span class="text-finbright-cyan">Article 10 :</span> Modification de la Politique de Confidentialité
                </h2>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6">
                    <p class="text-gray-700 mb-4">
                        Cette politique peut être modifiée pour s'adapter aux évolutions réglementaires et technologiques.
                    </p>
                    <p class="text-gray-700 mb-4">
                        <strong>Notification :</strong> Toute modification substantielle vous sera communiquée par e-mail ou notification sur la plateforme.
                    </p>
                    <p class="text-gray-700">
                        <strong>Consultation :</strong> Nous vous encourageons à consulter régulièrement cette page pour rester informé.
                    </p>
                </div>
            </div>

            <!-- Contact et réclamation -->
            <div class="mb-12">
                <div class="bg-finbright-purple text-white rounded-lg p-8 text-center">
                    <h2 class="text-2xl font-bold mb-4">Une question sur vos données ?</h2>
                    <p class="mb-6">Notre équipe est à votre disposition pour répondre à toutes vos questions.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-semibold mb-2">Délégué à la Protection des Données</h3>
                            <p>dpo@finbright.fr</p>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Réclamation CNIL</h3>
                            <p>Si vos droits ne sont pas respectés</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection