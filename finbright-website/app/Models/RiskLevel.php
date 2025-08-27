<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile',
        'characteristics',
        'score_range',
        'yield',
    ];

    protected $casts = [
        'characteristics' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}