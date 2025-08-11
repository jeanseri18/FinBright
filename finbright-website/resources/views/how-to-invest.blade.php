@extends('layouts.app')

@section('title', 'Investir - Fin\'Bright')

@section('content')
<!-- Section Investissement avec image à droite -->
<section class=" py-20"  >
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      
      <!-- Texte à gauche -->
      <div class="text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
          Valorisez votre épargne, créez un impact durable 
        </h1>
        <p class="text-xl md:text-2xl text-gray-600 mb-8">
         Fin'Bright vous offre l’opportunité d’investir directement dans des projets à fort impact social : le financement d’étudiants brillants admis dans les plus prestigieuses grandes écoles et universités. 
 En tant que particulier, association ou fondation, vous pouvez soutenir ces talents tout en percevant un rendement compétitif et en contribuant à un avenir plus équitable. 
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
          <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
            Voir les projets à financer
          </button>
          <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
            Commencer à investir
          </button>
        </div>
      </div>

      <!-- Image à droite -->
      <div>
        <img src="/images/multiracial-group-of-university-students-in-the-cl-2024-12-13-18-34-41-utc.jpg" alt="Investissement étudiant" class="rounded-2xl shadow-lg w-full object-cover h-[400px] md:h-[500px]" />
      </div>

    </div>
  </div>
</section>


<!-- Comment ça marche Section -->
<section class=" py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Comment ça marche ?</h2>
            <p class="text-xl text-white">Un processus simple et sécurisé en 6 étapes</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Étape 1 -->
            <div  style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Inscription</h3>
                </div>
                <p class="text-gray-600">
Inscrivez-vous et complétez votre profil investisseur (particulier, association ou fondation) en quelques minutes.                </p>
            </div>
            
            <!-- Étape 2 -->
            <div  style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Approvisionnement</h3>
                </div>
                <p class="text-gray-600">
                  Alimentez votre compte via un transfert sécurisé.
                </p>
            </div>
            
            <!-- Étape 3 -->
            <div  style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Sélection</h3>
                </div>
                <p class="text-gray-600">
                    Parcourez les profils d’étudiants brillants et choisissez ceux que vous souhaitez financer selon vos préférences (montant, durée, domaine d’études, etc.). L’investissement peut se faire manuellement ou en auto-investissement. 
                </p>
            </div>
            
            <!-- Étape 4 -->
            <div  style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Investissement</h3>
                </div>
                <p class="text-gray-600">
 Investissez à partir de 100 euros et diversifiez votre impact en soutenant plusieurs parcours académiques.    <br><br>      <br><br> </p> </div>
            
            <!-- Étape 5 -->
            <div  style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-purple rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">5</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Suivi</h3>
                </div>
                <p class="text-gray-600">
                   Suivez vos engagements et l’évolution des étudiants financés via votre tableau de bord personnel. 
             <br><br>  <br><br> </p>
            </div>
            
            <!-- Étape 6 -->
            <div  style="background: #faf6ee;" class=" p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-finbright-cyan rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">6</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Remboursements</h3>
                </div>
                <p class="text-gray-600">
                    Percevez les remboursements mensuels (capital et intérêts) selon les conditions définies, directement sur votre compte.
              <br><br> <br><br> </p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi investir avec Fin'Bright Section -->
<section class=" py-20" >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Pourquoi investir avec Fin'Bright ?</h2>
            <p class="text-xl text-gray-600">Des avantages uniques pour vos investissements</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Avantage 1 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Impact social</h3>
                <p class="text-gray-600">
                    Soutenir l'excellence éducative.
                </p>
            </div>
            
            <!-- Avantage 2 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Rendements attractifs</h3>
                <p class="text-gray-600">
                    Générer des rendements financiers réguliers et compétitifs.
                </p>
            </div>
            
            <!-- Avantage 3 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sécurité totale</h3>
                <p class="text-gray-600">
                    Plateforme 100% sécurisée et transparente.
                </p>
            </div>
            
            <!-- Avantage 4 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-layer-group text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Diversification simple</h3>
                <p class="text-gray-600">
                    Diversification simple de votre portefeuille.
                </p>
            </div>
            
            <!-- Avantage 5 -->
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-user-tie text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Accompagnement personnalisé</h3>
                <p class="text-gray-600">
                    Accompagnement personnalisé et assistance dédiée.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Types d'investissement Section -->
<section class=" py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Types d'investissement</h2>
            <p class="text-xl text-gray-600">Choisissez un investissement à impact éducatif </p>
        </div>
        
        <div class="grid md:grid-cols-1 gap-8">
            <!-- Prêts étudiants -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-university text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Prêts Étudiants d’Excellence</h3>
                        <p class="text-finbright-purple font-semibold">Rendement : 5-6 %</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    Prêt sans caution ni garant pour financer les études d'étudiants brillants.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Durée de remboursement : 2 à 7 ans</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Différé partiel pendant la durée des études + 3 à 6 mois après diplomation </li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Rendement pour les prêteurs : 5 à 6 % selon le niveau de risque du profil</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-purple mr-2"></i> Investissement limité à 2000 euros par projet pour chaque prêteur (chaque prêteur peut
financer plusieurs projets)</li>
                </ul>
            </div>
            
            <!-- Mini prêts courts -->
            <!-- <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Mini prêts courts</h3>
                        <p class="text-finbright-cyan font-semibold">Rendement : 10-11 %</p>
                    </div> 
                </div>
                <p class="text-gray-600 mb-6">
                    Soutenez des particuliers pour leurs besoins urgents avec des prêts de courte durée.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-finbright-cyan mr-2"></i> Montant du prêt : 100 à 800 euros</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-cyan mr-2"></i> Durée de remboursement : 3 à 6 mois maximum</li>
                    <li class="flex items-center"><i class="fas fa-check text-finbright-cyan mr-2"></i> Rendement pour les prêteurs : 10 - 11 %</li>
                </ul>
            </div>
        </div> -->
    </div>
</section>

<!-- CTA Finale Section -->
<section class=" py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8">
                Commencez à investir dès aujourd'hui
            </h2>

            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Créer mon compte investisseur
                </button>
                <button class="bg-white text-finbright-purple px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                    Découvrir les projets
                </button>
            </div>
        </div>
    </div>
</section>
@endsection