<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartById($user->cart_id);
        $products = $cart->products;
        return view('cart.index', compact('cart', 'products'));
    }

    public function store(Product $product, Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartById($user->cart_id);
        $quantity = $request->input('quantity');
        $data = [
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $quantity * $product->price,
        ];

        $this->cartService->store($cart, $data);

        return redirect("/categories/$product->category_id");
    }

    public function update(Product $product, Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartById($user->cart_id);
        $quantity = $request->input('quantity');
        $data = [
            'quantity' => $quantity,
            'product_id' => $product->id
        ];
        $this->cartService->update($cart, $data);
        return redirect('/cart');
    }

    public function destroy(Product $product, Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartById($user->cart_id);
        $this->cartService->destroy($cart, $product);
        return redirect('/cart');
    }
}
