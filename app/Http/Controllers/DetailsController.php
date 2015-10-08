<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;

class DetailsController extends Controller {




//fonction qui marche !

//    public  function index(){
//        $orderInfo = J2storeOrderInfo::all();
//        $orderItem = J2storeOrderItem::all();
//        $order = J2storeOrder::all();
//        return view('pages.commandes.details', compact('orderInfo', 'order', 'orderItem'));
//    }



    public function commande($order_id){
        $order = J2storeOrder::find($order_id);
        $orderInfo = J2storeOrderInfo::find($order_id);
        $orderItem = J2storeOrderItem::all();
//        ->where('order_id', $order_id);
//        dd($orderItem);

        return view('pages.commandes.details', compact('order','orderInfo','orderItem'));

    }
// methode qui marche
////    public function details($order_id)
//    {
//        $orderInfo = J2storeOrderInfo::find($order_id);
//        $orderItem = J2storeOrderItem::find($order_id);
//        $order = J2storeOrder::find($order_id);
//        return view('pages.commandes.details', compact('orderInfo', 'order', 'orderItem'));
//
//    }

//    public function details($order_id)
//    {
//        $orderInfo = J2storeOrderInfo::findOrFail($order_id);
//        $orderItem = J2storeOrderItem::findOrFail($order_id);
//        $order = J2storeOrder::findOrFail($order_id)
//            ->where('order_id', $orderInfo->order_id)
//            ;
//        return view::make('orderInfo.details','orderItem.details','order.details', array('orderInfo'=> $orderInfo, 'orderItem'=> $orderItem, 'order'=> $order));
//        ('pages.commandes.details', compact('orderInfo', 'order', 'orderItem'));
//
//    }



    //fonction entraind'etre testé !

//    public  function index(){
//        $orderInfo = J2storeOrderInfo::all();
//        $orderItem = J2storeOrderItem::all();
//        $order = J2storeOrder::all();
//        return view('pages.commandes.details', compact('orderInfo', 'order', 'orderItem'));
//    }

//
//    public function index($order_id)
//    {
//        $orderItem = J2storeOrderItem::find('order_id');
//        $order = J2storeOrder::find('order_id');
//        $orderInfo = J2storeOrderInfo::all('order_id');
//        return view('pages.commandes.details', compact('orderInfo', 'order', 'orderItem','order_id'));
//
//    }
//

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

//    public function index()
//    {
//        $order = J2storeOrder::all();
//        $orderInfo = J2storeOrderInfo::all();
//        $orderItem= J2storeOrderItem::all();
//        return view('pages.commandes.details', compact('order', 'orderInfo','orderItem'));
//    }
////****************TEST ***********/





}