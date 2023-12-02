<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy extends BasePolicy
{
    public function display()
    {
        return $this->getpermission('user')->display;
    }
    public function create()
    {
        return $this->getpermission('user')->create;
    }

    public function update()
    {
        return $this->getpermission('user')->update;
    }

    public function remove()
    {
        return $this->getpermission('user')->remove;
    }
}
