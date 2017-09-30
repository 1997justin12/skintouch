<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stores;
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
}
