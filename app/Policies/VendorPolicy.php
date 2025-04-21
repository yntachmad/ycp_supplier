<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VendorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {


        // if (is_null(Auth::user()->getKey())) {
        //     // Gate::acceptsAnonymousCheck(true);
        //     return true;
        // }
        return true;
    }



    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Vendor $vendor): bool
    {

        // if (is_null(Auth::user()->getKey())) {
        //     // Gate::acceptsAnonymousCheck(true);
        //     return true;
        // }
        return true;
    }

    public function viewUnauthorized(User $user, Vendor $vendor)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->role === 'superAdmin' || $user->role === 'admin';
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vendor $vendor): bool
    {
        // return $user->role === 'superAdmin' || $user->role === 'admin';
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vendor $vendor): bool
    {
        // return $user->role === 'superAdmin' || $user->role === 'admin';
        return true;
    }
    public function deleteAny(User $user): bool
    {
        // return $user->role === 'superAdmin' || $user->role === 'admin';
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vendor $vendor): bool
    {
        // return $user->role === 'superAdmin' || $user->role === 'admin';
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vendor $vendor): bool
    {
        // return $user->role === 'superAdmin' || $user->role === 'admin';
        return true;
    }
}
