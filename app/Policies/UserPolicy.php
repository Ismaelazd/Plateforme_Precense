<?php

namespace App\Policies;

use App\Classe;
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
        return (2 == Auth::user()->role_id || 1 == Auth::user()->role_id); 
    }
    public function student(User $user){
        return (3 == Auth::user()->role_id); 
    }
    
    public function myCoding(User $user, Classe $classe){
       
        return ((2 == Auth::user()->role_id && $user->classe_id == $classe->id) || 1 == Auth::user()->role_id); 
    }
    public function mine(User $user,User $me){
        if (Auth::check()) {
            if ($user->id == $me->id ) {
                return true;
            } 
        } 
    }
}