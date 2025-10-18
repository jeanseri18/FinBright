<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TrashService
{
    public static function moveToTrash(Model $model)
    {
        $model->delete();

        // Log optionnel
        \App\Models\SecurityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'event_type' => 'Donnée supprimée',
            'action_taken' => 'Déplacé vers la corbeille',
            'source_ip' => request()->ip(),
            'severity' => 'Moyen',
            'context' => ['model' => get_class($model), 'id' => $model->id],
        ]);
    }

    public static function restore(Model $model)
    {
        $model->restore();
    }

    public static function forceDelete(Model $model)
    {
        $model->forceDelete();
    }
}