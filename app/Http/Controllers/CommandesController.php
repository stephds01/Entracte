<?php
/**
 * Created by PhpStorm.
 * Name: Stéphanie
 * Date: 02/09/2015
 * Time: 16:17
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\J2storeAddress;
use App\J2storeOrderInfo;

class CommandesController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(){
//        return view('pages.commandes.index');
//    }

    public function index()
    {
        $orderInfo = J2storeOrderInfo::all();
        $address = J2storeAddress::all();
        return view('pages.commandes.index', compact('orderInfo', 'address'));
    }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

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