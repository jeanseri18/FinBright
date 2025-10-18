<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key','value'];

    protected $casts = [
        'value' => 'array',
    ];

    public static function get($key, $default = null)
    {
        $s = static::where('key', $key)->first();
        return $s ? ($s->value ?? $default) : $default;
    }

    public static function set($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}