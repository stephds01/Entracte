<?php namespace App\Http\Controllers;

use App\J2storeAddress;
use App\J2storeOrder;
use App\J2storeOrderInfo;

class HomeController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index()
	{
        $order = J2storeOrder::all();
        $orderInfo = J2storeOrderInfo::all();
        $address = J2storeAddress::all();
        return view('home', compact('address', 'orderInfo', 'order'));
	}




}
