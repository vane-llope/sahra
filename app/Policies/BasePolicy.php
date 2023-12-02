<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Entity;
use App\Models\Permission;

class BasePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    protected function getpermission($entityName)
    {
        $roleId = auth()->user()->roles->first()->id;
        $entity = Entity::where('name', $entityName)->first();
        $entityId = ($entity ? $entity->id : null);
        $permission = Permission::where('role_id', $roleId)
            ->where('entity_id', $entityId)
            ->first();
        return $permission;
    }
}
