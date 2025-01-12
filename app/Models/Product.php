<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    //
    protected $fillable = [
        'name', 'description', 'original_price', 'discount_price', 'discount_percentage',
        'images', 'types', 'sku', 'stock', 'is_active', 'category_id', 'collection_ids',
    ];

    protected $casts = [
        'images' => 'array',
        'types' => 'array',
        'collection_ids' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'product_collection');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'material_product');
    }

}
