<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    public function getEvent(){
        return $this->belongsTo('App\Event','event_id');
    }

    public function getEtat(){
        return $this->belongsTo('App\Etat','etat_id');
    }
    public function getEtatFinal(){
        return $this->belongsTo('App\Etatfinal','etatfinal_id');
    }

    public function getUser(){
        return $this->belongsTo('App\User','user_id');
    }
    
  


}
