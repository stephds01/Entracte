<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;


class CommandesController extends Controller{

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $order = J2storeOrder::all();
        $orderInfo = J2storeOrderInfo::all();
        $orderItem = J2storeOrderItem::all();

        $wait = $order->where('order_state_id', '1');
        $confirm = $order->where('order_state_id', '2');
        $stop = $order->where('order_state_id', '3');
        $road = $order->where('order_state_id', '4');
        return view('pages.commandes.histo', compact(
                'orderInfo',
                'order',
                'orderItem',
                'wait',
                'confirm',
                'stop',
                'road'
            )
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function waitCom(){
        $order = J2storeOrder::all()->where('order_state_id', 1);
        $orderInfo = J2storeOrderInfo::all();
        return view('pages.commandes.index', compact('orderInfo', 'order'));
    }


}