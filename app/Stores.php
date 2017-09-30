<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
	protected $table = "store";
    protected $fillable = ['province', 'city', 'street', 'landmark', 'sales'];

}
