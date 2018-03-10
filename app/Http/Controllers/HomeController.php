<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\ProductStocks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role){

            $customers = Customer::all();

         return view('admin', [
            'customers' => $customers
         ]);
        }
        else{

        $productStocks = ProductStocks::
                         where('store_id', auth()->user()->store_id)
                         ->get();
        $customers = Customer::all();
        
         return view('employee',[
            'customers' => $customers,
            'productStocks' => $productStocks
         ]);
        }
    }
}
