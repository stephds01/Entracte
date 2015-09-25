<?php
/**
 * Created by PhpStorm.
 * Name: Stéphanie
 * Date: 10/08/2015
 * Time: 20:04
 */

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\J2storeAddress;
use App\J2storeOrder;
use App\J2storeOrderInfo;
use App\J2storeOrderItem;

class DetailsController extends Controller
{


//    public function index()
//    {
//        return view('pages.commandes.details');
//    }

    public function address($order_id)
    {
        $orderItem = J2storeOrderItem::findOrFail($order_id);
        $order = J2storeOrder::findOrFail($order_id);
        $orderInfo = J2storeOrderInfo::findOrFail($order_id);
        return view('pages.commandes.details', compact('orderInfo', 'order', 'orderItem','id'));

    }

//    public function orderDetail($orderitem_id){
//        $orderItem = J2storeOrderItem::find($orderitem_id);
//        return view('pages.commandes.details', compact('orderItem'));
//
//    }




}