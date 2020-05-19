<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model
{
    public function ecrivain(){
        return $this->belongsTo('App\User','ecrivain_id');   
    }
}
