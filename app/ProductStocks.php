<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStocks extends Model
{
    protected $table = 'product_stocks';

    protected $fillable = [
    		'product_id', 'stocks'
    	];

    public function productStocks(){
    	return $this->belongsTo('App\Products', 'product_id', 'id');
    }

    public function productSolds(){
    	return $this->hasMany('App\Sales', 'product_id', 'product_id');
    }

    public function storeBranch(){
        return $this->belongsTo('App\Stores', 'store_id', 'id');
    }
}
