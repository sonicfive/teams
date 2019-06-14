<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $table = "stats";

    public function player(){
        $this->belongsTo('\App\Player');
    }
}
