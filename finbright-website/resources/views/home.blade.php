@extends('layouts.app')

@section('title', 'Accueil - Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Nous faisons fructifier votre épargne, pour vous, comme vous n'en avez jamais vu ailleurs
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-4xl mx-auto">
                Et de façon innovante via notre plateforme de financement participatif des étudiants brillants, 
                et de ceux qui sont exclus des prêts courts des sociétés de financement traditionnelles
            </p>
            
            <div class="bg-gray-50 p-8 rounded-xl mb-12 max-w-5xl mx-auto">
                <p class="text-lg text-gray-700 leading-relaxed">
                    Fin'Bright est une fintech et une edtech qui permet aux étudiants talentueux, admis dans les plus prestigieuses grandes écoles et universités, de financer leurs études supérieures. Elle permet également aux particuliers, ayant des difficultés à obtenir un crédit de dépannage, d'obtenir des mini-prêts courts pour répondre à leurs besoins urgents. En investissant avec Fin'Bright, vous obtenez un rendement financier conséquent, et un gain social pour avoir contribué à réduire l'inégalité et l'injustice sociale. Notre impact social est indéniable. Notre mission est de démocratiser le prêt étudiant non garanti pour les plus talentueux, et de démocratiser les prêts d'urgence.
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                    Financer un projet
                </button>
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    Demander un prêt
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Comment ça marche Section -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Comment ça marche ?</h2>
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
                            <p class="text-gray-600">Présentez votre projet ou besoin de financement</p>
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

<!-- Nos Services Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nos services</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Prêt étudiant brillant</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mini crédit court instantané</h3>
                <p class="text-gray-600">Via nos partenaires bancaires</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mini prêt court</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Dons</h3>
                <p class="text-gray-600">Via le financement participatif</p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi choisir Fin'Bright Section -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pourquoi choisir Fin'Bright ?</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Transparence et sécurité</h3>
                <p class="text-gray-600">Une plateforme sécurisée avec une transparence totale sur tous les investissements et prêts</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-hands-helping text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Impact social concret</h3>
                <p class="text-gray-600">Contribuez à réduire les inégalités en finançant l'éducation et l'inclusion financière</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
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
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Écoles et Universités Partenaires</h2>
            <p class="text-xl text-gray-600">Nous finançons les étudiants des plus prestigieuses institutions</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">INSEAD</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">HEC Paris</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">ESSEC</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">ESCP</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">EM Lyon</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">EDHEC</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">Polytechnique X</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">Paris-Dauphine</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">École des Mines</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">Ponts ParisTech</div>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <div class="text-2xl font-bold text-finbright-purple mb-2">Sciences Po</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Finale Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">Rejoignez Fin'Bright</h2>
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