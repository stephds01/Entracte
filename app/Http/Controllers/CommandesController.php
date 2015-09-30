<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\J2storeOrder;
use App\Models\J2storeOrderInfo;


class CommandesController extends Controller{



 //Mis en commentaire le 28092015 a 14h50
    public function index()
    {
        $order = J2storeOrder::all();
        $orderInfo = J2storeOrderInfo::all();
//      $orderStatus = J2storeOrder::all();
//        		dd($order);
//        		dd($orderInfo);
        return view('pages.commandes.index', compact('orderInfo', 'order'));
    }

















//********************************************************************
//*  DIFFERENTS TESTS
//********************************************************************
// Fausse fonction qui doit remplacer la function index pour tri 'commande en cours"
//    public function index()
//    {
//        $commande = J2storeAddress::all();
//        $address = J2storeAddress::where('encours', $commande->encours)->get();
//        return view('pages.commandes.index', compact('address'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}