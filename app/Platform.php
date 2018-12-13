<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    public function criteria() {
        return $this->hasMany('App\Criterion');
    }

    public function searches() {
        return $this->hasMany('App\Search');
    }
}
