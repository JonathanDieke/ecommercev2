<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];

    public function getPrice(){
        return $this->price." Francs CFA.";
    }


    public function order()
    {
        return $this->belongsToMany('App\User', 'order');
    }

}
