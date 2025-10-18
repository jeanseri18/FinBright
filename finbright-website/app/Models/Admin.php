<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    protected $guard_name = 'admin'; // très important

    protected $dates = ['deleted_at'];

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
