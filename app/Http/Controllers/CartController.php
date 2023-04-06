<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function cart()
    {
        $user = Auth::user();
        $cart = $user->cart();
        return view('carts.cart', compact('cart'));
    }

    public function addProductToCart(Product $product, Request $request)
    {
        $quantity = $request->input('quantity');
//        $user = Auth::user();
//        $cart = $user->cart();
        $this->cartService->addProductToCart($product, $quantity);
        return redirect('/categories');
    }
}
