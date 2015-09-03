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


class DetailsController extends Controller
{

    public function index()
    {
        return view('pages.commandes.details');
    }
}