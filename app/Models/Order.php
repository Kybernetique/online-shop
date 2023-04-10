<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'phone_number', 'email', 'city', 'shipping_address', 'comment'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
