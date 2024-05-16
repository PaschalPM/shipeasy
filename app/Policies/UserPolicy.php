<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, User $account): bool
    {
        return $user->id === $account->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $account): bool
    {
        return !$user->is_staff;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }
}
