<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    public function find(int $id): ?Item
    {
        return Item::find($id);
    }

    public function create(array $data): Item
    {
        return Item::create($data);
    }

    public function save(Item $item): Item
    {
        $item->save();
        return $item;
    }

    public function update(Item $item, array $data): bool
    {
        return $item->update($data);
    }

    public function delete(Item $item): bool
    {
        return $item->delete();
    }
}
