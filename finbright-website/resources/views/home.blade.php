@extends('layouts.app')

@section('title', 'Fin\'Bright - Plateforme de Financement Participatif')

@section('content')
<!-- Section Héros -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                    Financez vos projets ou 
                    <span class="text-finbright-purple">investissez</span> 
                    dans l'avenir avec 
                    <span class="text-finbright-cyan">Fin'Bright</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Fin'Bright est une plateforme de prêt participatif innovante qui met en relation des porteurs de projets à la recherche de financement et des investisseurs souhaitant donner du sens à leur épargne.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="bg-finbright-purple text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                        <i class="fas fa-calculator mr-2"></i>
                        Simuler mon financement
                    </button>
                    <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                        <i class="fas fa-chart-line mr-2"></i>
                        Investir maintenant
                    </button>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md h-96 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-image text-6xl mb-4"></i>
                        <p class="text-lg">Image Hero</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Comment ça fonctionne -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Comment ça fonctionne ?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">1. Soumettez votre projet</h3>
                <p class="text-gray-600">
                    Créez un compte, décrivez votre projet et définissez vos besoins (montant, durée, échéancier).
                </p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">2. Faites-vous financer</h3>
                <p class="text-gray-600">
                    Votre projet est validé par notre équipe et mis en ligne. Des investisseurs peuvent y contribuer jusqu'à atteinte de l'objectif.
                </p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-calendar-check text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">3. Remboursez selon l'échéancier</h3>
                <p class="text-gray-600">
                    Une fois les fonds reçus, vous remboursez mensuellement ou selon les termes prévus.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Pourquoi investir -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex justify-center">
                <div class="w-full max-w-md h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-chart-pie text-6xl mb-4"></i>
                        <p class="text-lg">Graphique Investissement</p>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Donnez du sens à vos <span class="text-finbright-cyan">placements</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    En rejoignant Fin'Bright en tant qu'investisseur, vous soutenez des projets concrets, portés par des profils vérifiés, tout en percevant des intérêts. C'est l'opportunité d'un placement utile, transparent et encadré.
                </p>
                <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                    <i class="fas fa-user-plus mr-2"></i>
                    Créer un compte investisseur
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Section Chiffres clés -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">Nos chiffres clés</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-5xl font-bold text-finbright-cyan mb-2">150+</div>
                <p class="text-white text-lg">Projets financés</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-finbright-cyan mb-2">95%</div>
                <p class="text-white text-lg">Taux de remboursement</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-finbright-cyan mb-2">1000+</div>
                <p class="text-white text-lg">Investisseurs actifs</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-finbright-cyan mb-2">98%</div>
                <p class="text-white text-lg">Satisfaction utilisateurs</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Sécurité -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Une plateforme sûre et encadrée</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Transactions sécurisées</h3>
                <p class="text-gray-600">via Stripe</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Processus de validation</h3>
                <p class="text-gray-600">rigoureux</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-cyan rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-shield text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Respect du RGPD</h3>
                <p class="text-gray-600">et vérification KYC</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-finbright-purple rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Suivi transparent</h3>
                <p class="text-gray-600">des remboursements</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Témoignages -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Ils nous font confiance</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Marie Dupont</h4>
                        <p class="text-gray-600 text-sm">Porteuse de projet</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "Grâce à Fin'Bright, j'ai pu financer l'ouverture de ma boulangerie bio. Le processus était simple et transparent."
                </p>
            </div>
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Pierre Martin</h4>
                        <p class="text-gray-600 text-sm">Investisseur</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "J'investis sur Fin'Bright depuis 2 ans. Les rendements sont au rendez-vous et je soutiens des projets qui ont du sens."
                </p>
            </div>
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Sophie Leroy</h4>
                        <p class="text-gray-600 text-sm">Entrepreneuse</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "L'équipe Fin'Bright m'a accompagnée tout au long du processus. Un vrai partenaire pour mon développement."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA Final -->
<section class="bg-finbright-cyan py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-white mb-6">
            Prêt à donner vie à vos projets ?
        </h2>
        <p class="text-xl text-white mb-8">
            Rejoignez des milliers d'utilisateurs qui font confiance à Fin'Bright pour leurs projets de financement.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-finbright-cyan px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                Commencer maintenant
            </button>
            <button class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-finbright-cyan transition-colors">
                En savoir plus
            </button>
        </div>
    </div>
</section>
@endsection