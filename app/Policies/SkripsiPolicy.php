<?php

namespace App\Policies;

use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SkripsiPolicy
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
    public function view(User $user, Skripsi $skripsi): bool
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
    public function update(User $user, Skripsi $skripsi): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can delete the model.
     */
    public function delete(User $user, Skripsi $skripsi): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can restore the model.
     */
    public function restore(User $user, Skripsi $skripsi): bool
    {
        //
    }

    /**
     * Determine whether the mahasiswa can permanently delete the model.
     */
    public function forceDelete(User $user, Skripsi $skripsi): bool
    {
        //
    }
}
