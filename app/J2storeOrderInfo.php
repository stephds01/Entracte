<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class J2storeOrderInfo extends Model {

	protected $table = 'u16w2_j2store_orderinfo';

    protected $fillable = [
        'orderinfo_id',
        'order_id',
        'orderpayment_id',
        'billing_last_name',
        'billing_first_name',
        'billing_middle_name',
        'billing_phone_1',
        'billing_phone_2',
        'billing_address_1',
        'billing_address_2',
        'billing_city',
        'billing_zip',
        'shipping_last_name',
        'shipping_first_name',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_city',
        'shipping_zip',
        'user_email',
        'user_id'
    ];

    public function J2storeOrderInfo()
    {
        return $this->hasMany('App\J2storeOrderInfo');
    }

}
