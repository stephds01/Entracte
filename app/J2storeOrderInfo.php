<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\J2storeOrder;
use App\J2storeOrderInfo;

class J2storeOrderInfo extends Model {

	protected $table = 'u16w2_j2store_orderinfo';

    protected $primaryKey = 'orderinfo_id';



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

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function contact()
//    {
//        $order_state = J2storeOrder::first()->contact->order_state;
//        return $this->hasOne('Contact');
//    }


//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function orderStatus()
//    {
//        return $this->hasOne('App\J2storeOrder');
//    }

}
