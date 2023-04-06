<?php

namespace App\Services;

use App\Http\Controllers\ProductController;
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

    public function createOrUpdate(Cart $cart, Item $newItem)
    {
        $items = $cart->items()->get();
        foreach ($items as $cartItem) {
            // if item already exists in cart
            if ($cartItem->product_id === $newItem->product_id) {
                $this->itemRepository->update($cartItem, [
                    'quantity' => $cartItem->quantity + $newItem->quantity,
                    'price' => $cartItem->price + $newItem->price,
                    'product_id' => $newItem->product->id,
                    'cart_id' => $newItem->cart->id
                ]);
                return ;
            }
        }
        $this->itemRepository->create([
            'quantity' => $newItem->quantity,
            'price' => $newItem->product->price * $newItem->quantity,
            'product_id' => $newItem->product->id,
            'cart_id' => $newItem->cart->id
        ]);
    }


    public function updateItem(Item $item, int $quantity)
    {
        $this->itemRepository->update($item, [
            'quantity' => $quantity,
            'price' => $item->price,
            'product_id' => $item->product->id,
            'cart_id' => $item->cart->id
        ]);
    }
}
