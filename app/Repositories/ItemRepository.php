<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
class ItemRepository
{
    public function find(int $id): ?Item
    {
        return Item::find($id);
    }

    public function findAll(): Collection
    {
        return Item::all();
    }

    public function create(array $data): Item
    {
        return Item::create($data);
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
