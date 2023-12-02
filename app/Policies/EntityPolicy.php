<?php

namespace App\Policies;

class EntityPolicy extends BasePolicy
{
    public function display()
    {
        return $this->getpermission('entity')->display;
    }
    public function create()
    {
        return $this->getpermission('entity')->create;
    }

    public function update()
    {
        return $this->getpermission('entity')->update;
    }

    public function remove()
    {
        return $this->getpermission('entity')->remove;
    }
}
