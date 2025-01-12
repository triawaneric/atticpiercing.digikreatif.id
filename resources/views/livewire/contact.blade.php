<div class="container mx-auto px-4 py-12">
    <div class="flex flex-wrap justify-between gap-12">
        <!-- Contact Form (Left side) -->
        <div class="w-full lg:w-5/12 bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8">Contact Us</h1>

            @if ($successMessage)
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-md">
                    {{ $successMessage }}
                </div>
            @endif

            <form wire:submit.prevent="submit">
                <!-- Name Field -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold text-gray-800 mb-2">Your Name</label>
                    <input type="text" id="name" wire:model="name" class="w-full px-6 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-semibold text-gray-800 mb-2">Your Email</label>
                    <input type="email" id="email" wire:model="email" class="w-full px-6 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Message Field -->
                <div class="mb-6">
                    <label for="message" class="block text-lg font-semibold text-gray-800 mb-2">Your Message</label>
                    <textarea id="message" wire:model="message" class="w-full px-6 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" rows="5"></textarea>
                    @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    <span class="inline-block mr-2">Send Message</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveaspectratio="xMidYMid meet" focusable="false">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7M5 19l-7-7 7-7"></path>
                    </svg>
                </button>
            </form>
        </div>

        <!-- Contact Info (Right side) -->
        <!-- Contact Info (Right side) -->
        <div class="w-full lg:w-5/12 p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Get in Touch</h2>

            <div class="flex items-center space-x-4 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 21v-3a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v3"></path><circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span class="text-lg text-gray-700">info@atticpiercing.com</span>
            </div>

            <div class="flex items-center space-x-4 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 18v-6h4v6h13V8H7v3H3V3h18v15"></path>
                </svg>
                <span class="text-lg text-gray-700">+60 123 601 380</span>
            </div>

            <div class="flex items-center space-x-4 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 7v13h20V7zm18 11V9h2v9a2 2 0 0 1-2 2h-2v-3a2 2 0 0 1 2-2h2z"></path>
                </svg>
                <span class="text-lg text-gray-700">Dataran Pahlawan Melaka Megamall, E063, Jalan Merdeka, Melaka, 75000 Melaka, Malaysia</span>
            </div>

            <!-- Social Media Links -->
            <div class="flex space-x-6 mt-6">
                <a href="#" class="text-gray-700 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18.36 1.64c-3.69 0-6.64 2.85-6.64 6.36 0 3.2 2.36 6.04 5.56 6.45v3.83h-3.25c-4.73 0-7.5 3.07-7.5 6.67v1.67h4.15v-5.08h3.25l.5-3.67h-3.75v-2.5c0-.85.25-1.48 1.5-1.48h2.5v-3.3c-.5-.1-2.3-.3-3.5-.3z"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-700 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 19V8l7 6-7 5z"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-700 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M6 12l4-4m0 0l4 4m-4-4v8"></path>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</div>
