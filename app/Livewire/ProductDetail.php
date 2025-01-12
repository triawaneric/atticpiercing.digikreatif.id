<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $productId;
    public $product;

    // Load product data when the component mounts
    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::query()->findOrFail($this->productId); // Get product by ID
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
