<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
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

    public function employeeProducts(){
        return view('sales.employee.stocks');
    }

    public function getItem($searchItem){
        $items = Products::where('name', $searchItem)->orWhere('name', 'like', '%'.$searchItem.'%')->get();

            return $items;
    }

    public function getItemDetails($itemSearch){
        $getDetails = Products::where('id', $itemSearch)->first();
        return $getDetails;
    }
}
