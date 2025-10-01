<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class YouSignController extends Controller
{
    public function signerDocumentAvecDeuxSignataires()
    {
        $youSign = app(\App\Services\YouSignService::class);

        // Étape 1 - Créer une requête
        // $signatureRequest = $youSign->createSignatureRequest(
        //     "Contrat de prêt étudiant",
        //     route('webhooks.yousign') // callback Laravel
        // );

        // $signatureRequestId = $signatureRequest['id'];

        // Étape 2 - Ajouter un document
        // $document = $youSign->addDocument($signatureRequestId, storage_path('app/contracts/loan.pdf'));
        // $documentId = $document['id'];

        // Étape 3 - Ajouter 2 signataires
        // $youSign->addSigner($signatureRequestId, [
        //     "info" => [
        //         "first_name" => "Alice",
        //         "last_name" => "Emprunteur",
        //         "email" => "alice@example.com",
        //         "locale" => "fr"
        //     ],
        //     "signature_authentication_mode" => "no_otp",
        //     "signature_level" => "electronic_signature",
        //     "fields" => [[
        //         "document_id" => $documentId,
        //         "type" => "signature",
        //         "page" => 1,
        //         "x" => 50,
        //         "y" => 100,
        //         "height" => 37,
        //         "width" => 85
        //     ]]
        // ]);

        // $youSign->addSigner($signatureRequestId, [
        //     "info" => [
        //         "first_name" => "Bob",
        //         "last_name" => "Investisseur",
        //         "email" => "bob@example.com",
        //         "locale" => "fr"
        //     ],
        //     "signature_authentication_mode" => "no_otp",
        //     "signature_level" => "electronic_signature",
        //     "fields" => [[
        //         "document_id" => $documentId,
        //         "type" => "signature",
        //         "page" => 1,
        //         "x" => 200,
        //         "y" => 100,
        //         "height" => 37,
        //         "width" => 85
        //     ]]
        // ]);

        // Étape 4 - Activer la requête
        // $youSign->activateSignatureRequest($signatureRequestId);
    }
}