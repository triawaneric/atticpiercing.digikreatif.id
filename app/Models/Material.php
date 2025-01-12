<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name','description','thumbnail','is_active'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'material_product');
    }
}
