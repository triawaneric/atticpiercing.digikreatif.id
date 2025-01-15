<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Outlet;
use Livewire\Component;

class BookAppointment extends Component
{
    public $name;
    public $email;
    public $phone;
    public $appointment_datetime;
    public $outlet_id;
    public $product_id;
    public $product_name;
    public $outlets = [];
    public $products = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'appointment_datetime' => 'required|date',
        'outlet_id' => 'required|exists:outlets,id',
        'product_id' => 'nullable|exists:products,id',
        'product_name' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        // Ambil data outlet dan produk
        $this->outlets = Outlet::all();
        $this->products = Product::all();
    }

    public function submit()
    {
        $this->validate();

        Appointment::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'appointment_datetime' => $this->appointment_datetime,
            'outlet_id' => $this->outlet_id,
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'status' => Appointment::STATUS_PENDING,
        ]);

        $this->reset();
        session()->flash('success', 'Your appointment has been booked!');
    }

    public function render()
    {
        return view('livewire.book-appointment',[
            'outlets' => $this->outlets,
            'products' => $this->products,
        ]);
    }
}
