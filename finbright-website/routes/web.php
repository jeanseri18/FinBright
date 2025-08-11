<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestisseurController;
use App\Http\Controllers\Emprunteur\EmprunteurController;
use App\Http\Controllers\Emprunteur\LoanRequestController;
use App\Http\Controllers\Investisseur\InvestmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Gestion extinctive
Route::get('/gestion-extinctive', [PageController::class, 'extinctiveManagement'])->name('extinctive-management');

// Niveaux de risque
Route::get('/niveaux-risque', [PageController::class, 'riskLevels'])->name('risk-levels');

// Glossaire
Route::get('/glossaire', [PageController::class, 'glossary'])->name('glossary');

// Cadre juridique
Route::get('/cadre-juridique', [PageController::class, 'legalFramework'])->name('legal-framework');

/////////// Les Routes du Backend /////////

Route::prefix('emprunteur')->name('emprunteur.')->middleware(['auth', '2fa', 'profile.completed', 'role:emprunteur|admin'])->group(function () {
    Route::get('/', [EmprunteurController::class, 'index'])->name('dashboard');
    Route::post('/simulateur', [LoanRequestController::class, 'simulate'])->name('simuler');
    Route::post('/demande-de-pret', [LoanRequestController::class, 'soumettreDemande'])->name('demande');
    Route::get('/soumettre-une-demande', [LoanRequestController::class, 'create'])->name('create.demande');
    Route::get('/mes-demandes', [LoanRequestController::class, 'demandes'])->name('mes-demandes');

    // Annuler une demande
    Route::post('/demande-de-pret/{loan}/annuler', [LoanRequestController::class, 'annuler'])->name('loan-requests.annuler');
    // Modifier une demande (formulaire)
    Route::get('/demande-de-pret/{loan}/modifier', [LoanRequestController::class, 'edit'])->name('loan-requests.edit');
    // Modifier une demande (enregistrement)
    Route::post('/demande-de-pret/{loan}/modifier', [LoanRequestController::class, 'update'])->name('loan-requests.update');
});

Route::prefix('emprunteur')->name('emprunteur.')->middleware(['auth', '2fa', 'role:emprunteur|admin'])->group(function () {
    Route::get('/mon-profil', [EmprunteurController::class, 'profil'])->name('mon-profil');
    Route::post('/mon-profil/general', [EmprunteurController::class, 'updateProfil'])->name('profil.general.update');
    Route::post('/mon-profil/adresse', [EmprunteurController::class, 'updateAdresse'])->name('profil.adresse.update');
    Route::post('/mon-profil/cursus', [EmprunteurController::class, 'updateCursus'])->name('profil.cursus.update');
    Route::post('/mon-profil/documents', [EmprunteurController::class, 'enregistrerDocuments'])->name('profil.documents.update');
    Route::post('/mon-profil/notifications', [EmprunteurController::class, 'notificationsPreference'])->name('profil.notifications.preferences');
    Route::post('/mon-profil/email', [EmprunteurController::class, 'updateEmail'])->name('profil.email.update');
    Route::post('/mon-profil/2fa', [EmprunteurController::class, 'twoFactorSetup'])->name('profil.2fa.setup');
    Route::post('/mon-profil/password', [EmprunteurController::class, 'updatePassword'])->name('profil.password.update');
    Route::delete('/mon-profil/supprimer', [EmprunteurController::class, 'deleteAccount'])->name('profil.delete');
    Route::get('/mon-profil/desactiver', [EmprunteurController::class, 'deactivateAccount'])->name('profil.deactivate');
    Route::get('/filieres/{diplome}', [EmprunteurController::class, 'filieresParDiplome']);

    Route::prefix('documents')->group(function () {
        Route::get('{id}/export', [EmprunteurController::class, 'exportDocument'])->name('profil.documents.export');
        Route::get('{id}/edit', [EmprunteurController::class, 'editDocument'])->name('profil.documents.edit');
        Route::delete('{id}', [EmprunteurController::class, 'deleteDocument'])->name('profil.documents.delete');
    });
});

Route::prefix('investisseur')->name('investisseur.')->middleware(['auth', '2fa', 'role:investisseur|admin'])->group(function () {
    Route::get('/', [InvestmentController::class, 'index'])->name('dashboard');
    Route::get('/decouverte-des-projets', [InvestmentController::class, 'decouvrir'])->name('decouvrir');
    Route::post('/contribuer/{loanRequest}', [InvestmentController::class, 'investir'])->name('investir');
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';

