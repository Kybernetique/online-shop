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

    public function create(array $data): Order
    {
        return $this->orderRepository->create($data);
    }

    public function attachProducts(Order $order, $products): void
    {
        foreach ($products as $product) {
            $order->products()->attach($product, [
                'quantity' => $product->pivot->quantity,
                'price' => $product->pivot->price
            ]);
        }
    }

}
