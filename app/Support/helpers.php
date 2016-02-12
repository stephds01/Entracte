<?php
/**
 * Created by PhpStorm.
 * Name: Stéphanie
 * Date: 22/09/2015
 * Time: 17:29
 */

/**
 * @param $statusIdLogo
 * @return string
 */
function status($statusIdLogo)
{
    switch ($statusIdLogo) {
        case '1':
            return 'fa fa-star fa-2x';
            break;
        case '2':
            return 'fa fa-exclamation-circle fa-2x';
            break;
        case '3':
            return 'fa fa-motorcycle fa-2x';
            break;
        case '4':
            return 'fa fa-check-square-o fa-2x';
            break;

    }
}

/**
 * Convert date Month in french
 * @param $month
 * @return string
 */
function dateConvert($month) {
    switch ($month) {
        case 'January':
            return 'Janvier';
            break;
        case 'February':
            return 'Février';
            break;
        case 'March':
            return 'Mars';
            break;
        case 'April':
            return 'Avril';
            break;
        case 'May':
            return 'Mai';
            break;
        case 'June':
            return 'Juin';
            break;
        case 'July':
            return 'Juillet';
            break;
        case 'August':
            return 'Août';
            break;
        case 'September':
            return 'Septembre';
            break;
        case 'October':
            return 'Octobre';
            break;
        case 'November':
            return 'Novembre';
            break;
        case 'December':
            return 'Décembre';
            break;
    }
}

/**
 * @param $date
 * @internal param $day
 * @return int
 */
function getDay($date){
    $create = explode('-', $date);
    $day = explode(' ', $create[2]);
    return intval($day[0]);
}
/**
 * @param $date
 * @return string
 */
function takeDate($date){
    $create = explode('-', $date);
    $y = $create[0];
    $m = $create[1];
    $D = explode(' ', $create[2]);
    $d = $D[0];
    $data = $y.'-'.$m.'-'.$d;
    return $data;

}
/**
 * @param $data
 * @return bool|string
 */
function paiement($data){
    switch ($data){
        case 'payment_cash':
            return 'Espèces / Tickets Restaurant ';
            break;
        case 'payment_moneyorder':
            return 'Chèque';
            break;
        case 'payment_paypal':
            return 'Paypal';
            break;
    }
}
