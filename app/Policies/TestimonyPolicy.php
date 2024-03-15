<?php

namespace App\Policies;

use App\Models\Testimony;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TestimonyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return  $user->can('read testimony');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Testimony $testimony): bool
    {
        return  $user->can('read testimony');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return  $user->can('create testimony');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Testimony $testimony): bool
    {
        return  $user->can('update testimony');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Testimony $testimony): bool
    {
        return  $user->can('delete testimony');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Testimony $testimony): bool
    {
        return  $user->hasRoles(['super-admin', 'admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Testimony $testimony): bool
    {
        return  $user->hasRoles(['super-admin', 'admin']);
    }
}
