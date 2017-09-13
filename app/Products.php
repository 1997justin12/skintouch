<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $fillable = [
    		'name', 'price1', 'price2', 'price3'
    	];

    protected $dates = ['deleted_at'];
    
    public function user(){
    	$this->belongsTo('App\Users');
    }

    public function admin(){
    	$this->belongsTo('App\Users');
    }


}
