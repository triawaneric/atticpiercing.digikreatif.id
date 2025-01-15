<div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <!-- Total Bookings -->
    <div class="p-6 bg-white rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300">
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a2 2 0 012-2h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V4z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-800">Total Bookings</h3>
        </div>
        <p class="mt-2 text-4xl font-bold text-gray-700">{{ $bookingCount }}</p>
    </div>

    <!-- Booking Analytics -->
    <div class="p-6 bg-white rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300">
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-800">Booking Analytics</h3>
        </div>
        <ul class="mt-2 space-y-2 text-gray-700">
            <li>Today: <span class="font-bold text-gray-900">{{ $bookingsToday }}</span></li>
            <li>This Week: <span class="font-bold text-gray-900">{{ $bookingsThisWeek }}</span></li>
            <li>This Month: <span class="font-bold text-gray-900">{{ $bookingsThisMonth }}</span></li>
        </ul>
    </div>

    <!-- Pending Bookings -->
    <div class="p-6 bg-white rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300">
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-800">Bookings Pending Approval</h3>
        </div>
        <p class="mt-2 text-4xl font-bold text-gray-700">{{ $pendingBookings }}</p>
    </div>
</div>
