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
        'diploma', 'specialization', 'current_study_year', 'remaining_years',
        'graduation_date', 'etablissement_id',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::updating(function ($user) {
            $user->is_profile_completed = collect(static::$requiredFields)->every(function ($field) use ($user) {
                return !empty($user->{$field});
            });
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
