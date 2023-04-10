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
    private CartService $cartService;
    private OrderService $orderService;

    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $orders = $user->orders()->get();
        dd($orders);
        return view('orders.index', compact('user', 'orders'));
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

        $data = request()->validate(
            [
                'name' => 'required|string',
                'phone_number' => 'required|string',
                'email' => 'required|string',
                'city' => 'required|string',
                'shipping_address' => 'required|string',
                'comment' => 'string',
                'user_id' => 'integer',
                'products' => 'array|exists:products,id'
            ]
        );
        dd($data);
        $order = $this->orderService->createOrder($data);
        $this->orderService->createOrder($data);
        return view('orders.show', compact('data'));
    }
}
