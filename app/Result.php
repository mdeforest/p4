<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function platform() {
        return $this->belongsTo('App\Platform');
    }

    public function search() {
        return $this->belongsTo('app\Search');
    }
}
