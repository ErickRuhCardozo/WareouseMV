<?php

namespace App\Policies;

use App\Models\Unity;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role_id === UserRole::IS_ADMIN;
    }

    public function view(User $user, Unity $unity)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role_id === UserRole::IS_ADMIN;
    }

    public function update(User $user, Unity $unity)
    {
        return $user->role_id === UserRole::IS_ADMIN;
    }

    public function delete(User $user, Unity $unity)
    {
        return $user->role_id === UserRole::IS_ADMIN;
    }
}
