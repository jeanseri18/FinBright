<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('back.admin.dashboard');
    }

    public function demandesPrets(Request $request)
    {
        Session::put('menu_actif', 'decouvrir');

        $query = LoanRequest::where('status', 'En attente d\'approbation')->with('emprunteur');

        // Exemple de filtres
        if ($request->filled('min_amount')) {
            $query->where('simulation_result->amount', '>=', $request->min_amount);
        }
        if ($request->filled('max_amount')) {
            $query->where('simulation_result->amount', '<=', $request->max_amount);
        }
        if ($request->filled('risk_level')) {
            $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
                $q->where('profile', $request->risk_level);
            });
        }

        $loanRequests = $query->latest()->paginate(10);
        return view('back.admin.prets.demandes', compact('loanRequests'));
    }
}
