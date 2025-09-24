<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

            $user->is_profile_completed = $user_completed && $emprunteur_completed;
            $user->saveQuietly(); // éviter une boucle infinie
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
