<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'admin'; // très important

    protected $fillable = [
        'fullname', 'email', 'phone_number', 'status', 'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profilePicture()
    {
        return $this->belongsTo(Files::class, 'profile_picture_id');
    }

    public function notifications()
    {
        return $this->morphMany(\App\Models\Notification::class, 'notifiable');
    }

    public function unreadNotifications()
    {
        return $this->morphMany(\App\Models\Notification::class, 'notifiable')->where('is_read', false)->latest();
    }
}
