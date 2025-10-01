<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\Models\User; // Assurez-vous d'importer votre modèle User
use Illuminate\Support\Facades\Log;

class YouSignWebhookController extends Controller
{
    protected NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Gère les événements webhook envoyés par YouSign.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request)
    {
        // Valider si le secret webhook correspond (recommandé pour la sécurité)
        // if ($request->header('X-Yousign-Signature') !== config('services.yousign.webhook_secret')) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        $event = $request->json()->all();
        $eventType = $event['event_type'] ?? null;
        $signatureRequest = $event['signature_request'] ?? null;
        
        Log::info("YouSign Webhook Received", ['event_type' => $eventType, 'request_id' => $signatureRequest['id'] ?? 'N/A']);

        // Le nom de la requête peut servir à identifier les utilisateurs concernés (Emprunteur/Investisseur)
        $requestId = $signatureRequest['id'] ?? null; 
        
        // Dans un cas réel, vous chercheriez l'Emprunteur et l'Investisseur 
        // dans votre base de données en utilisant $requestId.
        
        // Simuler la récupération des utilisateurs concernés (à adapter)
        $admin = User::where('role', 'admin')->first(); 
        // $emprunteur = User::find($signatureRequest['custom_data']['emprunteur_id']); 
        
        if (!$admin) {
             return response()->json(['message' => 'Admin not found.'], 200);
        }

        switch ($eventType) {
            case 'signature_request.started':
                // Envoyer une notification aux signataires pour les informer que la signature est en cours
                // Vous pouvez récupérer l'URL de signature ici
                break;

            case 'signature_request.signed':
                // La requête est Complètement signée par tous les signataires.
                $message = "Le **Contrat de Prêt** a été **entièrement signé** ! Les fonds peuvent être débloqués.";
                $this->notificationService->notify($admin, 'yousign_success', $message, ['request_id' => $requestId]);
                // Logique de déblocage des fonds ici...
                break;

            case 'signature_request.refused':
                // Un des signataires a refusé de signer.
                $message = "La signature du Contrat de Prêt a été **refusée**. L'administrateur doit réviser le dossier.";
                $this->notificationService->notify($admin, 'yousign_failure', $message, ['request_id' => $requestId]);
                break;

            case 'signature_request.expired':
                // La requête a expiré.
                $message = "La période de signature du Contrat de Prêt a **expiré** sans être complétée.";
                $this->notificationService->notify($admin, 'yousign_failure', $message, ['request_id' => $requestId]);
                break;
                
            case 'signer.signed':
                // Un signataire individuel a terminé sa signature.
                $signerEmail = $event['signer']['info']['email'] ?? 'un signataire';
                $message = "Le signataire **{$signerEmail}** a signé le contrat. En attente des autres signatures.";
                $this->notificationService->notify($admin, 'yousign_partial', $message, ['signer_email' => $signerEmail]);
                // Vous pouvez aussi notifier l'autre signataire qu'il est le dernier à signer
                break;
                
            default:
                // Ignorer les autres types d'événements
                break;
        }

        return response()->json(['message' => 'Webhook received and processed'], 200);
    }
}
