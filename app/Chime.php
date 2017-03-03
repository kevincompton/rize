<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chime extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chimeable()
    {
        return $this->morphTo();
    }

}
