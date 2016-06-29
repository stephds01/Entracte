<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;
use App\Models\J2storeOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    /**
     * @param $order_id
     * @return \Illuminate\View\View
     */
    public function facture($order_id){
        $order = J2storeOrder::find($order_id);
        /*maj du status */
        if(($order->order_state_id == 1) || ($order->order_state_id == 4)){
            $order->order_state_id = 2;
            $order->order_state = 'confirm';
            $order->transaction_status = 'Validé';
            $order->save();
        }
        $orderInfo = J2storeOrderInfo::find($order_id);
        $orderItems = J2storeOrderItem::where('order_id', $order_id)->get();
        $attrib = J2storeOrderItem::where('order_id', $order_id)
            ->having('orderitem_attribute_names', '!=', '{}')
            ->select('orderitem_id', 'orderitem_attribute_names')
            ->get();
        $timezone = 1;

        /*envoi mail au user_mail*/
        $usermail = $order->user_email;
//        $hourC = date('H:i',strtotime($order->created_date )+3600*($timezone+date("I")));
//        $hourL = date('H:i',strtotime($order->created_date )+6000*($timezone+date("I")));
//        $usename = $order->billing_first_name;

        Mail::send(['emails.commande', 'emails.commande-text'], [
            'order'=>$order,
            'orderInfo'=>$orderInfo,
            'orderItems'=>$orderItems,
            'attrib'=>$attrib,
            'timezone'=>$timezone
        ], function($message) use ($usermail){
            $message
                ->to($usermail)
                ->from('lentracte-pizzeria@hotmail.fr')
                ->subject('Restaurant l\'entracte : votre commande est prise en compte');
        });


        return view('pages.commandes.print', compact('order','orderInfo','orderItems','reduc', 'attrib', 'timezone'));
    }
}