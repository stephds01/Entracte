<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

class J2storeOrderItem extends Model {

    protected $connection = 'mysql2';
    protected $table = 'u16w2_j2store_orderitems';
    protected $primaryKey = 'order_id';
    public $timestamps =false;
    protected $fillable = ['order_id','orderitem_id','orderitem_sku','orderitem_name','orderitem_quantity','orderitem_price','orderitem_discount','orderitem_final_price'];

    /**
     * @return Eloquent\Relations\BelongsTo
     */
    public function Order()
    {
        return $this->belongsTo('App\J2storeOrder');

    }
}
