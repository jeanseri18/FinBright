<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    /**
     * Récupère les administrateurs qui ont ce rôle
     */
    public function admins()
    {
        return $this->morphedByMany(Admin::class, 'model', config('permission.table_names.model_has_roles'));
    }
}