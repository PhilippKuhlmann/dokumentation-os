<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificatePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermission('certificate_viewAny');
    }

    public function create(User $user)
    {
        return $user->hasPermission('certificate_create');
    }

    public function update(User $user)
    {
        return $user->hasPermission('certificate_update');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('certificate_delete');
    }
}
