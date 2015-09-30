<?php
///**
// * Created by PhpStorm.
// * Name: Stéphanie
// * Date: 28/09/2015
// * Time: 14:32
// */
//
//namespace app\Repositories;
//
//
//use App\Models\J2storeOrder;
//
//class OrderRepository extends ResourceRepository
//{
//    /**
//     * Create CountryRepository instance.
//     *
//     * @param  App\Models\J2storeOrder  $j2storeOrder
//     * @return void
//     */
//    public function __construct(J2storeOrder $j2storeOrder)
//    {
//        $this->model = $j2storeOrder;
//    }
//
//    /**
//     * Get Country by id with cities and authors.
//     *
//     * @return Illuminate\Support\Collection
//     */
//    public function getByIdWithJ2storeOrderInfoAndJ2storeOrderItem($id)
//    {
//       return $this->model->with('J2storeOrderInfo', 'J2storeOrderItem')->find($id);
//    }
//
//
//}