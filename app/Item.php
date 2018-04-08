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

	public function user(){

		return $this->belongsTo('App\User');
	}

	public function stock(){

		return $this->hasMany('App\Stock');
	}

	public function orderitem(){

		return $this->hasMany('App\Orderitem');
	}
}
