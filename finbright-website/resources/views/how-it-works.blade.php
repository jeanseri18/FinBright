@extends('layouts.app')

@section('title', 'Emprunter - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Obtenez un prêt pour financer vos études supérieures ou vos projets personnels
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-4xl mx-auto">
                Sur Fin'Bright, accédez à un financement simple, rapide et sécurisé. Que vous soyez étudiant admis dans une grande école ou université prestigieuse ou particulier, obtenez un soutien financier adapté à vos besoins.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                    Simuler mon prêt
                </button>
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Soumettre mon projet personnel
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Le Processus Section -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Le processus</h2>
            <p class="text-xl text-gray-600">Un parcours simple et transparent en 6 étapes</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Étape 1 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Simulation</h3>
                </div>
                <p class="text-gray-600">
                    Simulez votre besoin pour estimer le montant, la durée et vos capacités de remboursement.
                </p>
            </div>
            
            <!-- Étape 2 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Inscription</h3>
                </div>
                <p class="text-gray-600">
                    Créez un compte sécurisé et complétez votre profil avec vos informations personnelles et professionnelles.
                </p>
            </div>
            
            <!-- Étape 3 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Soumission</h3>
                </div>
                <p class="text-gray-600">
                    Préparez et soumettez votre demande en téléversant les justificatifs requis (admission, revenus potentiels pour les étudiants ou avérés, identité, etc.).
                </p>
            </div>
            
            <!-- Étape 4 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Validation</h3>
                </div>
                <p class="text-gray-600">
                    Notre équipe vérifie et valide votre dossier, puis le met en ligne pour financement.
                </p>
            </div>
            
            <!-- Étape 5 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">5</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Financement</h3>
                </div>
                <p class="text-gray-600">
                    Des investisseurs particuliers contribuent à votre projet personnel jusqu'à atteindre l'objectif fixé.
                </p>
            </div>
            
            <!-- Étape 6 -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">6</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Déblocage</h3>
                </div>
                <p class="text-gray-600">
                    Une fois l'objectif atteint, les fonds sont débloqués rapidement et versés à l'école pour les étudiants. Vous commencez à rembourser selon les conditions définies.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Critères d'éligibilité Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Critères d'éligibilité</h2>
            <p class="text-xl text-gray-600">Vérifiez si vous remplissez les conditions pour emprunter</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Critère 1 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Profil éligible</h3>
                <p class="text-gray-600">
                    Être étudiant admis dans une grande école ou université prestigieuse (liste disponible sur notre site) ou un particulier justifiant de revenus stables.
                </p>
            </div>
            
            <!-- Critère 2 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Justificatifs requis</h3>
                <p class="text-gray-600">
                    Fournir tous les justificatifs nécessaires : lettre d'admission, pièce d'identité, justificatifs de revenus.
                </p>
            </div>
            
            <!-- Critère 3 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Conditions générales</h3>
                <p class="text-gray-600">
                    Être majeur, résider en France ou dans un pays éligible et avoir un projet personnel clair et précis.
                </p>
            </div>
        </div>
        
        <!-- Liste des écoles -->
        <div class="mt-16 bg-gray-50 p-8 rounded-xl">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Écoles et universités éligibles</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 text-center">
                <div class="text-finbright-purple font-semibold">INSEAD</div>
                <div class="text-finbright-purple font-semibold">HEC Paris</div>
                <div class="text-finbright-purple font-semibold">ESSEC</div>
                <div class="text-finbright-purple font-semibold">ESCP</div>
                <div class="text-finbright-purple font-semibold">EM Lyon</div>
                <div class="text-finbright-purple font-semibold">EDHEC</div>
                <div class="text-finbright-purple font-semibold">Polytechnique X</div>
                <div class="text-finbright-purple font-semibold">Paris-Dauphine</div>
                <div class="text-finbright-purple font-semibold">École des Mines</div>
                <div class="text-finbright-purple font-semibold">Ponts ParisTech</div>
                <div class="text-finbright-purple font-semibold">Sciences Po Paris</div>
                <div class="text-finbright-purple font-semibold">Et bien d'autres...</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Finale Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">
                Commencez votre demande de prêt dès aujourd'hui
            </h2>
            <p class="text-xl text-white mb-12 max-w-3xl mx-auto">
                Rejoignez des milliers d'étudiants et de particuliers qui ont déjà fait confiance à Fin'Bright pour financer leurs projets. Notre équipe vous accompagne à chaque étape.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Commencer ma demande
                </button>
                <button class="bg-white text-finbright-purple px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                    Simuler mon prêt
                </button>
            </div>
        </div>
    </div>
</section>
@endsection