@extends('layouts.slave')

@section('css')

@endsection

@section('content')
 <div class="col-md-12 margin-top-bottom test">
 	<div class="col-md-4 text-center">
 	 <img src="{{ asset('img/list.png') }}" width="130">
 	 <div class="col-md-12 margin-top-bottom">
 	  <a href="" class="btn btn-primary btn-employee"><i class="fa fa-cube"></i> Products</a>
 	 </div>
 	 <div class="col-md-12">
	 	This is a fucking example. This is a fucking example. This is a fucking example. This is a fucking example.This is a fucking example.This is a fucking example.This is a fucking example.This is a fucking example.This is a fucking example.
	 </div>
 	</div>
 	<div class="col-md-4 text-center">
	 <img src="{{ asset('img/purchase-cart.png') }}" width="200">
	 <div class="col-md-12 margin-top-bottom">
	  <a href="/employee/products" class="btn btn-primary btn-employee"><i class="fa fa-money"></i> Purchase</a>
	 </div>
	  <div class="col-md-12">
	 	This is a fucking example. This is a fucking example. This is a fucking example. This is a fucking example. This is a fucking example.This is a fucking example. This is a fucking example. This is a fucking example.This is a fucking example.This is a fucking example.
	 </div>
 	</div>
 	<div class="col-md-4 text-center"> 
	 <img src="{{ asset('img/untitled-2.png') }}" width="200">
	 <div class="col-md-12 margin-top-bottom">
	  <a href="#" class="btn btn-primary btn-employee"><i class="fa fa-user"></i> Members</a>
	 </div>
	 <div class="col-md-12">
	 	This is a fucking example. This is a fucking example. This is a fucking example. This is a fucking example. This is a fucking example. This is a fucking example.This is a fucking example.This is a fucking example. This is a fucking example.
	 </div>
 	</div>
 </div>
@endsection

@section('js')

@endsection