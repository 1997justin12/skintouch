<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\User;
use App\Products;
use App\ProductStocks;

class SalesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('sales.view');
    }

    public function postSales(Request $products){
    	$items = $products->all();
        $user = auth()->user()->id;
        foreach($items as $item){
                $insert = new Sales;
             foreach($item as $product){
                
                 $insert->branch_id = auth()->user()->store_id;
                
                $insert->product_id = $product['id'];
                $insert->quantity = $product['quantity'];
                $payment = explode(" ", $product['totalpayment']);
                $payment = str_replace(",", "", $payment[1]);
                $insert->total_amount = $payment;

                $updateProduct = ProductStocks::where('product_id', $insert->product_id)->first();

                $update = ProductStocks::where([
                    ['product_id', $insert->product_id],
                    ['store_id', $user],
                ])
                    ->update(['stocks' => ($updateProduct->stocks - $insert->quantity) ]);
             
                $insert->save();
            }
        }
    }

    


    public function getSalesStore($id){
        $sales = Sales::where('sales.branch_id', $id)
            ->leftJoin('products', 'products.id', '=','sales.product_id')
            ->get();

        return $sales;

    }

    public function getAllSales(){
    	
    }
}
