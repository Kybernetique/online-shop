<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private CartService $cartService;
    private OrderService $orderService;

    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $user = $request->user();

    }

    public function create(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);
        $items = $cart->items()->get();

        return view('orders.create', compact('items', 'user'));
    }

    public function store(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = request()->validate(
            [
                'name' => 'string',
                'phone_number' => 'string',
                'email' => 'string',
                'city' => 'string',
                'shipping_address' => 'string',
                'comment' => 'string',
            ]
        );
        $this->orderService->createOrder($data);
        return view('orders.index');
    }
}
