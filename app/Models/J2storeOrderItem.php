<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\J2storeOrderItem;

class J2storeOrderItem extends Model {

	protected $table = 'u16w2_j2store_orderitems';
    protected $primaryKey = 'orderitem_id';

    protected $fillable = [
        'orderitem_id',
        'orderitem_sku',
        'orderitem_name',
        'orderitem_quantity',
        'orderitem_price',
        'orderitem_discount',
        'orderitem_final_price'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function J2storeOrderItem()
    {
        return $this->hasmany('App\J2storeOrderItem');
    }

}
