<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Component;

class Collections extends Component
{
    public $collections;

    public function mount($slug)
    {
        $this->collections = Collection::where('slug', $slug)->with('products')->firstOrFail();

//        dd($this->collections);
//
//        if (!$this->collections) {
//            abort(404, "Collection not found.");
//        }
    }

    public function render()
    {
        return view('livewire.collections', [
            'collection' => $this->collections,
            'products' => $this->collections->products,
        ]);
    }
}
