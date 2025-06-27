@extends('layouts.app')

@section('title', 'FAQ - Questions fréquentes | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Questions <span class="text-finbright-cyan">Fréquentes</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Trouvez rapidement les réponses à vos questions sur le fonctionnement de Fin'Bright.
        </p>
    </div>
</section>

<!-- Section FAQ -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Questions Générales -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                <span class="text-finbright-purple">Questions</span> Générales
            </h2>
            
            <div class="space-y-6">
                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq1')">
                        <span class="text-lg font-semibold text-gray-900">Qu'est-ce que Fin'Bright ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq1"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq1">
                        <p class="text-gray-600">Fin'Bright est une plateforme de financement participatif qui met en relation des porteurs de projets avec des investisseurs. Nous permettons aux entreprises et particuliers de lever des fonds pour leurs projets tout en offrant aux investisseurs des opportunités de placement attractives.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq2')">
                        <span class="text-lg font-semibold text-gray-900">Comment fonctionne la plateforme ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq2"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq2">
                        <p class="text-gray-600">Les porteurs de projets soumettent leur demande de financement après validation de leur dossier. Les investisseurs peuvent alors consulter les projets disponibles et choisir ceux dans lesquels ils souhaitent investir. Une fois l'objectif de financement atteint, les fonds sont débloqués au porteur de projet.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq3')">
                        <span class="text-lg font-semibold text-gray-900">Fin'Bright est-elle réglementée ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq3"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq3">
                        <p class="text-gray-600">Oui, Fin'Bright est agréée par l'ACPR (Autorité de Contrôle Prudentiel et de Résolution) et respecte toutes les réglementations françaises et européennes en matière de financement participatif, notamment les directives MiFID II et le RGPD.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Questions Investisseurs -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                Pour les <span class="text-finbright-cyan">Investisseurs</span>
            </h2>
            
            <div class="space-y-6">
                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq4')">
                        <span class="text-lg font-semibold text-gray-900">Quel est le montant minimum d'investissement ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq4"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq4">
                        <p class="text-gray-600">Le montant minimum d'investissement est de 20€ par projet. Cela permet à tous les profils d'investisseurs de participer et de diversifier leurs placements.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq5')">
                        <span class="text-lg font-semibold text-gray-900">Quels sont les rendements attendus ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq5"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq5">
                        <p class="text-gray-600">Les rendements varient selon les projets et leur profil de risque, généralement entre 4% et 12% par an. Le rendement moyen sur notre plateforme est actuellement de 9,5%. Attention, tout investissement comporte des risques.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq6')">
                        <span class="text-lg font-semibold text-gray-900">Comment sont sélectionnés les projets ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq6"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq6">
                        <p class="text-gray-600">Chaque projet est analysé par notre équipe d'experts qui évalue la viabilité du business plan, la solidité financière du porteur de projet, et les garanties proposées. Seuls les projets validés sont publiés sur la plateforme.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq7')">
                        <span class="text-lg font-semibold text-gray-900">Puis-je récupérer mon investissement avant l'échéance ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq7"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq7">
                        <p class="text-gray-600">Les investissements sont généralement bloqués jusqu'à l'échéance du projet. Cependant, nous développons un marché secondaire qui permettra aux investisseurs de revendre leurs parts à d'autres investisseurs.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq8')">
                        <span class="text-lg font-semibold text-gray-900">Y a-t-il des frais pour les investisseurs ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq8"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq8">
                        <p class="text-gray-600">L'inscription et la consultation des projets sont gratuites. Nous prélevons une commission de 1% sur les gains générés par vos investissements, uniquement en cas de succès.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Questions Emprunteurs -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                Pour les <span class="text-finbright-purple">Emprunteurs</span>
            </h2>
            
            <div class="space-y-6">
                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq9')">
                        <span class="text-lg font-semibold text-gray-900">Quels types de projets peuvent être financés ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq9"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq9">
                        <p class="text-gray-600">Nous finançons une large gamme de projets : création ou développement d'entreprise, projets immobiliers, innovations technologiques, projets environnementaux, et bien d'autres. Chaque projet est étudié individuellement.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq10')">
                        <span class="text-lg font-semibold text-gray-900">Quels sont les montants de financement possibles ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq10"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq10">
                        <p class="text-gray-600">Nous finançons des projets de 5 000€ à 500 000€. Le montant dépend de la nature du projet, de sa viabilité et des garanties proposées.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq11')">
                        <span class="text-lg font-semibold text-gray-900">Combien de temps prend l'analyse d'un dossier ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq11"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq11">
                        <p class="text-gray-600">L'analyse complète d'un dossier prend généralement entre 5 et 10 jours ouvrés, selon la complexité du projet et la qualité du dossier fourni.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq12')">
                        <span class="text-lg font-semibold text-gray-900">Quels sont les frais pour les emprunteurs ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq12"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq12">
                        <p class="text-gray-600">Nous prélevons une commission de 3% du montant financé, uniquement en cas de succès de la collecte. Aucun frais n'est facturé en cas d'échec du financement.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq13')">
                        <span class="text-lg font-semibold text-gray-900">Que se passe-t-il si l'objectif de financement n'est pas atteint ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq13"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq13">
                        <p class="text-gray-600">Si l'objectif de financement n'est pas atteint dans les délais impartis, tous les fonds sont automatiquement remboursés aux investisseurs. Aucun frais n'est prélevé au porteur de projet.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Questions Sécurité -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                <span class="text-finbright-cyan">Sécurité</span> & Confidentialité
            </h2>
            
            <div class="space-y-6">
                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq14')">
                        <span class="text-lg font-semibold text-gray-900">Comment mes données personnelles sont-elles protégées ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq14"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq14">
                        <p class="text-gray-600">Toutes vos données sont cryptées et stockées sur des serveurs sécurisés. Nous respectons strictement le RGPD et ne partageons jamais vos informations personnelles avec des tiers sans votre consentement explicite.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq15')">
                        <span class="text-lg font-semibold text-gray-900">Comment sont sécurisés les paiements ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq15"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq15">
                        <p class="text-gray-600">Tous les paiements sont traités par Stripe, leader mondial du paiement en ligne. Vos informations bancaires ne transitent jamais par nos serveurs et sont protégées par les plus hauts standards de sécurité.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFaq('faq16')">
                        <span class="text-lg font-semibold text-gray-900">Que faire en cas de problème avec un investissement ?</span>
                        <i class="fas fa-chevron-down text-finbright-purple transform transition-transform" id="icon-faq16"></i>
                    </button>
                    <div class="hidden px-6 pb-4" id="faq16">
                        <p class="text-gray-600">Notre équipe de support est disponible pour vous accompagner. En cas de litige, nous disposons de procédures de médiation et travaillons avec des partenaires juridiques spécialisés pour protéger vos intérêts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Contact -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-white mb-6">
            Vous ne trouvez pas votre réponse ?
        </h2>
        <p class="text-xl text-white mb-8">
            Notre équipe support est là pour vous aider. Contactez-nous directement.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-finbright-cyan text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-cyan transition-colors">
                <i class="fas fa-envelope mr-2"></i>
                Nous contacter
            </button>
            <button class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-finbright-purple transition-colors">
                <i class="fas fa-phone mr-2"></i>
                Demander un rappel
            </button>
        </div>
    </div>
</section>

<script>
function toggleFaq(faqId) {
    const content = document.getElementById(faqId);
    const icon = document.getElementById('icon-' + faqId);
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>
@endsection