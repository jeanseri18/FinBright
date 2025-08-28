<?php

use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Investisseur\IbanController;
use App\Http\Controllers\Emprunteur\EmprunteurController;
use App\Http\Controllers\Emprunteur\LoanRequestController;
use App\Http\Controllers\Investisseur\InvestisseurController;
use App\Http\Controllers\Investisseur\InvestmentController;
use App\Http\Controllers\Investisseur\InvestorKycController;

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
    Route::get('/mon-profil', [EmprunteurController::class, 'profil'])->name('mon-profil');
    Route::get('/filieres/{diplome}', [EmprunteurController::class, 'filieresParDiplome']);
    Route::post('/mon-profil/cursus', [EmprunteurController::class, 'updateCursus'])->name('profil.cursus.update');
    
    Route::prefix('/demande-de-pret')->group(function () {
        Route::post('/simulateur', [LoanRequestController::class, 'simulate'])->name('simuler');
        Route::post('/creer-une-demande', [LoanRequestController::class, 'createDemande'])->name('create.demande');
        Route::post('/soumettre-une-demande/{loanId?}', [LoanRequestController::class, 'saveDemande'])->name('save.demande');
        Route::get('/mes-demandes', [LoanRequestController::class, 'demandes'])->name('mes-demandes');
        Route::get('/ma-demande/{loan?}', [LoanRequestController::class, 'details'])->name('loan-requests.details');
        Route::post('/{loan}/annuler', [LoanRequestController::class, 'annuler'])->name('loan-requests.annuler');
        Route::get('/{loan}/modification', [LoanRequestController::class, 'edit'])->name('loan-requests.edit');
    });
});

Route::prefix('mon-profil')->name('profil.')->middleware(['auth', '2fa', 'role:emprunteur|investisseur|admin'])->group(function () {
    Route::post('/general', [ProfilController::class, 'updateProfil'])->name('general.update');
    Route::post('/adresse', [ProfilController::class, 'updateAdresse'])->name('adresse.update');
    Route::post('/documents', [ProfilController::class, 'enregistrerDocuments'])->name('documents.update');
    Route::post('/notifications', [ProfilController::class, 'notificationsPreference'])->name('notifications.preferences');
    Route::post('/email', [ProfilController::class, 'updateEmail'])->name('email.update');
    Route::post('/2fa', [ProfilController::class, 'twoFactorSetup'])->name('2fa.setup');
    Route::post('/password', [ProfilController::class, 'updatePassword'])->name('password.update');
    Route::delete('/supprimer', [ProfilController::class, 'deleteAccount'])->name('delete');
    Route::get('/desactiver', [ProfilController::class, 'deactivateAccount'])->name('deactivate');

    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('{id}/export', [ProfilController::class, 'exportDocument'])->name('export');
        Route::get('{id}/edit', [ProfilController::class, 'editDocument'])->name('edit');
        Route::get('{id}', [ProfilController::class, 'deleteDocument'])->name('delete');
        Route::delete('{id}', [ProfilController::class, 'deleteDocument'])->name('delete');
    });
});

Route::prefix('investisseur')->name('investisseur.')->middleware(['auth', '2fa', 'role:investisseur|admin'])->group(function () {
    // KYC + IBAN
    Route::get('/kyc', [InvestorKycController::class, 'form'])->name('kyc.form');
    Route::post('/kyc', [InvestorKycController::class, 'store'])->name('kyc.store');

    Route::get('/iban', [IbanController::class, 'form'])->name('iban.form');
    Route::post('/iban', [IbanController::class, 'store'])->name('iban.store');

    Route::get('/mon-profil', [InvestisseurController::class, 'profil'])->name('profil');
    Route::post('/mon-profil/general', [InvestisseurController::class, 'updateLegalEntity'])->name('legalEntity.update');

    // Zone soumise au KYC validé
    Route::middleware(['kyc.validated'])->group(function () {

        Route::get('/', [InvestmentController::class, 'index'])->name('dashboard');
        Route::get('/decouverte-des-projets', [InvestmentController::class, 'decouvrir'])->name('decouvrir');
        Route::get('/projet/{loanRequest}/json', [InvestmentController::class, 'json'])->name('project.json');

        // Panier
        Route::get('/panier', [InvestmentController::class, 'index'])->name('panier.index');
        Route::post('/panier/add/{loanRequest}', [InvestmentController::class, 'add'])->name('panier.add');
        Route::post('/panier/update/{item}', [InvestmentController::class, 'update'])->name('panier.update');
        Route::delete('/panier/remove/{item}', [InvestmentController::class, 'remove'])->name('panier.remove');
        Route::post('/panier/checkout', [InvestmentController::class, 'checkout'])->name('panier.checkout');

        // Investir direct (si tu gardes le bouton "Investir")
        Route::post('/contribuer/{loanRequest}', [InvestmentController::class, 'investir'])->name('investir');
    });
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';

