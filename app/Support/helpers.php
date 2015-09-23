<?php
/**
 * Created by PhpStorm.
 * Name: Stéphanie
 * Date: 22/09/2015
 * Time: 17:29
 */
function status($statusId)
{
    switch ($statusId) {
        case '1':
            return 'fa fa-star fa-2x';
            break;
        case '2':
            return 'fa fa-clock-o fa-2x';
            break;
        case '3':
            return 'fa fa-exclamation-circle fa-2x';
            break;
        case '4':
            return 'fa fa-motorcycle fa-2x';
            break;
        case '5':
            return 'fa fa-check-square-o fa-2x';
            break;

    }
}