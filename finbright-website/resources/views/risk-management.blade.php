@extends('layouts.app')

@section('title', 'Politique de gestion des risques | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #B803C9FF 20%, #790384 100%);" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Politique de <span class="text-finbright-cyan">gestion des risques</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Notre cadre complet de gestion des risques pour assurer la protection de nos utilisateurs.
        </p>
    </div>
</section>

<!-- Section Politique de Gestion des Risques -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Introduction -->
            <div class="mb-12">
                <div class="bg-finbright-purple text-white rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-white"><i class="fas fa-shield-alt mr-3"></i>Politique de Gestion des Risques</h2>
                    <p class="text-white">
                        Notre cadre complet de gestion des risques pour assurer la protection de nos utilisateurs et la pérennité de la plateforme.
                    </p>
                </div>
            </div>

            <!-- Déclaration d'Intention -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">DÉCLARATION D'INTENTION ET D'ENGAGEMENT</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <div class="bg-finbright-cyan text-white rounded-lg p-4 mb-4">
                        <p class="font-semibold mb-2"><i class="fas fa-bullseye mr-2"></i>Priorité stratégique :</p>
                        <p>La direction de Fin'Bright considère la gestion des risques comme une priorité stratégique fondamentale et une composante essentielle de sa gouvernance.</p>
                    </div>
                    <p class="text-gray-600 mb-4">
                        Cette politique de gestion des risques témoigne de l'engagement ferme de la Société à mettre en œuvre un dispositif robuste, proportionné et efficace pour identifier, évaluer, maîtriser et surveiller l'ensemble des risques inhérents à ses activités.
                    </p>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <p class="text-yellow-800 font-semibold mb-2"><i class="fas fa-users mr-2"></i>Objectif principal :</p>
                        <p class="text-yellow-700">
                            Assurer la protection de nos utilisateurs – prêteurs et emprunteurs –, garantir la pérennité et la stabilité de la plateforme, préserver son intégrité et sa réputation, et maintenir la confiance de nos partenaires et des autorités de tutelle.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Cadre Réglementaire -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">CADRE RÉGLEMENTAIRE ET CHAMP D'APPLICATION</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <div class="bg-finbright-purple text-white rounded-lg p-4 mb-4">
                        <p class="font-semibold mb-2"><i class="fas fa-gavel mr-2"></i>Statut réglementaire :</p>
                        <p>Fin'Bright exerce l'activité d'Intermédiaire en Financement Participatif (IFP), régi par les articles L. 548-1 et suivants du Code Monétaire et Financier.</p>
                    </div>
                    <p class="text-gray-600 mb-4">
                        À ce titre, la Société est immatriculée auprès de l'Organisme pour le Registre des Intermédiaires en Assurance, Banque et Finance (ORIAS) et est soumise à la supervision de l'Autorité de Contrôle Prudentiel et de Résolution (ACPR).
                    </p>
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4">
                        <p class="text-blue-800 font-semibold mb-2"><i class="fas fa-info-circle mr-2"></i>Distinction importante :</p>
                        <p class="text-blue-700">
                            Les activités de Fin'Bright se distinguent de celles relevant du statut de Prestataire de Services de Financement Participatif (PSFP) au sens du Règlement (UE) 2020/1503. Conformément à son statut d'IFP, Fin'Bright se concentre exclusivement sur les opérations de prêt entre particuliers à des fins non commerciales.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Produits de Financement -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-credit-card mr-3 text-finbright-cyan"></i>Produits de Financement Couverts
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2"><i class="fas fa-graduation-cap mr-2"></i>Prêt Étudiant</h4>
                        <p class="text-gray-600">Prêt onéreux destiné à financer les études d'étudiants admis dans des établissements d'enseignement supérieur prestigieux, remboursable sur une durée de 2 à 7 ans.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2"><i class="fas fa-coins mr-2"></i>Mini Prêt Court</h4>
                        <p class="text-gray-600">Prêt onéreux de faible montant (100 à 800 euros), remboursable sur une courte période (3 à 6 mois).</p>
                    </div>
                </div>
            </div>

            <!-- Objectifs de la Politique -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">OBJECTIFS DE LA POLITIQUE</span>
                </h2>
                <div class="space-y-4">
                    <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2"><i class="fas fa-cogs mr-2"></i>Cadre intégré et complet</h4>
                        <p class="text-gray-600">Définir une approche structurée et cohérente pour la gestion de l'ensemble des risques auxquels la Société est exposée.</p>
                    </div>
                    
                    <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2"><i class="fas fa-tasks mr-2"></i>Processus de maîtrise</h4>
                        <p class="text-gray-600">Formaliser les procédures d'identification, d'évaluation, de mesure, de surveillance, de gestion et de reporting des risques significatifs.</p>
                    </div>
                    
                    <div class="border-l-4 border-green-500 pl-6 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2"><i class="fas fa-check-circle mr-2"></i>Conformité réglementaire</h4>
                        <p class="text-gray-600">Garantir que l'ensemble des opérations respecte scrupuleusement les lois, règlements et normes professionnelles en vigueur, notamment celles édictées par le CMF et l'ACPR.</p>
                    </div>
                    
                    <div class="border-l-4 border-blue-500 pl-6 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2"><i class="fas fa-file-alt mr-2"></i>Cadre de référence</h4>
                        <p class="text-gray-600">Servir de document de référence pour l'ensemble des collaborateurs, de la direction et des autres parties prenantes, en définissant clairement les responsabilités et les procédures à suivre.</p>
                    </div>
                </div>
            </div>

            <!-- Section 1 : Gouvernance et Organisation -->            
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">SECTION 1 : GOUVERNANCE ET ORGANISATION DE LA GESTION DES RISQUES</span>
                </h2>
                
                <!-- Rôles et Responsabilités -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-sitemap mr-3 text-finbright-cyan"></i>1.1. Rôles et Responsabilités
                    </h3>
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <p class="text-gray-600 mb-6">
                            Une gouvernance claire et une répartition précise des responsabilités constituent le socle d'une gestion des risques efficace. La structure de gouvernance de Fin'Bright est conçue pour garantir une supervision adéquate, une prise de décision éclairée et une mise en œuvre rigoureuse des procédures de contrôle.
                        </p>
                    </div>

                    <!-- Organe de Direction -->
                    <div class="mb-8">
                        <div class="bg-finbright-purple text-white rounded-lg p-6 mb-4">
                            <h4 class="text-xl font-bold mb-4"><i class="fas fa-crown mr-3"></i>L'Organe de Direction (Président / Conseil d'Administration)</h4>
                            <p class="mb-4">L'organe de direction de Fin'Bright assume la responsabilité ultime du dispositif de gestion des risques. Ses prérogatives incluent :</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-finbright-purple pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">L'approbation, la revue et la validation de la présente Politique de Gestion des Risques, en s'assurant de son adéquation avec la stratégie, le profil de risque et l'environnement réglementaire de la Société.</p>
                            </div>
                            
                            <div class="border-l-4 border-finbright-cyan pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">La supervision de la mise en œuvre effective de la Politique et l'allocation des ressources nécessaires à son application.</p>
                            </div>
                            
                            <div class="border-l-4 border-yellow-500 pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">La revue périodique, au minimum annuelle, des rapports de risques et de conformité présentés par le Responsable du Contrôle Interne et de la Conformité (RCCI).</p>
                            </div>
                            
                            <div class="border-l-4 border-green-500 pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">La garantie que les personnes physiques dirigeant Fin'Bright satisfont en permanence aux conditions d'honorabilité et de compétence professionnelle exigées par les articles R548-2 et R548-3 du CMF, qui prévoient des exigences en termes de diplômes, d'expérience professionnelle ou de formation qualifiante [6, 7]. Le respect de ces conditions est un prérequis à l'immatriculation et à son renouvellement annuel auprès de l'ORIAS [2].</p>
                            </div>
                        </div>
                    </div>

                    <!-- RCCI -->
                    <div class="mb-8">
                        <div class="bg-finbright-cyan text-white rounded-lg p-6 mb-4">
                            <h4 class="text-xl font-bold mb-4"><i class="fas fa-shield-alt mr-3"></i>Le Responsable du Contrôle Interne et de la Conformité (RCCI)</h4>
                            <p class="mb-4">Fin'Bright désigne une personne physique, qui peut être un dirigeant ou un collaborateur dédié, en tant que Responsable du Contrôle Interne et de la Conformité (RCCI). Cette fonction est la cheville ouvrière du dispositif de gestion des risques. Le RCCI est responsable de la supervision et de la coordination de l'ensemble du cadre de risque et de conformité au quotidien. Ses missions principales sont les suivantes :</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                                <p class="text-blue-800"><i class="fas fa-cogs mr-2"></i>Définir, mettre en œuvre et maintenir les procédures de contrôle interne.</p>
                            </div>
                            
                            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                                <p class="text-green-800"><i class="fas fa-map mr-2"></i>Élaborer et tenir à jour la cartographie des risques de la Société.</p>
                            </div>
                            
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                                <p class="text-red-800"><i class="fas fa-ban mr-2"></i>Superviser le dispositif de Lutte Contre le Blanchiment de Capitaux et le Financement du Terrorisme (LCB-FT), y compris l'analyse des opérations suspectes et la relation avec TRACFIN.</p>
                            </div>
                            
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                                <p class="text-yellow-800"><i class="fas fa-balance-scale mr-2"></i>Gérer la politique de prévention des conflits d'intérêts et tenir le registre correspondant.</p>
                            </div>
                            
                            <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                                <p class="text-purple-800"><i class="fas fa-search mr-2"></i>Assurer une veille réglementaire active pour adapter les procédures de la Société aux évolutions législatives et aux positions des autorités de contrôle.</p>
                            </div>
                            
                            <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded">
                                <p class="text-indigo-800"><i class="fas fa-chart-bar mr-2"></i>Produire et présenter des rapports réguliers à l'organe de direction sur l'état des risques, les incidents survenus et le niveau de conformité de la Société.</p>
                            </div>
                        </div>
                        
                        <div class="bg-orange-50 border-l-4 border-orange-400 p-4 mt-4 rounded">
                            <p class="text-orange-800 font-semibold"><i class="fas fa-graduation-cap mr-2"></i>Exigences de compétence :</p>
                            <p class="text-orange-700">Le RCCI doit impérativement justifier des compétences professionnelles requises par la réglementation, que ce soit par un diplôme pertinent, une expérience professionnelle adéquate ou une formation spécifique d'au moins 80 heures [6, 7].</p>
                        </div>
                    </div>

                    <!-- Équipes Opérationnelles -->
                    <div class="mb-8">
                        <div class="bg-green-500 text-white rounded-lg p-6 mb-4">
                            <h4 class="text-xl font-bold mb-4"><i class="fas fa-users mr-3"></i>Les Équipes Opérationnelles</h4>
                            <p class="mb-4">Chaque collaborateur de Fin'Bright constitue la première ligne de défense du dispositif de gestion des risques. Les équipes opérationnelles (analystes crédit, service client, développeurs) ont la responsabilité d'appliquer les procédures définies dans la présente Politique dans le cadre de leurs tâches quotidiennes. Cela inclut :</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-green-500 pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600"><i class="fas fa-calculator mr-2"></i>L'application rigoureuse des critères et des modèles de scoring pour l'évaluation des demandes de prêt.</p>
                            </div>
                            
                            <div class="border-l-4 border-blue-500 pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600"><i class="fas fa-phone mr-2"></i>Le respect des scripts et des procédures de recouvrement amiable.</p>
                            </div>
                            
                            <div class="border-l-4 border-red-500 pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600"><i class="fas fa-exclamation-triangle mr-2"></i>L'identification et l'escalade immédiate au RCCI de toute anomalie, incident, opération atypique ou situation de conflit d'intérêts potentiel.</p>
                            </div>
                            
                            <div class="border-l-4 border-yellow-500 pl-6 bg-gray-50 p-4 rounded">
                                <p class="text-gray-600"><i class="fas fa-chalkboard-teacher mr-2"></i>La participation active aux formations obligatoires en matière de LCB-FT, de cybersécurité et de protection des données.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dispositif de Contrôle Interne -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-search-plus mr-3 text-finbright-purple"></i>1.2. Dispositif de Contrôle Interne et Cartographie des Risques
                    </h3>
                    
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6 mb-6">
                        <p class="text-blue-800">
                            Le contrôle interne de Fin'Bright est structuré selon le modèle reconnu des "trois lignes de maîtrise", qui permet une répartition claire des rôles et une couverture complète des risques.
                        </p>
                    </div>

                    <!-- Modèle des Trois Lignes -->
                    <div class="mb-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-layer-group mr-2 text-finbright-cyan"></i>Le Modèle des Trois Lignes de Maîtrise
                        </h4>
                        
                        <div class="space-y-4">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg p-4">
                                <h5 class="font-semibold mb-2"><i class="fas fa-users mr-2"></i>Première Ligne de Maîtrise</h5>
                                <p>Les équipes opérationnelles qui sont propriétaires des risques et responsables de leur gestion au quotidien.</p>
                            </div>
                            
                            <div class="bg-gradient-to-r from-finbright-cyan to-blue-600 text-white rounded-lg p-4">
                                <h5 class="font-semibold mb-2"><i class="fas fa-shield-alt mr-2"></i>Deuxième Ligne de Maîtrise</h5>
                                <p>La fonction RCCI, qui établit les politiques, fournit une expertise, surveille la conformité et challenge la première ligne.</p>
                            </div>
                            
                            <div class="bg-gradient-to-r from-finbright-purple to-purple-600 text-white rounded-lg p-4">
                                <h5 class="font-semibold mb-2"><i class="fas fa-search mr-2"></i>Troisième Ligne de Maîtrise</h5>
                                <p>L'audit indépendant (interne ou externe), qui réalise des contrôles périodiques pour fournir à l'organe de direction une assurance objective sur l'efficacité des deux premières lignes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cartographie des Risques -->
                    <div class="mb-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-map mr-2 text-red-500"></i>La Cartographie des Risques
                        </h4>
                        
                        <div class="bg-gray-50 rounded-lg p-6 mb-6">
                            <p class="text-gray-600">
                                Fin'Bright maintient une cartographie des risques dynamique, documentée et revue au minimum une fois par an par le RCCI et validée par l'organe de direction. Cet outil central permet d'avoir une vision consolidée de l'exposition aux risques de la Société. La méthodologie de la cartographie est la suivante :
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                                <h5 class="font-semibold text-red-800 mb-2"><i class="fas fa-search mr-2"></i>Identification des Risques</h5>
                                <p class="text-red-700">Un recensement systématique de tous les risques potentiels est effectué, couvrant les catégories majeures : risque de crédit, risque opérationnel (incluant le risque informatique et de cybersécurité), risque de non-conformité, risque stratégique et risque de réputation.</p>
                            </div>
                            
                            <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded">
                                <h5 class="font-semibold text-orange-800 mb-2"><i class="fas fa-chart-line mr-2"></i>Évaluation des Risques</h5>
                                <p class="text-orange-700">Chaque risque identifié est évalué selon deux axes : sa probabilité d'occurrence et son impact potentiel (financier, réglementaire, réputationnel, opérationnel).</p>
                            </div>
                            
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                                <h5 class="font-semibold text-yellow-800 mb-2"><i class="fas fa-sort-amount-down mr-2"></i>Cotation et Hiérarchisation</h5>
                                <p class="text-yellow-700">Une matrice de cotation (par exemple, une échelle de 1 à 5 pour chaque axe) est utilisée pour calculer un niveau de criticité pour chaque risque. Cela permet de hiérarchiser les risques et de concentrer les efforts sur les plus significatifs.</p>
                            </div>
                            
                            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                                <h5 class="font-semibold text-green-800 mb-2"><i class="fas fa-tasks mr-2"></i>Plan de Maîtrise</h5>
                                <p class="text-green-700">Pour chaque risque jugé significatif (criticité élevée ou moyenne), un plan de maîtrise est élaboré. Ce plan décrit les mesures de mitigation existantes ou à mettre en place, désigne un responsable pour chaque action et fixe des échéances de mise en œuvre.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Politique de Prévention et de Gestion des Conflits d'Intérêts -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-balance-scale mr-3 text-finbright-purple"></i>1.3. Politique de Prévention et de Gestion des Conflits d'Intérêts
                    </h3>
                    
                    <div class="bg-purple-50 border-l-4 border-purple-400 p-6 mb-6">
                        <p class="text-purple-800">
                            La prévention et la gestion des conflits d'intérêts sont essentielles pour garantir l'impartialité des décisions de Fin'Bright et maintenir la confiance des utilisateurs. La Société met en place une politique stricte pour identifier et gérer ces situations.
                        </p>
                    </div>

                    <!-- Identification des Conflits -->
                    <div class="mb-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-exclamation-triangle mr-2 text-red-500"></i>Identification des Conflits Potentiels
                        </h4>
                        
                        <div class="bg-gray-50 rounded-lg p-6 mb-6">
                            <p class="text-gray-600 mb-4">
                                Un conflit d'intérêts peut survenir lorsque les intérêts personnels d'un collaborateur, d'un dirigeant ou d'un actionnaire de Fin'Bright interfèrent, ou semblent interférer, avec les intérêts de la Société ou de ses utilisateurs. Les situations potentielles incluent, sans s'y limiter :
                            </p>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                                <p class="text-red-700"><i class="fas fa-user-tie mr-2"></i>Un dirigeant, un collaborateur ou un de leurs proches sollicite un prêt</p>
                            </div>
                            
                            <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded">
                                <p class="text-orange-700"><i class="fas fa-chart-line mr-2"></i>La structure de rémunération des analystes crédit pourrait les inciter à approuver des dossiers plus risqués pour atteindre des objectifs de volume.</p>
                            </div>
                            
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                                <p class="text-yellow-700"><i class="fas fa-handshake mr-2"></i>Un actionnaire de Fin'Bright cherche à obtenir un financement pour un projet personnel via la plateforme.</p>
                            </div>
                            
                            <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                                <p class="text-purple-700"><i class="fas fa-star mr-2"></i>L'octroi d'un traitement préférentiel (taux, rapidité d'analyse) à certains projets ou utilisateurs en raison de liens personnels ou professionnels.</p>
                            </div>
                        </div>
                        
                        <div class="bg-blue-100 border border-blue-300 rounded-lg p-4 mt-6">
                            <p class="text-blue-800">
                                <i class="fas fa-info-circle mr-2"></i><strong>Remarque</strong> : il est à noter que le Président, les actionnaires, et l'ensemble du personnel sont autorisés à être prêteurs dans les mêmes conditions que les prêteurs externes à Fin'Bright.
                            </p>
                        </div>
                    </div>

                    <!-- Mesures de Gestion -->
                    <div class="mb-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-shield-alt mr-2 text-green-500"></i>Mesures de Gestion et de Mitigation
                        </h4>
                        
                        <div class="bg-gray-50 rounded-lg p-6 mb-6">
                            <p class="text-gray-600">
                                Pour gérer ces situations, Fin'Bright met en œuvre les mesures suivantes :
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                                <h5 class="font-semibold text-green-800 mb-2"><i class="fas fa-eye mr-2"></i>Transparence</h5>
                                <p class="text-green-700">Toute participation d'un collaborateur, dirigeant ou actionnaire de Fin'Bright (ou d'une partie liée) qui souhaitent être prêteurs peut l'être dans les mêmes conditions que les prêteurs externes, sans favoritisme.</p>
                            </div>
                            
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                                <h5 class="font-semibold text-blue-800 mb-2"><i class="fas fa-user-times mr-2"></i>Procédure de Récusation</h5>
                                <p class="text-blue-700">Tout collaborateur ou dirigeant ayant un intérêt personnel direct ou indirect dans une demande de prêt doit se récuser et ne participer à aucune étape du processus d'analyse, de scoring ou de décision concernant ce dossier.</p>
                            </div>
                            
                            <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                                <h5 class="font-semibold text-purple-800 mb-2"><i class="fas fa-book mr-2"></i>Registre des Conflits d'Intérêts</h5>
                                <p class="text-purple-700">Le RCCI tient un registre officiel, confidentiel et sécurisé, dans lequel sont consignés tous les conflits d'intérêts potentiels ou avérés identifiés, ainsi que les mesures prises pour les gérer et les atténuer. Ce registre est présenté périodiquement à l'organe de direction.</p>
                            </div>
                            
                            <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded">
                                <h5 class="font-semibold text-orange-800 mb-2"><i class="fas fa-graduation-cap mr-2"></i>Formation</h5>
                                <p class="text-orange-700">Tous les collaborateurs sont formés à l'identification des situations de conflit d'intérêts et à la procédure de déclaration.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Conclusion -->
                    <div class="bg-gradient-to-r from-finbright-purple to-purple-600 text-white rounded-lg p-6">
                        <p class="text-white">
                            <i class="fas fa-check-circle mr-2"></i>Cette approche structurée de la gouvernance n'est pas une simple formalité administrative. Elle constitue la base sur laquelle repose la confiance des régulateurs, comme l'ACPR, qui accordent une importance primordiale à l'honorabilité et à la compétence des dirigeants comme premier rempart contre les risques. En formalisant les rôles, les processus de contrôle et les politiques, Fin'Bright crée un cadre auditable et résilient, capable de s'adapter à sa croissance tout en garantissant une gestion saine et conforme de ses activités.
                        </p>
                    </div>
                </div>

            <!-- Section 2 : Gestion du Risque de Crédit et de Défaillance -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">SECTION 2 : GESTION DU RISQUE DE CRÉDIT ET DE DÉFAILLANCE</span>
                </h2>
                
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <p class="text-gray-600">
                        La gestion du risque de crédit est au cœur du modèle d'affaires de Fin'Bright. Elle repose sur une sélection rigoureuse des emprunteurs et une gestion proactive des incidents de paiement, afin de protéger les intérêts des prêteurs et d'assurer la viabilité de la plateforme. La politique de Fin'Bright reconnaît la dichotomie fondamentale entre ses deux produits et met en place des processus d'évaluation distincts et spécialisés pour chacun.
                    </p>
                </div>

                <!-- Principes Généraux de la Politique d'Octroi -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-hand-holding-usd mr-3 text-finbright-cyan"></i>2.1. Principes Généraux de la Politique d'Octroi
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="bg-finbright-purple text-white rounded-lg p-4">
                            <h4 class="font-semibold mb-2"><i class="fas fa-balance-scale mr-2"></i>Respect Impératif des Seuils Réglementaires</h4>
                            <p>Les opérations de prêt respectent strictement les plafonds définis par l'article D548-1 du CMF. Le système d'information intègre des contrôles automatisés pour garantir qu'aucun prêt onéreux ne dépasse 2 000 euros par prêteur et par projet, que la durée de remboursement n'excède pas sept ans, et que le montant total emprunté par un porteur de projet ne dépasse pas un million d'euros.</p>
                        </div>
                        
                        <div class="bg-finbright-cyan text-white rounded-lg p-4">
                            <h4 class="font-semibold mb-2"><i class="fas fa-file-alt mr-2"></i>Information Précontractuelle et Avertissement sur les Risques</h4>
                            <p>Avant toute souscription, une fiche d'information standardisée est fournie à l'emprunteur, détaillant le montant, la durée, le taux d'intérêt, le TAEG, le coût total du crédit et un tableau d'amortissement. Un avertissement clair sur les risques de surendettement et les conséquences d'un défaut de paiement est inclus, avec une attestation formelle de prise de connaissance.</p>
                        </div>
                        
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <h4 class="font-semibold text-yellow-800 mb-2"><i class="fas fa-check-circle mr-2"></i>Vérification de la Finalité Non-Commerciale</h4>
                            <p class="text-yellow-700">Chaque emprunteur déclare sur l'honneur que les fonds ne sont pas destinés à une activité commerciale. Fin'Bright effectue des contrôles de plausibilité pour garantir la cohérence de cette déclaration.</p>
                        </div>
                    </div>
                </div>

                <!-- Procédure de Sélection et d'Évaluation - Prêt Étudiant -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-graduation-cap mr-3 text-finbright-cyan"></i>2.2. Procédure de Sélection et d'Évaluation - Prêt Étudiant
                    </h3>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <p class="text-gray-600">
                            Le prêt étudiant sans caution ni garant représente un risque élevé, compensé par une sélection rigoureuse basée sur un modèle de scoring prédictif évaluant la capacité de remboursement future.
                        </p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                            <h4 class="font-semibold text-blue-800 mb-2"><i class="fas fa-user-check mr-2"></i>Critères d'Éligibilité Stricts</h4>
                            <p class="text-blue-700">Être une personne physique, majeure, résidant fiscalement en France, et fournir une preuve d'admission ou d'inscription dans une grande école ou université française présélectionnée par Fin'Bright, basée sur les classements et les taux d'insertion professionnelle.</p>
                        </div>
                        
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                            <h4 class="font-semibold text-green-800 mb-2"><i class="fas fa-id-card mr-2"></i>Justificatifs Obligatoires</h4>
                            <p class="text-green-700">Copie d'une pièce d'identité, justificatif de domicile de moins de trois mois, et attestation de scolarité ou d'admission.</p>
                        </div>
                        
                        <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                            <h4 class="font-semibold text-purple-800 mb-2"><i class="fas fa-chart-line mr-2"></i>Méthodologie de Scoring Prédictif</h4>
                            <p class="text-purple-700">Un score propriétaire évalue le potentiel de revenus futurs, basé sur des données externes (classements, salaires moyens). Le score détermine l'éligibilité et le taux d'intérêt (5% à 6%). Un score insuffisant entraîne un refus automatique.</p>
                        </div>
                    </div>
                </div>

                <!-- Procédure de Sélection et d'Évaluation - Mini Prêt Court -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-coins mr-3 text-finbright-cyan"></i>2.3. Procédure de Sélection et d'Évaluation - Mini Prêt Court
                    </h3>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <p class="text-gray-600">
                            Le mini prêt court évalue la solvabilité immédiate via une approche technologique basée sur l'Open Banking, garantissant une analyse rapide et fiable.
                        </p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                            <h4 class="font-semibold text-blue-800 mb-2"><i class="fas fa-user-check mr-2"></i>Critères d'Éligibilité</h4>
                            <p class="text-blue-700">Être une personne physique majeure, résidant en France, titulaire d'un compte bancaire personnel dans un établissement français.</p>
                        </div>
                        
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                            <h4 class="font-semibold text-green-800 mb-2"><i class="fas fa-database mr-2"></i>Méthodologie de Scoring via Open Banking</h4>
                            <p class="text-green-700">Avec le consentement explicite de l'emprunteur (conforme RGPD), Fin'Bright accède via un PSIC agréé ACPR à l'historique bancaire (90 à 180 jours). L'algorithme analyse les données transactionnelles pour évaluer la capacité de remboursement immédiate.</p>
                        </div>
                        
                        <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                            <h4 class="font-semibold text-purple-800 mb-2"><i class="fas fa-shield-alt mr-2"></i>Sécurité et Conformité</h4>
                            <p class="text-purple-700">Les données sont agrégées de manière sécurisée via une API, avec un accès en lecture seule. Le processus respecte les normes de protection des données et garantit la confidentialité.</p>
                        </div>
                    </div>
                </div>

                <!-- Gestion des Incidents de Paiement -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-exclamation-triangle mr-3 text-finbright-cyan"></i>2.4. Gestion des Incidents de Paiement
                    </h3>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <p class="text-gray-600">
                            Fin'Bright met en place un processus proactif pour gérer les incidents de paiement, minimisant les pertes pour les prêteurs et maintenant la confiance dans la plateforme.
                        </p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                            <h4 class="font-semibold text-red-800 mb-2"><i class="fas fa-bell mr-2"></i>Détection Précoce</h4>
                            <p class="text-red-700">Un système automatisé de suivi des remboursements identifie tout retard de paiement dès le premier jour. Une alerte est envoyée à l'emprunteur (par e-mail et SMS) avec un rappel des obligations contractuelles.</p>
                        </div>
                        
                        <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded">
                            <h4 class="font-semibold text-orange-800 mb-2"><i class="fas fa-phone mr-2"></i>Recouvrement Amiable</h4>
                            <p class="text-orange-700">En cas de retard persistant (au-delà de 7 jours), une procédure de recouvrement amiable est déclenchée, incluant des relances téléphoniques et des plans de remboursement adaptés proposés par l'équipe du service client.</p>
                        </div>
                        
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <h4 class="font-semibold text-yellow-800 mb-2"><i class="fas fa-gavel mr-2"></i>Recouvrement Judiciaire</h4>
                            <p class="text-yellow-700">Si le recouvrement amiable échoue après 30 jours, Fin'Bright engage un partenaire externe spécialisé pour initier une procédure judiciaire. Les prêteurs sont informés de l'évolution du dossier via la plateforme.</p>
                        </div>
                        
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                            <h4 class="font-semibold text-green-800 mb-2"><i class="fas fa-file-alt mr-2"></i>Reporting et Transparence</h4>
                            <p class="text-green-700">Un tableau de bord accessible aux prêteurs fournit des statistiques agrégées sur les taux de défaut et les performances de recouvrement, renforçant la transparence et la confiance.</p>
                        </div>
                    </div>
                </div>

                <!-- Protection des Prêteurs -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-shield-alt mr-3 text-finbright-cyan"></i>2.5. Protection des Prêteurs
                    </h3>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <p class="text-gray-600">
                            La protection des prêteurs est une priorité absolue. Fin'Bright met en œuvre des mesures spécifiques pour minimiser leur exposition au risque de crédit.
                        </p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                            <h4 class="font-semibold text-blue-800 mb-2"><i class="fas fa-divide mr-2"></i>Diversification des Investissements</h4>
                            <p class="text-blue-700">Les prêteurs sont encouragés à répartir leurs fonds sur plusieurs projets pour réduire l'impact d'un éventuel défaut. La plateforme propose une fonctionnalité de répartition automatique des fonds.</p>
                        </div>
                        
                        <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                            <h4 class="font-semibold text-purple-800 mb-2"><i class="fas fa-info-circle mr-2"></i>Information Transparente</h4>
                            <p class="text-purple-700">Chaque projet financé est accompagné d'une fiche descriptive détaillant le profil de l'emprunteur, le score de risque, et les caractéristiques du prêt, permettant aux prêteurs de prendre des décisions éclairées.</p>
                        </div>
                        
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                            <h4 class="font-semibold text-green-800 mb-2"><i class="fas fa-lock mr-2"></i>Gestion Sécurisée des Fonds</h4>
                            <p class="text-green-700">Les fonds des prêteurs sont gérés via un compte séquestre auprès d'un établissement bancaire agréé, garantissant leur sécurité et leur traçabilité.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conclusion -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">CONCLUSION</span>
                </h2>
                
                <div class="bg-gradient-to-r from-finbright-purple to-purple-600 text-white rounded-lg p-6">
                    <p class="text-white">
                        <i class="fas fa-check-circle mr-2"></i>La politique de gestion des risques de Fin'Bright constitue le socle de son engagement envers la sécurité, la conformité et la confiance. En combinant une gouvernance robuste, des processus d'évaluation rigoureux et une gestion proactive des incidents, Fin'Bright garantit la protection de ses utilisateurs et la pérennité de ses activités. Ce cadre, auditable et évolutif, est conçu pour répondre aux exigences réglementaires tout en s'adaptant aux évolutions du marché et aux attentes de nos parties prenantes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection