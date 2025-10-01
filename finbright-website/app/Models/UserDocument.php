<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'emprunteur_id',
        'investisseur_id',
        'representant_id',
        'beneficiaire_id',
        'file_id',
        'type',
        'explanation',
        'status',
    ];

    public function emprunteur()
    {
        return $this->belongsTo(Emprunteur::class);
    }

    public function investisseur()
    {
        return $this->belongsTo(Investisseur::class);
    }

    public function representant()
    {
        return $this->belongsTo(User::class, 'representant_id');
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    public function file()
    {
        return $this->belongsTo(Files::class);
    }
}