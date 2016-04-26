<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class J2storeOrderInfo extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'u16w2_j2store_orderinfo';
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_id','billing_last_name','billing_first_name','billing_middle_name','billing_phone_1','billing_phone_2','billing_address_1','billing_address_2','billing_city','billing_zip','shipping_last_name','shipping_first_name','shipping_address_1','shipping_address_2','shipping_city','shipping_zip','user_email','user_id',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Order()
    {
        return $this->belongsTo('App\Models\J2storeOrder');
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
     * @param $src
     * @param $search
     * @return mixed
     */
    public function scopegetBetweenData($query, $src, $search){
        return $query->whereBetween($src, [$search]) ->get();
    }

}
