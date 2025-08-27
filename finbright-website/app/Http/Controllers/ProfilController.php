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
    public function updateProfil(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'civilite' => 'required|in:M.,Mme.,Mx.',
            'firstname' => 'nullable|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:100',
            'profession' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);
        
        // 1. Upload avatar si présent
        if ($request->hasFile('avatar')) {
            // Supprimer l'ancien avatar
            if ($user->profile_picture_id && $user->profilePicture) {
                Storage::disk('public')->delete($user->profilePicture->filename);
                $user->profilePicture->delete();
            }

            $file = $request->file('avatar');
            $safeName = uniqid().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $path = $file->storeAs('uploads/avatars', $safeName, 'public');

            $uploadedFile = Files::create([
                'filename' => $path,
                'alt' => 'Avatar utilisateur',
                'type' => 'image',
                'filesize' => $file->getSize()
            ]);

            $user->profile_picture_id = $uploadedFile->id;
        }

        // 2. Mise à jour des champs
        $user->fill([
            'civility' => $validated['civilite'] ?? null,
            'first_name' => $validated['firstname'] ?? null,
            'last_name' => $validated['lastname'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'birth_place' => $validated['birth_place'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'profession' => $validated['profession'] ?? null,
            'phone_number' => $validated['phone_number'] ?? null,
        ]);

        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

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
            'extrait_immatriculation' => "Extrait d'immatriculation",
            'statuts_a_jour_signes' => "Statuts à jour et signés"
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
                            'status' => 'verification',
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