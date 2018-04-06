<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function item(){

		return $this->hasMany('App\Item');
	}
}
