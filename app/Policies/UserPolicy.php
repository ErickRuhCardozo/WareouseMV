<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function view(User $user, User $model)
    {
        return true;
    }

    public function create(User $user)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function update(User $user, User $model)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function delete(User $user, User $model)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }
}
