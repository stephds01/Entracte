<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class J2storeOrderInfo extends Model
{

    protected $table = 'u16w2_j2store_orderinfo';

    protected $primaryKey = 'order_id';

    public $timestamps = false;


    protected $fillable = [
        'order_id',
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
        'user_id',


    ];

//    /****************************************************************
//     * Le model sert a faire les relations entre les tables
//     *****************************************************************/

//Function qui met en relation la méthode 'Order' avec la table Order
    public function Order()
    {
        return $this->belongsTo('App\Models\J2storeOrder');
    }




//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function contact()
//    {
//        $order_state = J2storeOrder::first()->contact->order_state;
//        return $this->hasOne('Contact');
//    }
}
