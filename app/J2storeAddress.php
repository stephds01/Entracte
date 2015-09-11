<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class J2storeAddress extends Model {

    protected $table = 'u16w2_j2store_address';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'adress_1',
        'adress_2',
        'city',
        'zip',
        'phone_1',
        'type',
    ];

}
