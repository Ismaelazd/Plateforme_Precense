<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    public function getEvent(){
        return $this->belongsTo('App\Event','event_id');
    }
}
