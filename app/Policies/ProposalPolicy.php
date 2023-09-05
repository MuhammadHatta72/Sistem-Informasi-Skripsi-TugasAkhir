<?php

namespace App\Policies;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProposalPolicy
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
    public function view(User $user, Proposal $proposal): bool
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
    public function update(User $user, Proposal $proposal): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can delete the model.
     */
    public function delete(User $user, Proposal $proposal): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can restore the model.
     */
    public function restore(User $user, Proposal $proposal): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can permanently delete the model.
     */
    public function forceDelete(User $user, Proposal $proposal): bool
    {
        //
    }
}
