<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Collections - {{ $collection->name }} </h1>
    <p class="text-gray-600 text-lg mb-6">
        Browse through our curated collections and find the perfect products for you!
    </p>

    <!-- Collections Grid -->
    <div class="mt-16 bg-gray-100 py-12">
        <div class="container mx-auto">

            <div class="grid grid-cols-3 gap-6">
                @foreach($collection->products as $product)
                    <div class="border p-6 text-center">
                        <!-- Thumbnail Gambar Produk -->
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $product->images[0] ?? 'default-image.jpg') }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-xl">
                        </div>
                        <!-- Nama Produk -->
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <!-- Harga Produk -->
                        <p class="text-gray-600 mt-2">{{ $product->price }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
