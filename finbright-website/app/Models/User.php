<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Files;
use App\Models\Etablissement;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'civility',
        'last_name',
        'first_name',
        'email',
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

    // Relations
    public function profilePicture()
    {
        return $this->belongsTo(Files::class, 'profile_picture_id');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function loanRequests()
    {
        return $this->hasMany(LoanRequest::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
