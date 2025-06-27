// Simulateur de financement Fin'Bright
class FinancingSimulator {
    constructor() {
        this.initializeSimulator();
    }

    initializeSimulator() {
        // Créer le modal du simulateur
        this.createSimulatorModal();
        
        // Attacher les événements
        this.attachEvents();
    }

    createSimulatorModal() {
        const modalHTML = `
            <div id="simulator-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-screen overflow-y-auto">
                        <div class="p-8">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-3xl font-bold text-gray-900">Simulateur de Financement</h2>
                                <button id="close-simulator" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-times text-2xl"></i>
                                </button>
                            </div>
                            
                            <form id="simulator-form" class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Montant souhaité (€)</label>
                                    <input type="number" id="amount" min="1000" max="500000" step="1000" value="50000" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent">
                                    <div class="text-sm text-gray-500 mt-1">Entre 1 000€ et 500 000€</div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Durée du prêt (mois)</label>
                                    <select id="duration" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent">
                                        <option value="12">12 mois</option>
                                        <option value="24" selected>24 mois</option>
                                        <option value="36">36 mois</option>
                                        <option value="48">48 mois</option>
                                        <option value="60">60 mois</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Type de projet</label>
                                    <select id="project-type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-finbright-purple focus:border-transparent">
                                        <option value="personal">Personnel</option>
                                        <option value="business" selected>Professionnel</option>
                                        <option value="real-estate">Immobilier</option>
                                        <option value="green">Projet vert</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="w-full bg-finbright-purple text-white py-4 rounded-lg text-lg font-semibold hover:bg-finbright-dark-purple transition-colors">
                                    <i class="fas fa-calculator mr-2"></i>
                                    Calculer ma simulation
                                </button>
                            </form>
                            
                            <div id="simulation-results" class="hidden mt-8 p-6 bg-gray-50 rounded-xl">
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Résultats de votre simulation</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white p-4 rounded-lg">
                                        <div class="text-sm text-gray-600">Taux d'intérêt estimé</div>
                                        <div id="interest-rate" class="text-2xl font-bold text-finbright-purple">-</div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg">
                                        <div class="text-sm text-gray-600">Mensualité</div>
                                        <div id="monthly-payment" class="text-2xl font-bold text-finbright-cyan">-</div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg">
                                        <div class="text-sm text-gray-600">Coût total du crédit</div>
                                        <div id="total-cost" class="text-2xl font-bold text-gray-900">-</div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg">
                                        <div class="text-sm text-gray-600">Montant total à rembourser</div>
                                        <div id="total-amount" class="text-2xl font-bold text-gray-900">-</div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <button class="bg-finbright-cyan text-white px-8 py-3 rounded-lg font-semibold hover:bg-finbright-light-cyan transition-colors">
                                        <i class="fas fa-file-alt mr-2"></i>
                                        Faire une demande
                                    </button>
                                </div>
                                
                                <div class="mt-4 text-xs text-gray-500 text-center">
                                    * Simulation indicative. Les taux définitifs dépendent de l'analyse de votre dossier.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', modalHTML);
    }

    attachEvents() {
        // Boutons pour ouvrir le simulateur
        document.addEventListener('click', (e) => {
            if (e.target.closest('button') && e.target.closest('button').textContent.includes('Simuler')) {
                e.preventDefault();
                this.openSimulator();
            }
        });

        // Fermer le simulateur
        document.getElementById('close-simulator').addEventListener('click', () => {
            this.closeSimulator();
        });

        // Fermer en cliquant à l'extérieur
        document.getElementById('simulator-modal').addEventListener('click', (e) => {
            if (e.target.id === 'simulator-modal') {
                this.closeSimulator();
            }
        });

        // Soumettre le formulaire
        document.getElementById('simulator-form').addEventListener('submit', (e) => {
            e.preventDefault();
            this.calculateSimulation();
        });

        // Recalculer en temps réel
        ['amount', 'duration', 'project-type'].forEach(id => {
            document.getElementById(id).addEventListener('input', () => {
                if (document.getElementById('simulation-results').classList.contains('hidden') === false) {
                    this.calculateSimulation();
                }
            });
        });
    }

    openSimulator() {
        document.getElementById('simulator-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    closeSimulator() {
        document.getElementById('simulator-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    calculateSimulation() {
        const amount = parseFloat(document.getElementById('amount').value);
        const duration = parseInt(document.getElementById('duration').value);
        const projectType = document.getElementById('project-type').value;

        // Calcul des taux selon le type de projet
        let baseRate;
        switch (projectType) {
            case 'personal':
                baseRate = 0.08; // 8%
                break;
            case 'business':
                baseRate = 0.06; // 6%
                break;
            case 'real-estate':
                baseRate = 0.04; // 4%
                break;
            case 'green':
                baseRate = 0.05; // 5% (taux préférentiel)
                break;
            default:
                baseRate = 0.07;
        }

        // Ajustement selon la durée
        const durationMultiplier = 1 + (duration - 24) * 0.001;
        const finalRate = baseRate * durationMultiplier;

        // Calculs financiers
        const monthlyRate = finalRate / 12;
        const monthlyPayment = (amount * monthlyRate * Math.pow(1 + monthlyRate, duration)) / 
                              (Math.pow(1 + monthlyRate, duration) - 1);
        const totalAmount = monthlyPayment * duration;
        const totalCost = totalAmount - amount;

        // Affichage des résultats
        document.getElementById('interest-rate').textContent = (finalRate * 100).toFixed(2) + '%';
        document.getElementById('monthly-payment').textContent = monthlyPayment.toFixed(0) + '€';
        document.getElementById('total-cost').textContent = totalCost.toFixed(0) + '€';
        document.getElementById('total-amount').textContent = totalAmount.toFixed(0) + '€';

        // Afficher les résultats
        document.getElementById('simulation-results').classList.remove('hidden');
    }
}

// Initialiser le simulateur quand le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
    new FinancingSimulator();
});