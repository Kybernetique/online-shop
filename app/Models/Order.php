<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'phone_number', 'email', 'shipping_address', 'entrance', 'door_password', 'floor', 'apartment', 'comment', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id',
            'product_id')
            ->withPivot(['quantity','price']);
    }
}
