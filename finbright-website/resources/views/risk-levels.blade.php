@extends('layouts.app')

@section('title', 'Niveaux de Risque - Fin\'Bright')

@section('content')
<div class="min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                <span class="bg-gradient-to-r from-finbright-purple to-finbright-cyan bg-clip-text text-transparent">
                    Niveaux de Risque des Étudiants
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Fin'Bright évalue le profil de risque de chaque étudiant pour proposer des rendements adaptés aux prêteurs
            </p>
        </div>

        <!-- Introduction -->
        <!-- <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-finbright-purple to-finbright-cyan rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Évaluation des Profils Étudiants</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Fin'Bright ne finance que les étudiants en master ou cycle ingénieur, ou les cadres en formation continue étant en emploi stable. 
                        Notre système d'évaluation prend en compte le niveau d'études, la filière choisie et les perspectives d'emploi pour déterminer 
                        le niveau de risque et proposer un rendement équitable aux prêteurs.
                    </p>
                </div>
            </div>
        </div> -->

        <!-- Tableau des niveaux de risque -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-finbright-purple to-finbright-cyan p-6">
                <h2 class="text-2xl font-bold text-white text-center">
                    <i class="fas fa-table mr-3"></i>
                    Grille des Niveaux de Risque et Rendements
                </h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">
                                <i class="fas fa-user-graduate mr-2 text-finbright-purple"></i>
                                Profil de Risque
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">
                                <i class="fas fa-list-ul mr-2 text-finbright-cyan"></i>
                                Caractéristiques Indicatives de l'Emprunteur
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900 uppercase tracking-wider">
                                <i class="fas fa-star mr-2 text-yellow-500"></i>
                                Score Fin'Bright
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900 uppercase tracking-wider">
                                <i class="fas fa-percentage mr-2 text-green-500"></i>
                                Rendement pour le Prêteur
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Profil A - Risque Faible -->
                        <tr class="hover:bg-green-50 transition-colors duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                        <span class="text-green-600 font-bold text-lg">A</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-semibold text-gray-900">Risque Faible</div>
                                        <div class="text-sm text-green-600 font-medium">Profil optimal</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="text-gray-900">
                                    <div class="font-medium mb-2">Étudiant d'un cursus d'1 an ou en dernière année (Master 2 ou Ingénieur 3<sup>ième</sup> année), et en Filière à forte demande</div>
                                    <div class="text-sm text-gray-600">
                                        <strong>Finance :</strong> Finance d'entreprise, Finance de marché, Banque d'investissement, Ingénierie Financière/<br>
                                        <strong>Conseil en Stratégie :</strong> Management Stratégique, Conseil en organisation/<br>
                                        <strong>Data Science & IA :</strong> Business Analytics, Data Science for Business, Stratégie IA, machine Learning/<br>
                                        <strong>Cybersécurité :</strong> Sécurité des systèmes d'information, Cyberdéfense/<br>
                                        <strong>Énergie, Aéronautique, Espace :</strong> Énergies durables, Ingénierie nucléaire, Systèmes aérospatiaux)
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    85 - 100
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <div class="text-2xl font-bold text-green-600">5,0 %</div>
                            </td>
                        </tr>

                        <!-- Profil B - Risque Moyen -->
                        <tr class="hover:bg-yellow-50 transition-colors duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                                        <span class="text-yellow-600 font-bold text-lg">B</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-semibold text-gray-900">Risque Moyen</div>
                                        <div class="text-sm text-yellow-600 font-medium">Profil équilibré</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="text-gray-900">
                                    <div class="font-medium mb-2">Étudiant en dernière année (Master 2 ou Ingénieur 3), et Filière à demande moyenne</div>
                                    <div class="text-sm text-gray-600">
                                        (cela concerne les filières qui ne sont pas listées dans le profil du risque A plus haut) par exemple : Marketing, Achat, RH, <em>etc</em>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    65 - 84
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <div class="text-2xl font-bold text-yellow-600">5,5 %</div>
                            </td>
                        </tr>

                        <!-- Profil C - Risque Fort -->
                        <tr class="hover:bg-red-50 transition-colors duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                                        <span class="text-red-600 font-bold text-lg">C</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-semibold text-gray-900">Risque Fort</div>
                                        <div class="text-sm text-red-600 font-medium">Profil à surveiller</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="text-gray-900">
                                    <div class="font-medium mb-2">Étudiant en Master 1 ou étudiant en ingénieur 1<sup>ère</sup> année et 2<sup>ème</sup> année, <u>quelque</u> soit la filière</div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    50 - 64
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <div class="text-2xl font-bold text-red-600">6,0 %</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Informations complémentaires -->
        <div class="grid md:grid-cols-2 gap-8 mt-8">
            <!-- Méthodologie -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-finbright-purple rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-cogs text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Méthodologie d'Évaluation</h3>
                </div>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-finbright-cyan mt-1 mr-2 flex-shrink-0"></i>
                        <span>Analyse du niveau d'études et de la progression académique</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-finbright-cyan mt-1 mr-2 flex-shrink-0"></i>
                        <span>Évaluation des perspectives d'emploi par filière</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-finbright-cyan mt-1 mr-2 flex-shrink-0"></i>
                        <span>Prise en compte de la demande du marché du travail</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-finbright-cyan mt-1 mr-2 flex-shrink-0"></i>
                        <span>Attribution d'un score Fin'Bright de 0 à 100</span>
                    </li>
                </ul>
            </div>

            <!-- Avantages -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-finbright-cyan rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Avantages du Système</h3>
                </div>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <i class="fas fa-star text-yellow-500 mt-1 mr-2 flex-shrink-0"></i>
                        <span>Transparence totale sur les critères d'évaluation</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-star text-yellow-500 mt-1 mr-2 flex-shrink-0"></i>
                        <span>Rendements adaptés au niveau de risque</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-star text-yellow-500 mt-1 mr-2 flex-shrink-0"></i>
                        <span>Équité pour tous les acteurs de la plateforme</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-star text-yellow-500 mt-1 mr-2 flex-shrink-0"></i>
                        <span>Sélection rigoureuse des profils étudiants</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Avertissement -->
        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-400 p-6 mt-8 rounded-r-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-xl"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-semibold text-yellow-800 mb-2">Avertissement Important</h3>
                    <p class="text-yellow-700">
                        Les rendements indiqués sont des estimations basées sur l'analyse des profils. Tout investissement comporte des risques, 
                        y compris le risque de perte en capital. Les performances passées ne préjugent pas des performances futures. 
                        Il est recommandé de diversifier ses investissements et de ne pas investir plus que ce que l'on peut se permettre de perdre.
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="text-center mt-12">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Questions sur l'Évaluation des Risques ?</h3>
                <p class="text-gray-600 mb-6">
                    Notre équipe est à votre disposition pour vous expliquer notre méthodologie d'évaluation et répondre à vos questions.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-finbright-purple to-finbright-cyan text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-envelope mr-2"></i>
                    Nous Contacter
                </a>
            </div>
        </div>
    </div>
</div>
@endsection