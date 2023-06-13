<?php

namespace App\Repositories\OrderDetail;

use App\Models\Order;
use App\Repositories\BaseRepositories;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return OrderDetail::class;
    }
}
