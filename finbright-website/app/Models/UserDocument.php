<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'beneficiaire_id',
        'investisseur_id',
        'emprunteur_id',
        'file_id',
        'type',
        'explanation',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    public function investisseur()
    {
        return $this->belongsTo(Investisseur::class);
    }

    public function emprunteur()
    {
        return $this->belongsTo(Emprunteur::class);
    }

    public function file()
    {
        return $this->belongsTo(Files::class);
    }
}