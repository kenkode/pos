<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function category(){

		return $this->belongsTo('App\Category');
	}

	public function client(){

		return $this->belongsTo('App\Client');
	}
}
