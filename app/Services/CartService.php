<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Item;
use App\Repositories\CartRepository;
use App\Repositories\ItemRepository;

class CartService
{
    private CartRepository $cartRepository;
    private ItemRepository $itemRepository;

    public function __construct(CartRepository $cartRepository, ItemRepository $itemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->itemRepository = $itemRepository;
    }

    public function getCartByUser($user): ?Cart
    {
        if ($user->cart === null) {
            $this->createCart($user);
        }
        return $this->cartRepository->getCartByUser($user);
    }

    private function createCart($user): void
    {
        $this->cartRepository->create([
            'user_id' => $user->id,
        ]);
    }

    public function updateOrCreateItem(Cart $cart, Item $newItem): void
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
                return;
            }
        }
        // if item does not exist in cart
        $this->itemRepository->create([
            'quantity' => $newItem->quantity,
            'price' => $newItem->product->price * $newItem->quantity,
            'product_id' => $newItem->product->id,
            'cart_id' => $newItem->cart->id
        ]);
    }

    public function deleteItem(Item $item)
    {
        $this->itemRepository->delete($item);
    }

    public function updateItemQuantity(Item $item, int $quantity): void
    {
        $this->itemRepository->update($item, [
            'quantity' => $quantity,
            'price' => $item->product->price * $quantity,
            'product_id' => $item->product->id,
            'cart_id' => $item->cart->id
        ]);
    }

    public function updateTotalPrice(Cart $cart)
    {
        $updatedPrice = $this->getCurrentTotalPrice($cart);
        $cart->total_price = $updatedPrice;
    }

    public function getCurrentTotalPrice(Cart $cart): float
    {
        $items = $cart->items()->get();

        $price = 0.0;
        foreach ($items as $item) {
            $price += $item->price;
        }
        return $price;
    }
}
