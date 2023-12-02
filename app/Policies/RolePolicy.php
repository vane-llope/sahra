<?php

namespace App\Policies;

class RolePolicy extends BasePolicy
{
    public function display()
    {
        return $this->getpermission('role')->display;
    }
    public function create()
    {
        return $this->getpermission('role')->create;
    }

    public function update()
    {
        return $this->getpermission('role')->update;
    }

    public function remove()
    {
        return $this->getpermission('role')->remove;
    }
}
