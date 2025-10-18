<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etablissement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'ville',
        'pays',
    ];

    protected $dates = ['deleted_at'];

    public function emprunteurs()
    {
        return $this->hasMany(Emprunteur::class);
    }
}