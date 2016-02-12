<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;
use Illuminate\Http\Request;

class DetailsController extends Controller {

    /**
     * @param $order_id
     * @return \Illuminate\View\View
     */
    public function commande($order_id){
        $order = J2storeOrder::find($order_id);
        $orderInfo = J2storeOrderInfo::find($order_id);
        $orderItems = J2storeOrderItem::where('order_id', $order_id)->get();
        $attrib = J2storeOrderItem::where('order_id', $order_id)
            ->having('orderitem_attribute_names', '!=', '{}')
            ->select('orderitem_id', 'orderitem_attribute_names')
            ->get();
        $timezone = 1;
         return view('pages.commandes.details', compact('order','orderInfo','orderItems','reduc', 'attrib', 'timezone'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){

        if(isset($request)){
            $order = J2storeOrder::find($request->order_id);
            $order->order_state = $request->order_state;
            if($request->order_state === 'stay'){ $order->order_state_id = 1; }
            else if($request->order_state === 'confirm'){ $order->order_state_id = 2;  $order->transaction_status = 'Validé'; }
            else if($request->order_state === 'stop'){ $order->order_state_id = 3; $order->transaction_status = 'Annulé'; }
            $order->save();
        }
        return redirect()->back();
    }
}