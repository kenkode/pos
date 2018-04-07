<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    //
    public function order(){

		return $this->belongsTo('App\Order');
	}

	public function item(){

		return $this->hasMany('App\Item');
	}
}
