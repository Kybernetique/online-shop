<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ProductRepository;

class CartService
{
    private CartRepository $cartRepository;
    private ProductRepository $productRepository;

    public function __construct(CartRepository $cartRepository, ProductRepository $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function store(Cart $cart, array $data): void
    {
        $product = $this->productRepository->find($data['product_id']);

        $cart->products()->attach($product, [
            'price' => $data['price'],
            'quantity' => $data['quantity']
        ]);
    }

    public function update(Cart $cart, array $data): void
    {
        $product = $this->productRepository->find($data['product_id']);
        $quantity = $data['quantity'];
        $cart->products()->updateExistingPivot($product->id, [
            'quantity' => $quantity,
            'price' => $quantity * $product->price
        ]);
    }

    public function destroy(Cart $cart, Product $product): void
    {
        $cart->products()->detach($product->id, ['quantity' => 0, 'price' => 0]);
    }

    public function getCartById($id)
    {
        return $this->cartRepository->find($id);
    }
}
