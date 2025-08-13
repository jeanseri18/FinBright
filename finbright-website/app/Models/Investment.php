<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $table = 'investment_cart';

    protected $fillable = [
        'user_id',
        'loan_request_id',
        'amount',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function loanRequest() { return $this->belongsTo(LoanRequest::class); }
}
