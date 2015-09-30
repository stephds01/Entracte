<?php namespace App\Models;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class J2storeOrder extends Model {

    protected $table = 'u16w2_j2store_orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_id',
        'order_state',
        'order_state_id',
        'created_date',
        'order_total',
        'customer_note',
    ];

//    /****************************************************************
//     * Le model sert a faire les relations entre les tables
//     *****************************************************************/


//Function qui met en relation la méthode 'OrderInfo' avec la table OrderInfo
    public function OrderInfo(){
        return $this->hasOne('App\Models\J2storeOrderInfo');
    }


//Function qui met en relation la méthode 'OrderItem' avec la table OrderItem
    public function orderItem(){
        return $this->hasOne('App\Models\J2storeOrderItem');
    }


// A mettre dans le controler
//    public function contact()
//    {
//        $orderInfo = J2storeOrder::first()->contact->order_state;
//        return $this->hasOne('orderInfo');
//    }
//

}
