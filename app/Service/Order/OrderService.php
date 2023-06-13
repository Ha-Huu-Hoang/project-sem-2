<?php

namespace App\Service\Order;

use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Service\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;
    public function __construct(OrderDetailRepositoryInterface $OrderRepository)
    {
       $this->repository = $OrderRepository;
    }
}
