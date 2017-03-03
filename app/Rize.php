<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rize extends Model
{
    
    public function chimes()
    {
        return $this->morphMany('App\Chime', 'chimeable');
    }

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Chime');
    }

}
