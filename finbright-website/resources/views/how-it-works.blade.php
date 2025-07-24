@extends('layouts.app')

@section('title', 'Emprunter - Fin\'Bright')

@section('content')
<!-- Hero Section améliorée avec image -->
<section class="bg-white py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            <!-- Bloc gauche : Texte -->
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Obtenez un prêt pour financer vos études supérieures ou votre projet de mini prêt court
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-600 mb-10 max-w-xl">
                    Sur Fin'Bright, accédez à un financement simple, rapide et sécurisé. Que vous soyez étudiant admis dans une grande école ou université prestigieuse, ou encore un particulier, nous avons une solution pour vous.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                        Soumettre mon projet personnel
                    </button>
                </div>
            </div>

            <!-- Bloc droit : Image -->
            <div class="relative">
                <img src="/images/portrait-jeune-etudiant-afro-americain-male-porter-sac-epaule-et-livres-main-tenir-contre-batiment-universite.jpg" alt="Étudiants accédant à un prêt" class="rounded-xl shadow-lg w-full object-cover h-[400px] md:h-[500px]" />
                
            </div>
        </div>
    </div>

    <!-- Background shape décoratif -->

</section>


<!-- Le Processus Section -->
<section class=" py-20"  style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white  mb-4">Le processus</h2>
            <p class="text-xl text-white">Un parcours simple et transparent en 6 étapes</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Étape 1 -->
            <div style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
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
            <div style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
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
            <div style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Soumission</h3>
                </div>
                <p class="text-gray-600">
                    Préparez et soumettez votre demande en téléversant les justificatifs requis (admission, revenus potentiels pour les étudiants ou avérés, pièce d'identité, etc.).
                </p>
            </div>
            
            <!-- Étape 4 -->
            <div style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
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
            <div style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
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
            <div style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">6</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Déblocage</h3>
                </div>
                <p class="text-gray-600">
                    Une fois l'objectif du montant atteint, les fonds sont débloqués rapidement et versés à l'école pour les étudiants et sur le compte du particulier pour les mini prêts courts. Vous commencez à rembourser selon les conditions définies.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Critères d'éligibilité Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Critères d'éligibilité</h2>
            <p class="text-xl text-gray-600">Vérifiez si vous remplissez les conditions pour emprunter</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Critère 1 -->
            <div class="text-center p-8 -50 rounded-xl" style="background: #EDF7FFFF;">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Profil éligible</h3>
                <p class="text-gray-600">
                    Être étudiant admis dans une grande école ou université prestigieuse (liste disponible sur notre site) ou un particulier justifiant de revenus stables.
                </p>
            </div>
            
            <!-- Critère 2 -->
            <div class="text-center p-8  rounded-xl" style="background: #EDF7FFFF;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Justificatifs requis</h3>
                <p class="text-gray-600">
                    Fournir tous les justificatifs nécessaires : lettre d'admission, pièce d'identité, justificatifs de revenus,etc.
                </p>
            </div>
            
            <!-- Critère 3 -->
            <div class="text-center p-8  rounded-xl" style="background: #EDF7FFFF;">
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
        <div class="mt-16  p-8 rounded-xl"  >
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Écoles et universités éligibles</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- INSEAD -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/insead.jpg') }}" alt="INSEAD" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">INSEAD</span>
                </div>
                
                <!-- HEC Paris -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/HEC Paris.webp') }}" alt="HEC Paris" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">HEC Paris</span>
                </div>
                
                <!-- ESSEC -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/ESSEC.webp') }}" alt="ESSEC" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">ESSEC</span>
                </div>
                
                <!-- ESCP -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/ESCP.jpg') }}" alt="ESCP" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">ESCP</span>
                </div>
                
                <!-- EM Lyon -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/EM Lyon.png') }}" alt="EM Lyon" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">EM Lyon</span>
                </div>
                
                <!-- EDHEC -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/logo-edhec-transparent.png') }}" alt="EDHEC" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">EDHEC</span>
                </div>
                
                <!-- Polytechnique X -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/Polytechnique X.webp') }}" alt="Polytechnique X" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">Polytechnique X</span>
                </div>
                
                <!-- Paris-Dauphine -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/Paris-Dauphine.webp') }}" alt="Paris-Dauphine" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">Paris-Dauphine</span>
                </div>
                
                <!-- École des Mines -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/École des Mines.webp') }}" alt="École des Mines" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">École des Mines</span>
                </div>
                
                <!-- Ponts ParisTech -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/pont paris Tech.webp') }}" alt="Ponts ParisTech" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">Ponts ParisTech</span>
                </div>
                
                <!-- Sciences Po Paris -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/Sciences Po.webp') }}" alt="Sciences Po Paris" class="h-16 w-auto object-contain mb-2">
                    <span class="text-black font-semibold text-sm text-center">Sciences Po Paris</span>
                </div>
                

            </div>
        </div>
    </div>
</section>

<!-- CTA Finale Section -->
<section class=" py-20"  style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8">
                Commencez votre demande de prêt dès aujourd'hui
            </h2>
            <p class="text-xl text-white mb-12 max-w-3xl mx-auto">
                Notre équipe vous accompagne à chaque étape.
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