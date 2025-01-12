<div>
    <!-- Banner -->
    @livewire('jumbotron')

    <!-- Featured Products -->
    <div class="mt-12 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
                <a href="{{ route('product.detail', $product->id) }}" class="block hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="border rounded-lg shadow-lg overflow-hidden bg-white">
                        <img src="{{ asset('storage/' . $product->images[0] ?? 'default-image.jpg') }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-gray-600 mt-2">
                                RM
                                {{
                                    $product->discount_price
                                        ? (floor($product->discount_price) == $product->discount_price
                                            ? number_format($product->discount_price, 0)
                                            : number_format($product->discount_price, 2))
                                        : (floor($product->original_price) == $product->original_price
                                            ? number_format($product->original_price, 0)
                                            : number_format($product->original_price, 2))
                                }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Collections -->
    <div class="mt-16 bg-gray-100 py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Shop by Collection</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($collections as $collection)
                    <a href="{{ route('collections.show', $collection->slug) }}" class="block border p-6 text-center transition-transform transform hover:scale-105 hover:bg-indigo-100 rounded-lg shadow-md bg-white">
                        <div class="mb-4">
                            <img
                                src="{{ asset('storage/' . $collection->thumbnail) }}"
                                alt="{{ $collection->name }} Thumbnail"
                                class="w-full h-40 object-cover rounded-lg"
                            />
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $collection->name }}</h3>
                        <span class="text-blue-500 mt-2 inline-block">Shop Now</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
