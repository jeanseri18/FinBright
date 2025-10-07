<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprunteur;
use App\Models\Investisseur;
use App\Models\Investment;
use App\Models\LoanRequest;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use App\Services\InvestorRiskService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function __construct(
        private InvestorRiskService $riskService,
    ) {}

    public function dashboard()
    {
        Session::put('menu_actif', 'dashboard');
        return view('back.admin.dashboard');
    }

    public function listeEmprunteurs(Request $request)
    {
        Session::put('menu_actif', 'emprunteurs');

        // Récupérer les 3 derniers mois où il y a des emprunteurs créés
        $months = Emprunteur::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        $query = Emprunteur::with('user')->whereHas('user', function ($q) {
            $q->where('is_profile_completed', true);
        });

        // Filtrer par statut KYC
        if ($request->filled('statut')) {
            if ($request->statut == 1) {
                // Activé (par ex. kyc_status = validated)
                $query->whereHas('user', fn($q) => $q->where('kyc_status', 'validated'));
            } elseif ($request->statut == 2) {
                // Désactivé (autres statuts)
                $query->whereHas('user', fn($q) => $q->where('kyc_status', '!=', 'validated'));
            }
        }
        // Ordre d’affichage
        if ($request->filled('ordre')) {
            if ($request->ordre == 1) {
                $query->orderByDesc('created_at'); // Plus récents
            } elseif ($request->ordre == 2) {
                $query->orderBy('created_at'); // Plus anciens
            }
        } else {
            // par défaut
            $query->orderByDesc('created_at');
        }

        $emprunteurs = $query->paginate(10);
        return view('back.admin.emprunteurs', compact('emprunteurs', 'months'));
    }

    public function jsonEmprunteur(Emprunteur $emprunteur)
    {
        $documents = [];

        foreach ($emprunteur->user->documents as $document) {
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
            'birth_date' => $emprunteur->user->birth_date ?? null,
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

    // INVESTISSEUR

    public function listeInvestisseurs(Request $request)
    {
        Session::put('menu_actif', 'investisseurs');

        // Récupérer les 3 derniers mois où il y a des emprunteurs créés
        $months = Investisseur::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        $query = Investisseur::with('user')->whereHas('user', function ($q) {
            $q->where('is_profile_completed', true);
        });

        // Filtrer par statut KYC
        if ($request->filled('statut')) {
            if ($request->statut == 1) {
                // Activé (par ex. kyc_status = validated)
                $query->whereHas('user', fn($q) => $q->where('kyc_status', 'validated'));
            } elseif ($request->statut == 2) {
                // Désactivé (autres statuts)
                $query->whereHas('user', fn($q) => $q->where('kyc_status', '!=', 'validated'));
            }
        }
        // Ordre d’affichage
        if ($request->filled('ordre')) {
            if ($request->ordre == 1) {
                $query->orderByDesc('created_at'); // Plus récents
            } elseif ($request->ordre == 2) {
                $query->orderBy('created_at'); // Plus anciens
            }
        } else {
            // par défaut
            $query->orderByDesc('created_at');
        }

        $investisseurs = $query->paginate(10);

        // Ajouter le scoring risque
        foreach ($investisseurs as $investisseur) {
            $data = [
                'is_legal_entity' => $investisseur->type_of_lender, // "Personne physique" / "Personne morale"
                'is_ppe' => $investisseur->ppe ?? false,
                'is_complex_structure' => $investisseur->beneficiaires ? count($investisseur->beneficiaires) : 0,
                'resides_risk_country' => $investisseur->user->address['pays'] ?? null,
                'funds_from_risk_country' => $investisseur->funds_from_country ?? null,
                // 'amount' => $investisseur->user->wallet->balance ?? 0,
                // 'seuil_interne' => 10000,
                // 'unjustified_early_repayment' => false,
                'channel_remote_only' => true,
            ];

            $investisseur->risk = $this->riskService->evaluate($data);
        }

        return view('back.admin.investisseurs', compact('investisseurs', 'months'));
    }

    public function jsonInvestisseurs(Investisseur $investisseur)
    {
        $user = $investisseur->user;
        $data = [
            'is_legal_entity' => $investisseur->type_of_lender, // "Personne physique" / "Personne morale"
            'is_ppe' => $investisseur->ppe ?? false,
            'is_complex_structure' => $investisseur->beneficiaires ? count($investisseur->beneficiaires) : 0,
            'resides_risk_country' => $user->address['pays'] ?? null,
            'funds_from_risk_country' => $investisseur->funds_from_country ?? null,
            // 'amount' => $user->wallet->balance ?? 0,
            // 'seuil_interne' => 10000,
            // 'unjustified_early_repayment' => false,
            'channel_remote_only' => true,
        ];

        // Fonction anonyme pour transformer les documents
        $formatDocuments = function ($documents) {
            return $documents->map(function ($doc) {
                return [
                    'id'        => $doc->id,
                    'type'      => $doc->type,
                    'status'    => $doc->status,
                    'file_name' => $doc->file->filename ?? null,
                    'file_alt'  => $doc->file->alt ?? null,
                ];
            });
        };

        return response()->json([
            'id' => $investisseur->id,
            'type_of_lender' => $investisseur->type_of_lender,
            'avatar' => $user->profilePicture->filename ?? null,
            'user_name' => $user->first_name . ' ' . $user->last_name,
            'birth_date' => $user->birth_date ?? null,
            'birth_place' => $user->birth_place ?? null,
            'nationality' => $user->nationality ?? null,
            'phone_number' => $user->phone_number ?? null,
            'adresse' => trim(
                ($user->address['adresse'] ?? '') .' '.
                ($user->address['rue'] ?? '') .' '.
                ($user->address['code_postal'] ?? '') .' '.
                ($user->address['ville'] ?? '')
            ),
            'risk' => $this->riskService->evaluate($data),
            'denomination_sociale' => $investisseur->denomination_sociale,
            'forme_juridique' => $investisseur->forme_juridique,
            'numero_immatriculation' => $investisseur->numero_immatriculation,
            'creation_date' => $investisseur->creation_date,
            'adresse_representant' => $investisseur->adresse_representant,
            'fonction' => $investisseur->fonction,
            'user_docs' => $formatDocuments($user->documents),
            'invest_docs' => $formatDocuments($investisseur->documents),
            'membres' => $investisseur->beneficiaires->map(function ($beneficiaire) {
                return [
                    'id'          => $beneficiaire->id,
                    'nom'         => $beneficiaire->nom,
                    'prenoms'     => $beneficiaire->prenoms,
                    'birth_date'  => $beneficiaire->birth_date,
                    'birth_place' => $beneficiaire->birth_place,
                    'nationalite' => $beneficiaire->nationalite,
                    'adresse'     => $beneficiaire->adresse,
                    'documents'   => $beneficiaire->documents->map(function ($doc) {
                        return [
                            'id'        => $doc->id,
                            'type'      => $doc->type,
                            'status'    => $doc->status,
                            'file_name' => $doc->file->filename ?? null,
                            'file_alt'  => $doc->file->alt ?? null,
                        ];
                    }),
                ];
            }),
            'kyc_status' => $user->kyc_status,
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

    public function updateKycStatus(Request $request, string $type, int $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,validated,rejected',
            'kyc_motif' => 'nullable|string',
        ]);

        // On résout dynamiquement le modèle
        if ($type === 'emprunteurs') {
            $model = Emprunteur::findOrFail($id);
        } elseif ($type === 'investisseurs') {
            $model = Investisseur::findOrFail($id);
        } else {
            return response()->json(['success' => false, 'message' => 'Type invalide.'], 400);
        }

        $user = $model->user;

        // Vérifier si tous les documents sont validés
        $allDocsSet = !$model->documents()
            ->where('status', '!=', 'Validé')
            ->exists();

        if ($validated['status'] === "validated" && !$allDocsSet) {
            return response()->json([
                'success' => false,
                'message' => 'Veuillez approuver tous les documents avant de valider le statut.',
                'status' => $user->status,
            ]);
        }

        // Mettre à jour le KYC
        $user->kyc_status = $validated['status'];
        $user->kyc_refused_motif = $validated['status'] == "rejected" ? $validated['kyc_motif'] : null;
        $user->kyc_validated_at = $allDocsSet ? now() : null;
        $user->save();

        // === Notifications ===
        $notifService = app(\App\Services\NotificationService::class);

        switch ($validated['status']) {
            case 'validated':
                $notifService->notify(
                    $user,
                    'kyc_validated',
                    "<strong>Votre KYC a été validé</strong><br>Vous pouvez désormais accéder à toutes les fonctionnalités.",
                    [
                        'user_id' => $user->id, 'type' => $type,
                        'icon' => '<div class="flex items-center shrink-0 justify-center size-8 bg-green-50 rounded-full border border-green-200"><i class="ki-filled ki-check text-lg text-green-500"></i></div>',
                    ]
                );
                break;

            case 'rejected':
                $notifService->notify(
                    $user,
                    'kyc_rejected',
                    "<strong>Votre KYC a été rejeté</strong><br>Veuillez consulter vos documents et corriger les informations.",
                    [
                        'user_id' => $user->id, 'type' => $type, 
                        'reason' => "
                            <div class='text-sm font-semibold text-secondary-foreground mb-px'>
                                <a class='hover:text-primary text-mono font-semibold' href='#'>Motif : </a><br>
                                <span class='text-secondary-foreground font-medium'>
                                {$validated['kyc_motif']}
                                </span>
                            </div>
                        ",
                        'icon' => '<div class="flex items-center shrink-0 justify-center size-8 bg-red-50 rounded-full border border-red-200"><i class="ki-filled ki-cross text-lg text-red-500"></i></div>',
                    ]
                );
                break;

            case 'pending':
                $notifService->notify(
                    $user,
                    'kyc_pending',
                    "<strong>Votre KYC est en cours de validation</strong><br>Un administrateur est en train de vérifier vos informations.",
                    [
                        'user_id' => $user->id, 'type' => $type,
                        'icon' => '<div class="flex items-center shrink-0 justify-center size-8 bg-yellow-50 rounded-full border border-yellow-200"><i class="ki-filled ki-arrows-circle text-lg text-yellow-500"></i></div>',
                    ]
                );
                break;
        }

        // Différencier le cas "rejected" avec une redirection
        if ($validated['status'] === "rejected") {
            return redirect()
                ->route($type === 'emprunteurs' ? 'admin.emprunteurs.liste' : 'admin.investisseurs.liste')
                ->with('success', 'KYC mis à jour avec succès');
        }

        return response()->json([
            'success' => true,
            'message' => 'KYC mis à jour avec succès',
            'status' => $user->status,
        ]);
    }

    public function updateKycInvestStatus(Request $request, Investisseur $investisseur)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,validated,rejected',
        ]);

        $user = $investisseur->user;
        $allDocsSet = !$investisseur->documents()
            ->where('status', '!=', 'Validé')
            ->exists();

        if ($validated['status'] == "validated" && !$allDocsSet) return response()->json([
                'success' => false,
                'message' => 'Veuillez approuver tous les documents avant de valider le statut.',
                'status' => $user->status,
            ]);
        
        $user->kyc_status = $request->status;
        $user->kyc_validated_at = now();
        $user->save();

        if ($validated['status'] == "rejected") return redirect()->route('admin.investisseurs.liste')
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

        // Récupérer les 3 derniers mois où il y a des prêts créés
        $months = LoanRequest::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        $query = LoanRequest::where('status', '!=', 'En cours de financement')
            ->with('emprunteur');

        // Filtrer par statut (colonne, pas relation)
        if ($request->filled('statut')) {
            $query->where('status', $request->statut);
        }

        // Ordre d’affichage
        if ($request->filled('ordre')) {
            if ($request->ordre == 1) {
                $query->orderByDesc('created_at'); // Plus récents
            } elseif ($request->ordre == 2) {
                $query->orderBy('created_at'); // Plus anciens
            }
        } else {
            // par défaut
            $query->orderByDesc('created_at');
        }

        // inutile de rajouter ->latest() car on gère déjà l’ordre
        $loanRequests = $query->paginate(10);

        return view('back.admin.projets.demandes', compact('loanRequests', 'months'));
    }

    public function updateLoanStatus(Request $request, LoanRequest $loan)
    {
        $validated = $request->validate([
            'status' => 'required|in:En attente de confirmation,En cours de financement,Rejetée',
        ]);
        
        $loan->status = $validated['status'];
        $loan->save();

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès',
            'status' => $loan->status,
        ]);
    }

    public function projetsEnCours(Request $request)
    {
        Session::put('menu_actif', 'projets_en_cours');

        // Récupérer les 3 derniers mois où il y a des prêts créés
        $months = LoanRequest::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        $query = LoanRequest::where('status', 'En cours de financement')->with('emprunteur');

        // Filtrer par statut (colonne, pas relation)
        if ($request->filled('statut')) {
            $query->where('status', $request->statut);
        }
        // Ordre d’affichage
        if ($request->filled('ordre')) {
            if ($request->ordre == 1) {
                $query->orderByDesc('created_at'); // Plus récents
            } elseif ($request->ordre == 2) {
                $query->orderBy('created_at'); // Plus anciens
            }
        } else {
            // par défaut
            $query->orderByDesc('created_at');
        }

        $loanRequests = $query->paginate(10);
        return view('back.admin.projets.en_cours', compact('loanRequests', 'months'));
    }

    public function ListeInvestments(Request $request, $loan = null)
    {
        if (!$loan) Session::put('menu_actif', 'liste_invest');

        // Récupérer les 3 derniers mois où il y a des prêts créés
        $months = Investment::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        $query = Investment::with('investisseur');
        if ($loan) $query->where('loan_request_id', $loan);

        // Filtrer par statut (colonne, pas relation)
        if ($request->filled('statut')) {
            $query->where('status', $request->statut);
        }
        // Ordre d’affichage
        if ($request->filled('ordre')) {
            if ($request->ordre == 1) {
                $query->orderByDesc('created_at'); // Plus récents
            } elseif ($request->ordre == 2) {
                $query->orderBy('created_at'); // Plus anciens
            }
        } else {
            // par défaut
            $query->orderByDesc('created_at');
        }

        $investments = $query->paginate(10);

        // Ajouter le scoring risque
        foreach ($investments as $investment) {
            $investisseur = $investment->investisseur;
            $data = [
                'is_legal_entity' => $investisseur->type_of_lender, // "Personne physique" / "Personne morale"
                'is_ppe' => $investisseur->ppe ?? false,
                'is_complex_structure' => $investisseur->beneficiaires ? count($investisseur->beneficiaires) : 0,
                'resides_risk_country' => $investisseur->user->address['pays'] ?? null,
                'funds_from_risk_country' => $investisseur->funds_from_country ?? null,
                // 'amount' => $investisseur->user->wallet->balance ?? 0,
                // 'seuil_interne' => 10000,
                // 'unjustified_early_repayment' => false,
                'channel_remote_only' => true,
            ];

            $investment->investisseur->risk = $this->riskService->evaluate($data);
        }

        return view('back.admin.projets.investissements', compact('investments', 'months'));
    }
}
