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

class CommandesController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */



    public function index(){
        return view('pages.commandes.index');
    }

}