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

    public function __construct(CartRepository $cartRepository, ItemRepository $itemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->itemRepository = $itemRepository;
    }

    public function createCart($user): void
    {
        $this->cartRepository->create([
            'user_id' => $user->id,
        ]);
    }

    public function getCartByUser($user)
    {
        return $this->cartRepository->getCartByUser($user);
    }

    public function addProductToCart(Cart $cart, Product $product, int $quantity)
    {
        $this->itemRepository->create([
            'quantity' => $quantity,
            'price' => $product->price * $quantity,
            'product_id' => $product->id,
            'cart_id' => $cart->id
        ]);
    }

    public function updateItem(Item $item, int $quantity) {
        $item->quantity = $quantity;
        $item->price = $item->product->price * $quantity;
        $item->save();
    }

//    private function transformProductIntoItem(Product $product, int $quantity, float $price): Item
//    {
//        $item = new Item();
//        $item->product = $product;
//        $item->quantity = $quantity;
//        $item->price = $price;
//        return $item;
//    }
}
