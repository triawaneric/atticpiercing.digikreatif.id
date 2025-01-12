<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Our Products</h1>

    <!-- Filter, Sort By, Item Count, and Search -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-6 md:space-y-0 md:space-x-6">
        <!-- Item Count Text -->
        <div class="w-full md:w-1/4">
            <p class="text-gray-600">Total Products: {{ $productCount }}</p>
        </div>

        <!-- Filter Dropdown -->
        <div class="w-full md:w-1/4">
            <select
                wire:model="selectedCategory"
                class="w-full p-3 bg-transparent border border-gray-300 rounded-lg text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
            >
                <option value="">Filter by Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <!-- Sort By Dropdown -->
        <div class="w-full md:w-1/4">
            <select class="w-full p-3 bg-transparent border border-gray-300 rounded-lg text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                <option value="price_asc">Sort by Price (Low to High)</option>
                <option value="price_desc">Sort by Price (High to Low)</option>
                <option value="name_asc">Sort by Name (A to Z)</option>
                <option value="name_desc">Sort by Name (Z to A)</option>
            </select>
        </div>

        <!-- Search Bar -->
        <div class="w-full md:w-1/4">
            <input
                type="text"
                class="w-full p-3 bg-white border border-gray-300 rounded-lg text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                placeholder="Search products..."
            />
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
            <a href="{{ route('product.detail', $product->id) }}" class="block">
                <div class="bg-white shadow-md rounded-xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('storage/' . $product->images[0] ?? 'default-image.jpg') }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-xl">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ Str::limit($product->description, 100) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-semibold text-gray-900">
                                RM
                                {{
                                    (floor($product->original_price) == $product->original_price)
                                    ? number_format($product->original_price, 0)
                                    : number_format($product->original_price, 2)
                                }}
                            </span>
                            <button
                                wire:click="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->original_price}})"
                                class="bg-black text-white py-2 px-6 rounded-full hover:bg-gray-800 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
