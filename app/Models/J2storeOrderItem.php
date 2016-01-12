<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

class J2storeOrderItem extends Model {

	protected $table = 'u16w2_j2store_orderitems';

    protected $primaryKey = 'order_id';
    public $timestamps =false;

    protected $fillable = [
        'order_id',
        'orderitem_id',
        'orderitem_sku',
        'orderitem_name',
        'orderitem_quantity',
        'orderitem_price',
        'orderitem_discount',
        'orderitem_final_price'

    ];





//    /****************************************************************
//     * Le model sert a faire les relations entre les tables
//     *****************************************************************/

//Function qui met en relation la m�thode 'Order' avec la table Order
    public function Order()
    {
        return $this->belongsTo('App\J2storeOrder');

    }


//    //Function qui met en relation avec la table OrderInfo
//    public function orderInfo()
//    {
//        return $this->belongsTo('App\Models\J2storeOrderInfo');
//
//    }
//
//    //    //Function qui met en relation avec la table OrderItem
//    public function orderItem(){
//        return $this->belongsTo('App\Models\J2storeOrderItem');
//    }
}
