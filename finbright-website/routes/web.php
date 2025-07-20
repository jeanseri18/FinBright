<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestisseurController;
use App\Http\Controllers\Emprunteur\EmprunteurController;
use App\Http\Controllers\Emprunteur\LoanRequestController;
use App\Http\Controllers\Investisseur\InvestmentController;

// Page d'accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Comment ça marche (pour les emprunteurs)
Route::get('/comment-emprunter', [PageController::class, 'howItWorks'])->name('how-it-works');

// Comment investir
Route::get('/comment-investir', [PageController::class, 'howToInvest'])->name('how-to-invest');

// À propos
Route::get('/a-propos', [PageController::class, 'about'])->name('about');

// FAQ
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// Mentions légales
Route::get('/mentions-legales', [PageController::class, 'legalMentions'])->name('legal-mentions');

// Politique de confidentialité
Route::get('/politique-confidentialite', [PageController::class, 'privacyPolicy'])->name('privacy-policy');

// Conditions d'utilisation
Route::get('/conditions-utilisation', [PageController::class, 'termsOfUse'])->name('terms-of-use');

// Politique de gestion des risques
Route::get('/politique-gestion-risques', [PageController::class, 'riskManagement'])->name('risk-management');

// Information sur les risques d'investissement
Route::get('/risques-investissement', [PageController::class, 'investmentRisks'])->name('investment-risks');


/////////// Les Routes du Backend /////////

Route::prefix('emprunteur')->name('emprunteur.')->middleware(['auth'])->group(function () {
    Route::get('/', [EmprunteurController::class, 'index'])->name('dashboard');
    Route::post('/simulateur', [LoanRequestController::class, 'simulate'])->name('simuler');
    Route::post('/demande-de-pret', [LoanRequestController::class, 'soumettreDemande'])->name('demande');
    Route::get('/mes-demandes', [LoanRequestController::class, 'demandes'])->name('mes-demandes');
    Route::get('/mon-profil', [LoanRequestController::class, 'profil'])->name('mon-profil');
    // Annuler une demande
    Route::post('/demande-de-pret/{loan}/annuler', [LoanRequestController::class, 'annuler'])->name('loan-requests.annuler');
    // Modifier une demande (formulaire)
    Route::get('/demande-de-pret/{loan}/modifier', [LoanRequestController::class, 'edit'])->name('loan-requests.edit');
    // Modifier une demande (enregistrement)
    Route::post('/demande-de-pret/{loan}/modifier', [LoanRequestController::class, 'update'])->name('loan-requests.update');
});

Route::prefix('investisseur')->name('investisseur.')->middleware(['auth'])->group(function () {
    Route::get('/', [InvestmentController::class, 'index'])->name('dashboard');
    Route::get('/decouverte-des-projets', [InvestmentController::class, 'decouvrir'])->name('decouvrir');
    Route::post('/contribuer/{loanRequest}', [InvestmentController::class, 'investir'])->name('investir');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Dashboard (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile utilisateur (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';