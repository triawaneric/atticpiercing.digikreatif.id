<div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <!-- Total Bookings -->
    <div class="p-4 bg-white rounded-lg shadow flex items-center space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-blue-500 text-white rounded-full">
            <i class="fas fa-calendar-check"></i> <!-- Icon for total bookings -->
        </div>
        <div>
            <h3 class="text-lg font-semibold">Total Bookings</h3>
            <p class="mt-2 text-2xl font-bold text-gray-700">{{ $bookingCount ?? '0' }}</p>
        </div>
    </div>

    <!-- Bookings Today -->
    <div class="p-4 bg-white rounded-lg shadow flex items-center space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-green-500 text-white rounded-full">
            <i class="fas fa-calendar-day"></i> <!-- Icon for today -->
        </div>
        <div>
            <h3 class="text-lg font-semibold">Bookings Today</h3>
            <p class="mt-2 text-2xl font-bold text-gray-700">{{ $bookingsToday ?? '0' }}</p>
        </div>
    </div>

    <!-- Bookings This Week -->
    <div class="p-4 bg-white rounded-lg shadow flex items-center space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-yellow-500 text-white rounded-full">
            <i class="fas fa-calendar-week"></i> <!-- Icon for this week -->
        </div>
        <div>
            <h3 class="text-lg font-semibold">Bookings This Week</h3>
            <p class="mt-2 text-2xl font-bold text-gray-700">{{ $bookingsThisWeek ?? '0' }}</p>
        </div>
    </div>

    <!-- Bookings This Month -->
    <div class="p-4 bg-white rounded-lg shadow flex items-center space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-purple-500 text-white rounded-full">
            <i class="fas fa-calendar-alt"></i> <!-- Icon for this month -->
        </div>
        <div>
            <h3 class="text-lg font-semibold">Bookings This Month</h3>
            <p class="mt-2 text-2xl font-bold text-gray-700">{{ $bookingsThisMonth ?? '0' }}</p>
        </div>
    </div>

    <!-- Pending Bookings -->
    <div class="p-4 bg-white rounded-lg shadow flex items-center space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-red-500 text-white rounded-full">
            <i class="fas fa-exclamation-triangle"></i> <!-- Icon for pending bookings -->
        </div>
        <div>
            <h3 class="text-lg font-semibold">Pending Bookings</h3>
            <p class="mt-2 text-2xl font-bold text-gray-700">{{ $pendingBookings ?? '0' }}</p>
        </div>
    </div>
</div>
