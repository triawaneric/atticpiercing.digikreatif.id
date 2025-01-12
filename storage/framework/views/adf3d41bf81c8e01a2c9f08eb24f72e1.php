<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap">
        <!-- Product Image -->
        <div class="w-full md:w-1/2 lg:w-1/3 p-4">
            <img src="<?php echo e(asset('storage/' . $product->images[0] ?? 'default-image.jpg')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>

        <!-- Product Details -->
        <div class="w-full md:w-1/2 lg:w-2/3 p-4">
            <h2 class="text-3xl font-semibold text-gray-800"><?php echo e($product->name); ?></h2>
            <p class="text-xl text-gray-600 mt-2"><?php echo e($product->description); ?></p>
            <p class="text-lg font-semibold text-gray-900 mt-4">Price: RM <?php echo e(number_format($product->original_price, 2)); ?></p>

            <!-- Add to Cart Button -->
            <div class="mt-6">
                <button wire:click="addToCart(<?php echo e($product->id); ?>, '<?php echo e($product->name); ?>', <?php echo e($product->original_price); ?>)" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none transition duration-300">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/triawaneric/Work/DIgiKreatif/atticpiercing/resources/views/livewire/product-detail.blade.php ENDPATH**/ ?>