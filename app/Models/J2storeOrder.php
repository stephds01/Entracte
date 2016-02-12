<?php namespace App\Models;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class J2storeOrder extends Model {

    protected $connection = 'mysql2';
    protected $table = 'u16w2_j2store_orders';
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_id','order_state','order_state_id','created_date','order_total','customer_note','transaction_status','orderpayment_type'];

    /**
     * @return Eloquent\Relations\HasMany
     */
    public function OrderInfo(){
        return $this->hasMany('App\Models\J2storeOrderInfo');
    }

    /**
     * @return Eloquent\Relations\HasMany
     */
    public function OrderItem(){
        return $this->hasMany('App\Models\J2storeOrderItem');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeisValid($query)
    {
        return $query->whereIn('order_state_id', [1, 2, 4]);
    }
    /**
     * @param $query
     * @return mixed
     */
    public function scopeisAbort($query)
    {
        return $query->whereIn('order_state_id',[3, 5, '']);
    }

    /**
     * @param $query
     * @param $src
     * @param $search
     * @return mixed
     */
    public function scopegetBetweenData($query, $src, $search){
        return $query->whereBetween($src, [$search]) ->get();
    }

    /**
     * @param $query
     * @param $src
     * @param $search
     * @param $type
     * @param $name
     * @return mixed
     */
    public function scopegetBetweenHavingData($query, $src, $search, $type, $name){
        return $query->whereBetween($src,$search)
            ->having($type, '=', $name)
            ->get();

    }
}
