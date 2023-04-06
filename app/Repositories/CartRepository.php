<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function find(int $id): ?Cart
    {
        return Cart::find($id);
    }

    public function create(array $data): Cart
    {
        return Cart::create($data);
    }

    public function getCartByUser($user): ?Cart
    {
        return $user->cart;
    }

    public function save(Cart $cart): Cart
    {
        $cart->save();
        return $cart;
    }
    public function update(Cart $cart, array $data): bool
    {
        return $cart->update($data);
    }

    public function delete(Cart $cart): bool
    {
        return $cart->delete();
    }
}
