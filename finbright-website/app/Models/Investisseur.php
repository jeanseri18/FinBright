<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investisseur extends Model
{
    protected $fillable = [
        'user_id',
        'capital_investi',
        'revenu_annuel',
        'profil_risque',
        'profession',
        'ppe',
        'adresse_representant',
        'fonction',
        'type_of_lender',
        'funds_from_country',
        'creation_date',
        'denomination_sociale',
        'forme_juridique',
        'numero_immatriculation',
        'profile'
    ];

    protected $casts = [
        'profession',
        'type_of_lender',
        'funds_from_country'
    ];

    protected static $requiredFields = [
        'user' => [
            'civility', 'last_name', 'first_name', 'email', 'password', 'birth_date',
            'birth_place', 'nationality', 'address', 'phone_number', 'profile_picture_id',
        ],
        'Personne morale' => [
            'adresse_representant', 'fonction', 'funds_from_country', 'creation_date',
            'denomination_sociale', 'forme_juridique', 'numero_immatriculation'
        ],
        'Personne physique' => [
            'profession', 'funds_from_country',
        ]
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::saved(function ($investisseur) {
            $user = $investisseur->user;
            $type_of_lender = $investisseur->type_of_lender;

            $user_completed = collect(static::$requiredFields['user'])->every(fn($field) => !empty($user->{$field}));
            $investisseur_completed = collect(static::$requiredFields[$type_of_lender])->every(fn($field) => !empty($investisseur->{$field}));

            $user->is_profile_completed = $user_completed && $investisseur_completed;
            $user->saveQuietly(); // éviter une boucle infinie
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(UserDocument::class, 'investisseur_id');
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function beneficiaires()
    {
        return $this->hasMany(Beneficiaire::class);
    }
}
