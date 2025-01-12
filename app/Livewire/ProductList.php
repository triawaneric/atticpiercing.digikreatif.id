<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{

    public $categories;
    public $selectedCategory;

    public function mount()
    {
        // Mengambil semua kategori dari database
        $this->categories = Category::all();
    }
    // Method to emit the event to add product to cart
    public function addToCart($productId, $productName, $productPrice)
    {
        // Emit the event to Cart component
        $this->dispatch('addToCart', $productId, $productName, $productPrice);
    }

    public function render()
    {
        // Fetch all products
        $products = Product::when($this->selectedCategory, function ($query) {
            return $query->where('category_id', $this->selectedCategory);
        })->get();

        $productCount = $products->count();  // Mengambil jumlah produk


        return view('livewire.product-list', compact('products','productCount'));
    }
}
