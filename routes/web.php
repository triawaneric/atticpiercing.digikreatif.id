<?php

use App\Livewire\About;
use App\Livewire\BookAppointment;
use App\Livewire\Cart;
use App\Livewire\Collection;
use App\Livewire\Contact;
use App\Livewire\Homepage;
use App\Livewire\ProductDetail;
use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
//Route::get('/collections/{collection}', [CollectionController::class, 'show'])->name('collections.show');
Route::get('/book-appointment', BookAppointment::class);
Route::get('/products', ProductList::class);
Route::get('/product/{productId}', ProductDetail::class)->name('product.detail');
Route::get('/about', About::class);
Route::get('/contact', Contact::class);

Route::get('/cart', Cart::class)->name('cart');
Route::get('/collections/{slug}', \App\Livewire\Collections::class)->name('collections.show');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
