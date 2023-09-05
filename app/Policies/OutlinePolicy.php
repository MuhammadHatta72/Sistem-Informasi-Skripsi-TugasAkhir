<?php

namespace App\Policies;

use App\Models\Outline;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OutlinePolicy
{
    /**
     * Determine whether the mahasiswa can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can view the model.
     */
    public function view(User $user, Outline $outline): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can update the model.
     */
    public function update(User $user, Outline $outline): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can delete the model.
     */
    public function delete(User $user, Outline $outline): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can restore the model.
     */
    public function restore(User $user, Outline $outline): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can permanently delete the model.
     */
    public function forceDelete(User $user, Outline $outline): bool
    {
        //
    }
}
