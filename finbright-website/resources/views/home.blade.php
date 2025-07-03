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
                    Fin'Bright est une fintech et une edtech qui permet aux étudiants talentueux, admis dans les plus prestigieuses grandes écoles et universités, de financer leurs études supérieures. Elle permet également aux particuliers, ayant des difficultés à obtenir un crédit de dépannage, d'obtenir des mini-prêts courts pour répondre à leurs besoins urgents. En investissant avec Fin'Bright, vous obtenez un rendement financier conséquent, et un gain social pour avoir contribué à réduire l'inégalité et l'injustice sociale. Notre impact social est indéniable. Notre mission est de démocratiser le prêt étudiant non garanti pour les plus talentueux, et de démocratiser les prêts d'urgence.
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
                    De façon innovante via notre plateforme de financement participatif des étudiants brillants, 
                    et de ceux qui sont exclus des prêts courts des sociétés de financement traditionnelles.
                </p>
                
                <div class=" p-6 rounded-xl mb-8 shadow-sm"  style="background: #EDF7FFFF;">
                    <p class="text-gray-700 leading-relaxed">
                        Fin'Bright est une fintech et edtech qui permet aux étudiants talentueux, admis dans les plus prestigieuses grandes écoles et universités, de financer leurs études supérieures.
                        Elle aide aussi les particuliers ayant des difficultés à obtenir un crédit à accéder à des mini-prêts d’urgence.
                        <br><br>
                        En investissant avec Fin'Bright, vous obtenez un rendement financier conséquent, 
                        et un gain social pour avoir contribué à réduire l’inégalité. Notre mission est de démocratiser le prêt étudiant non garanti et les crédits d'urgence pour ceux qui en ont vraiment besoin.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                        Financer un projet personnel
                    </button>
                    <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                        Demander un prêt
                    </button>
                </div>
            </div>

            <!-- Image illustrative -->
            <div class="relative">
                <img src="/images/homefirstsection.jpg" alt="Étudiants brillants & fintech" class="rounded-xl w-full shadow-md object-cover h-[630px] md:h-[630px]" />
              
            </div>
        </div>
    </div>

    <!-- Background illustration optionnelle -->
    <div class="absolute top-0 right-0 w-72 opacity-10 hidden md:block">
        <img src="/images/bg-illustration.svg" alt="Illustration fintech" class="w-full" />
    </div>
</section>

<!-- Nos Services Section avec image -->
<section class=" py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Nos services</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Prêt étudiant brillant</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
            
            <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mini crédit court instantané</h3>
                <p class="text-gray-600">Via nos partenaires bancaires</p>
            </div>
            
            <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mini prêt court</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
            
            <div class="text-center p-6  rounded-xl"  style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Dons</h3>
                <p class="text-gray-600">Via le financement participatif</p>
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
                    <h3 class="text-2xl font-bold text-gray-900">Pour les emprunteurs</h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Inscription et création de profil</h4>
                            <p class="text-gray-600">Créez votre compte et complétez votre profil</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Soumission d'une demande de prêt</h4>
                            <p class="text-gray-600">Présentez votre projet personnel ou besoin de financement</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-cyan rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Réception des fonds</h4>
                            <p class="text-gray-600">Après validation et financement par la communauté</p>
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
                    <h3 class="text-2xl font-bold text-gray-900">Pour les investisseurs</h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Inscription et création de profil</h4>
                            <p class="text-gray-600">Rejoignez notre communauté d'investisseurs</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Choix des projets à financer</h4>
                            <p class="text-gray-600">Sélectionnez les projets qui vous inspirent</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-finbright-purple rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Perception de remboursements</h4>
                            <p class="text-gray-600">Recevez capital, intérêts et impact social</p>
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
                <p class="text-gray-600">Contribuez à réduire les inégalités en finançant l'éducation et l'inclusion financière</p>
            </div>
            
            <div class="text-center p-8  rounded-xl shadow-lg" style="background: #faf6ee;">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Rendements attractifs</h3>
                <p class="text-gray-600">Des opportunités d'investissement avec des rendements financiers conséquents</p>
            </div>
        </div>
    </div>
</section>

<!-- Écoles Prestigieuses Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Écoles et Universités Partenaires</h2>
            <p class="text-xl text-gray-600">Nous finançons les étudiants des plus prestigieuses institutions</p>
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
            <div  style="background: white;" class="flex flex-col items-center p-4  rounded-lg">
                <div class="h-16 w-16 bg-finbright-purple rounded-full flex items-center justify-center mb-2">
                    <i class="fas fa-plus text-white text-xl"></i>
                </div>
                <span class="text-black font-semibold text-sm text-center">Et bien d'autres...</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Finale Section -->
<section class=" py-20" style="background: linear-gradient( #B803C9FF 20%, #790384 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8">Rejoignez Fin'Bright</h2>
            <p class="text-xl text-white mb-12 max-w-4xl mx-auto">
                Rejoindre Fin'Bright, c'est faire partie d'une communauté d'investisseurs et d'emprunteurs qui croient en l'avenir et en l'entraide. Que vous souhaitiez soutenir des étudiants brillants ou obtenir un financement pour vos projets de mini crédit court personnels (non commercial), notre plateforme est faite pour vous. Rejoignez-nous dès maintenant et agissez pour un futur plus solidaire et responsable.
            </p>
            
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