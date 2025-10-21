<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiskLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile',
        'characteristics',
        'score_range',
        'yield',
    ];

    protected $casts = [
        'characteristics' => 'array',
    ];

    protected $dates = ['deleted_at'];

    public static function booted()
    {
        static::deleting(function ($model) {
            if (auth()->guard('admin')->check()) {
                $model->deleted_by = auth()->guard('admin')->id();
                $model->saveQuietly();
            }
        });
    }

    public function deletedBy()
    {
        return $this->belongsTo(Admin::class);
    }

    public function emprunteurs()
    {
        return $this->hasMany(User::class);
    }
}