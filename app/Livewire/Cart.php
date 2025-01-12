<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];

    protected $listeners = ['addToCart' => 'addToCart'];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function addToCart($productId, $productName, $productPrice)
    {
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di cart, update kuantitasnya
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1,
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);
        $this->cart = $cart;
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
