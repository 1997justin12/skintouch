<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductStocks;

class ProductStocksController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$stocks = ProductStocks::all();

    	return view('products.stocks', [
    		'stocks' => $stocks
    	]);
    }
}
