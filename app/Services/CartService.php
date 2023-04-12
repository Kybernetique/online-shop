<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

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
        if ($cart->products()->find($product->id)) {
//            $cart->products()->sync([$product->id => [
//                'price' => $data['price'],
//                'quantity' => $data['quantity']
//            ]]);
            $cart->products()->syncWithoutDetaching([$product->id => [
                'price' => DB::raw('price + ' . $data['price']),
                'quantity' => DB::raw('quantity + ' . $data['quantity'])
            ]]);
        } else {
            $cart->products()->attach($product, [
                'price' => $data['price'],
                'quantity' => $data['quantity']
            ]);
        }
        $this->updateTotalPrice($cart);
    }

    public function update(Cart $cart, array $data): void
    {
        $product = $this->productRepository->find($data['product_id']);
        $quantity = $data['quantity'];
        $cart->products()->updateExistingPivot($product->id, [
            'quantity' => $quantity,
            'price' => $quantity * $product->price
        ]);
        $this->updateTotalPrice($cart);
    }

    public function destroy(Cart $cart, Product $product): void
    {
        $cart->products()->detach($product->id, ['quantity' => 0, 'price' => 0]);
        $this->updateTotalPrice($cart);
    }

    public function getCartById($id): Cart
    {
        $cart = $this->cartRepository->find($id);
        $this->updateTotalPrice($cart);
        return $cart;
    }

    private function updateTotalPrice(Cart $cart): void
    {
        $products = $cart->products()->get();

        $updatedPrice = 0.0;
        foreach ($products as $product) {
            $updatedPrice += $product->pivot->price;
        }
        $this->cartRepository->update($cart, [
            'total_price' => $updatedPrice
        ]);
    }
}
