<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityLog extends Model
{
    protected $fillable = [
        'admin_id', 'event_type', 'action_taken', 'source_ip',
        'severity', 'method', 'context',
    ];

    protected $casts = [
        'context' => 'array',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}