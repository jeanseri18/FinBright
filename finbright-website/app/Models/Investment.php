<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'investisseur_id',
        'loan_request_id',
        'type_investment',
        'amount',
        'status'
    ];

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

    public function investisseur() { return $this->belongsTo(Investisseur::class); }
    public function loanRequest() { return $this->belongsTo(LoanRequest::class); }
}
