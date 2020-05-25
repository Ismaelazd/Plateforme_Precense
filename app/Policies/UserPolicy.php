<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function admin(User $user){
        return (1 == Auth::user()->role_id); 
    }
    public function myProfil(User $user){
        return (Auth::check()); 
    }

    public function coach(User $user){
        return (2 == Auth::user()->role_id && 1 == Auth::user()->role_id); 
    }
}