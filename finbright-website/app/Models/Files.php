<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'filesize',
        'alt',
        'type'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'profile_picture_id');
    }
}