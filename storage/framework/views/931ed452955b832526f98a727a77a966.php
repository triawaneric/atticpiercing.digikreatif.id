<div>
    <!-- Banner -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('jumbotron');

$__html = app('livewire')->mount($__name, $__params, 'lw-1867290987-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- Featured Products -->
    <div class="mt-12 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('product.detail', $product->id)); ?>" class="block hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="border rounded-lg shadow-lg overflow-hidden bg-white">
                        <img src="<?php echo e(asset('storage/' . $product->images[0] ?? 'default-image.jpg')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800"><?php echo e($product->name); ?></h3>
                            <p class="text-gray-600 mt-2">
                                RM
                                <?php echo e($product->discount_price
                                        ? (floor($product->discount_price) == $product->discount_price
                                            ? number_format($product->discount_price, 0)
                                            : number_format($product->discount_price, 2))
                                        : (floor($product->original_price) == $product->original_price
                                            ? number_format($product->original_price, 0)
                                            : number_format($product->original_price, 2))); ?>

                            </p>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    <!-- Collections -->
    <div class="mt-16 bg-gray-100 py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Shop by Collection</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('collections.show', $collection->slug)); ?>" class="block border p-6 text-center transition-transform transform hover:scale-105 hover:bg-indigo-100 rounded-lg shadow-md bg-white">
                        <div class="mb-4">
                            <img
                                src="<?php echo e(asset('storage/' . $collection->thumbnail)); ?>"
                                alt="<?php echo e($collection->name); ?> Thumbnail"
                                class="w-full h-40 object-cover rounded-lg"
                            />
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($collection->name); ?></h3>
                        <span class="text-blue-500 mt-2 inline-block">Shop Now</span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

</div><?php /**PATH /Users/triawaneric/Work/DIgiKreatif/atticpiercing/resources/views/livewire/homepage.blade.php ENDPATH**/ ?>