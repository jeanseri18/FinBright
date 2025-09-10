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
        'creation_date',
        'denomination_sociale',
        'forme_juridique',
        'numero_immatriculation',
        'profile'
    ];

    protected $casts = [
        'profession',
        'type_of_lender',
    ];

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
