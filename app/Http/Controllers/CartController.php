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

    public function addItem(Product $product, Request $request)
    {
        $user = $request->user();

        $cart = $this->cartService->getCartByUser($user);
        if ($cart === null) {
            $this->cartService->createCart($user);
        }
        $quantity = $request->input('quantity');
        $item = new Item([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price * $quantity
        ]);

        $this->cartService->createOrUpdate($cart, $item);


        $categoryId = $product->category_id;
        return redirect("/categories/$categoryId");
    }

    public function updateItem(Item $item, Request $request)
    {
        $quantity = $request->input('quantity');
        $this->cartService->updateItem($item, $quantity);

        return redirect('/cart');
    }
}
