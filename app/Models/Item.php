<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['quantity', 'price', 'product_id', 'cart_id']; // список разрешенных для изменения атрибутов (полей)

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
