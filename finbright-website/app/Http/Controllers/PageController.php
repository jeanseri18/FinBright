<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Affiche la page "Comment ça marche" pour les emprunteurs
     */
    public function howItWorks()
    {
        return view('how-it-works');
    }

    /**
     * Affiche la page "Comment investir"
     */
    public function howToInvest()
    {
        return view('how-to-invest');
    }

    /**
     * Affiche la page "À propos"
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Affiche la page FAQ
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Affiche la page de contact
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Traite le formulaire de contact
     */
    public function contactSubmit(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'user_type' => 'required|in:investor,borrower,other',
            'privacy_policy' => 'required|accepted',
        ]);

        // Ici, vous pourriez envoyer un email, sauvegarder en base de données, etc.
        // Pour cet exemple, nous allons simplement rediriger avec un message de succès
        
        return redirect()->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
    }

    /**
     * Affiche les mentions légales
     */
    public function legalMentions()
    {
        return view('legal-mentions');
    }

    /**
     * Affiche la politique de confidentialité
     */
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    /**
     * Affiche les conditions d'utilisation
     */
    public function termsOfUse()
    {
        return view('terms-of-use');
    }

    /**
     * Affiche la politique de gestion des risques
     */
    public function riskManagement()
    {
        return view('risk-management');
    }

    /**
     * Affiche les informations sur les risques d'investissement
     */
    public function investmentRisks()
    {
        return view('investment-risks');
    }
}