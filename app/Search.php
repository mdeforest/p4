<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function platform() {
        return $this->belongsTo('App\Platform');
    }

    public function criteria() {
        return $this->belongsToMany('App\Criterion')->withTimestamps()->withPivot('value');
    }
}
