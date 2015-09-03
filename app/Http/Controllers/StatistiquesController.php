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

class StatistiquesController extends Controller{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */



    public function index(){
        return view('pages.statistiques.index');
    }

}