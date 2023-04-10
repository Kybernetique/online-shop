<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $orders = $user->orders()->get();
        dd($orders);
        return view('orders.index', compact('user', 'orders'));
    }

    public function create(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);
        $items = $cart->items()->get();

        return view('orders.create', compact('items', 'user'));
    }

    public function store(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $data = request()->validate(
            [
                'name' => 'required|string',
                'phone_number' => 'required|string',
                'email' => 'required|string',
                'city' => 'required|string',
                'shipping_address' => 'required|string',
                'comment' => 'string',
                'user_id' => 'integer',
                'items' => 'array|exists:items,id'
            ]
        );
        $order = $this->orderService->createOrder($data);
            Order::save();
        $this->orderService->createOrder($data);
        return view('orders.show', compact('data'));
    }
}
