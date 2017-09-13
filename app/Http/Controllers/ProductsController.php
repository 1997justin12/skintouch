<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$products = Products::all();

    	return view('products.view', [
    			'products' => $products
    		]);
    }
}
