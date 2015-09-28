<?php namespace App\Models;
use Illuminate\Database\Eloquent;
use App\J2storeOrder;
use App\J2storeOrderInfo;
use Illuminate\Database\Eloquent\Model;

class J2storeOrder extends Model {

//Model a été remplacé par Eloquent
    protected $table = 'u16w2_j2store_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'order_state',
        'order_state_id',
        'created_date',
        'order_total',
        'customer_note'

    ];

    //Function qui met en relation la table OrderInfo
    public function OrderInfoModel()
    {
        return $this->hasMany('App\J2storeOrderInfo');
    }

    public function contact()
    {
        $orderInfo = J2storeOrder::first()->contact->order_state;
        return $this->hasOne('orderInfo');
    }


//    public function orderInfo(){
//        return $this->hasMany('orderInfo');
//    }

    public function order()
    {
        return $this->hasMany('App\J2storeOrder');
    }
//
//    public function orderInfo()
//    {
//        return $this->hasManyThrough('App\J2storeOrder');
//    }

}
