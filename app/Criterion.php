<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    public function platform()
    {
        return $this->belongsTo('App\Platform');
    }

    public function searches()
    {
        return $this->belongsToMany('App\Search')->withTimestamps()->withPivot('value');
    }
}
