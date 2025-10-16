<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprunteur;
use App\Models\Investisseur;
use App\Models\Investment;
use App\Models\LoanRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function __construct(
        private AdminController $adminController,
    ) {}

    public function exportCsv($entity, $month = null)
    {
        $validEntities = ['investments_insight', 'emprunteurs', 'investisseurs', 'loan_requests', 'loans', 'taux_interets'];
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