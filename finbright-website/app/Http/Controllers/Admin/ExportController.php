<?php

namespace App\Http\Controllers\Admin;

use App\Models\RiskLevel;
use App\Models\Emprunteur;
use App\Models\Investment;
use App\Models\LoanRequest;
use App\Models\Investisseur;
use App\Models\Etablissement;
use App\Models\SecurityLog;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class ExportController extends Controller
{
    public function __construct(
        private AdminController $adminController,
    ) {}

    public function exportCsv($entity, $month = null)
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
            'logs'
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