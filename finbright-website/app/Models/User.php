<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Files;
use App\Models\Etablissement;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'civility',
        'last_name',
        'first_name',
        'email',
        'email_verified_at',
        'password',
        'status',
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
        'is_profile_completed',
        'profession',
        'type_of_lender',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'graduation_date' => 'string',
        'address' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'password_changed_at' => 'datetime',
        'profession',
        'type_of_lender'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static $requiredFields = [
        // Champs nécessaires pour dire que le profil emprunteur est complété
        'emprunteur' => [
            'civility', 'last_name', 'first_name', 'email', 'password', 'birth_date',
            'birth_place', 'nationality', 'address', 'phone_number', 'diploma',
            'specialization', 'current_study_year', 'remaining_years',
            'graduation_date', 'etablissement_id', 'profile_picture_id',
        ],
        // Champs nécessaires pour dire que le profil investisseur est complété
        'investisseur' => [
            'civility', 'last_name', 'first_name', 'email', 'password', 'birth_date',
            'birth_place', 'nationality', 'address', 'phone_number', 'profession',
            'type_of_lender', 'profile_picture_id',
        ],
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($user) {
            $fields = static::$requiredFields[$user->getRoleNames()->first()] ?? [];
            $user->is_profile_completed = collect($fields)
                ->every(fn($field) => !empty($user->{$field}));
        });
    }

    public function profilePicture()
    {
        return $this->belongsTo(Files::class, 'profile_picture_id');
    }
    
    public function legalEntity()
    {
        return $this->hasOne(LegalEntity::class);
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

    public function documents()
    {
        return $this->hasMany(UserDocument::class);
    }

    public function riskLevel()
    {
        return $this->belongsTo(RiskLevel::class);
    }

    public function notificationPreference()
    {
        return $this->hasOne(NotificationPreference::class);
    }

    public function getNotificationSettingsAttribute()
    {
        return $this->notificationPreference ?? new NotificationPreference();
    }

    public function getAddressAttribute($value)
    {
        $defaults = [
            'adresse' => '',
            'rue' => '',
            'code_postal' => '',
            'ville' => '',
            'pays' => '',
        ];

        $decoded = json_decode($value, true) ?? [];

        return array_merge($defaults, $decoded);
    }
}