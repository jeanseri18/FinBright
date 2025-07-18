<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'duration',
        'status',
        'deferred',
        'deferred_months',
        'simulation_result',
    ];

    protected $casts = [
        'simulation_result' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}