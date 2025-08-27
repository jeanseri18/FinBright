<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'denomination_sociale',
        'forme_juridique',
        'numero_immatriculation',
        'dirigeants',
    ];

    protected $casts = [
        'dirigeants' => 'array', // pour manipuler JSON comme un tableau
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
