<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct() { $this->middleware('auth'); }

	/**
	 * Show the application dashboard to the user.
	 * @param Request $request
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request)
	{
		$timezone = 1;
		if(is_null($request->day)){
			$date = date('Y-m-d');
			$dDay = date('d/m/Y');
		} else {
			$date = $request->day;
			$dDay = (new \DateTime($request->day))->format('d/m/Y') ;
		}


		$src = 'created_date';
		$search = [$date.' 00:00:01', $date.' 23:59:59' ];

		$order = J2storeOrder::all();
		$orderInfo = J2storeOrderInfo::isValid()->join('u16w2_j2store_orders', function($q){
			$q->on('u16w2_j2store_orderinfo.order_id', '=', 'u16w2_j2store_orders.order_id');
		})
			->orderBy('created_date', 'desc')
			->getBetweenData($src, $search);

		return view('home', compact(
			'orderInfo',
			'order',
			'timezone',
			'date',
			'dDay'
		));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function datePicker(Request $request)
	{
		if ($request->check == 'checkDay') {
			if ($request->day == '') {
				return Redirect::to('/')->with('messageDay', 'Veuillez choisir une date SVP');
			}
			$dataDate = new \DateTime(date('Y-m-d'));
			$req = new \DateTime($request->day);
			if ($dataDate->format('Ymd') < $req->format('Ymd')) {
				return Redirect::to('/')->with('messageDay', 'La date choisit n\'a pas encore de données');
			} else {
				$data = explode('/', $request->day);
				$day = $data[2] . '-' . $data[0] . '-' . $data[1];
				return Redirect::action('HomeController@index', compact('day'));
			}
		}
	}
}
