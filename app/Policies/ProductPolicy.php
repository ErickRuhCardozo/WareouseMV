<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role_id === UserRole::IS_ADMIN; 
    }

    public function create(User $user)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function update(User $user, Product $product)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function delete(User $user, Product $product)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }
}
