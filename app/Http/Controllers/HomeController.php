<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Products;
use App\ProductStocks;
use App\Requests;
use App\Sales;
use App\Inventory;
use App\InventorySales;

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
        date_default_timezone_set("Asia/Manila");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role){
            $requests = Requests::all();
            $customers = Customer::all();

         return view('admin', [
            'requests' => $requests,
            'customers' => $customers
         ]);
        }
        else{
        $products = Products::all();
         $customers = Customer::all();
        $requests = Requests::where('store_id', auth()->user()->store_id)
                    ->get();
        $productStocks = ProductStocks::
                         where('store_id', auth()->user()->store_id)
                         ->get();
        $sales = Sales::selectRaw('SUM(total_amount) AS total, created_at')
                ->where('branch_id', auth()->user()->store_id)
                ->groupBy('created_at')
                ->get();

        $prevDay = (date('d') - 1) < 10 ? '0'.(date('d')-1) : (date('d')-1) ;

        $startDay = date('Y-m').'-'.$prevDay.' '.'00:00:00';
        $endDate = date('Y-m').'-'.$prevDay.' '.'23:59:59';


        $inventory = Inventory::where('branch_id', auth()->user()->store_id)
                     ->whereBetween('created_at', [$startDay, $endDate])
                     ->get();

        if(count($inventory) == 0){
           foreach($productStocks as $productStock){
            $inventory = new Inventory;

            $inventory->product_id = $productStock->product_id;
            $inventory->branch_id = auth()->user()->store_id;
            $inventory->stocks = $productStock->stocks;
            $inventory->created_at = $startDay;
            $inventory->save();
           } 
        }

        $inventorySales = InventorySales::where('store_id', auth()->user()->store_id)
                 ->whereBetween('created_at', [$startDay, $endDate])
                 ->get();


        if(count($inventorySales) == 0){
            foreach($sales as $sale){
                $trimDate = explode(' ', $startDay);
                $trimDateSale = explode(' ', $sale->created_at);

                if($trimDate[0] == $trimDateSale[0]){
                    $inventorySales = new InventorySales;

                    $inventorySales->store_id = auth()->user()->store_id;
                    $inventorySales->sales = $sale->total;

                    $inventorySales->save();
                }
            }

        }

        echo $prevDay;
         return view('employee',[
            'customers' => $customers,
            'products' => $products,
            'productStocks' => $productStocks,
            'requests' => $requests,
            'sales' => $sales
         ]);
        }
    }
}
