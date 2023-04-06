<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function cart(Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);
        if ($cart === null) {
            $this->cartService->createCart($user);
        }

        return view('carts.cart', compact('cart'));
    }

    public function addToCart(Product $product, Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);
        $quantity = $request->input('quantity');

        $this->cartService->addProductToCart($cart, $product, $quantity);

        return redirect('/categories');
    }
}
