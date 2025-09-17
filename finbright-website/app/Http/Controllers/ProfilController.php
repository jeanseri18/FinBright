<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use ZipArchive;


class ProfilController extends Controller
{
    public function updateAdresse(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'adresse' => 'required|string|max:255',
            'rue' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'ville' => 'required|string|max:100',
            'pays' => 'nullable|string|max:100',
        ]);

        $user->address = [
            'adresse' => $request->adresse ?? null,
            'rue' => $request->rue ?? null,
            'code_postal' => $request->code_postal ?? null,
            'ville' => $request->ville ?? null,
            'pays' => $request->pays ?? null,
        ];

        $user->save();

        return back()->with('success', 'Adresse mise à jour.');
    }

    public function enregistrerDocuments(Request $request)
    {
        $user = Auth::user();

        $documents = [
            'piece_identite' => 'Pièce d\'identité',
            'justificatif_domicile' => 'Justificatif de domicile',
            'certificat_scolarite' => 'Certificat de scolarité',
            'releve_bancaire' => 'Relevé bancaire',
            'justificatif_activite_pro' => 'Justificatif d\'activité professionnelle',
            'declaration_origine_fonds' => 'Déclaration sur l\'origine des fonds',
            'statuts_a_jour_signes' => "Statuts à jour et signés",
            'recepisse_de_declaration' => "Récépissé de déclaration en préfecture",
            'liste_des_membres_du_conseil' => "Liste des membres du conseil d'administration"
        ];

        foreach ($documents as $field => $label) {
            if ($request->hasFile($field)) {
                $files = $request->file($field);
                $explanation = $request->input("{$field}_explain");

                // Vérifier si un document du même type existe déjà
                $existingDoc = UserDocument::where('user_id', $user->id)
                    ->where('type', $field)
                    ->with('file')
                    ->first();

                if ($existingDoc) {
                    // Supprimer physiquement l'ancien fichier
                    if ($existingDoc->file && Storage::disk('public')->exists($existingDoc->file->filename)) {
                        Storage::disk('public')->delete($existingDoc->file->filename);
                    }

                    // Supprimer en base
                    $existingDoc->file()->delete();
                    $existingDoc->delete();
                }

                foreach ((array) $files as $file) {
                    if ($file->isValid()) {
                        // Mapping du type MIME vers l'ENUM
                        $typeMime = explode('/', $file->getClientMimeType())[0];
                        switch ($typeMime) {
                            case 'image':
                                $type = 'image';
                                break;
                            case 'video':
                                $type = 'video';
                                break;
                            case 'application':
                            case 'text':
                            default:
                                $type = 'document';
                                break;
                        }

                        // Sauvegarder le fichier
                        $storedFile = $file->store('uploads/justificatifs', 'public');

                        // Enregistrer dans Files
                        $fileEntity = Files::create([
                            'filename' => $storedFile,
                            'alt' => $label,
                            'type' => $type,
                            'filesize' => $file->getSize()
                        ]);

                        // Enregistrer dans UserDocument
                        UserDocument::create([
                            'user_id' => $user->id,
                            'file_id' => $fileEntity->id,
                            'type' => $field,
                            'explanation' => $explanation,
                            'status' => 'À approuver',
                        ]);
                    }
                }
            }
        }

        return back()->with('success', 'Documents envoyés avec succès !');
    }
    
    /**
     * Télécharger un document
     */
    public function exportDocument($id)
    {
        $document = UserDocument::with('file')->findOrFail($id);

        $documents = UserDocument::with('file')
            ->where('user_id', $document->user_id)
            ->where('type', $document->type)
            ->get();

        if ($documents->isEmpty()) {
            return back()->with('error', 'Aucun fichier disponible pour ce document.');
        }

        // Si un seul document, télécharger directement
        if ($documents->count() === 1) {
            $file = $documents->first()->file;

            if ($file && Storage::disk('public')->exists($file->filename)) {
                return Storage::disk('public')->download($file->filename, $file->alt);
            }

            return back()->with('error', 'Le fichier est introuvable.');
        }

        // Sinon, créer un zip regroupant les fichiers
        $zipFileName = 'documents_' . $document->type . '.zip';
        $zipPath = storage_path("app/public/{$zipFileName}");

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($documents as $doc) {
                $file = $doc->file;
                if ($file && Storage::disk('public')->exists($file->filename)) {
                    $zip->addFile(
                        Storage::disk('public')->path($file->filename),
                        $file->alt ?? basename($file->filename) // on préfère alt si dispo
                    );
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Supprimer un document
     */
    public function deleteDocument($id)
    {
        $document = UserDocument::with('file')->findOrFail($id);

        // Supprimer le fichier physique
        if ($document->file && Storage::disk('public')->exists($document->file->filename)) {
            Storage::disk('public')->delete($document->file->filename);
        }

        // Supprimer en base
        if ($document->file) {
            $document->file->delete();
        }
        $document->delete();

        return back()->with('success', 'Document supprimé avec succès.');
    }

    public function notificationsPreference(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'notification_types' => 'nullable|string|in:email_notifications',
            'desktop_notification' => 'required|string|in:new_messages,direct,disabled',
            'email_notification' => 'required|string|in:new_messages_statuses,messages_statuses,disabled',
        ]);

        $user->notificationPreference()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'email_notifications' => $request->has('notification_types') && $request->notification_types === 'email_notifications',
                'sms_notifications' => false, // sera activé plus tard
                'desktop_notification' => $data['desktop_notification'],
                'email_notification' => $data['email_notification'],
            ]
        );

        return back()->with('success', 'Préférences de notifications mises à jour.');
    }

    public function updateEmail(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'required|string|max:100',
        ]);

        $user->fill([
            'email' => $validated['email']
        ]);

        $user->save();

        return back()->with('success', 'Adresse Email mis à jour avec succès.');
    }

    public function twoFactorSetup(Request $request)
    {
        $user = Auth::user();

        // Vérifie que le mot de passe est correct
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Mot de passe incorrect.');
        }

        // Active ou désactive l'authentification à deux facteurs
        $enabled = $request->has('twoFactor_email');

        if ($user->twoFactor) {
            $user->twoFactor->is_enabled = $enabled;
            $user->twoFactor->save();
        } else {
            $user->twoFactor()->create([
                'is_enabled' => $enabled,
            ]);
        }

        return back()->with('success', 'Authentification à deux facteurs mise à jour.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        $user->password_changed_at = now();
        $user->save();

        return back()->with('success', 'Votre mot de passe a été mis à jour avec succès.');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete(); // Soft delete

        return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }

    public function deactivateAccount()
    {
        $user = Auth::user();

        $user->status = 'inactive';
        $user->save();

        Auth::logout();

        return redirect('/')->with('success', 'Votre compte a été désactivé temporairement.');
    }
}