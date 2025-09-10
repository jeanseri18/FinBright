<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'investisseur_id',
        'nom',
        'prenoms',
        'birth_date',
        'birth_place',
        'nationalite',
        'adresse',
    ];

    public function documents()
    {
        return $this->hasMany(UserDocument::class, 'beneficiaire_id');
    }

    public function investisseur()
    {
        return $this->belongsTo(Investisseur::class);
    }
}