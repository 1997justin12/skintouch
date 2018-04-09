<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    

    public function productRequested(){
    	return $this->belongsTo("App\Products", 'product_id', 'id');
    }
}
