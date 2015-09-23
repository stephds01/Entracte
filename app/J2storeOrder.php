<?php namespace App;
use Illuminate\Database\Eloquent;
use Illuminate\Foundation\Console\Tinker\Presenters\EloquentModelPresenter;

class J2storeOrder extends Eloquent\Model{

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

    public function contact()
    {
        $orderInfo = J2storeOrder::first()->contact->order_state;
        return $this->hasOne('orderInfo');
    }


//    public function orderInfo(){
//        return $this->hasMany('orderInfo');
//    }

//    public function order()
//    {
//        return $this->hasMany('App\J2storeOrder');
//    }
//
//    public function orderInfo()
//    {
//        return $this->hasManyThrough('App\J2storeOrder');
//    }

}
