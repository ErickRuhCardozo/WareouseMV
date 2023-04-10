<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function create(User $user)
    {
        return in_array($user->role_id, [UserRole::IS_ADMIN, UserRole::IS_MANAGER]);
    }

    public function update(User $user, Order $order)
    {
        return $order->requester_id === $user->id;
    }

    public function delete(User $user, Order $order)
    {
        return $order->requester_id === $user->id;
    }
}
