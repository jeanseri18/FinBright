@extends('layouts.app')

@section('title', 'Accueil - Fin\'Bright')

@section('content')
<!-- Hero Section
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Nous faisons fructifier votre épargne, pour vous, comme vous n'en avez jamais vu ailleurs
        
                Et de façon innovante via notre plateforme de financement participatif des étudiants brillants, 
                et de ceux qui sont exclus des prêts courts des sociétés de financement traditionnelles
</h1>
            
            <div class="bg-gray-50 p-8 rounded-xl mb-12 max-w-5xl mx-auto">
                <p class="text-lg text-gray-700 leading-relaxed">
                    Fin'Bright est une fintech et une edtech qui permet aux étudiants talentueux, admis dans les plus prestigieuses grandes écoles et universités, de financer leurs études supérieures. Elle permet également aux particuliers, ayant des difficultés à obtenir un crédit de dépannage, d'obtenir des mini prêts courts pour répondre à leurs besoins urgents. En investissant avec Fin'Bright, vous obtenez un rendement financier conséquent, et un gain social pour avoir contribué à réduire l'inégalité et l'injustice sociale. Notre impact social est indéniable. Notre mission est de démocratiser le prêt étudiant non garanti pour les plus talentueux, et de démocratiser les prêts d'urgence.
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                    Financer un projet personnel
                </button>
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Demander un prêt
                </button>
            </div>
        </div>
    </div>
</section> -->


<!-- Hero Section améliorée -->
<section class=" py-20 relative overflow-hidden"  style="background: #faf6ee;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            <!-- Texte principal -->
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Nous faisons fructifier votre épargne comme jamais auparavant.
                </h1>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
De façon innovante, via notre plateforme dédiée au financement des étudiants brillants, notamment ceux exclus des prêts classiques. En investissant avec Fin’Bright, vous obtenez un rendement financier parmi les meilleurs, et un gain social pour avoir contribué à réduire l’inégalité et l’injustice sociales. Notre impact social est indéniable.               
                </p>
                
            


                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                        Financer un Etudiant
                    </button>
                    <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                        Demander un prêt
                    </button>
                </div>
            </div>

            <!-- Image illustrative -->
            <div class="relative">
                <img src="/images/happy-multiethnic-business-team-smiling-together-i-2025-04-10-11-25-25-utc.jpg" alt="Étudiants brillants & fintech" class="rounded-xl w-full shadow-md object-cover h-[300px] sm:h-[400px] md:h-[430px] lg:h-[500px] xl:h-[630px]" />
            </div>
        </div>
    </div>

    <!-- Background illustration optionnelle -->
    <!-- <div class="absolute top-0 right-0 w-72 opacity-10 hidden md:block">
       <img src="/images/bg-illustration.svg" alt="Illustration fintech" class="w-full" /> -->
    <!-- </div>  -->
</section>
<!-- <section class=" py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Nos produits</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Prêt étudiant brillant</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
                 <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mini prêt court</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
           
            
       
            
            <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Dons</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>

             <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mini crédit court instantané</h3>
                <p class="text-gray-600">Via nos partenaires bancaires</p>
            </div>
        </div>
    </div>
</section> -->
<!-- Nos Services Section avec image -->
<section class="py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Notre offre: Le Prêt Étudiant d'Excellence</h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="text-center p-8 rounded-xl" style="background: #faf6ee;">
                <div class="text-lg text-gray-700 leading-relaxed space-y-4">
                    <p>Le Prêt Étudiant d'Excellence est une solution simple, inclusive et responsable pour financer les études supérieures des jeunes brillants à fort potentiel.</p>
                    
                    <p>Conçu pour offrir à chacun une chance équitable d'accéder à l'enseignement supérieur, ce prêt repose sur des modalités claires, des taux accessibles, et un accompagnement sur mesure.</p>
                    
                    <div class="bg-blue-50 p-4 rounded-lg mt-6">
                        <p class="text-sm text-blue-800"><strong>NB:</strong> Les prêteurs peuvent décider de faire un prêt à taux zéro pour les étudiants qu'ils financent ou les soutenir par un don sans contrepartie.</p>
                    </div>
                    
                    <p class="mt-6">Par ailleurs, FinBright sert de plateforme sécurisée permettant aux fondations et partenaires engagés dans l'éducation de financer directement nos étudiants talentueux.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comment ça marche Section avec illustration -->
<section class=" py-20"  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-black mb-4">Comment ça marche ?</h2>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Pour les emprunteurs -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hand-holding-usd text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Pour les étudiants (emprunteurs) </h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Inscription et création de profil</h4>
                            <p class="text-gray-600"> Créez votre compte sur la plateforme et complétez votre profil avec vos informations personnelles, académiques et financières.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Simulation et estimation de capacité de remboursement</h4>
                            <p class="text-gray-600"> Utilisez notre simulateur pour estimer le montant du prêt qui correspond à votre situation</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Soumission d'une demande de prêt</h4>
                            <p class="text-gray-600"> Déposez votre dossier en expliquant vos besoins de financement et vos ambitions académiques. </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Validation et réception des fonds</h4>
                            <p class="text-gray-600"> Après analyse et validation par FinBright, votre prêt est financé par un ou plusieurs prêteurs, puis versé selon les modalités prévues. </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pour les investisseurs -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Pour les prêteurs (investisseurs solidaires) </h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Inscription et création de profil</h4>
                            <p class="text-gray-600"> Rejoignez la plateforme et indiquez vos préférences d’investissement solidaire. </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Évaluation de votre capacité à prêter ou donner</h4>
                            <p class="text-gray-600"> Déterminez le montant que vous souhaitez investir ou donner, en fonction de vos objectifs et de vos moyens.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900"> Choix des projets à soutenir</h4>
                            <p class="text-gray-600"> Sélectionnez les profils d’étudiants que vous souhaitez financer, via un prêt à taux réduit, un prêt à taux zéro ou un don sans contrepartie.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900"> Suivi et remboursement</h4>
                            <p class="text-gray-600"> Recevez les remboursements selon les conditions prévues ou suivez simplement l’évolution de l’étudiant si vous avez opté pour un don.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi choisir Fin'Bright Section -->
<section class="bg-gray-50 py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Pourquoi choisir Fin'Bright ?</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8  rounded-xl shadow-lg" style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Transparence et sécurité</h3>
                <p class="text-gray-600">Une plateforme sécurisée avec une transparence totale sur tous les investissements et prêts</p>
            </div>
            
            <div class="text-center p-8  rounded-xl shadow-lg" style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-hands-helping text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Impact social concret</h3>
                <p class="text-gray-600">Contribuez à réduire les inégalités en finançant l'excellence éducative et l'inclusion financière</p>
            </div>
            
            <div class="text-center p-8  rounded-xl shadow-lg" style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Rendements attractifs</h3>
                <p class="text-gray-600">Des opportunités d'investissement avec des rendements financiers parmi les meilleurs</p>
            </div>
        </div>
    </div>
</section>

<!-- Écoles Prestigieuses Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Écoles et Universités Partenaires</h2>
            <p class="text-xl text-gray-600 mb-4">Nous facilitons le financement des étudiants talentueux admis dans les institutions prestigieuses ci-dessous.</p>
            <!-- <p class="text-xl text-gray-600">Nous finançons les étudiants des plus prestigieuses institutions</p> -->
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <!-- INSEAD -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/insead.jpg') }}" alt="INSEAD" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">INSEAD</span>
            </div>
            
            <!-- HEC Paris -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/HEC Paris.webp') }}" alt="HEC Paris" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">HEC Paris</span>
            </div>
            
            <!-- ESSEC -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/ESSEC.webp') }}" alt="ESSEC" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">ESSEC</span>
            </div>
            
            <!-- ESCP -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/ESCP.jpg') }}" alt="ESCP" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">ESCP</span>
            </div>
            
            <!-- EM Lyon -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/EM Lyon.png') }}" alt="EM Lyon" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">EM Lyon</span>
            </div>
            
            <!-- EDHEC -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/logo-edhec-transparent.png') }}" alt="EDHEC" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">EDHEC</span>
            </div>
            
            <!-- Polytechnique X -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/Polytechnique X.webp') }}" alt="Polytechnique X" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">Polytechnique X</span>
            </div>
            
            <!-- Paris-Dauphine -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/Paris-Dauphine.webp') }}" alt="Paris-Dauphine" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">Paris-Dauphine</span>
            </div>
            
            <!-- École des Mines -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/École des Mines.webp') }}" alt="École des Mines" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">École des Mines</span>
            </div>
            
            <!-- Ponts ParisTech -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/pont paris Tech.webp') }}" alt="Ponts ParisTech" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">Ponts ParisTech</span>
            </div>
            
            <!-- Sciences Po -->
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg hover:shadow-md transition-shadow">
                <img src="{{ asset('images/Sciences Po.webp') }}" alt="Sciences Po" class="h-16 w-auto object-contain mb-2">
                <span class="text-black font-semibold text-sm text-center">Sciences Po Paris</span>
            </div>
            
            <!-- Et bien d'autres -->
           
        </div>
    </div>
</section>

<!-- CTA Finale Section -->
<section class=" py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8">Rejoignez Fin'Bright</h2>
            <p class="text-xl text-white mb-12 max-w-4xl mx-auto">
Rejoindre Fin'Bright, c’est intégrer une communauté de prêteurs solidaires et d'étudiants ambitieux unis par une même vision.  Que vous souhaitiez financer des talents ou bénéficier d’un prêt pour vos études, notre plateforme vous permet d’agir concrètement pour un avenir plus juste, solidaire et responsable.           
         Rejoignez-nous dès aujourd’hui.    </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Je m'inscris pour financer
                </button>
                <button class="bg-white text-finbright-purple px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                    Je m'inscris pour emprunter
                </button>
            </div>
        </div>
    </div>
</section>
@endsection