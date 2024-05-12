<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_staff;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $authuser, User $user): bool
    {
        return $authuser->is_staff ?? $authuser->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }
}
