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
        /*jour*/

        $date = '2016-02-04';
        $test = J2storeOrder::all();

//        dd($date, $test->toArray());

        foreach($test as $v){
            if(takeDate($v->created_date) == $date){
                var_dump(takeDate($v->created_date));
            } else {
                var_dump('oups');
            }
        }

        $total = floatval(J2storeOrder::sum('order_total'));
        $paypal = floatval(J2storeOrder::where('orderpayment_type', 'payment_paypal')->sum('order_total'));
        $cash = floatval(J2storeOrder::where('orderpayment_type', 'payment_cash')->sum('order_total'));
        $moneyorder = floatval(J2storeOrder::where('orderpayment_type', 'payment_moneyorder')->sum('order_total'));

        /*semaine*/
//si annee bissextil alors date('L') = 1 sinon = 0
        /*mois*/

        /*année*/

        return view('pages.statistiques.index', compact(
            'total',
            'paypal',
            'cash',
            'moneyorder'
        ));
    }



}