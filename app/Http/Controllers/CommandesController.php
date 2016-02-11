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
        $orderInfo = J2storeOrderInfo::join('u16w2_j2store_orders', function($q){
            $q->on('u16w2_j2store_orderinfo.order_id', '=', 'u16w2_j2store_orders.order_id');
        })->orderBy('created_date', 'desc')
            ->get();


        $orderItem = J2storeOrderItem::all();

        $wait = $order->where('order_state_id', '1')->count();
        $confirm = $order->where('order_state_id', '2')->count();
        $stop = $order->where('order_state_id', '3')->count();
        $road = $order->where('order_state_id', '4')->count();

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