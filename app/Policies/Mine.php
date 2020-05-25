<?php

namespace App\Policies;

use App\Classe;
use App\Testimonial;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class Mine
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

    public function mine(User $user, User $id){
        
        if (Auth::check()) {

        if ($user->id == $id ) {
            return true;
        } 
        } 
    }
    
    public function mineT(User $user, Testimonial $testi){
        
        if (Auth::check()) {

        if ($user->id == $testi->user_id ) {
            return true;
        } 
        } 
    }
    public function myClasse(User $user, Classe $classe){
        
        if (Auth::check()) {

        if ($user->classe_id == $classe->id) {
            return true;
        } 
        } 
    }
    
}
