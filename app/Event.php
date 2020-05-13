<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function classe(){
        return $this->belongsTo('App\Classe','classe_id');
    }
}
