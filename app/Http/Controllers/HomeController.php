<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

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
            
         return view('employee');
        }
    }
}
