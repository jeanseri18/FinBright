<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPasswordResetController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\ReglageController;
use App\Http\Controllers\Admin\SecuriteController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Investisseur\IbanController;
use App\Http\Controllers\Emprunteur\EmprunteurController;
use App\Http\Controllers\Emprunteur\LoanRequestController;
use App\Http\Controllers\Investisseur\InvestisseurController;
use App\Http\Controllers\Investisseur\InvestmentController;
use App\Http\Controllers\Investisseur\InvestorKycController;
use App\Http\Controllers\YouSignWebhookController;
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    $toEmail = "hello@moussa-fofana.com"; // 👉 remplace par ton adresse de réception
    $subject = "Test Mail OVH - Finbright";

    try {
        Mail::raw("Ceci est un test d'envoi d'email via OVH SMTP 🎉", function ($message) use ($toEmail, $subject) {
            $message->to($toEmail)
                    ->subject($subject);
        });

        return "✅ Email de test envoyé avec succès à $toEmail";
    } catch (\Exception $e) {
        return "❌ Erreur lors de l'envoi : " . $e->getMessage();
    }
});

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

Route::prefix('emprunteur')->name('emprunteur.')->middleware(['auth', '2fa', 'role:emprunteur'])->group(function () {
    Route::get('/mon-profil', [EmprunteurController::class, 'profil'])->name('mon-profil');
    Route::post('/mon-profil/general', [EmprunteurController::class, 'updateProfil'])->name('profil-general.update');
    Route::post('/mon-profil/cursus', [EmprunteurController::class, 'updateCursus'])->name('profil-cursus.update');
    Route::get('/filieres/{diplome}', [EmprunteurController::class, 'filieresParDiplome']);
    
    Route::middleware(['profile.completed'])->group(function () {
        Route::get('/', [EmprunteurController::class, 'index'])->name('dashboard');
        
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
});

Route::prefix('mon-profil')->name('profil.')->middleware(['auth', '2fa', 'role:emprunteur|investisseur|admin'])->group(function () {
    Route::post('/adresse', [ProfilController::class, 'updateAdresse'])->name('adresse.update');
    Route::post('/notifications', [ProfilController::class, 'notificationsPreference'])->name('notifications.preferences');
    Route::post('/email', [ProfilController::class, 'updateEmail'])->name('email.update');
    Route::post('/2fa', [ProfilController::class, 'twoFactorSetup'])->name('2fa.setup');
    Route::post('/password', [ProfilController::class, 'updatePassword'])->name('password.update');
    Route::delete('/supprimer', [ProfilController::class, 'deleteAccount'])->name('delete');
    Route::get('/desactiver', [ProfilController::class, 'deactivateAccount'])->name('deactivate');

    Route::prefix('documents')->name('documents.')->group(function () {
        Route::post('/', [ProfilController::class, 'enregistrerDocuments'])->name('update');
        Route::get('{id}/export', [ProfilController::class, 'exportDocument'])->name('export');
        Route::get('{id}/edit', [ProfilController::class, 'editDocument'])->name('edit');
        Route::get('{id}/delete', [ProfilController::class, 'deleteDocument'])->name('confirmDelete');
        Route::delete('{id}/delete', [ProfilController::class, 'deleteDocument'])->name('delete');
    });
});

Route::prefix('investisseur')->name('investisseur.')->middleware(['auth', '2fa', 'role:investisseur'])->group(function () {
    // KYC + IBAN
    Route::get('/kyc', [InvestorKycController::class, 'form'])->name('kyc.form');
    Route::post('/kyc', [InvestorKycController::class, 'store'])->name('kyc.store');

    Route::get('/iban', [IbanController::class, 'form'])->name('iban.form');
    Route::post('/iban', [IbanController::class, 'store'])->name('iban.store');

    Route::get('/mon-profil', [InvestisseurController::class, 'profil'])->name('profil');
    Route::post('/mon-profil/evaluer', [InvestisseurController::class, 'evaluerProfil'])->name('profil.evaluer');
    Route::post('/mon-profil/personne-physique', [InvestisseurController::class, 'updateProfil'])->name('general.update');
    Route::post('/mon-profil/personne-morale', [InvestisseurController::class, 'updateLegalEntity'])->name('legalEntity.update');

    // Zone soumise au KYC validé
    Route::middleware(['kyc.validated'])->group(function () {

        Route::get('/', [InvestmentController::class, 'index'])->name('dashboard');
        Route::get('/decouverte-des-projets', [InvestmentController::class, 'decouvrir'])->name('decouvrir');
        Route::get('/mes-investissements', [InvestmentController::class, 'myProjects'])->name('projets');
        Route::get('/projet/{loan}', [InvestmentController::class, 'details'])->name('projet.details');
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/reset-password/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AdminPasswordResetController::class, 'reset'])->name('password.update');
    
    Route::middleware(['auth:admin', 'security.log'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/export/{entity}/{month?}', [ExportController::class, 'exportCsv'])->name('export.csv');

        Route::post('/documents/{document}/update-status', [AdminController::class, 'updateDocsStatus']);
        
        Route::post('/{type}/{id}/update-kyc-status', [AdminController::class, 'updateKycStatus'])->name('updateKycStatus');
        
        Route::prefix('emprunteurs')->name('emprunteurs.')->group(function () {
            Route::get('/liste-des-emprunteurs', [AdminController::class, 'listeEmprunteurs'])->name('liste');
            Route::get('/{emprunteur}/json', [AdminController::class, 'jsonEmprunteur'])->name('emprunteur.json');
        });

        Route::prefix('investisseurs')->name('investisseurs.')->group(function () {
            Route::get('/liste-des-investisseurs', [AdminController::class, 'listeInvestisseurs'])->name('liste');
            Route::get('/{investisseur}/json', [AdminController::class, 'jsonInvestisseurs'])->name('json');
        });

        Route::prefix('prets')->name('prets.')->group(function () {
            Route::get('/demandes-de-prets', [AdminController::class, 'demandesPrets'])->name('demandes');
            Route::post('{loan}/status', [AdminController::class, 'updateLoanStatus'])->name('update_status');
            Route::get('/projets-en-cours', [AdminController::class, 'projetsEnCours'])->name('enCours');
        });

        Route::prefix('investissements')->name('investissements.')->group(function () {
            Route::get('/liste-investissements/{loan?}', [AdminController::class, 'ListeInvestments'])->name('liste');
        });

        Route::prefix('reglage')->name('reglage.')->group(function () {
            Route::get('/liste-des-etablissements', [ReglageController::class, 'listeEtablissements'])->name('etablissements');
            Route::post('/etablissement/save', [ReglageController::class, 'saveEtablissement'])->name('etablissement.save');
            Route::get('/etablissement-{etablissement}/json', [ReglageController::class, 'jsonEtablissement']);
            Route::delete('/delete-etablissement/{id}', [ReglageController::class, 'deleteEtablissement'])->name('etablissement.delete');

            Route::get('/les-taux-d-interet', [ReglageController::class, 'listeTaux'])->name('taux');
            Route::post('/taux/save', [ReglageController::class, 'saveTaux'])->name('taux.save');
            Route::get('/taux-{taux}/json', [ReglageController::class, 'jsonTaux']);
            Route::delete('/delete-taux/{id}', [ReglageController::class, 'deleteTaux'])->name('taux.delete');
        });

        Route::prefix('securite')->name('securite.')->middleware(['role:Super Admin', 'permission:Gérer les utilisateurs'])->group(function () {
            Route::get('/liste-des-utilisateurs', [SecuriteController::class, 'listeUtilisateurs'])->name('utilisateurs');
            Route::post('/utilisateurs/save', [SecuriteController::class, 'saveUtilisateurs'])->name('utilisateurs.save');
            Route::get('/utilisateur-{user}/json', [SecuriteController::class, 'jsonUtilisateur']);
            Route::delete('/delete-utilisateur/{id}', [SecuriteController::class, 'deleteUtilisateur'])->name('utilisateur.delete');

            Route::get('/roles', [SecuriteController::class, 'listeRoles'])->name('roles');
            Route::post('/roles/save', [SecuriteController::class, 'saveRole'])->name('roles.save');
            Route::get('/role-{role}/json', [SecuriteController::class, 'jsonRole']);
            Route::delete('/delete-role/{id}', [SecuriteController::class, 'deleteRole'])->name('role.delete');

            Route::get('/permissions', [SecuriteController::class, 'listePermissions'])->name('permissions');
            Route::post('/permission/save', [SecuriteController::class, 'savePermission'])->name('permission.save');
            Route::get('/permission-{permission}/json', [SecuriteController::class, 'jsonPermission']);
            Route::delete('/delete-permission/{id}', [SecuriteController::class, 'deletePermission'])->name('permission.delete');
            
            Route::get('/security-log', [SecuriteController::class, 'securityLog'])->name('logs');
            Route::delete('/delete-log/{id}', [SecuriteController::class, 'deleteLog'])->name('log.delete');
            
            Route::get('/corbeille', [SecuriteController::class, 'listeTrash'])->name('trash');
            Route::delete('/delete-trash/{id}', [SecuriteController::class, 'deleteTrash'])->name('trash.delete');
            Route::delete('/purge', [SecuriteController::class, 'purge'])->name('trash.purge');
            Route::post('settings/trash', [SecuriteController::class, 'saveTrash'])->name('trash.save');
        });
    });
});

// Route pour recevoir les notifications de YouSign
Route::post('/yousign/webhook', [YouSignWebhookController::class, 'handle']);

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';

