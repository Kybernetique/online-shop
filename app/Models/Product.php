<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'description', 'price', 'image']; // список разрешенных для изменения атрибутов (полей)

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
