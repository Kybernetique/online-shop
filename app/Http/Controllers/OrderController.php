<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderService $orderService;
    private CartService $cartService;

    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $orders = $user->orders()->get();
        return view('orders.index', compact('user', 'orders'));
    }

    public function show(Order $order)
    {
        dd($order->products->get());
        return view('products.index', compact('category'), compact('products'));
    }

    public function create(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $cart = $this->cartService->getCartById($user->cart_id);
        $products = $cart->products()->get();
        return view('orders.create', compact('products', 'user'));
    }

    public function store(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $cart = $this->cartService->getCartById($user->cart_id);
        $products = $cart->products()->get();

        $data = request()->validate(
            [
                'user_id' => 'required|integer',
                'name' => 'required|string',
                'phone_number' => 'required|string',
                'email' => 'required|string',
                'shipping_address' => 'required|string',
                'entrance' => 'required|integer',
                'door_password' => 'required|integer',
                'floor' => 'required|integer',
                'apartment' => 'required|integer',
                'comment' => 'nullable|string'
            ]
        );
        $order = $this->orderService->create($data);
        $this->orderService->attachProducts($order, $products);
        $cart->products()->detach(); // clear items from cart
        return view('orders.show', compact('order'));
    }
}
