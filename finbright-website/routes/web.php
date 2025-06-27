<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Page d'accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Comment ça marche (pour les emprunteurs)
Route::get('/comment-ca-marche', [PageController::class, 'howItWorks'])->name('how-it-works');

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
