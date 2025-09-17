<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = [
        'investisseur_id',
        'loan_request_id',
        'type_investment',
        'amount',
        'status'
    ];

    public function investisseur() { return $this->belongsTo(Investisseur::class); }
    public function loanRequest() { return $this->belongsTo(LoanRequest::class); }
}
