<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Http\Requests\StatRequest;
use App\Models\J2storeOrder;
use Illuminate\Support\Facades\Redirect;

class StatistiquesController extends Controller{


    /**
     * Display a listing of the resource.
     *
     * @param StatRequest $request
     * @return Response
     */
    public function index(StatRequest $request){

        //////////////////* DAY *////////////////////
        if(is_null($request->day)){
            $day = date('Y-m-d');
            $dDay = date('d/m/Y');
        } else {
            $day = $request->day;
            $dDay = (new \DateTime($request->day))->format('d/m/Y') ;
        }
        $dSrc = 'created_date';
        $dSearch = [$day.' 00:00:01', $day.' 23:59:59' ];
        $dType = 'orderpayment_type';
        $dTotal = J2storeOrder::isValid()->getBetweenData($dSrc, $dSearch);
        $dPaypal = floatval(J2storeOrder::isValid()->getBetweenHavingData($dSrc, $dSearch, $dType, 'payment_paypal')
            ->sum('order_total'));
        $dCash = floatval(J2storeOrder::isValid()->getBetweenHavingData($dSrc, $dSearch, $dType, 'payment_cash')
            ->sum('order_total'));
        $dMoneyorder = floatval(J2storeOrder::isValid()->getBetweenHavingData($dSrc, $dSearch, $dType, 'payment_moneyorder')
            ->sum('order_total'));
        $dAbort = J2storeOrder::isAbort()
            ->whereBetween($dSrc, $dSearch)
            ->having('order_state_id', '=', '5')
            ->get();
        $dNul = J2storeOrder::isAbort()
            ->whereBetween($dSrc,$dSearch)
            ->having('order_state_id', '=', '3')
            ->get();
        //////////////////* WEEK *////////////////////
        if($request->week){
            $week = $request->week;
            $dayStart = $request->dayStart;
            $dayStop = $request->dayStop;
        } else {
            $week = date('d/m', strtotime('last Monday')).'-'.date('d/m/Y', strtotime('next Sunday'));
            $dayStart = date('Y-m-d', strtotime('last Monday'));
            $dayStop = date('Y-m-d', strtotime('next Sunday'));
        }
        $wSrc = 'created_date';
        $wSearch = [$dayStart.' 00:00:01', $dayStop.' 23:59:59' ];
        $wType = 'orderpayment_type';
        $wTotal = J2storeOrder::isValid()->getBetweenData($wSrc, $wSearch);
        $wPaypal = floatval(J2storeOrder::isValid()->getBetweenHavingData($wSrc, $wSearch, $wType, 'payment_paypal')
            ->sum('order_total'));
        $wCash = floatval(J2storeOrder::isValid()->getBetweenHavingData($wSrc, $wSearch, $wType, 'payment_cash')
            ->sum('order_total'));
        $wMoneyorder = floatval(J2storeOrder::isValid()->getBetweenHavingData($wSrc, $wSearch, $wType, 'payment_moneyorder')
            ->sum('order_total'));
        $wAbort = J2storeOrder::isAbort()
            ->whereBetween($wSrc,$wSearch)
            ->having('order_state_id', '=', '5')
            ->get();
        $wNul = J2storeOrder::isAbort()
            ->whereBetween($wSrc,$wSearch)
            ->having('order_state_id', '=', '3')
            ->get();
        //////////////////* MOIS *////////////////////
        if($request->month){
            $month = $request->month;
            $year = $request->year;
        }
        else {
            $month = date('m');
            $year = date('Y');
        }
        $mSrc = 'created_date';
        $mSearch = [$year.'-'.$month.'-'.'01'.' 00:00:01', $year.'-'.$month.'-'.'31'.' 23:59:59'];
        $mType = 'orderpayment_type';
        $mTotal = J2storeOrder::isValid()->getBetweenData($mSrc, $mSearch);
        $mPaypal = floatval(J2storeOrder::isValid()->getBetweenHavingData($mSrc, $mSearch, $mType, 'payment_paypal')
            ->sum('order_total'));
        $mCash = floatval(J2storeOrder::isValid()->getBetweenHavingData($mSrc, $mSearch, $mType, 'payment_cash')
            ->sum('order_total'));
        $mMoneyorder = floatval(J2storeOrder::isValid()->getBetweenHavingData($mSrc, $mSearch, $mType, 'payment_moneyorder')
            ->sum('order_total'));
        $mAbort = J2storeOrder::isAbort()
            ->whereBetween($mSrc, $mSearch)
            ->having('order_state_id', '=', '5')
            ->get();
        $mNul = J2storeOrder::isAbort()
            ->whereBetween($mSrc, $mSearch)
            ->having('order_state_id', '=', '3')
            ->get();
        //////////////////* YEAR *////////////////////
        if($request->yYear){
            $yYear = $request->yYear;
        }
        else {
            $yYear = date('Y');
        }
        $ySrc = 'created_date';
        $ySearch = [$yYear.'-01-'.'01'.' 00:00:01', $yYear.'-12-'.'31'.' 23:59:59' ];
        $yType = 'orderpayment_type';
        $yTotal = J2storeOrder::isValid()->getBetweenData($ySrc, $ySearch);
        $yPaypal = floatval(J2storeOrder::isValid()->getBetweenHavingData($ySrc, $ySearch, $yType, 'payment_paypal')
            ->sum('order_total'));
        $yCash = floatval(J2storeOrder::isValid()->getBetweenHavingData($ySrc, $ySearch, $yType, 'payment_cash')
            ->sum('order_total'));
        $yMoneyorder = floatval(J2storeOrder::isValid()->getBetweenHavingData($ySrc, $ySearch, $yType, 'payment_moneyorder')
            ->sum('order_total'));
        $yAbort = J2storeOrder::isAbort()
            ->whereBetween($ySrc, $ySearch)
            ->having('order_state_id', '=', '5')
            ->get();
        $yNul = J2storeOrder::isAbort()
            ->whereBetween($ySrc, $ySearch)
            ->having('order_state_id', '=', '3')
            ->get();
        return view('pages.statistiques.index', compact(
            'dTotal', 'dPaypal', 'dCash', 'dMoneyorder', 'dAbort', 'dNul', 'dDay',
            'week', 'wTotal', 'wPaypal', 'wCash', 'wMoneyorder', 'wAbort', 'wNul',
            'month', 'year','mTotal', 'mPaypal', 'mCash', 'mMoneyorder', 'mAbort', 'mNul',
            'yYear', 'yTotal', 'yPaypal', 'yCash', 'yMoneyorder', 'yAbort', 'yNul'
        ));
    }

    /**
     * @param StatRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function datePicker(StatRequest $request){
        //////////////////* DAY *////////////////////
        if($request->check == 'checkDay') {
            if ($request->day == '') {
                return Redirect::to('/statistiques')->with('messageDay', 'Veuillez choisir une date SVP');
            }
            $dataDate = new \DateTime(date('Y-m-d'));
            $req = new \DateTime($request->day);
            if ($dataDate->format('Ymd') < $req->format('Ymd')) {
                return Redirect::to('/statistiques')->with('messageDay', 'La date choisit n\'a pas encore donnée!');
            }
            else {
                $data = explode('/', $request->day);
                $day = $data[2] . '-' . $data[0] . '-' . $data[1];
                return Redirect::action('StatistiquesController@index', compact('day'));
            }
        }
        //////////////////* WEEK *////////////////////
        if($request->check == 'checkWeek'){
            if($request->week == ''){
                return Redirect::to('/statistiques')->with('messageWeek', 'Veuillez choisir une semaine SVP');
            }
            $datas = explode('/', $request->week);
            $data = explode('-', $datas[2]);
            if(intval($data[0]) > date('y')){
                $preStart = '19';
            }
            else {
                $preStart = '20';
            }
            if(intval($datas[4]) > date('y')){
                $preStop = '19';
            }
            else {
                $preStop = '20';
            }
            $dayStart = $preStart.$data[0].'-'.$datas[0].'-'.$datas[1];
            $dayStop = $preStop.$datas[4].'-'.$data[1].'-'.$datas[3];
            $week = $datas[1].'/'.$datas[0].'/'.$preStart.$data[0].' - '.$datas[3].'/'.$data[1].'/'.$preStop.$datas[4];
            $dataDate = new \DateTime(date('Y-m-d', strtotime('last Monday')));
            $req = new \DateTime($dayStart);
            if ($dataDate->format('W') < $req->format('W')) {
                return Redirect::to('/statistiques')->with('messageWeek', 'La date choisit n\'a pas encore donnée!');
            }
            else {
                return Redirect::action('StatistiquesController@index', compact('dayStart', 'dayStop', 'week'));
            }
        }
        //////////////////* MONTH *////////////////////
        if($request->check == 'checkMonth'){
            if($request->monthYearPicker == ''){
                return Redirect::to('/statistiques')->with('messageMonth', 'Veuillez choisir un mois SVP');
            }
            $dataDate = new \DateTime(date('Y-m'));
            $req = new \DateTime($request->monthYearPicker);
            if ($dataDate->format('Ym') < $req->format('Ym')) {
                return Redirect::to('/statistiques')->with('messageMonth', 'La date choisit n\'a pas encore donnée!');
            }
            else {
                $data = explode(' ', $request->monthYearPicker);
                $month = date('m',strtotime($data[0]));
                $year  = $data[1];
                return Redirect::action('StatistiquesController@index', compact('month', 'year'));
            }
        }
        //////////////////* ANNEE *////////////////////
        if($request->check == 'checkYear'){
            if ($request->year == '') {
                return Redirect::to('/statistiques')->with('messageYear', 'Veuillez choisir une année SVP');
            }
            $dataDate = date('Y');
            $req = $request->year;
            if ($dataDate < $req) {
                return Redirect::to('/statistiques')->with('messageYear', 'La date choisit n\'a pas encore donnée!');
            }
            else {
                $yYear = $request->year;
                return Redirect::action('StatistiquesController@index', compact('yYear'));
            }
        }
    }
}