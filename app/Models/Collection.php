<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Collection extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'thumbnail'];

    // Relasi dengan produk
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_collection');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($collection) {
            $collection->slug = Str::slug($collection->name);
        });
    }
}
