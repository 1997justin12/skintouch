<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $fillable = [
    		'name', 'retailers_price', 'members_price', 'resellers_price'
    	];

    protected $dates = ['deleted_at'];
    
    public function user(){
    	$this->belongsTo('App\Users');
    }

    public function admin(){
    	$this->belongsTo('App\Users');
    }

    public function productSales(){
        return $this->hasMany('App\Sales', 'product_id', 'id');
    }

}
