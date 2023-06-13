<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepositories;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Order::class;
    }
}
