<!-- resources/views/livewire/footer.blade.php -->

<div class="footer-wrapper bg-white text-black py-12">
    <div class="container mx-auto px-6 lg:px-12">
        <!-- Atas: Logo, Sitemap, Location, Newsletter -->
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-8 text-center sm:text-left">
            <!-- Logo -->
            <div>
                <img src="{{ asset('storage/images/logo/attic-logo.png') }}" alt="Logo" class="h-12 mx-auto sm:mx-0">
                <p class="mt-4 text-sm">Your tagline or description here.</p>
            </div>

            <!-- Sitemap -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Sitemap</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="hover:text-gray-600">Home</a></li>
                    <li><a href="/products" class="hover:text-gray-600">Shop</a></li>
                    <li><a href="/about" class="hover:text-gray-600">About</a></li>
                    <li><a href="/contact" class="hover:text-gray-600">Contact</a></li>
                </ul>
            </div>

            <!-- Location -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Our Branch</h3>
                @foreach ($outlets as $outlet)
                    <div class="mb-4">
                        <a href="/branch/{{ $outlet->id }}"
                           class="text-sm font-bold text-black hover:text-grey-600 transition-colors duration-300">
                            {{ $outlet->name }}
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                <form method="POST" action="/subscribe" class="flex">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-black text-white py-2 px-4 rounded-r-full hover:bg-gray-800 transition duration-300 flex justify-center items-center">
                        <i class="fas fa-envelope text-xl"></i> <!-- Ikon email Font Awesome -->
                    </button>
                </form>




                <br/>
                <h3 class="text-lg font-semibold mb-4">We Accept</h3>

                <!-- Payment Methods -->
                <div class="flex justify-center space-x-4 sm:justify-start">
                    <img src="{{ asset('storage/images/logo/maestro.png') }}" alt="Maestro" class="h-8">
                    <img src="{{ asset('storage/images/logo/mastercard.png') }}" alt="Mastercard" class="h-8">
                    <img src="{{ asset('storage/images/logo/visa.png') }}" alt="Visa" class="h-8">
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 my-8"></div>

        <!-- Bawah: Copyright dan Kebijakan -->
        <div class="flex flex-col sm:flex-row justify-between items-center text-sm">
            <!-- Copyright (Kiri) -->
            <p class="text-gray-600">&copy; {{ date('Y') }} Attic. All rights reserved.</p>

            <!-- Kebijakan (Kanan) -->
            <div class="flex space-x-4 mt-4 sm:mt-0">
                <a href="/privacy-policy" class="hover:text-gray-600">Privacy Policy</a>
                <a href="/terms-of-service" class="hover:text-gray-600">Terms of Service</a>
                <a href="/cookie-policy" class="hover:text-gray-600">Cookie Policy</a>
            </div>
        </div>
    </div>
</div>
