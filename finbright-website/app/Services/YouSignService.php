<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;

class YouSignService
{
    protected string $baseUrl;
    protected string $apiKey;
    
    // Définition de l'URL du Webhook pour recevoir les notifications d'événements
    // Assurez-vous que cette route existe dans web.php ou api.php
    protected string $webhookUrl;

    public function __construct()
    {
        // Utiliser les variables d'environnement de Laravel
        $this->baseUrl = config('services.yousign.base_url', 'https://api-sandbox.yousign.app/v3');
        $this->apiKey = config('services.yousign.api_key');
        $this->webhookUrl = config('app.url') . '/api/yousign/webhook'; 

        if (empty($this->apiKey)) {
            Log::error("YOU SIGN API KEY IS MISSING.");
        }
    }

    /**
     * Crée, configure et active une requête de signature pour deux signataires.
     *
     * @param string $pdfDocumentPath Le chemin local du document PDF à signer.
     * @param array $signer1 Les informations du premier signataire.
     * @param array $signer2 Les informations du second signataire.
     * @return array|null La réponse de l'API YouSign lors de l'activation.
     */
    public function createAndActivateSignatureRequest(
        string $pdfDocumentPath,
        array $signer1,
        array $signer2
    ): ?array {
        try {
            // Étape 1: Créer la Requête de Signature
            $requestData = [
                'name' => 'Contrat de Financement Fin\'Bright',
                'delivery_mode' => 'email',
                'timezone' => 'Europe/Paris',
                'callback_url' => $this->webhookUrl, // Ajout du webhook pour les notifications
            ];

            $signatureRequest = Http::withToken($this->apiKey)
                ->baseUrl($this->baseUrl)
                ->post('/signature_requests', $requestData)
                ->throw()
                ->json();

            $signatureRequestId = $signatureRequest['id'];
            
            // Étape 2: Ajouter le Document à la Requête
            $documentResponse = Http::withToken($this->apiKey)
                ->baseUrl($this->baseUrl)
                ->attach(
                    'file',
                    file_get_contents($pdfDocumentPath),
                    basename($pdfDocumentPath)
                )
                ->post("/signature_requests/{$signatureRequestId}/documents", [
                    'nature' => 'signable_document',
                    'parse_anchors' => 'true', // Utilisation des ancres si votre PDF en contient (ex: [SIGNHERE])
                ])
                ->throw()
                ->json();

            $documentId = $documentResponse['id'];

            // Étape 3: Ajouter les Signataires
            $this->addSigner($signatureRequestId, $documentId, $signer1);
            $this->addSigner($signatureRequestId, $documentId, $signer2);

            // Étape 4: Activer la Requête de Signature
            $activationResponse = Http::withToken($this->apiKey)
                ->baseUrl($this->baseUrl)
                ->post("/signature_requests/{$signatureRequestId}/activate")
                ->throw()
                ->json();

            // Retourne la requête activée (contient les URL de signature)
            return $activationResponse; 

        } catch (\Exception $e) {
            Log::error("YouSign API Error: " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Ajoute un signataire et son champ de signature à une requête.
     */
    protected function addSigner(string $signatureRequestId, string $documentId, array $signerInfo): array
    {
        $signerData = [
            'info' => [
                'first_name' => $signerInfo['first_name'],
                'last_name' => $signerInfo['last_name'],
                'email' => $signerInfo['email'],
                'phone_number' => $signerInfo['phone_number'],
                'locale' => 'fr',
            ],
            // Pour l'exemple, nous utilisons "no_otp", mais une authentification plus forte est recommandée
            'signature_authentication_mode' => $signerInfo['auth_mode'] ?? 'no_otp', 
            'signature_level' => $signerInfo['level'] ?? 'electronic_signature',
            'fields' => [
                [
                    'document_id' => $documentId,
                    'type' => 'signature',
                    'page' => $signerInfo['page'] ?? 1, // Page où placer la signature
                    'x' => $signerInfo['x'] ?? 50, // Coordonnée X (ajustez selon votre document)
                    'y' => $signerInfo['y'] ?? 50, // Coordonnée Y
                    'width' => 120, // Taille du champ de signature
                    'height' => 40,
                ]
            ]
        ];

        return Http::withToken($this->apiKey)
            ->baseUrl($this->baseUrl)
            ->post("/signature_requests/{$signatureRequestId}/signers", $signerData)
            ->throw()
            ->json();
    }
}
