<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $message;
    public $successMessage = null;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // Kirim email atau lakukan aksi lainnya
        Mail::to('contact@yourwebsite.com')->send(new ContactMail($this->name, $this->email, $this->message));

        // Menampilkan pesan sukses
        $this->successMessage = "Thank you for your message. We will get back to you soon.";
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
