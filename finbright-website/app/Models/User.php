<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Files;
use App\Models\Etablissement;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'civility',
        'last_name',
        'first_name',
        'email',
        'email_verified_at',
        'password',
        'birth_date',
        'birth_place',
        'nationality',
        'address',
        'phone_number',
        'diploma',
        'specialization',
        'current_study_year',
        'remaining_years',
        'graduation_date',
        'etablissement_id',
        'profile_picture_id',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'graduation_date' => 'string',
        'address' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profilePicture()
    {
        return $this->belongsTo(Files::class, 'profile_picture_id');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function loanRequests()
    {
        return $this->hasMany(LoanRequest::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function twoFactor()
    {
        return $this->hasOne(TwoFactorAuthentication::class);
    }

    public function getAddressAttribute($value)
    {
        $defaults = [
            'address' => '',
            'rue' => '',
            'code_postal' => '',
            'ville' => '',
            'pays' => '',
        ];

        $decoded = json_decode($value, true) ?? [];

        return array_merge($defaults, $decoded);
    }
}