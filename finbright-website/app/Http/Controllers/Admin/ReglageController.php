<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use App\Models\Investisseur;
use App\Models\Investment;
use App\Models\LoanRequest;
use App\Models\RiskLevel;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use App\Services\InvestorRiskService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReglageController extends Controller
{
    public function __construct(
        private InvestorRiskService $riskService,
    ) {}

    public function listeEtablissements(Request $request)
    {
        Session::put('menu_actif', 'etablissements');

        // Récupérer les 3 derniers mois où il y a des etablissements créés
        $months = Etablissement::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
            ->groupBy('ym')
            ->orderBy('ym', 'desc')
            ->take(3)
            ->pluck('ym')
            ->map(function ($ym) {
                return [
                    'value' => $ym,
                    'label' => Carbon::createFromFormat('Y-m', $ym)->translatedFormat('F Y'),
                    'short' => Carbon::createFromFormat('Y-m', $ym)->translatedFormat('M Y'),
                ];
            });

        
        $etablissements = Etablissement::orderBy(
            'created_at',
            $request->ordre == 2 ? 'asc' : 'desc' // 2 = plus anciens, sinon récents
        )->paginate(10);

        return view('back.admin.reglage.etablissements', compact('etablissements', 'months'));
    }

    public function saveEtablissement(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'id' => 'nullable|exists:etablissements,id',
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
        ]);

        // Si un ID est présent, on met à jour, sinon on crée un nouveau
        $etablissement = Etablissement::updateOrCreate(
            ['id' => $validated['id'] ?? null], // condition
            [
                'nom' => $validated['nom'],
                'ville' => $validated['ville'],
                'pays' => $validated['pays'],
            ]
        );

        // Message flash pour la vue
        $message = $request->filled('id')
            ? 'Établissement modifié avec succès !'
            : 'Établissement ajouté avec succès !';

        return redirect()->route('admin.reglage.etablissements')
            ->with('success', $message);
    }

    public function jsonEtablissement(Etablissement $etablissement)
    {
        return response()->json($etablissement);
    }

    public function deleteEtablissement($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->delete();

        return redirect()->route('admin.reglage.etablissements')
            ->with('success', "L'établissement « {$etablissement->nom} » a été supprimé avec succès.");
    }

    public function listeTaux(Request $request)
    {
        Session::put('menu_actif', 'taux_interet');

        // Récupérer les 3 derniers mois où il y a des risques créés
        $months = RiskLevel::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
            ->groupBy('ym')
            ->orderBy('ym', 'desc')
            ->take(3)
            ->pluck('ym')
            ->map(function ($ym) {
                return [
                    'value' => $ym,
                    'label' => Carbon::createFromFormat('Y-m', $ym)->translatedFormat('F Y'),
                    'short' => Carbon::createFromFormat('Y-m', $ym)->translatedFormat('M Y'),
                ];
            });

        
        $taux = RiskLevel::orderBy(
            'created_at',
            $request->ordre == 2 ? 'asc' : 'desc' // 2 = plus anciens, sinon récents
        )->paginate(10);

        return view('back.admin.reglage.taux_interet', compact('taux', 'months'));
    }

    public function saveTaux(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'id' => 'nullable|exists:risk_levels,id',
            'level' => 'required|string|max:255',
            'score_mini' => 'required|string|max:255',
            'score_maxi' => 'required|string|max:255',
            'yield' => 'required|string|max:255',
            'characteristics' => 'nullable|array',

            'characteristics.diplomas_years' => 'nullable|array',
            'characteristics.diplomas_years.*' => 'string|max:255',

            'characteristics.specializations' => 'nullable|array',
            'characteristics.specializations.*' => 'string|max:255',
        ]);

        // Si un ID est présent, on met à jour, sinon on crée un nouveau
        $taux = RiskLevel::updateOrCreate(
            ['id' => $validated['id'] ?? null], // condition
            [
                'profile' => $validated['level'],
                'score_range' => $validated['score_mini']. '-' .$validated['score_maxi'],
                'yield' => $validated['yield'],
                'characteristics' => $validated['characteristics'] ?? [],
            ]
        );

        // Message flash pour la vue
        $message = $request->filled('id')
            ? 'Élement modifié avec succès !'
            : 'Élement ajouté avec succès !';

        return redirect()->route('admin.reglage.taux')
            ->with('success', $message);
    }

    public function jsonTaux(RiskLevel $taux)
    {
        return response()->json($taux);
    }

    public function deleteTaux($id)
    {
        $taux = RiskLevel::findOrFail($id);
        $taux->delete();

        return redirect()->route('admin.reglage.taux')
            ->with('success', "L'élément a été supprimé avec succès.");
    }
}