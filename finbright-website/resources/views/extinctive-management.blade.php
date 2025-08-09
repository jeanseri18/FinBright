
@extends('layouts.app')

@section('title', 'Gestion Extinctive - Fin\'Bright')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- En-tête -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                <i class="fas fa-shield-alt text-blue-600 mr-3"></i>
                Gestion Extinctive
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Vos investissements sont sécurisés, quoi qu'il arrive
            </p>
        </div>

        <!-- Contenu principal -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8 lg:p-12">

                <!-- Introduction -->
                <div class="mb-8">
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-r-lg mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-question-circle text-blue-500 text-xl mr-3 mt-1"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900 mb-2">Qu'est-ce que la gestion extinctive ?</h3>
                                <p class="text-blue-800">
                                    La gestion extinctive est un plan réglementaire qui garantit que vos investissements se poursuivent jusqu'à leur terme, même en cas d'arrêt de notre activité.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Explication -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-cogs text-blue-600 mr-3"></i>
                        Comment ça fonctionne
                    </h2>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Si notre plateforme devait cesser ses activités, notre partenaire spécialisé dans les paiements prendrait automatiquement la suite. Sa mission : assurer que les remboursements des projets que vous avez financés se poursuivent normalement, jusqu'à la dernière échéance.
                        </p>
                        <div class="bg-white p-4 rounded-lg border-l-4 border-blue-500">
                            <p class="text-gray-700">
                                <strong>Résultat :</strong> Vous recevez vos fonds (nets des frais de gestion) sans aucune interruption.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Frais de gestion -->
                <div class="mb-8">
                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-lg">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-yellow-500 text-xl mr-3 mt-1"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-yellow-900 mb-2">Frais de gestion</h3>
                                <p class="text-yellow-800">
                                    Notre partenaire prélève une commission d'un faible pourcentage sur les flux de remboursement pour couvrir ce service.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sécurité garantie -->
                <div class="mb-8">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <div class="text-center">
                            <i class="fas fa-check-circle text-green-600 text-3xl mb-4"></i>
                            <h3 class="text-xl font-bold text-green-900 mb-2">Sécurité garantie</h3>
                            <p class="text-green-800 text-lg">
                                C'est une sécurité essentielle que nous vous devons.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-8 rounded-lg text-center">
                    <h2 class="text-2xl font-bold mb-4">
                        <i class="fas fa-envelope mr-3"></i>
                        Une question sur la gestion extinctive ?
                    </h2>
                    <p class="text-blue-100 mb-6">
                        Notre équipe est à votre disposition pour toute question sur la sécurité de vos investissements.
                    </p>
                    <div class="space-y-2">
                        <p class="flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <a href="mailto:contact@finbright.fr" class="hover:text-blue-200 transition-colors">
                                contact@finbright.fr
                            </a>
                        </p>
                        <!-- <p class="flex items-center justify-center">
                            <i class="fas fa-phone mr-2"></i>
                            <span>01 23 45 67 89</span>
                        </p> -->
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
```