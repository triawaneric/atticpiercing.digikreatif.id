<?php

namespace App\Livewire;

use App\Models\Outlet;
use Livewire\Component;

class Footer extends Component
{
    public $outlets;

    public function mount(): void
    {
        // Mengambil semua data dari tabel outlets
        $this->outlets = Outlet::all();
    }
    public function render()
    {
        return view('livewire.footer');
    }
}
