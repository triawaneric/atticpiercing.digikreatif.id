<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Book Appointment</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-600 text-white rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="submit" class="bg-white p-8 shadow-xl rounded-xl max-w-lg mx-auto">
        <!-- Personal Information -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium text-lg">Name</label>
            <input type="text" id="name" wire:model="name" class="w-full p-4 border-2 border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium text-lg">Email</label>
            <input type="email" id="email" wire:model="email" class="w-full p-4 border-2 border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="phone" class="block text-gray-700 font-medium text-lg">Phone</label>
            <input type="text" id="phone" wire:model="phone" class="w-full p-4 border-2 border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Appointment Details -->
        <div class="mb-6">
            <label for="outlet_id" class="block text-gray-700 font-medium text-lg">Choose Outlet</label>
            <select id="outlet_id" wire:model="outlet_id" class="w-full p-4 border-2 border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition">
                <option value="">Select Outlet</option>
                @foreach ($outlets as $outlet)
                    <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                @endforeach
            </select>
            @error('outlet_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="date" class="block text-gray-700 font-medium text-lg">Choose Date</label>
            <input type="date" id="date" wire:model="date" class="w-full p-4 border-2 border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition">
            @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="time" class="block text-gray-700 font-medium text-lg">Choose Time</label>
            <input type="time" id="time" wire:model="time" class="w-full p-4 border-2 border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition">
            @error('time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-black text-white py-4 rounded-full font-semibold hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black transition duration-300">
            Book Appointment
        </button>

    </form>
</div>
