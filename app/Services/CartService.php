<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Spatie\Ignition\Tests\TestClasses\Models\Car;

class CartService
{
    private CartRepository $cartRepository;
    private ItemRepository $itemRepository;
    private ProductService $productService;

    public function __construct(CartRepository $cartRepository, ItemRepository $itemRepository, ProductService $productService)
    {
        $this->cartRepository = $cartRepository;
        $this->itemRepository = $itemRepository;
        $this->productService = $productService;
    }

    public function addProductToCart(Product $product, int $quantity)
    {
        $user = Auth::user();
        if ($user->cart() === null) {
            $cart = new Cart([
                'total_price' => 0,
                'user_id' =>$user]);
        } else {
            $cart = $user->cart();
        }
        $this->cartRepository->save($cart);
        $item = new Item([
            'quantity' => $quantity,
            'price' => $product->price * $quantity,
            'product_id' => $product->id,
            'cart_id' => $cart->id
        ]);


//        $product->item()->associate($item);
//        $cart->item()->associate($item);

        $this->itemRepository->save($item);
    }

//    private function transformProductIntoItem(Product $product, int $quantity, float $price): Item
//    {
//        $item = new Item();
//        $item->product = $product;
//        $item->quantity = $quantity;
//        $item->price = $price;
//        return $item;
//    }

    public function getUserForCart($cartId)
    {
        $cart = Cart::findOrFail($cartId);
        $user = $cart->user;
        return $user;
    }

    public function calculateTotalPrice(float $price, int $quantity): float
    {
        return $price * $quantity;
    }
}
