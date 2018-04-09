<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Sales;
use App\User;
use App\Products;
use App\ProductStocks;
use App\Inventory;
use Maatwebsite\Excel\Facades\Excel;



class SalesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        date_default_timezone_set("Asia/Manila");
    }

    public function index(){
        $products = Products::all();

    	return view('sales.view', [
            'products' => $products
        ]);
    }

    public function postSales(Request $products){
    	$items = $products->all();
        
        $user = auth()->user()->store_id;
        foreach($items as $item){
             foreach($item as $product){
                $insert = new Sales;
                $insert->branch_id = $user;
                
                $insert->product_id = $product['productID'];
                $insert->quantity = $product['productQuantity'];
                $insert->total_amount = $product['productTotal'];
                

                 if($insert->save()){

                $updateProduct = ProductStocks::where('product_id', $insert->product_id)->first();

                $update = ProductStocks::where([
                    ['product_id', $insert->product_id],
                    ['store_id', $user],
                ])
                    ->update(['stocks' => ($updateProduct->stocks - $insert->quantity) ]);
             
               }else{
               }

            }
        }

    }

    


    public function getSalesStore($id){
        $sales = Sales::where('sales.branch_id', $id)
            ->leftJoin('products', 'products.id', '=','sales.product_id')
            ->get();

        return $sales;
    }

    public function salesInventory(){
    Excel::create('Laravel Excel', function($excel){
    $excel->sheet('Excel sheet', function($sheet){

        // $selectWeeks = explode('*', $request->input('weeks'));
        // $startDay = explode('-', $selectWeeks[0]);
        // $endDay = explode('-', $selectWeeks[1]);
        // $startDay = '2018-'.$startDay[0].'-'.$startDay[1].' 00:00:00';
        // $endDay = '2018-'.$endDay[0].'-'.$endDay[1].' 23:59:59';


        $sheet->setOrientation('landscape');
        $currentYear = date('Y');
        $currentMonth = date('n');
        $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $products = Products::leftJoin('inventory', 'inventory.product_id', '=', 'products.id')
            ->where('inventory.branch_id',3)
          
            ->get();

        $arrayDays = array();

        for($x = 0; $x <= $numberOfDaysInMonth; $x++){
            if($x == 0){
               $arrayDays[] = 'Inventory Products';
            }else{
                $arrayDays[] = date('F').' '.$x;
            }
        }
          $sheet->appendRow($arrayDays);

            foreach ($products as $product) {
            $arrayProducts = array();
            $arrayProducts[] = $product->name;
                 
                for($x =1; $x <= $numberOfDaysInMonth; $x++){
                    for($x =1; $x <= $numberOfDaysInMonth; $x++){
                       $trimDate = explode(' ', $product->created_at);
                       $date = $currentYear.'-'.date('m').'-'.($x < 10 ? '0'.$x : $x);

                       if($trimDate[0] == $date){
                        $arrayProducts[] = $product->stocks;
                       }else{
                        $arrayProducts[] = " ";
                       } 
                   }
                 }
                $sheet->appendRow($arrayProducts);
            }
        });
    })->export('xls');
    
    }

    public function getWeeklyInventory(){
    	
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $currentYear = date('Y');
        $currentMonth = date('n');
        $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $getStartDayOfMonth = gregoriantojd($currentMonth, 1, $currentYear);
        $getEndDayOfMonth = gregoriantojd($currentMonth, $numberOfDaysInMonth, $currentYear);
        $startDay = jddayofweek($getStartDayOfMonth, 1);
        $endDay = jddayofweek($getEndDayOfMonth, 1);
        $arraySearch = array_search($startDay, $days);
        $arraySearchEnd = array_search($endDay, $days);


        

        $anomalyDays = array();

        if($arraySearch > 0 && $arraySearchEnd == 6){
            $prevMonth = $currentMonth - 1;
            $numberOfDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $currentYear);
            $prevDays = $numberOfDaysInPrevMonth - $arraySearch;

                for($x = $prevDays+1; $x <= $numberOfDaysInPrevMonth; $x++){
                    $anomalyDays[] = $prevMonth.'-'.$x;
                }

                for($x = 1; $x <= $numberOfDaysInMonth; $x++){
                    $anomalyDays[] = $currentMonth.'-'.$x;
                }
        }else if($arraySearchEnd < 6 && $arraySearch == 0){
                for($x = 1; $x <= $numberOfDaysInMonth; $x++){
                    $anomalyDays[] = $currentMonth.'-'.$x;
                }

                for($x = 1; $x < (count($days) - $arraySearchEnd); $x++){
                    $anomalyDays[] = (count($days) - $arraySearchEnd).'-'.$x;
                }
        }else if($arraySearch > 0 && $arraySearchEnd < 6){
                $prevMonth = $currentMonth - 1;
            $numberOfDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $currentYear);
            $prevDays = $numberOfDaysInPrevMonth - $arraySearch;

                for($x = $prevDays+1; $x <= $numberOfDaysInPrevMonth; $x++){
                    $anomalyDays[] = $prevMonth.'-'.$x;
                }

                for($x = 1; $x <= $numberOfDaysInMonth; $x++){
                    $anomalyDays[] = $currentMonth.'-'.$x;
                }
                
                for($x = 1; $x < (count($days) - $arraySearchEnd); $x++){
                    $anomalyDays[] = ($currentMonth + 1).'-'.$x;
                }

        }
        $countArrays = 0;
        $weekList = array();

        while($countArrays < count($anomalyDays)){
            $weekDays = array();

            for($x=0; $x<7; $x++){
                if($countArrays < count($anomalyDays)){
                    $weekDays[] = $anomalyDays[$countArrays++];
                }
            }
            $weekList[] = $weekDays;
        }

        $getCurrentDay = $currentMonth.'-'.date('j');

        $contentWeek = array();

        foreach($weekList as $week){
            if(array_search($getCurrentDay, $week) != false){
                $contentWeek = $week;
            }
        } 

    Excel::create('Laravel Excel', function($excel) use($contentWeek){
    $excel->sheet('Excel sheet', function($sheet) use($contentWeek){

        $startDay = explode('-', $contentWeek[1]);
        $endDay = explode('-', $contentWeek[6]);
        $startDay = '2018-'.$startDay[0].'-'.$startDay[1].' 00:00:00';
        $endDay = '2018-'.$endDay[0].'-'.$endDay[1].' 23:59:59';




        $sheet->setOrientation('landscape');
        $currentYear = date('Y');
        $currentMonth = date('n');
        $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $products = Products::leftJoin('inventory', 'inventory.product_id', '=', 'products.id')
            ->where('inventory.branch_id',3)
            ->whereBetween('inventory.created_at', [$startDay, $endDay])
            ->get();

        $arrayDays = array();

        for($x = 0; $x < count($contentWeek); $x++){
            if($x == 0){
               $arrayDays[] = 'Inventory Products';
            }else{
                $splitDay = explode('-', $contentWeek[$x]);
                $arrayDays[] = date('F').' '.$splitDay[1];
            }
        }


          $sheet->appendRow($arrayDays);

            foreach ($products as $product) {
            $arrayProducts = array();
            $arrayProducts[] = $product->name;
            $totalSalesWeekly = 0;
                    for($x =1; $x < count($contentWeek); $x++){
                       $splitDay = explode('-', $contentWeek[$x]);
                       $trimDate = explode(' ', $product->created_at);
                       $date = $currentYear.'-'.date('m').'-'.($splitDay[1] < 10 ? '0'.$splitDay[1] : $splitDay[1]);

                       if($trimDate[0] == $date){
                        $arrayProducts[] = $product->stocks;
                        $totalSalesWeekly += $product->stocks;
                       }else{
                        $arrayProducts[] = " ";
                       } 
                   }
    
                $sheet->appendRow($arrayProducts);
            }
        });
    })->export('xls');

    }

     public function getWeeklySales(){
        
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $currentYear = date('Y');
        $currentMonth = date('n');
        $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $getStartDayOfMonth = gregoriantojd($currentMonth, 1, $currentYear);
        $getEndDayOfMonth = gregoriantojd($currentMonth, $numberOfDaysInMonth, $currentYear);
        $startDay = jddayofweek($getStartDayOfMonth, 1);
        $endDay = jddayofweek($getEndDayOfMonth, 1);
        $arraySearch = array_search($startDay, $days);
        $arraySearchEnd = array_search($endDay, $days);


        

        $anomalyDays = array();

        if($arraySearch > 0 && $arraySearchEnd == 6){
            $prevMonth = $currentMonth - 1;
            $numberOfDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $currentYear);
            $prevDays = $numberOfDaysInPrevMonth - $arraySearch;

                for($x = $prevDays+1; $x <= $numberOfDaysInPrevMonth; $x++){
                    $anomalyDays[] = $prevMonth.'-'.$x;
                }

                for($x = 1; $x <= $numberOfDaysInMonth; $x++){
                    $anomalyDays[] = $currentMonth.'-'.$x;
                }
        }else if($arraySearchEnd < 6 && $arraySearch == 0){
                for($x = 1; $x <= $numberOfDaysInMonth; $x++){
                    $anomalyDays[] = $currentMonth.'-'.$x;
                }

                for($x = 1; $x < (count($days) - $arraySearchEnd); $x++){
                    $anomalyDays[] = (count($days) - $arraySearchEnd).'-'.$x;
                }
        }else if($arraySearch > 0 && $arraySearchEnd < 6){
                $prevMonth = $currentMonth - 1;
            $numberOfDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $currentYear);
            $prevDays = $numberOfDaysInPrevMonth - $arraySearch;

                for($x = $prevDays+1; $x <= $numberOfDaysInPrevMonth; $x++){
                    $anomalyDays[] = $prevMonth.'-'.$x;
                }

                for($x = 1; $x <= $numberOfDaysInMonth; $x++){
                    $anomalyDays[] = $currentMonth.'-'.$x;
                }
                
                for($x = 1; $x < (count($days) - $arraySearchEnd); $x++){
                    $anomalyDays[] = ($currentMonth + 1).'-'.$x;
                }

        }
        $countArrays = 0;
        $weekList = array();

        while($countArrays < count($anomalyDays)){
            $weekDays = array();

            for($x=0; $x<7; $x++){
                if($countArrays < count($anomalyDays)){
                    $weekDays[] = $anomalyDays[$countArrays++];
                }
            }
            $weekList[] = $weekDays;
        }

        $getCurrentDay = $currentMonth.'-'.date('j');

        $contentWeek = array();

        foreach($weekList as $week){
            if(array_search($getCurrentDay, $week) != false){
                $contentWeek = $week;
            }
        } 

    Excel::create('Laravel Excel', function($excel) use($contentWeek){
    $excel->sheet('Excel sheet', function($sheet) use($contentWeek){

        $startDay = explode('-', $contentWeek[1]);
        $endDay = explode('-', $contentWeek[6]);
        $startDay = '2018-'.$startDay[0].'-'.$startDay[1].' 00:00:00';
        $endDay = '2018-'.$endDay[0].'-'.$endDay[1].' 23:59:59';




        $sheet->setOrientation('landscape');
        $currentYear = date('Y');
        $currentMonth = date('n');
        $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $products = Products::leftJoin('sales_inventory', 'inventory.product_id', '=', 'products.id')
            ->where('inventory.branch_id',3)
            ->whereBetween('inventory.created_at', [$startDay, $endDay])
            ->get();

        $arrayDays = array();

        for($x = 0; $x < count($contentWeek); $x++){
            if($x == 0){
               $arrayDays[] = 'Inventory Products';
            }else{
                $splitDay = explode('-', $contentWeek[$x]);
                $arrayDays[] = date('F').' '.$splitDay[1];
            }
        }


          $sheet->appendRow($arrayDays);

            foreach ($products as $product) {
            $arrayProducts = array();
            $arrayProducts[] = $product->name;
            $totalSalesWeekly = 0;
                    for($x =1; $x < count($contentWeek); $x++){
                       $splitDay = explode('-', $contentWeek[$x]);
                       $trimDate = explode(' ', $product->created_at);
                       $date = $currentYear.'-'.date('m').'-'.($splitDay[1] < 10 ? '0'.$splitDay[1] : $splitDay[1]);

                       if($trimDate[0] == $date){
                        $arrayProducts[] = $product->stocks;
                        $totalSalesWeekly += $product->stocks;
                       }else{
                        $arrayProducts[] = " ";
                       } 
                   }
    
                $sheet->appendRow($arrayProducts);
            }
        });
    })->export('xls');

    }

}
