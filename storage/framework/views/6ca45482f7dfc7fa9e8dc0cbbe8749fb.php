<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Collections - <?php echo e($collection->name); ?> </h1>
    <p class="text-gray-600 text-lg mb-6">
        Browse through our curated collections and find the perfect products for you!
    </p>

    <!-- Collections Grid -->
    <div class="mt-16 bg-gray-100 py-12">
        <div class="container mx-auto">

            <div class="grid grid-cols-3 gap-6">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $collection->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border p-6 text-center">
                        <!-- Thumbnail Gambar Produk -->
                        <div class="mb-4">
                            <img src="<?php echo e(asset('storage/' . $product->images[0] ?? 'default-image.jpg')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-64 object-cover rounded-t-xl">
                        </div>
                        <!-- Nama Produk -->
                        <h3 class="text-lg font-semibold"><?php echo e($product->name); ?></h3>
                        <!-- Harga Produk -->
                        <p class="text-gray-600 mt-2"><?php echo e($product->price); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

</div><?php /**PATH /Users/triawaneric/Work/DIgiKreatif/atticpiercing/resources/views/livewire/collections.blade.php ENDPATH**/ ?>