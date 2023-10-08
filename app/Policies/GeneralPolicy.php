<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneralPolicy
{
    use HandlesAuthorization;

    public function see_hidden(User $user)
    {
        return $user->hasPermission('see_hidden');
    }
}
