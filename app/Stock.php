<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public function item(){

		return $this->belongsTo('App\Item');
	}

	public static function check($id){
        $qin  = Stock::where('item_id',$id)->sum('quantity_in');
        $qout = Stock::where('item_id',$id)->sum('quantity_out');
        $reorder_level = Organization::find(1)->reorder_level;
        if($reorder_level >= ($qin - $qout)){
           return 1;

        }else{
           return 0;
        }
	}

	public static function stockRemaining($id){
        $qin  = Stock::where('item_id',$id)->sum('quantity_in');
        $qout = Stock::where('item_id',$id)->sum('quantity_out');
        return ($qin - $qout);
	}

    public static function openingStock($id,$from,$to){
        $qin = Stock::where('item_id', '=', $id)
             ->whereDate('date','<',$from)
             ->sum('quantity_in');
        $qout = Stock::where('item_id', '=', $id)
              ->whereDate('date','<',$from)
              ->sum('quantity_out');

        $stock = $qin - $qout;
        
        $opening = $stock;

        return $opening;
    }

    public static function stockIn($id,$from,$to){
        $qin = Stock::where('item_id', '=', $id)
            ->whereBetween('date', array($from, $to))
            ->sum('quantity_in');

        return $qin;
    }

    public static function stockOut($id,$from,$to){
        $qout = Stock::where('item_id', '=', $id)
              ->whereBetween('date', array($from, $to))
              ->sum('quantity_out');

        return $qout;
    }

    public static function closingStock($id,$from,$to){
        $qin = Stock::where('item_id', '=', $id)
             ->whereBetween('date', array($from, $to))
             ->sum('quantity_in');
        $qout = Stock::where('item_id', '=', $id)
              ->whereBetween('date', array($from, $to))
              ->sum('quantity_out');

        $stock = $qin - $qout;
        
        $closing = $stock + static::openingStock($id,$from,$to);

        return $closing;
    }
}
