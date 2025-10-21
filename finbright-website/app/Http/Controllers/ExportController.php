<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\RiskLevel;
use App\Models\Emprunteur;
use App\Models\Investment;
use App\Models\LoanRequest;
use App\Models\SecurityLog;
use App\Models\Investisseur;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SecuriteController;
use App\Http\Controllers\Emprunteur\LoanRequestController;
use App\Http\Controllers\Investisseur\InvestmentController;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function __construct(
        private AdminController $adminController,
        private SecuriteController $securiteController,
        private LoanRequestController $loanRequestController,
    ) {}

    public function exportCsv($entity, $model = null)
    {
        $validEntities = [
            'amortissement', 
        ];
        if (!in_array($entity, $validEntities)) {
            abort(404);
        }

        switch ($entity) {
            case 'amortissement':
                $tableauAmortissement = [];
                if ($model && $model = LoanRequest::with('emprunteur')->findOrFail($model)) {
                    $tableauAmortissement = $this->loanRequestController->genererTableauAmortissement(
                        $model->simulation_result['amount'],
                        $model->simulation_result['duration'],
                        $model->simulation_result['interets'],
                        $model->simulation_result['assurances'],
                        $model->simulation_result['deferred_months']
                    );
                }
                $headers = ['N°', 'Date', 'Mensualité avec assurance', 'Mensualité hors assurance', 'Intérêts', 'Assurances', 'Capital remboursé', 'Capital restant dû', 'Cumul des intérêts', 'Statut'];
                $data = $tableauAmortissement;
                break;
        }

        // Création du CSV
        $response = new StreamedResponse(function () use ($headers, $data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);
            foreach ($data as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        });

        $filename = $entity . '_' . ($month ?? now()->format('Y-m')) . '.csv';
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

        return $response;
    }

    public function exportCsvWithMonth($entity, $month = null)
    {
        $validEntities = [
            'investments_insight', 
            'emprunteurs', 
            'investisseurs', 
            'loan_requests', 
            'loans', 
            'etablissements', 
            'taux_interets', 
            'admins', 
            'roles', 
            'permissions',
            'logs',
            'trash'
        ];
        if (!in_array($entity, $validEntities)) {
            abort(404);
        }

        // Vérifier mois si fourni
        if ($month && !preg_match('/^\d{4}-\d{2}$/', $month)) {
            abort(400, 'Format de date invalide');
        }

        // Sélection des données selon entité
        switch ($entity) {
            case 'investments_insight':
                $statsInvests = $this->adminController->statistiquesInvestissements();
                $headers = ['Périodes', 'Investissements', 'Montant', 'Pourcentage', 'Indice'];
                $data = [
                    ['Mensuel', $statsInvests['nbreInvests']['nbreMensuel'], $statsInvests['totalInvests']['totalMensuel']. " €", $statsInvests['pctMensuel']. "%", $statsInvests['indicateur']['value']],
                    ['Semestriel', $statsInvests['nbreInvests']['nbreSemestriel'], $statsInvests['totalInvests']['totalSemestriel']. " €", $statsInvests['pctSemestriel']. "%", ''],
                    ['Annuel', $statsInvests['nbreInvests']['nbreAnnuel'], $statsInvests['totalInvests']['totalAnnuel']. " €", $statsInvests['pctAnnuel']. "%", ''],
                    ['', '', '', 'TOTAL INVESTI', $statsInvests['totalInvesti']. " €"]
                ];
                break;

            case 'emprunteurs':
                $query = Emprunteur::with('user','etablissement');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Nom', 'Prénom', 'Date naissance', 'Pays naissance', 'Établissement', 'Adresse', 'KYC'];
                $data = $rows->map(fn($e) => [
                    $e->user->last_name,
                    $e->user->first_name,
                    $e->user->birth_date,
                    $e->user->birth_place,
                    $e->etablissement->nom ?? '',
                    $e->user->address['ville'] ?? '',
                    $e->user->kyc_status,
                ]);
                break;

            case 'investisseurs':
                $query = Investisseur::with('user');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Nom complet', 'Type', 'Scoring risque', 'Adresse', 'KYC'];
                $data = $rows->map(fn($i) => [
                    $i->user->first_name . ' ' . $i->user->last_name,
                    $i->type_of_lender,
                    $i->riskLevel->profile ?? 'N/A',
                    $i->user->address['ville'] ?? '',
                    $i->user->kyc_status,
                ]);
                break;

            case 'loan_requests':
                $query = LoanRequest::with('emprunteur.user');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Projet', 'Emprunteur', 'Statut', 'Montant demandé', 'Durée'];
                $data = $rows->map(fn($l) => [
                    $l->object,
                    $l->emprunteur->user->first_name . ' ' . $l->emprunteur->user->last_name,
                    $l->status,
                    $l->simulation_result['amount'] ?? 0,
                    $l->duration ?? '',
                ]);
                break;
            case 'loans':
                $query = LoanRequest::with('emprunteur.user', 'investments');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Projet', 'Emprunteur', 'Statut', 'Financements', 'Montant demandé', 'Montant financé', 'Durée'];
                $data = $rows->map(fn($l) => [
                    $l->object,
                    $l->emprunteur->user->first_name . ' ' . $l->emprunteur->user->last_name,
                    $l->status,
                    $l->investments->count(),
                    $l->simulation_result['amount'] ?? 0,
                    $l->investments->sum('amount'),
                    $l->duration ?? '',
                ]);
                break;
            case 'etablissements':
                $query = Etablissement::with('emprunteurs');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Établissements', 'Emprunteurs', 'Ville', 'Pays', 'Date de création'];
                $data = $rows->map(fn($l) => [
                    $l->nom,
                    $l->emprunteurs->count(),
                    $l->ville,
                    $l->pays,
                    $l->created_at ?? '',
                ]);
                break;
            case 'taux_interets':
                $query = RiskLevel::with('emprunteurs');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Profils', 'Emprunteurs', 'Caractéristiques', 'Score', 'Rendement', 'Date de création'];
                $data = $rows->map(fn($l) => [
                    $l->profile,
                    $l->emprunteurs->count(),
                    '',
                    $l->score_range,
                    $l->yield,
                    $l->created_at ?? '',
                ]);
                break;
            case 'admins':
                $query = Admin::with('roles');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Utilisateurs', 'Rôles', 'Email', 'Téléphone', 'Statut', 'Date de création'];
                $data = $rows->map(fn($l) => [
                    $l->fullname,
                    $l->roles->isNotEmpty()
                        ? $l->roles->pluck('name')->join(', ')
                        : '—',
                    $l->email,
                    $l->phone_number,
                    $l->status,
                    $l->created_at ?? '',
                ]);
                break;
            case 'roles':
                $query = Role::with('permissions');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                // Ajouter les utilisateurs (admins) manuellement
                foreach ($rows as $row) {
                    $adminIds = DB::table('model_has_roles')
                        ->where('role_id', $row->id)
                        ->where('model_type', \App\Models\Admin::class)
                        ->pluck('model_id');

                    $row->admins = Admin::whereIn('id', $adminIds)->get();
                }
                $headers = ['Rôles', 'Rôle système', 'Description', 'Utilisateurs', 'Permissions', 'Date de création'];
                $data = $rows->map(fn($l) => [
                    $l->name,
                    $l->default_role ? "Oui" : "Non",
                    $l->description,
                    $l->admins->isNotEmpty()
                        ? $l->admins->pluck('fullname')->join(', ')
                        : '—',
                    $l->permissions->isNotEmpty()
                        ? $l->permissions->pluck('name')->join(', ')
                        : '—',
                    $l->created_at ?? '',
                ]);
                break;
            case 'permissions':
                $query = Permission::with('roles');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                // Ajouter les utilisateurs (admins) manuellement
                foreach ($rows as $row) {
                    $adminIds = DB::table('model_has_roles')
                        ->where('role_id', $row->id)
                        ->where('model_type', \App\Models\Admin::class)
                        ->pluck('model_id');

                    $row->admins = Admin::whereIn('id', $adminIds)->get();
                }
                $headers = ['Permissions', 'Description', 'Utilisateurs', 'Rôles', 'Date de création'];
                $data = $rows->map(fn($l) => [
                    $l->name,
                    $l->description,
                    $l->admins->isNotEmpty()
                        ? $l->admins->pluck('fullname')->join(', ')
                        : '—',
                    $l->roles->isNotEmpty()
                        ? $l->roles->pluck('name')->join(', ')
                        : '—',
                    $l->created_at ?? '',
                ]);
                break;
            case 'logs':
                $query = SecurityLog::with('admin');
                if ($month) $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month]);
                $rows = $query->get();
                $headers = ['Période', 'Événement', 'Action', 'Adresse IP', 'Utilisateur', 'Gravité'];
                $data = $rows->map(fn($l) => [
                    $l->created_at->format('d M Y, à H:i'),
                    $l->event_type,
                    $l->action_taken,
                    $l->source_ip,
                    $l->admin?->fullname ?? 'System',
                    $l->severity,
                ]);
                break;
            case 'trash':
                // 1. Récupérer la collection complète d'abord
                $rowsCollection = $this->securiteController->trashCollection(); // Instancier le contrôleur

                if ($month) {
                    // 2. Filtrer la collection en utilisant la méthode Collection::filter()
                    $rowsCollection = $rowsCollection->filter(function ($item) use ($month) {
                        // On vérifie si l'item a la propriété 'deleted_at' (ce qui devrait être le cas)
                        // et si le format Y-m de la date correspond au mois recherché.
                        return $item->deleted_at && $item->deleted_at->format('Y-m') === $month;
                    });
                }

                $rows = $rowsCollection; // $rows est maintenant la collection filtrée (ou non)

                $headers = ['Période de suppression', 'Élément', 'Table', 'Supprimé par', 'Date']; // Ajuster les headers pour la corbeille
                
                $data = $rows->map(fn($l) => [
                    // L'item $l est ici un modèle soft deleted (Admin, Etablissement, etc.)
                    $l->deleted_at->format('d M Y, à H:i'),
                    $l->name 
                        ?? $l->nom 
                        ?? $l->fullname 
                        ?? $l->object 
                        ?? ($l->profile && $l->profile == "A" ? $l->profile. " (Risque Faible)" : ($l->profile == "B" ? $l->profile. " (Risque Moyen)" : $l->profile. " (Risque Fort)")) 
                        ?? ($l->last_name ." ". $l->first_name),
                    class_basename($l), // Nom du modèle (ex: 'Admin', 'Etablissement')
                    $l->deletedBy->fullname ?? 'Système',
                    $l->deleted_at,
                ]);
                break;
        }

        // Création du CSV
        $response = new StreamedResponse(function () use ($headers, $data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);
            foreach ($data as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        });

        $filename = $entity . '_' . ($month ?? now()->format('Y-m')) . '.csv';
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

        return $response;
    }
}