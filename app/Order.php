<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function orderitem(){

		return $this->hasMany('App\Orderitem');
	}

	public function user(){

		return $this->belongsTo('App\User');
	}
}
