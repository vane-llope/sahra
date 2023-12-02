<?php

namespace App\Policies;

class EventPolicy extends BasePolicy
{
    public function create()
    {
        return $this->getpermission('event')->create;
    }

    public function update()
    {
        return $this->getpermission('event')->update;
    }

    public function remove()
    {
        return $this->getpermission('event')->remove;
    }
}
