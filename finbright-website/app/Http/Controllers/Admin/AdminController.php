<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprunteur;
use App\Models\Investisseur;
use App\Models\Investment;
use App\Models\LoanRequest;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('back.admin.dashboard');
    }

    public function listeEmprunteurs(Request $request)
    {
        Session::put('menu_actif', 'emprunteurs');

        // $query = Emprunteur::where('status', 'À approuver');

        // Exemple de filtres
        // if ($request->filled('min_amount')) {
        //     $query->where('simulation_result->amount', '>=', $request->min_amount);
        // }
        // if ($request->filled('max_amount')) {
        //     $query->where('simulation_result->amount', '<=', $request->max_amount);
        // }
        // if ($request->filled('risk_level')) {
        //     $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
        //         $q->where('profile', $request->risk_level);
        //     });
        // }

        $emprunteurs = Emprunteur::latest()->first()->paginate(10);
        return view('back.admin.emprunteurs', compact('emprunteurs'));
    }

    public function jsonEmprunteur(Emprunteur $emprunteur)
    {
        $documents = [];

        foreach ($emprunteur->documents as $document) {
            $documents[] = [
                'id' => $document->id,
                'type' => $document->type,
                'status' => $document->status,
                'file_name' => $document->file->filename,
                'file_alt' => $document->file->alt,
            ];
        }

        return response()->json([
            'id' => $emprunteur->id,
            'user_name' => $emprunteur->user->first_name . ' ' . $emprunteur->user->last_name,
            'etablissement' => $emprunteur->etablissement ? $emprunteur->etablissement->nom : null,
            'adresse' => trim(
                ($emprunteur->user->address['adresse'] ?? '') .' '.
                ($emprunteur->user->address['rue'] ?? '') .' '.
                ($emprunteur->user->address['code_postal'] ?? '') .' '.
                ($emprunteur->user->address['ville'] ?? '')
            ),
            'user_docs' => $documents,
            'kyc_status' => $emprunteur->user->kyc_status,
            'avatar' => $emprunteur->user->profilePicture->filename ?? null,
        ]);
    }

    public function updateStatus(Request $request, UserDocument $document)
    {
        $request->validate([
            'status' => 'required|in:À approuver,Validé,Refusé',
        ]);

        $document->status = $request->status;
        $document->save();

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès',
            'status' => $document->status,
        ]);
    }

    public function updateKycStatus(Request $request, Emprunteur $emprunteur)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,validated,rejected',
        ]);

        $user = $emprunteur->user;
        $user->kyc_status = $request->status;
        $user->kyc_validated_at = now();
        $user->save();

        if ($validated['status'] == "rejected") return redirect()->route('admin.emprunteurs.liste')
            ->with('success', 'KYC mis à jour avec succès');
        else {
            return response()->json([
                'success' => true,
                'message' => 'KYC mis à jour avec succès',
                'status' => $user->status,
            ]);
        }
    }

    // INVESTISSEUR

    public function listeInvestisseurs(Request $request)
    {
        Session::put('menu_actif', 'investisseurs');

        // $query = Emprunteur::where('status', 'À approuver');

        // Exemple de filtres
        // if ($request->filled('min_amount')) {
        //     $query->where('simulation_result->amount', '>=', $request->min_amount);
        // }
        // if ($request->filled('max_amount')) {
        //     $query->where('simulation_result->amount', '<=', $request->max_amount);
        // }
        // if ($request->filled('risk_level')) {
        //     $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
        //         $q->where('profile', $request->risk_level);
        //     });
        // }

        $investisseurs = Investisseur::latest()->paginate(10);
        return view('back.admin.investisseurs', compact('investisseurs'));
    }

    public function jsonInvestisseurs(Investisseur $investisseur)
    {
        $documents = [];

        foreach ($investisseur->documents as $document) {
            $documents[] = [
                'id' => $document->id,
                'type' => $document->type,
                'status' => $document->status,
                'file_name' => $document->file->filename,
                'file_alt' => $document->file->alt,
            ];
        }

        return response()->json([
            'id' => $investisseur->id,
            'user_name' => $investisseur->user->first_name . ' ' . $investisseur->user->last_name,
            'etablissement' => $investisseur->etablissement ? $investisseur->etablissement->nom : null,
            'adresse' => trim(
                ($investisseur->user->address['adresse'] ?? '') .' '.
                ($investisseur->user->address['rue'] ?? '') .' '.
                ($investisseur->user->address['code_postal'] ?? '') .' '.
                ($investisseur->user->address['ville'] ?? '')
            ),
            'user_docs' => $documents,
            'kyc_status' => $investisseur->user->kyc_status,
            'avatar' => $investisseur->user->profilePicture->filename ?? null,
        ]);
    }

    public function updateKycInvestStatus(Request $request, Investisseur $investisseur)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,validated,rejected',
        ]);

        $user = $investisseur->user;
        $user->kyc_status = $request->status;
        $user->kyc_validated_at = now();
        $user->save();

        if ($validated['status'] == "rejected") return redirect()->route('admin.invest$investisseurs.liste')
            ->with('success', 'KYC mis à jour avec succès');
        else {
            return response()->json([
                'success' => true,
                'message' => 'KYC mis à jour avec succès',
                'status' => $user->status,
            ]);
        }
    }

    public function demandesPrets(Request $request)
    {
        Session::put('menu_actif', 'demande_prets');

        $query = LoanRequest::where('status', 'En attente d\'approbation')->with('emprunteur');

        // Exemple de filtres
        // if ($request->filled('min_amount')) {
        //     $query->where('simulation_result->amount', '>=', $request->min_amount);
        // }
        // if ($request->filled('max_amount')) {
        //     $query->where('simulation_result->amount', '<=', $request->max_amount);
        // }
        // if ($request->filled('risk_level')) {
        //     $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
        //         $q->where('profile', $request->risk_level);
        //     });
        // }

        $loanRequests = $query->latest()->paginate(10);
        return view('back.admin.prets.demandes', compact('loanRequests'));
    }

    public function projetsEnCours(Request $request)
    {
        Session::put('menu_actif', 'projets_en_cours');

        $query = LoanRequest::where('status', 'Validé')->with('emprunteur');

        // Exemple de filtres
        // if ($request->filled('min_amount')) {
        //     $query->where('simulation_result->amount', '>=', $request->min_amount);
        // }
        // if ($request->filled('max_amount')) {
        //     $query->where('simulation_result->amount', '<=', $request->max_amount);
        // }
        // if ($request->filled('risk_level')) {
        //     $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
        //         $q->where('profile', $request->risk_level);
        //     });
        // }

        $loanRequests = $query->latest()->paginate(10);
        return view('back.admin.prets.en_cours', compact('loanRequests'));
    }

    public function demandesInvestments(Request $request)
    {
        Session::put('menu_actif', 'demande_invest');

        $query = Investment::where('status', 'À approuver');

        // Exemple de filtres
        // if ($request->filled('min_amount')) {
        //     $query->where('simulation_result->amount', '>=', $request->min_amount);
        // }
        // if ($request->filled('max_amount')) {
        //     $query->where('simulation_result->amount', '<=', $request->max_amount);
        // }
        // if ($request->filled('risk_level')) {
        //     $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
        //         $q->where('profile', $request->risk_level);
        //     });
        // }

        $investments = $query->latest()->first()->paginate(10);
        return view('back.admin.investissements.demandes', compact('investments'));
    }
}
