<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'emprunteur_id',
        'status',
        'simulation_result',
        'debt_params',
        'debt_ratio',
        'object',
        'duree_campagne',
        'description',
        'explication',
        'presentation',
        'duree_campagne_modifications'
    ];

    protected $casts = [
        'simulation_result' => 'array',
        'debt_params' => 'array',
    ];

    // Relations
    public function emprunteur()
    {
        return $this->belongsTo(Emprunteur::class);
    }

    protected $dates = ['deleted_at'];

    public static function booted()
    {
        static::deleting(function ($model) {
            if (auth()->guard('admin')->check()) {
                $model->deleted_by = auth()->guard('admin')->id();
                $model->saveQuietly();
            }
        });
    }

    public function deletedBy()
    {
        return $this->belongsTo(Admin::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function getTotalInvestissementsAttribute()
    {
        return $this->investments()->sum('amount');
    }
    
    public function justifyRent()
    {
        return $this->hasMany(Files::class, 'loan_request_id')
                    ->where('type', 'justify_rent');
    }

    public function justifyDebt()
    {
        return $this->hasMany(Files::class, 'loan_request_id')
                    ->where('type', 'justify_debt');
    }
}