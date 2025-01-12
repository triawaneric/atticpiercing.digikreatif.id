<!-- resources/views/livewire/navbar.blade.php -->

<nav class="bg-white p-4 shadow-md">
    <div class="container mx-auto flex items-center justify-between h-16 px-8">
        <!-- Logo (Tengah) -->
        <a href="/" class="absolute left-1/2 transform -translate-x-1/2">
            <img src="<?php echo e(asset('storage/images/logo/attic-logo.png')); ?>" alt="Logo" class="h-12">
        </a>

        <!-- Menu (Kiri) -->
        <div class="hidden md:flex space-x-8">
            <ul class="flex space-x-8">
                <li><a href="/" class="text-black hover:text-gray-600">Home</a></li>
                <li><a href="/products" class="text-black hover:text-gray-600">Shop</a></li>
                <li><a href="/book-appointment" class="hover:text-gray-300">Book Appointment</a></li>
                <li><a href="/about" class="text-black hover:text-gray-600">About</a></li>
                <li><a href="/contact" class="text-black hover:text-gray-600">Contact</a></li>
            </ul>
        </div>

        <!-- Burger Menu (Mobile) -->
        <div class="md:hidden flex items-center justify-between w-full">
            <!-- Burger Button -->
            <button id="burger-menu" class="text-black hover:text-gray-600">
                <i class="fas fa-bars text-2xl"></i>
            </button>

            <!-- Shopping Cart (Right) -->
            <div class="relative text-black hover:text-gray-600">
                <a href="/cart" class="relative text-black hover:text-gray-600">
                    <i class="fas fa-shopping-cart text-2xl"></i>

                    <!-- Counter -->
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full -mt-2 -mr-2">
                        <?php echo e(session('cart_count') ?? 0); ?>

                    </span>
                </a>
            </div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6">
            <!-- Login -->
            <a href="/login" class="text-black hover:text-gray-600">Login</a>

            <!-- Shopping Cart with Counter -->
            <a href="/cart" class="relative text-black hover:text-gray-600">
                <i class="fas fa-shopping-cart text-2xl"></i>

                <!-- Counter -->
                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full -mt-2 -mr-2">
                    <?php echo e(session('cart_count') ?? 0); ?>

                </span>
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white p-4 shadow-md">
        <ul class="space-y-4">
            <li><a href="/" class="text-black hover:text-gray-600">Home</a></li>
            <li><a href="/products" class="text-black hover:text-gray-600">Shop</a></li>
            <li><a href="/book-appointment" class="hover:text-gray-300">Book Appointment</a></li>
            <li><a href="/about" class="text-black hover:text-gray-600">About</a></li>
            <li><a href="/contact" class="text-black hover:text-gray-600">Contact</a></li>
            <li><a href="/login" class="text-black hover:text-gray-600">Login</a></li>
        </ul>
    </div>
</nav>

<script>
    // Burger menu toggle
    document.getElementById('burger-menu').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script><?php /**PATH /Users/triawaneric/Work/DIgiKreatif/atticpiercing/resources/views/livewire/navbar.blade.php ENDPATH**/ ?>