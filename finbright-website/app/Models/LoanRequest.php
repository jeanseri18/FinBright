<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Investment::class);
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