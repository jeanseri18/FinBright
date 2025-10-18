<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiskLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile',
        'characteristics',
        'score_range',
        'yield',
    ];

    protected $casts = [
        'characteristics' => 'array',
    ];

    protected $dates = ['deleted_at'];

    public function emprunteurs()
    {
        return $this->hasMany(User::class);
    }
}