<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class RadiocenterPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermission('radiocenter_viewAny');
    }

    public function create(User $user)
    {
        return $user->hasPermission('radiocenter_create');
    }

    public function update(User $user)
    {
        return $user->hasPermission('radiocenter_update');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('radiocenter_delete');
    }
}
