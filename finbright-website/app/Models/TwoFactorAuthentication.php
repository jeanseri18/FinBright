<?php

namespace App\Models;

use App\Mail\TwoFactorCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TwoFactorAuthentication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_enabled',
        'code',
        'expires_at',
        'confirmed_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'is_enabled' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function generateCode()
    {
        $this->code = rand(100000, 999999);
        $this->expires_at = now()->addMinutes(5);
        $this->confirmed_at = null;
        $this->save();

        // Envoi du mail ici
        Mail::to($this->user->email)->send(new TwoFactorCodeMail($this->user, $this->code));
    }

    public function resetCode()
    {
        $this->code = null;
        $this->expires_at = null;
        $this->confirmed_at = now();
        $this->save();
    }
}