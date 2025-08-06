<?php

namespace App\Http\Controllers\Emprunteur;

use App\Models\Files;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class EmprunteurController extends Controller
{
    public function index()
    {
        return view('back.emprunteur.dashboard');
    }

    /**
     * Affiche le formulaire de simulation.
     */
    public function profil()
    {
        $etablissements = Etablissement::all();
        $documentsAttendus = [
            'piece_identite' => "Pièce d'identité en cours de validité (CNI recto-verso ou Passeport)",
            'justificatif_domicile' => "Justificatif de domicile de moins de 3 mois",
            'certificat_scolarite' => "Certificat de scolarité de l'année en cours ou Lettre d'admission définitive",
            'releve_bancaire' => "Relevé d'Identité Bancaire (RIB) à votre nom",
        ];
        $userDocuments = Auth::user()->documents->keyBy('type');
        $documentsGroupByType = Auth::user()->documents->groupBy('type');

        return view('back.emprunteur.mon-profil', compact([
            'etablissements',
            'documentsAttendus',
            'userDocuments',
            'documentsGroupByType',
        ]));
    }

    public function updateProfil(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'civilite' => 'required|in:M.,Mme.,Mx.',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
        ]);

        dd($request->files->all());
        // 1. Upload avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = uniqid().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads/avatars', $filename, 'public');

            $uploadedFile = Files::create([
                'filename' => $path,
                'alt' => 'Avatar utilisateur',
                'type' => 'image',
            ]);

            $user->profile_picture_id = $uploadedFile->id;
        }

        // 2. Mise à jour des champs
        $user->fill([
            'civility' => $validated['civilite'],
            'first_name' => $validated['firstname'],
            'last_name' => $validated['lastname'],
            'birth_date' => $validated['birth_date'],
            'birth_place' => $validated['birth_place'],
            'nationality' => $validated['nationality'],
            'phone_number' => $validated['phone_number'],
        ]);

        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updateAdresse(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'adresse' => 'nullable|string|max:255',
            'rue' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:10',
            'ville' => 'nullable|string|max:100',
            // 'pays' => 'nullable|string|max:100',
        ]);

        $user->address = [
            'adresse' => $request->adresse,
            'rue' => $request->rue,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            // 'pays' => $request->pays,
        ];

        $user->save();

        return back()->with('success', 'Adresse mise à jour.');
    }

    public function updateCursus(Request $request)
    {
        $request->validate([
            'etablissement' => 'required|exists:etablissements,id',
            'diplome' => 'required|string|max:100',
            'filiere' => 'required|string|max:100',
            'annee_etude' => 'nullable|string|max:50',
            'date_diplome_prevue' => 'nullable|date',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->etablissement_id = $request->etablissement;
        $user->diploma = $request->diplome;
        $user->specialization = $request->filiere;
        $user->current_study_year = $request->annee_etude;
        $user->remaining_years = $request->nombre_annees_restantes;
        $user->graduation_date = $request->date_diplome_prevue;
        $user->is_profile_completed = true;

        $user->save();

        return back()->with('success', 'Cursus académique mis à jour.');
    }

    public function enregistrerDocuments(Request $request)
    {
        $user = Auth::user();
        $documents = [
            'piece_identite' => 'Pièce d\'identité',
            'justificatif_domicile' => 'Justificatif de domicile',
            'certificat_scolarite' => 'Certificat de scolarité',
            'releve_bancaire' => 'Relevé bancaire'
        ];

        foreach ($documents as $field => $label) {
            if ($request->hasFile($field)) {
                $files = $request->file($field);
                $explanation = $request->input("{$field}_explain");

                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $storedFile = $file->store('justificatifs', 'public');

                        $fileEntity = Files::create([
                            'filename' => $storedFile,
                            'alt' => $label,
                            'type' => $file->getClientMimeType(),
                            'filesize' => $file->getSize()
                        ]);

                        UserDocument::create([
                            'user_id' => $user->id,
                            'file_id' => $fileEntity->id,
                            'type' => $field,
                            'explanation' => $explanation,
                            'status' => 'en_attente',
                        ]);
                    }
                }
            }
        }

        return back()->with('success', 'Documents envoyés avec succès !');
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

    public function filieresParDiplome(string $diplome)
    {
        $map = [
            'Master Grande École' => ['Finance de Marché', 'Management', 'Audit'],
            'Diplôme d\'Ingénieur' => ['IA', 'Robotique', 'Cybersécurité'],
            'Mastère Spécialisé' => ['Droit des Affaires', 'Fiscalité'],
            'Autre' => ['Autre spécialisation'],
        ];

        return response()->json($map[$diplome] ?? []);
    }
}