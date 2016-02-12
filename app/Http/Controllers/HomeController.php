<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct() { $this->middleware('auth'); }

	/**
	 * Show the application dashboard to the user.
	 *
	 */
	public function index()
	{
		$timezone = 1;
        $order = J2storeOrder::all();
        $total = floatval(J2storeOrder::isValid()->sum('order_total'));
		$orderInfo = J2storeOrderInfo::join('u16w2_j2store_orders', function($q){
			$q->on('u16w2_j2store_orderinfo.order_id', '=', 'u16w2_j2store_orders.order_id');
		})->orderBy('created_date', 'desc')
			->get();
		return view('home', compact('orderInfo', 'order', 'total', 'timezone'));
	}
}
