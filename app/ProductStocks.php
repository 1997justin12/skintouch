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
}
