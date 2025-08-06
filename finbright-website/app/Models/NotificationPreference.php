<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationPreference extends Model
{
    protected $fillable = [
        'user_id',
        'email_notifications',
        'sms_notifications',
        'desktop_notification',
        'email_notification',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}