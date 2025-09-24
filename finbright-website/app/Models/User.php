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
        'profile_picture_id',
        'is_profile_completed',
        'admin_id',
        'investisseur_id',
        'emprunteur_id',
        'role', // emprunteur | investisseur | admin
    ];

    protected $casts = [
        'birth_date' => 'date',
        'address' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'password_changed_at' => 'datetime',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected static $requiredFields = [
    //     'civility', 'last_name', 'first_name', 'email', 'password', 'birth_date',
    //     'birth_place', 'nationality', 'address', 'phone_number', 'profile_picture_id',
    // ];

    // protected static function boot()
    // {
    //     parent::boot();
        
    //     static::updating(function ($user) {
    //         $user->is_profile_completed = collect(static::$requiredFields)->every(function ($field) use ($user) {
    //             return !empty($user->{$field});
    //         });
    //     });
    // }

    // Relations
    public function investisseur()
    {
        return $this->hasOne(Investisseur::class);
    }

    public function emprunteur()
    {
        return $this->hasOne(Emprunteur::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function profilePicture()
    {
        return $this->belongsTo(Files::class, 'profile_picture_id');
    }
    
    public function twoFactor()
    {
        return $this->hasOne(TwoFactorAuthentication::class);
    }

    public function documents()
    {
        return $this->hasMany(UserDocument::class);
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