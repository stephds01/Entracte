<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller {

	public function create(){
        $order = Order::all();
        return view('pages.commandes.index', ['gogole'=> $order]);
    }


}
