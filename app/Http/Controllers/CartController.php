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

    public function cart(Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getCartByUser($user);
        return view('carts.cart', compact('cart'));
    }

    public function createItem(Product $product, Request $request)
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

        return redirect("/categories/$product->category_id");
    }

    public function updateItem(Item $item, Request $request)
    {
        $quantity = $request->input('quantity');
        $this->cartService->updateItemQuantity($item, $quantity);
        return redirect('/cart');
    }

    public function deleteItem(Item $item)
    {
        $this->cartService->deleteItem($item);
        return redirect('/cart');
    }
}
