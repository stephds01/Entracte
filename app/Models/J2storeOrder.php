<?php namespace App\Models;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class J2storeOrder extends Model {

    protected $connection = 'mysql2';
    protected $table = 'u16w2_j2store_orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_id',
        'order_state',
        'order_state_id',
        'created_date',
        'order_total',
        'customer_note',
        'transaction_status',
        'orderpayment_type'
    ];

//    /****************************************************************
//     * Le model sert a faire les relations entre les tables
//     *****************************************************************/


//Function qui met en relation la méthode 'OrderInfo' avec la table OrderInfo
    public function OrderInfo(){
        return $this->hasMany('App\Models\J2storeOrderInfo');
    }


//Function qui met en relation la méthode 'OrderItem' avec la table OrderItem
    public function OrderItem(){
        return $this->hasMany('App\Models\J2storeOrderItem');
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeValid($query)
    {
        return $query->where('order_state_id', 1)->orWhere('order_state_id', 2)->orWhere('order_state_id', 4);
    }

// A mettre dans le controler
//    public function contact()
//    {
//        $orderInfo = J2storeOrder::first()->contact->order_state;
//        return $this->hasOne('orderInfo');
//    }
//

}
