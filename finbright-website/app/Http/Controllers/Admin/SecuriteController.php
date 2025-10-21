<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Files;
use App\Models\Setting;
use App\Models\RiskLevel;
use App\Models\Investment;
use App\Models\LoanRequest;
use App\Models\SecurityLog;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordSetupMail;
use Illuminate\Support\Facades\Mail;
use App\Services\InvestorRiskService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ParametresController;

class SecuriteController extends Controller
{
    public function __construct(
        
    ) {}

    public function listeUtilisateurs(Request $request)
    {
        Session::put('menu_actif', 'utilisateurs');

        // Récupérer les 3 derniers mois où il y a des utilisateurs créés
        $months = Admin::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        
        $utilisateurs = Admin::orderBy(
            'created_at',
            $request->ordre == 2 ? 'asc' : 'desc' // 2 = plus anciens, sinon récents
        )->paginate(10);
        $roles = \Spatie\Permission\Models\Role::where('guard_name', 'admin')
           ->get(['id','name','description']);
        return view('back.admin.securite.utilisateurs', compact('utilisateurs', 'months', 'roles'));
    }

    public function saveUtilisateurs(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'id' => 'nullable|exists:admins,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . ($request->id ?? 'NULL') . ',id',
            'phone_number' => 'nullable|string|max:50',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        // Création ou mise à jour
        $admin = Admin::updateOrCreate(
            ['id' => $validated['id'] ?? null],
            [
                'fullname' => $validated['fullname'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'] ?? null,
            ]
        );
        
        $isNew = empty($validated['id']);

        // Upload avatar
        if ($request->hasFile('avatar')) {
            if ($admin->profile_picture_id && $admin->profilePicture) {
                Storage::disk('public')->delete($admin->profilePicture->filename);
                $admin->profilePicture->delete();
            }

            $file = $request->file('avatar');
            $safeName = uniqid().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $path = $file->storeAs('uploads/avatars', $safeName, 'public');

            $uploadedFile = Files::create([
                'filename' => $path,
                'alt' => 'Avatar admin',
                'type' => 'image',
                'filesize' => $file->getSize()
            ]);

            $admin->profile_picture_id = $uploadedFile->id;
            $admin->save();
        }

        // Attribution des rôles
        $roles = Role::whereIn('id', $validated['roles'])->pluck('name')->toArray();
        $admin->syncRoles($roles);

        // Envoi du mail de configuration de mot de passe si c’est un nouveau
        if ($isNew) {
            // Génération du token via le broker "admins"
            /** @var \Illuminate\Auth\Passwords\PasswordBroker $broker */
            $broker = Password::broker('admins');

            /** @phpstan-ignore-next-line */
            $token = $broker->createToken($admin);

            // Construction du lien (personnalisé)
            $link = url(route('admin.password.reset', [
                'token' => $token,
                'email' => $admin->email,
            ], false));

            Mail::to($admin->email)->send(new AdminPasswordSetupMail($admin->fullname, $link));
        }

        $message = $isNew
            ? 'Utilisateur ajouté avec succès. Un mail, pour réinitialiser votre mot de passe, lui a été envoyé à son adresse e-mail. Merci.'
            : 'Utilisateur modifié avec succès';

        return redirect()->route('admin.securite.utilisateurs')->with('success', $message);
    }

    public function jsonUtilisateur(Admin $user)
    {
        $user->load(['roles:id,name', 'profilePicture']);
        return response()->json($user);
    }

    public function deleteUtilisateur($id)
    {
        $utilisateur = Admin::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('admin.securite.utilisateurs')
            ->with('success', "L'utilisateur « {$utilisateur->fullname} » a été supprimé avec succès.");
    }

    public function listeRoles(Request $request, ParametresController $parametres)
    {
        Session::put('menu_actif', 'roles');

        // Récupérer les 3 derniers mois où des rôles ont été créés
        $months = Role::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        // Charger les rôles avec leurs permissions (relation Spatie)
        $roles = Role::where('guard_name', 'admin')
            ->with('permissions')
            ->orderBy('created_at', $request->ordre == 2 ? 'asc' : 'desc')
            ->paginate(10);

        $permissions = Permission::where('guard_name', 'admin')->orderBy('name')->get(); // Toutes les permissions disponibles
        $icons = $parametres->getIcons(); // Toutes les icônes issue de ParametresController

        // Ajouter les utilisateurs (admins) manuellement
        foreach ($roles as $role) {
            $adminIds = DB::table('model_has_roles')
                ->where('role_id', $role->id)
                ->where('model_type', \App\Models\Admin::class)
                ->pluck('model_id');

            $role->admins = Admin::whereIn('id', $adminIds)->get();
        }

        return view('back.admin.securite.roles', compact('roles', 'months', 'permissions', 'icons'));
    }

    public function saveRole(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'id' => 'nullable|exists:roles,id',
            'icon' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'default_role' => 'nullable|boolean',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        // Conversion du champ "default_role" en booléen clair
        $validated['default_role'] = $request->has('default_role');

        // Création ou mise à jour du rôle
        $role = Role::updateOrCreate(
            ['id' => $validated['id'] ?? null],
            [
                'icon' => $validated['icon'],
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'default_role' => $validated['default_role'],
                'guard_name' => 'admin', // important si tu utilises plusieurs guards
            ]
        );

        // Synchronisation des permissions cochées
        if (!empty($validated['permissions'])) {
            // On récupère les noms de permissions car Spatie gère la sync par nom, pas par id
            $permissions = \Spatie\Permission\Models\Permission::whereIn('id', $validated['permissions'])->pluck('name')->toArray();
            $role->syncPermissions($permissions);
        } else {
            // Si aucune permission cochée, on les retire toutes
            $role->syncPermissions([]);
        }

        // Message flash
        $message = $request->filled('id')
            ? 'Rôle modifié avec succès'
            : "le rôle « {$role->name} » a été ajouté avec succès";

        return redirect()->route('admin.securite.roles')
            ->with('success', $message);
    }

    public function jsonRole(Role $role)
    {
        // Charger les permissions et les utilisateurs associés
        $adminIds = DB::table('model_has_roles')
            ->where('role_id', $role->id)
            ->where('model_type', \App\Models\Admin::class)
            ->pluck('model_id');

        $role->load('permissions');
        $role->admins = Admin::whereIn('id', $adminIds)->get();

        return response()->json($role);
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.securite.roles')
            ->with('success', "Le rôle « {$role->name} » a été supprimé avec succès.");
    }

    public function listePermissions(Request $request, ParametresController $parametres)
    {
        Session::put('menu_actif', 'permissions');

        // Récupérer les 3 derniers mois où des rôles ont été créés
        $months = Permission::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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

        // Charger les permissions avec leurs rôles
        $permissions = Permission::where('guard_name', 'admin')
            ->with('roles') // Spatie relation
            ->orderBy('created_at', $request->ordre == 2 ? 'asc' : 'desc')
            ->paginate(10);

        $icons = $parametres->getIcons(); // Toutes les icônes

        // Ajouter les utilisateurs (admins) pour chaque permission
        foreach ($permissions as $permission) {
            $admins = collect();
            foreach ($permission->roles as $role) {
                $roleAdmins = $role->users; // récupère tous les admins de ce rôle
                $admins = $admins->merge($roleAdmins);
            }
            // On retire les doublons
            $permission->admins = $admins->unique('id');
        }

        return view('back.admin.securite.permissions', compact('permissions', 'months', 'icons'));
    }

    public function savePermission(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'id' => 'nullable|exists:permissions,id',
            'icon' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Création ou mise à jour du rôle
        $permission = Permission::updateOrCreate(
            ['id' => $validated['id'] ?? null],
            [
                'icon' => $validated['icon'],
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'guard_name' => 'admin', // important si tu utilises plusieurs guards
            ]
        );

        // Message flash
        $message = $request->filled('id')
            ? 'Permission modifié avec succès'
            : "La permission « {$permission->name} » a été ajouté avec succès";

        return redirect()->route('admin.securite.permissions')
            ->with('success', $message);
    }

    public function jsonPermission(Permission $permission)
    {
        return response()->json($permission);
    }

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('admin.securite.permissions')
            ->with('success', "La permission « {$permission->name} » a été supprimé avec succès.");
    }

    public function securityLog(Request $request)
    {
        Session::put('menu_actif', 'logs');
        // Récupérer les 3 derniers mois où il y a des utilisateurs créés
        $months = SecurityLog::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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
        
        $logs = SecurityLog::with('admin')
            ->latest()
            ->get();

        return view('back.admin.securite.security_log', compact('logs', 'months'));
    }

    public function settingsLogs(Request $request)
    {
        $data = $request->validate([
            'auto_delete' => 'nullable|boolean',
        ]);

        Setting::set('logs.auto_delete', (bool) ($data['auto_delete'] ?? false));

        return response()->json(['success' => true, 'message' => 'Paramètres sauvegardés.', 'data' => $data]);
    }

    public function deleteLog($id)
    {
        $log = SecurityLog::findOrFail($id);
        $log->delete();

        return redirect()->route('admin.securite.logs')
            ->with('success', "Le log a été supprimé avec succès.");
    }

    public function listeTrash()
    {
        Session::put('menu_actif', 'trash');
        // Récupérer les 3 derniers mois où il y a des utilisateurs créés
        $months = SecurityLog::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"))
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
        
        $trashItems = $this->trashCollection();
        
        return view('back.admin.securite.corbeille', compact('trashItems', 'months'));
    }

    public function trashCollection()
    {
        $models = [
            Admin::class, Etablissement::class, Investment::class, LoanRequest::class, 
            RiskLevel::class, Role::class, Permission::class, User::class
        ];

        $allDeletedItems = collect();
        
        foreach ($models as $modelClass) {
            // Pour les modèles qui n'ont pas de relation 'deletedBy', on ne l'inclut pas
            $query = $modelClass::onlyTrashed();
            
            // Vérification si la relation deletedBy existe sur le modèle
            if (method_exists($modelClass, 'deletedBy')) {
                $query->with('deletedBy');
            }
            
            $allDeletedItems = $allDeletedItems->concat($query->get());
        }

        // On combine tout dans une collection unique et on trie
        return $allDeletedItems->sortByDesc('deleted_at');
    }
    
    public function settingsTrash(Request $request)
    {
        $data = $request->validate([
            'auto_delete' => 'nullable|boolean',
            'frequency' => 'required|string|in:daily,weekly,monthly,yearly',
        ]);

        Setting::set('trash.auto_delete', (bool) ($data['auto_delete'] ?? false));
        Setting::set('trash.frequency', $data['frequency']);

        return response()->json(['success' => true, 'message' => 'Paramètres sauvegardés.', 'data' => $data]);
    }

    public function restore($model, $id)
    {
        $modelClass = "App\\Models\\" . ucfirst($model);
        $record = $modelClass::onlyTrashed()->findOrFail($id);
        $record->restore();

        return back()->with('success', 'Élément restauré avec succès.');
    }

    public function destroy($model, $id)
    {
        $modelClass = "App\\Models\\" . ucfirst($model);
        $record = $modelClass::onlyTrashed()->findOrFail($id);
        $record->forceDelete();

        return back()->with('success', 'Élément supprimé définitivement.');
    }
    
    public function purge()
    {
        Admin::onlyTrashed()->forceDelete();
        Etablissement::onlyTrashed()->forceDelete();
        Investment::onlyTrashed()->forceDelete();
        LoanRequest::onlyTrashed()->forceDelete();
        RiskLevel::onlyTrashed()->forceDelete();
        Role::onlyTrashed()->forceDelete();
        Permission::onlyTrashed()->forceDelete();
        User::onlyTrashed()->forceDelete();

        return back()->with('success', 'Tous les éléments supprimés définitivement.');
    }
}