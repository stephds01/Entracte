<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;

class HomeController extends Controller {




	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $order = J2storeOrder::all();
        $orderInfo = J2storeOrderInfo::all();
		$orderItem = J2storeOrderItem::all();
//        $address = J2storeAddress::all();
//		dd($order);
//		dd($orderInfo);
        return view('home', compact('orderInfo', 'order', 'orderItem'));

	}





}
