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
    	$stocks = ProductStocks::all()->groupBy('product_id');

    	return view('products.stocks', [
    		'stocks' => $stocks
    	]);
    }

    public function employeeProducts(){

        return view('sales.employee.stocks');
    }

    public function getItem($searchItem){
        // $items = Products::where('name', $searchItem)->orWhere('name', 'like', '%'.$searchItem.'%')
        // ->get();

        $items = ProductStocks::where('product_stocks.store_id', auth()->user()->store_id)
                 ->leftJoin('products', 'products.id', '=', 'product_stocks.product_id')
                 ->where('products.name', $searchItem)
                 ->orWhere('products.name', 'like', '%'.$searchItem.'%')
                 ->get();
            
        return $items;

    }

    public function getItemDetails($itemSearch){
        $getDetails = Products::where('id', $itemSearch)->first();
        return $getDetails;
    }

    public function getProductStocks($product_id){
        $getProduct = ProductStocks::where('id', $product_id)->first();

        return $getProduct;
    }
}
