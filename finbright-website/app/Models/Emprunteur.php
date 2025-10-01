<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\NotificationService;

class Emprunteur extends Model
{
    protected $fillable = [
        'user_id',
        'diploma',
        'specialization',
        'current_study_year',
        'remaining_years',
        'graduation_date',
        'etablissement_id',
    ];

    protected $casts = [
        'graduation_date' => 'string',
    ];

    protected static $requiredFields = [
        'user' => [
            'civility', 'last_name', 'first_name', 'email', 'password', 'birth_date',
            'birth_place', 'nationality', 'address', 'phone_number', 'profile_picture_id',
        ],
        'emprunteur' => [
            'diploma', 'specialization', 'current_study_year', 'remaining_years',
            'graduation_date', 'etablissement_id',
        ]
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::saved(function ($emprunteur) {
            $user = $emprunteur->user;

            $user_completed = collect(static::$requiredFields['user'])->every(fn($field) => !empty($user->{$field}));
            $emprunteur_completed = collect(static::$requiredFields['emprunteur'])->every(fn($field) => !empty($emprunteur->{$field}));
            
            $wasCompleted = $user->is_profile_completed; // ancienne valeur
            $isNowCompleted = $user_completed && $emprunteur_completed;

            // Mise à jour sans boucle infinie
            if ($wasCompleted !== $isNowCompleted) {
                $user->is_profile_completed = $isNowCompleted;
                $user->saveQuietly();

                // Déclencher les notifications seulement à la transition false -> true
                if ($isNowCompleted) {
                    $notificationService = app(\App\Services\NotificationService::class);

                    // Préférences de notification
                    $preferences = $user->notificationPreference;
                    if ($preferences && $preferences->desktop_notification !== "disabled") {
                        // Notifier l’emprunteur
                        $notificationService->notify(
                            $user,
                            'profile_completed',
                            "Vous avez complété votre profil. Un administrateur se chargera de vérifier vos informations.",
                            [
                                'user_id' => $user->id,
                                'icon' => '<div class=\"flex items-center shrink-0 justify-center size-8 bg-green-50 rounded-full border border-green-200\"><i class=\"ki-filled ki-check text-lg text-green-500\"></i></div>',
                            ]
                        );
                    }

                    // Notifier les admins
                    $admins = \App\Models\User::role('admin')->get(); // si tu utilises spatie
                    foreach ($admins as $admin) {
                        $notificationService->notify(
                            $admin,
                            'new_profile_completed',
                            "<a class='hover:text-primary text-mono font-semibold' href='#'>
                                {$user->first_name} {$user->last_name}</a> vient de compléter son profil",
                            [
                                'emprunteur_id' => $emprunteur->id,
                                'avatar' => $user->profilePicture->filename ?? null,
                                'actions' => [
                                    ['label' => 'Laisser en attente', 'action' => 'pending'],
                                    ['label' => 'Accepter', 'action' => 'accept'],
                                ],
                            ]
                        );
                    }
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(UserDocument::class, 'emprunteur_id');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function loanRequests()
    {
        return $this->hasMany(LoanRequest::class);
    }

    public function riskLevel()
    {
        return $this->belongsTo(RiskLevel::class);
    }
}
