<?php
/**
 * Created by PhpStorm.
 * Name: Stéphanie
 * Date: 07/08/2015
 * Time: 01:15
 */

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\J2storeOrder;

class StatistiquesController extends Controller{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */



    public function index(){
        $order = J2storeOrder::all();
        $paypal = J2storeOrder::where('orderpayment_type', 'payment_paypal')->sum('order_total');
        $cash = J2storeOrder::where('orderpayment_type', 'payment_cash')->get();
        $moneyorder = J2storeOrder::where('orderpayment_type', 'payment_moneyorder')->get();

//dd($paypal);
        return view('pages.statistiques.index', compact('order','paypal','cash', 'moneyorder'));
    }



}