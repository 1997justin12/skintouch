<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sales;
use App\Stores;
use App\Requests;
use App\Products;
use App\ProductStocks;
use Illuminate\Support\Facades\Validator;

class StoresController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$stores = Stores::all();
    	return view('stores.view', [
    		'stores' => $stores
    	]);
    }

    public function addStore(){
    	return view('stores.create');
    }


    public function postStore(Request $request){
    	$input = $request->all();

    	$validate = Validator::make($input, [
    		'province' => 'required',
    		'city' => 'required',
    		'street' => 'required',
    		'landmark' => 'required',
    		'sales' => 'required'
    	]);

    	if($validate->fails()){
    		return redirect('/stores/addStore')
    			->withErrors($validate)
    			->withInput();
    	}

    	$store  =  new Stores;

    	$store->province = $input['province'];
    	$store->city = $input['city'];
    	$store->street = $input['street'];
    	$store->landmark = $input['landmark'];
    	$store->sales = $input['sales'];

    	$store->save();
    	return redirect('/stores/addStore')
    		->with('success', "You've add new Branch.");

    }

    public function getStore($id){        
        $products = Products::all();
        $productStocks = ProductStocks::all()->where('store_id', $id);
        $sales = Sales::selectRaw('SUM(total_amount) AS total, created_at')
                ->where('branch_id', $id)
                ->groupBy('created_at')
                ->get();

        return view('stores.store', [
            'store' => $id, 
            'products' => $products,
            'productStocks' => $productStocks,
            'sales' => $sales
        ]);
    }

    public function postStocks(){

       $requestStocks = $_POST['dataStocks'];

       $productStocks = new ProductStocks;
       $productStocks->store_id = $requestStocks['storeId'];
       $productStocks->product_id =  $requestStocks['productId'];
       $productStocks->stocks = $requestStocks['stockQuantity'];

       $productStocks->save();  

    }

    public function getSales($id){

        return view('stores.sales',
            [
                'store' => $id
            ]);
    }


    public function postManager(){
        $requestManager = $_POST['dataManager'];

        $storeUser = new User;
        $storeUser->store_id = $requestManager['storeId'];
        $storeUser->name = $requestManager['name'];
        $storeUser->email = $requestManager['email'];
        $storeUser->password = bcrypt($requestManager['password']);
        $storeUser->role = 0;
        $storeUser->save();

    }

    public function postRequests(Request $request){
        $requests = $request->all();
        $user = auth()->user()->store_id;
        $postRequests = new Requests;
        $postRequests->store_id = $user;
        $postRequests->product_id = $requests['requests']['productID'];
        $postRequests->productStocks = $requests['requests']['productStock'];   
        $postRequests->status = 'ungranted';
        $postRequests->save();
    }
}
