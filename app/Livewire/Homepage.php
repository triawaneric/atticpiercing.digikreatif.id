<?php

namespace App\Livewire;

use App\Models\Collection;
use App\Models\Product;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage', [
            'collections' => Collection::all(),
            'featuredProducts' => Product::query()->inRandomOrder()->take(8)->get(),
        ]);
    }
}
