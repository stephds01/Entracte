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
use App\J2storeOrderInfo;


class DetailsController extends Controller
{


    public function index()
    {
        return view('pages.commandes.details');
    }


//    public function address($id_user)
//    {
//        $address = J2storeAddress::find($id_user);
//        //$address = J2storeAddress::take(1)->get();
//        return view('pages.commandes.details', compact('address'));
//    }
}