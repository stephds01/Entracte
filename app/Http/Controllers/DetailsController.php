<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;

class DetailsController extends Controller {

//    public function index($order_id)
//    {
//        $orderItem = J2storeOrderItem::find('order_id');
//        $order = J2storeOrder::find('order_id');
//        $orderInfo = J2storeOrderInfo::all('order_id');
//        return view('pages.commandes.details', compact('orderInfo', 'order', 'orderItem','order_id'));
//
//    }


//********************************************************************
//*  DIFFERENTS TESTS
//********************************************************************
//        public function index(){
//    return view('pages.commandes.details');
//    }


//  public function index($order_id)
//  {
//      $orderItem = J2storeOrderItem::findOrFail($order_id);
//      $order = J2storeOrder::findOrFail($order_id);
//  }

    public function index()
    {
        $order = J2storeOrder::all();
        $orderInfo = J2storeOrderInfo::all();
        $orderItem= J2storeOrderItem::all();
        return view('pages.commandes.details', compact('order', 'orderInfo'));
    }





}