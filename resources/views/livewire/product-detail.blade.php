<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap">
        <!-- Product Image -->
        <div class="w-full md:w-1/2 lg:w-1/3 p-4">
            <img src="{{ asset('storage/' . $product->images[0] ?? 'default-image.jpg') }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>

        <!-- Product Details -->
        <div class="w-full md:w-1/2 lg:w-2/3 p-4">
            <h2 class="text-3xl font-semibold text-gray-800">{{ $product->name }}</h2>
            <p class="text-xl text-gray-600 mt-2">{{ $product->description }}</p>
            <p class="text-lg font-semibold text-gray-900 mt-4">Price: RM {{ number_format($product->original_price, 2) }}</p>

            <!-- Add to Cart Button -->
            <div class="mt-6">
                <button wire:click="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->original_price }})" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none transition duration-300">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>
