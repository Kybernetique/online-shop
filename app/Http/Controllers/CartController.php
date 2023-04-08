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

        $this->cartService->updateTotalPrice($cart);

        return view('carts.cart', compact('cart'));
    }

    public function addItem(Product $product, Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);

        $quantity = $request->input('quantity');

        $this->cartService->updateOrCreateItem($cart, new Item(
                [
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price * $quantity
                ])
        );

        $categoryId = $product->category_id;
        return redirect("/categories/$categoryId");
    }

    public function updateItem(Item $item, Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);

        $action = $request->input('action');
        $quantity = $request->input('quantity');

        $action == 'update'
            ? $this->cartService->updateItemQuantity($item, $quantity)
            : $this->cartService->deleteItem($item);

        $this->cartService->updateTotalPrice($cart);

        return redirect('/cart');
    }
}
