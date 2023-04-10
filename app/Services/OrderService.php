<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(array $data): void
    {
        $this->orderRepository->create($data);
    }

    public function attachItems(Order $order, array $data)
    {
        $order->items()->attach($data);
    }

}
