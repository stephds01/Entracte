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
function dayStart($data){
    switch ($data){
        case 'Monday':
            $dStart = date('d');
            return $dStart;
            break;
        case 'Tuesday':
            $dStart = date('d')-1;
            return $dStart;
            break;
        case 'Wednesday':
            $dStart = date('d')-2;
            return $dStart;
            break;
        case 'Thursday':
            $dStart = date('d')-3;
            return $dStart;
            break;
        case 'Friday':
            $dStart = date('d')-4;
            return $dStart;
            break;
        case 'Saturday':
            $dStart = date('d')-5;
            return $dStart;
            break;
        case 'Sunday':
            $dStart = date('d')-6;
            return $dStart;
            break;
    }
}

/**
 * @param $data
 * @return bool|string
 */
function dayStop($data){
    switch ($data){
        case 'Monday':
            $dStop = date('d')+6;
            return $dStop;
            break;
        case 'Tuesday':
            $dStop = date('d')+5;
            return $dStop;
            break;
        case 'Wednesday':
            $dStop = date('d')+4;
            return $dStop;
            break;
        case 'Thursday':
            $dStop = date('d')+3;
            return $dStop;
            break;
        case 'Friday':
            $dStop = date('d')+2;
            return $dStop;
            break;
        case 'Saturday':
            $dStop = date('d')+1;
            return $dStop;
            break;
        case 'Sunday':
            $dStop = date('d');
            return $dStop;
            break;
    }
}
